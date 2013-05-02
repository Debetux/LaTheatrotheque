<?php
class Auth_model extends CI_Model {

	protected $table = 'users';
	protected $hash = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function add_user($username, $email, $first_name, $last_name, $password, $acl_id = '1'){

		$this->load->library('PasswordHash');
		$pwdHasher = new PasswordHash(8, FALSE);
		$hash = $pwdHasher->HashPassword($password);

		$this->db->set('username',  $username)
				->set('email',   $email)
				->set('first_name', $first_name)
				->set('last_name', $last_name)
				->set('password', $hash)
				->set('acl_id', $acl_id);
		// FIX IT : utiliser la fonction de php 5.5 pour stocker les mots de passes, sinon grosse faille de sécurité.
		// Quelque chose comme ça : hash("haval256,5", $this->CI->config->item('encryption_key') . $password);
				
		//  Ces données ne seront pas échappées
		$this->db->set('created_time', 'NOW()', false)->set('updated_time', 'NOW()', false);
		 
		//  Une fois que tous les champs ont bien été définis, on "insert" le tout
		if(strlen($hash) > 10)	return $this->db->insert($this->table);
		else return false;
	}

	public function verify_user($username, $password){

		$this->load->library('PasswordHash');
		$pwdHasher = new PasswordHash(8, FALSE);
		$row = $this->db->select('password')->from($this->table)->where(array('username' => $username))->get()->result();
		
		$password_stored = $row[0]->password;

		return $pwdHasher->CheckPassword($password, $password_stored);
	}
}