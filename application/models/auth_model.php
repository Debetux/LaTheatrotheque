<?php
class Auth_model extends CI_Model {

	protected $table = 'users';
	protected $login_attempts_table = 'login_attempts';
	protected $remember_me_table = 'remember_me_hash';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function add_user($username, $email, $first_name, $last_name, $password, $acl_id = '1'){
		# On charge la librairie.
		$this->load->library('PasswordHash');
		# On initialise l'objet.
		$pwdHasher = new PasswordHash(8, FALSE);
		# Pour haser un mot de passe, rien de plus simple :
		$hash = $pwdHasher->HashPassword($password);

		# On a plus qu'a tout insérer dans la base de donnée.
		$this->db->set('username',  $username)
				->set('email',   $email)
				->set('first_name', $first_name)
				->set('last_name', $last_name)
				->set('password', $hash)
				->set('acl_id', $acl_id);

		$this->db->set('created_time', 'NOW()', false)->set('updated_time', 'NOW()', false);
		 
		# Si le hash fait moins de 10 caractères, il y a un problème.
		if(strlen($hash) > 10)	return $this->db->insert($this->table);
		else return false;
	}

	public function verify_user($username, $password){
		# On charge la librairie.
		$this->load->library('PasswordHash');
		# On initialise l'objet.
		$pwdHasher = new PasswordHash(8, FALSE);

		# On va chercher le hash du mot de passe stocké dans la base de donnée.
		$row = $this->db->select('password')->from($this->table)->where(array('username' => $username))->get()->result();
		
		if(! empty($row[0]->password)) $password_stored = $row[0]->password;
		else $password_stored = 'null';

		# La magie opère !
		return $pwdHasher->CheckPassword($password, $password_stored);
	}

	public function is_banned($parameters = array()){
		$bantime = 0;

		if(! empty($parameters['username'])):
			# On va chercher les tentatives fail avec l'username
			$rows = $this->db->select('*')->from($this->login_attempts_table)->where(array('username' => $parameters['username']))->order_by('time', 'ASC')->get();
			$username_attempts = 0;
			$username_last_attempt_time = null;
			foreach ($rows->result() as $value):
				$username_attempts++; # On incrémente à chaque fois.
				$username_last_attempt_time = $value->time;
			endforeach;
			# On laisse au minimum trois essais ratés. Sinon, le temps double à chaque fois.
			if($username_attempts > 3) $bantime_username = 2*$username_attempts*60;
			else $bantime_username = 0;
		endif;

		if(! empty($parameters['ip_address'])):
			# On va chercher les tentatives fail avec l'username
			$rows = $this->db->select('*')->from($this->login_attempts_table)->where(array('ip_address' => $parameters['ip_address']))->order_by('time', 'ASC')->get();
			$ip_attempts = 0;
			$ip_last_attempt_time = 0;
			foreach ($rows->result() as $value):
				$ip_attempts++;
				$ip_last_attempt_time = $value->time;
			endforeach;
			if($ip_attempts > 3) $bantime_ip = 2*$ip_attempts*60; # La sanction augmente de deux minutes à chaque essai raté.
			else $bantime_ip = 0;
		endif;

		# On prend le plus grand bantime, pour permettre de prévenir les attaques avec des machines multiples sur un même username, ou d'une même machine sur plusieurs usernames
		$total_bantime = ($bantime_username >= $bantime_ip) ? $bantime_username : $bantime_ip;
		$last_attempt = ($username_last_attempt_time > $ip_last_attempt_time) ? $username_last_attempt_time : $ip_last_attempt_time;

		if(now() < $total_bantime + $last_attempt) return true; # Il est banni donc
		else return false;
	}

	public function add_attempt($username, $ip_address){

		# On a plus qu'a tout insérer dans la base de donnée.
		$this->db->set('username',  $username)
				->set('ip_address', $ip_address);

		$this->db->set('time', time());
		return $this->db->insert($this->login_attempts_table);
	}

	public function clear_attempts($params){
		return $this->db->where($params)->delete($this->login_attempts_table);
	}

	public function add_hash_remember_me($username, $hash){
		# On va chercher l'id de l'utilisateur
		$row = $this->db->select('id')->from($this->table)->where(array('username' => $username))->get()->result();
		
		if(! empty($row[0]->id)) $user_id = $row[0]->id;
		else $user_id = 'null';

		$this->db->set('user_id',  $user_id)
				->set('hash', md5($hash));

		$this->db->set('time', time()+604800);
		return $this->db->insert($this->remember_me_table);
	}

	public function add_captcha($data){
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
	}

	public function verify_captacha(){
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
		    echo "You must submit the word that appears in the image";
		}
	}
}