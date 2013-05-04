<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'img_width' => '150',
			'img_height' => 30,
			'expiration' => 7200
		);

		$data['cap'] = create_captcha($vals);

		$this->load->view('templates/header');
		$this->load->view('dashboard/welcome', $data);
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */