<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Theaters_model extends CI_Model
{
    protected $table = 'theaters';
 
    public function add_theater($name, $city, $adress, $postal_code, $phone)
    {
        return $this->db->set('name',   $name)
                    ->set('city',   $city)
                ->set('adress', $adress)
                ->set('postal_code', $postal_code)
                ->set('phone', $phone)
                ->set('date_added', 'NOW()', false)
                ->set('date_modified', 'NOW()', false)
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

    public function list_theater($nb = 10, $debut = 0)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->limit($nb, $debut)
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }
}
 
 
/* End of file theaters_model.php */
/* Location: ./application/models/theaters_model.php */