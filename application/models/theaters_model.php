<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Theaters_model extends CI_Model
{
    protected $table = 'theaters';
    protected $labels_table = 'labels';
    protected $phones_table = 'theaters_phones';
    protected $mails_table = 'theaters_mails';
 
    public function add_theater($name, $city, $address, $postal_code)
    {
        return $this->db->set('name',   $name)
                    ->set('city',   $city)
                ->set('address', $address)
                ->set('postal_code', $postal_code)
                ->set('created_at', 'NOW()', false)
                ->set('updated_at', 'NOW()', false)
                ->insert($this->table);
    }
     
    public function edit_theater($id, $titre = null, $contenu = null)
    {
        //  Il n'y a rien à éditer
        if($titre == null AND $contenu == null)
        {
            return false;
        }
         
        //  Ces données seront échappées
        if($titre != null)
        {
            $this->db->set('titre', $titre);
        }
        if($contenu != null)
        {
            $this->db->set('contenu', $contenu);
        }
         
        return $this->db->set('date_modif', 'NOW()', false)
                ->where('id', (int) $id)
                ->update($this->table);
    }
     

    public function delete_theater($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }
     

    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    public function list_theaters($nb = 10, $debut = 0)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->limit($nb, $debut)
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }

    public function find_labels(){
        return $this->db->select('*')->from($this->labels_table)->order_by('id', 'ASC')->get()->result();
    }

    public function add_phones_and_emails($contacts){
        foreach ($contacts as $value) {
            if(preg_match("#^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$#ix", $value)){
                $this->add_mail($value['data']);
            }
            elseif(preg_match('#^(01|02|03|04|05|06|07|08|09)[0-9]{8}$#', $value)){
                $this->add_phone($value['data']);
            }
        }
    }

    public function add_phone($phones){
         return $this->db->set('name',   $name)
                    ->set('city',   $city)
                ->set('address', $address)
                ->set('postal_code', $postal_code)
                ->set('phone', $phone)
                ->set('date_added', 'NOW()', false)
                ->set('date_modified', 'NOW()', false)
                ->insert($this->table);
    }

    public function add_mail($mails){

    }
}
 
 
/* End of file theaters_model.php */
/* Location: ./application/models/theaters_model.php */