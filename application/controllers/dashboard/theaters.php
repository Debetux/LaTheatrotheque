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
		$data['form']['labels_html'] = null; # ...et aussi dans le code html. Mais sera sûrement inutile pour le moment.

		# On s'occupe de générer les listes de labels.
		foreach ($data['form']['labels'] as $key => $label) {
			$data['form']['labels_js'] .= "'<option value=\"".$label->id."\">".$label->name."</option>'+";
		}

		# On s'occupe des numéros de téléphone et des mails par des expressions régulières avec une boucle foreach :
		if(!empty($_POST)){
			$matches = null; # Pour stocker les numéros des téléphones/mails.
			foreach ($_POST as $key => $value) {
				# Mails
				# On vérifie d'abbord la $key pour déterminer si c'était censé être un numéro de téléphone ou un mail
				if(preg_match('#mail_adress_([0-9]*)#', $key, $matches)){
					if(preg_match("#^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$#ix", $value)){
						$mails[$matches[1]] = $value;
					} else{
						$mail_errors[$matches[1]] = $value;
					}
					$all_mails[$matches[1]] = $value;
				}
				# On stocke le label pour bien tout matcher
				if(preg_match('#mail_label_([0-9]*)#', $key, $matches)) $all_mails_labels[$matches[1]] = $value;

				# Comme on validera automatiquement les numéros de téléphone, il faut juste savoir si il y a des chiffres 
				if(preg_match('#phone_number_([0-9]*)#', $key, $matches)){
					if(preg_match('#^(01|02|03|04|05|06|07|08|09)[0-9]{8}$#', $value)){
						$phone_numbers[$matches[1]] = $value;
					} else{
						$phone_errors[$matches[1]] = $key;
					}
					$all_phones[$matches[1]] = $value;
				}
				if(preg_match('#phone_label_([0-9]*)#', $key, $matches)) $all_phones_labels[$matches[1]] = $value;
			}
		}

		// Validation du formulaire
		if($this->form_validation->run() AND empty($phone_errors) AND empty($mail_errors)){

		} else{
			# On vérifie si il y a des erreurs :
			$data['form']['all_mails'] = (empty($all_mails)) ? null : $all_mails;
			$data['form']['all_mails_labels'] = (empty($all_mails_labels)) ? null : $all_mails_labels;
			$data['form']['mail_errors'] = (empty($mail_errors)) ? null : $mail_errors;
			$data['form']['mail_sucess'] = (empty($mails)) ? null : $mails;

			$data['form']['all_phones'] = (empty($all_phones)) ? null : $all_phones;
			$data['form']['all_phones_labels'] = (empty($all_phones_labels)) ? null : $all_phones_labels;
			$data['form']['phone_errors'] = (empty($phone_errors)) ? null : $phone_errors;
			$data['form']['phone_sucess'] = (empty($phone_numbers)) ? null : $phone_numbers;

			$this->load->view('templates/header');
			$this->load->view('dashboard/theaters/add', $data);
			$this->load->view('templates/footer');
		}
	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */