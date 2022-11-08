<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recompensa_model extends CI_Model
{

    public function medallas(){

        $query = $this->db->query("SELECT * FROM comercios");
        return $query->num_rows() >= 1 ? $query->result() : null;
    
    }
    

}

/* End of file Recompensa_model.php */
/* Location: ./application/models/Reg_user.php */
