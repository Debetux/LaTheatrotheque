<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('username')) 
			redirect('auth/login');
		$this->output->enable_profiler(TRUE);
		$this->load->helper('assets');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data['username'] = $this->session->userdata('username');

		$this->load->view('templates/header');
		$this->load->view('dashboard/theaters/theaters', $data);
		$this->load->view('templates/footer');
	}

	public function add(){

	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */