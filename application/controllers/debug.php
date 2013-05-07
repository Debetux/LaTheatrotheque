<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('auth_model', 'authManager');
		$username = 'debetux';
		$this->authManager->is_banned(array('ip_address' => $this->session->userdata('ip_address'), 'username' => $username));
	}

	public function add(){

	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */