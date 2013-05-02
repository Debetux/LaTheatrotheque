<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//  Chargement de la bibliothèque
		$this->load->helper('captcha');
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('auth_model', 'authManager');
		
		$this->load->database();
	}

	public function sign_up()
	{
		
		// CAPTCHA
		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'img_width' => '150',
			'img_height' => 30,
			'expiration' => 7200
		);

		$data['cap'] = create_captcha($vals);

		// Données
		$this->form_validation->set_error_delimiters('<small class="error">', '</small>');
		$this->form_validation->set_rules('username', 'identifiant', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('first_name', 'prénom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'nom', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'adresse mail', 'required|valid_email');
		
		// Mot de passe
		$this->form_validation->set_rules('password', 'mot de passe', 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'confirmation de mot de passe', 'required');

		// Validation du formulaire
		if($this->form_validation->run())
		{	
			//  Le formulaire est valide

			// On stocke les variables
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$password = $this->input->post('password');

			if($this->authManager->add_user($username, $email, $first_name, $last_name, $password)){
				$data['registration_complete'] = true;
				
				$this->load->view('templates/header');
				$this->load->view('auth/auth_form', $data);
				$this->load->view('templates/footer');
			} else{
				$data['registration_failed'] = true;
				$this->load->view('templates/header');
				$this->load->view('auth/sign_up_form', $data);
				$this->load->view('templates/footer');
			}
		}
		else
		{
			$this->load->view('templates/header');
			//  Le formulaire est invalide ou vide
			$this->load->view('auth/sign_up_form', $data);
			$this->load->view('templates/footer');
		}
		
		
		
	}
}