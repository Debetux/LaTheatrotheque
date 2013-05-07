<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('captcha');
		$vals = array(
    'word' => 'Random word',
    'img_path' => './captcha/',
    'img_url' => 'http://example.com/captcha/',
    'font_path' => './path/to/fonts/texb.ttf',
    'img_width' => '150',
    'img_height' => 30,
    'expiration' => 7200
    );

$cap = create_captcha($vals);
echo $cap['image'];
	}

	public function add(){

	}
}

/* End of file theaters.php */
/* Location: ./application/controllers/dashboard/theaters.php */