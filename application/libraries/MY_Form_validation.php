<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Form_validation extends CI_Form_validation {
 
	protected $CI;
 
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance(); # On prend l'accès aux données de CI, avec toutes ses fonctions.
	}

	# Pour vérifier le captcha
	public function verify_captcha($word){
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->CI->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($word, $this->CI->input->ip_address(), $expiration);
		$query = $this->CI->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0){ $this->set_message('verify_captcha', 'Les lettres ne correspondent pas au captcha.'); return false; }
		else{ return true; }
	}

	# Ce sera utile pour les labels, histoire de vérifier que l'id du label existe bien.
	/**
	 *  Check if something exist in db
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */
	public function exist_in_db($str, $field)
	{
		list($table, $field)=explode('.', $field);
		$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
		
		return $query->num_rows() === 1;
    }
}