<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appterms_model extends CI_Model {

    /**
     * [get_clientes description]
     * @param  [type] $cond [description]
     * @return [type]       [description]
     */
    public function get_appterms($cond = NULL, $permiso_id = 0, $usuario_id = 0)
    {
        $cmd = "SELECT appterms.*, estatus.comentario FROM appterms JOIN estatus USING(estatus_id)";

        if(!is_null($cond)) {
            $cmd .= " ".$cond;
        }

        if ($permiso_id == 7) {
            $cmd .= ((is_null($cond)) ? ' WHERE ' : ' AND '). ' user_add = '.$usuario_id;
        }

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

}

/* End of file Appterms_model.php */
/* Location: ./application/models/Appterms_model.php */
