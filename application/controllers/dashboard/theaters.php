<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theaters extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('username')) 
			redirect('auth/login');
	}

	public function index()
	{
		$this->load->helper('assets');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$data['username'] = $this->session->userdata('username');

		$this->load->view('templates/header');
		$this->load->view('dashboard/theaters/theaters', $data);
		$this->load->view('templates/footer');
	}

	public function add(){
		$this->load->helper('assets');
		$this->load->model('theaters_model', 'theatersManager');
		$this->load->library('form_validation');
		$data['username'] = $this->session->userdata('username');
		$data['form']['labels'] = $this->theatersManager->find_labels();
		
		$this->load->view('templates/header');
		$this->load->view('dashboard/theaters/add', $data);
		$this->load->view('templates/footer');
	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */