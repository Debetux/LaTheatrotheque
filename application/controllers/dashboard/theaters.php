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

		// Données
		$this->form_validation->set_error_delimiters('<small class="error">', '</small>');
		$this->form_validation->set_rules('name', 'nom du théâtre', 'trim|required|min_length[2]|max_length[100]|alpha_dash|encode_php_tags|xss_clean|is_unique[theaters.name]');
		$this->form_validation->set_rules('city', 'ville', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('postal_code', 'code postal', 'trim|required|xss_clean|exact_length[5]');
		$this->form_validation->set_rules('adress', 'adresse mail', 'required|xss_clean|encode_php_tags|max_length[140]');

		$data['username'] = $this->session->userdata('username');
		$data['form']['labels'] = $this->theatersManager->find_labels();
		$data['form']['labels_js'] = null; # Pour insérer dans le code javascript...
		$data['form']['labels_html'] = null; # ...et aussi dans le code html.

		# On s'occupe de générer les listes de labels.
		foreach ($data['form']['labels'] as $key => $value) {
			$data['form']['labels_js'] .= "'<option value=\"".$label->id."\">".$label->name."</option>'+";
		}

		# On s'occupe des numéros de téléphone et des mails par des expressions régulières avec une boucle foreach :
		if(!empty($_POST)){
			foreach ($_POST as $key => $value) {
				# Mails
				if(preg_match('#phone_label_[0-9]*#', $key)){
					if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)){
						$mails[] = $value;
					} else{
						$mail_errors[] = $key;
					}
					$all_mails[$key] = $value;
				}

				# Comme on validera automatiquement les numéros de téléphone, il faut juste savoir si il y a des chiffres 
				if(preg_match('#phone_label_[0-9]*#', $key)){
					if(preg_match('\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})', $value)){
						$phone_numbers[] = $value;
					} else{
						$phone_errors[] = $key;
					}
					$all_phones[$key] = $value;
				}
			}
		}

		// Validation du formulaire
		if($this->form_validation->run() AND empty($phone_errors) AND empty($mail_errors)){

		} else{
			# On vérifie si il y a des erreurs :
			$data['form']['all_mails'] = (empty($all_mails)) ? null : $all_mails;
			$data['form']['mail_errors'] = (empty($mail_errors)) ? null : $mail_errors;
			$data['form']['all_phones'] = (empty($all_phones)) ? null : $all_phones;
			$data['form']['phone_errors'] = (empty($phone_errors)) ? null : $phone_errors;

			$this->load->view('templates/header');
			$this->load->view('dashboard/theaters/add', $data);
			$this->load->view('templates/footer');
		}
	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */