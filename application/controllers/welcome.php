<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('assets');
		$this->load->helper('captcha');

		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'img_width' => '150',
			'img_height' => 30,
			'expiration' => 7200
		);

		$data['cap'] = create_captcha($vals);

		$this->load->view('templates/header');
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */