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
			$rows = $this->db->select('*')->from($this->login_attempts_table)->where(array('username' => $parameters['username']))->order_by('time', 'DESC')->get();
			$nbr_attempts = 0;
			$last_attempt_user_time = 0;
			foreach ($rows->result() as $value):
				$nbr_attempts++; # On incrémente à chaque fois.
				$last_attempt_user_time = $value->time;
			endforeach;
			# On laisse au minimum trois essais ratés. Sinon, le temps double à chaque fois.
			if($nbr_attempts > 3) $bantime_username = 2*$nbr_attempts*60;
			else $bantime_username = 0;
		endif;

		if(! empty($parameters['ip_address'])):
			# On va chercher les tentatives fail avec l'username
			$rows = $this->db->select('*')->from($this->login_attempts_table)->where(array('ip_address' => $parameters['ip_address']))->order_by('time', 'DESC')->get();
			$nbr_attempts = 0;
			$last_attempt_ip_time = 0;
			foreach ($rows->result() as $value):
				$nbr_attempts++;
				$last_attempt_ip_time = $value->time;
			endforeach;
			if($nbr_attempts > 3) $bantime_ip = 2*$nbr_attempts*60;
			else $bantime_ip = 0;
		endif;

		# Un peu foireu comme systeme, mais ça marche. Je sais pas trop comment j'en suis arrivé là, mais j'ai eu une autre idée, je verrais bien.
		if($last_attempt_user_time + $bantime_username > time() AND 
			$last_attempt_ip_time + $bantime_ip > time() AND 
			$last_attempt_user_time + $bantime_username == $last_attempt_ip_time + $bantime_ip) 
			$bantime+= 1;
		elseif($last_attempt_user_time + $bantime_username < time() AND 
			$last_attempt_ip_time + $bantime_ip < time()) $bantime = 0;
		else $bantime = 1;

		
		#if($bantime > 0) return true;
		#else return false;
		return false;
		/*if($bantime_ip == $bantime_username) return $bantime_username;
		else return $bantime_username+$bantime_ip;

		if(empty($bantime)) return 0;
		else return $bantime;*/
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
}