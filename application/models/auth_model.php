<?php
class Auth_model extends CI_Model {

	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function add_user($username, $email, $first_name, $last_name, $password, $acl_id = '1'){
		# On chargee la librairie.
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
		# On chargee la librairie.
		$this->load->library('PasswordHash');
		# On initialise l'objet.
		$pwdHasher = new PasswordHash(8, FALSE);

		# On va chercher le hash du mot de passe stocké dans la base de donnée.
		$row = $this->db->select('password')->from($this->table)->where(array('username' => $username))->get()->result();
		
		$password_stored = $row[0]->password;

		# La magie opère !
		return $pwdHasher->CheckPassword($password, $password_stored);
	}
}