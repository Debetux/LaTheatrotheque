<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		redirect('auth/login');
	}

	public function sign_up()
	{

		//  Chargement de la bibliothèque
		$this->load->library('form_validation');
		$this->load->helper('assets');
		$this->load->helper('captcha');
		$this->load->model('auth_model', 'authManager');

		# Si connecté
		if($this->session->userdata('username')) 
			redirect();

		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'img_width' => '120',
			'img_height' => 30,
			'expiration' => 7200
		);

		$data['captcha'] = create_captcha($vals);

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

	public function login(){
		//  Chargement de la bibliothèque
		$this->load->library('form_validation');
		$this->load->helper('assets');
		$this->load->model('auth_model', 'authManager');

		# Si connecté
		if($this->session->userdata('username')) 
			redirect();

		// Données
		$this->form_validation->set_error_delimiters('<small class="error">', '</small>');
		$this->form_validation->set_rules('username', 'identifiant', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('password', 'mot de passe', 'required');

		// Validation du formulaire
		if($this->form_validation->run())
		{	

			// On stocke les variables
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember_me = ($this->input->post('remember_me') == null ? false : true);

			if($this->authManager->verify_user($username, $password) AND ! $this->authManager->is_banned(array('ip_address' => $this->session->userdata('ip_address'), 'username' => $username))){
				# On initialise la session
				$this->session->set_userdata('username', $username);

				# On remet à 0 les login fails
				$this->authManager->clear_attempts(array('ip_address' => $this->session->userdata('ip_address'), 'username' => $username));

				$this->load->helper('string');

				# Si le remember me est coché
				if($remember_me){
					$remember_me_hash = $username.'--'.random_string('numeric', 128);
					set_cookie('something', $remember_me_hash, 604800, '.localhost', null, null, TRUE);
					$this->authManager->add_hash_remember_me($username, $remember_me_hash);
				}
				
				
				redirect('dashboard/', 'refresh');

			} else{
				$data['login_failed'] = true;
				if(! $this->authManager->is_banned(array('ip_address' => $this->session->userdata('ip_address'), 'username' => $username))) $this->authManager->add_attempt($username, $this->session->userdata('ip_address'));
				$this->load->view('templates/header');
				$this->load->view('auth/auth_form', $data);
				$this->load->view('templates/footer');
			}
		}
		else
		{
			$this->load->view('templates/header');
			//  Le formulaire est invalide ou vide
			$this->load->view('auth/auth_form');
			$this->load->view('templates/footer');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}
}