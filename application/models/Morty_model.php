<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Morty_model extends CI_Model
{
 
    public function up_raccion($data)
    {
        try {
            $this->db->insert('encuesta', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function reacciones_like($id)
    {
        $cmd=("SELECT * FROM  encuesta WHERE reaccion = 1 and id_personaje = $id ");
        $query = $this->db->query($cmd);
        return ($query->num_rows());
    }
    public function reacciones_dislike($id)
    {
        $cmd=("SELECT * FROM  encuesta WHERE reaccion = 0 and id_personaje = $id ");
        $query = $this->db->query($cmd);
        return ($query->num_rows());
    }
}

/* End of file Afiliador_model.php */
/* Location: ./application/models/Afiliador_model.php */