<?php
class Auth_model extends CI_Model {

	protected $table = 'users';

	public function __construct()
	{
		$this->load->database();
		
	}

	public function add_user($username, $email, $first_name, $last_name, $password, $acl_id = '1'){
		//  Ces données seront automatiquement échappées
		$this->db->set('username',  $username)
				->set('email',   $email)
				->set('first_name', $first_name)
				->set('last_name', $last_name)
				->set('password', sha1($password))
				->set('acl_id', $acl_id);
		// FIX IT : utiliser la fonction de php 5.5 pour stocker les mots de passes, sinon grosse faille de sécurité.
		// Quelque chose comme ça : hash("haval256,5", $this->CI->config->item('encryption_key') . $password);
				
		//  Ces données ne seront pas échappées
		$this->db->set('created_time', 'NOW()', false)->set('updated_time', 'NOW()', false);
		 
		//  Une fois que tous les champs ont bien été définis, on "insert" le tout
		return $this->db->insert($this->table);
	}
}