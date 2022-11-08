<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Actividad_model extends CI_Model
{

    public function get_actividades($where = null)
    {
        if (!is_null($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('actividad');

        return $query->num_rows() > 0 ? $query->result() : null;
    }

}

/* End of file Actividad_model.php */
