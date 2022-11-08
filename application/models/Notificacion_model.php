<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Notificacion_model extends CI_Model {

    /**
     * [get_notificacion description]
     * @param  [type] $noti_id [description]
     * @return [type]          [description]
     */
    function get_notificacion($noti_id) {
        $this->db->where('noti_id', $noti_id);
        $query = $this->db->get('notificaciones');

        return ($query->num_rows() === 1) ? $query->row() : NULL;   
    }

    function get_medallas($id) {
    
        
        $query = $this->db->query(
            "SELECT * FROM recompensas WHERE recompensas.usuario='".$id."'"
        );
        return $query->num_rows();   
    }
    

    public function reqpd(){
        $query= $this->db->query('SELECT * FROM requerimientos WHERE DAYOFYEAR(fecha_req) = DAYOFYEAR(now())');
        return $query->num_rows();
    }

    
    public function reqpdrs(){
        $query= $this->db->query(" SELECT * FROM requerimientos WHERE DAYOFYEAR(fecha_req) = DAYOFYEAR(NOW()) AND (requerimientos.estatus='21'||requerimientos.estatus='22')");
        return $query->num_rows();
    }

}

/* End of file Notificacion_model.php */
/* Location: ./application/models/Notificacion_model.php */
