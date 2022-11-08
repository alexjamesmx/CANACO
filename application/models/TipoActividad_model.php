<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TipoActividad_model extends CI_Model
{

    public function get_tipos($where = null)
    {
        if (!is_null($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('tipo_actividad');

        return $query->num_rows() > 0 ? $query->result() : null;
    }

}

/* End of file TipoActividad_model.php */
