<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

     /**
     * [get_config_value description]
     * @param  [type] $config_id [description]
     * @return [type]            [description]
     */
     public function get_config_value($config_id) 
     {

        $this->db->flush_cache();
        
        $query = $this->db->query("SELECT configuraciones.valor FROM configuraciones WHERE configuraciones.estatus_id = 3 AND configuraciones.config_id = '$config_id'");

        return ($query->num_rows()  === 1) ? $query->row()->valor : NULL;
    }

    /**
     * Retornamos el id del comercio a partir del usuario
     * @param  [type] $usuario_id [description]
     * @return [type]             [description]
     */
    function get_comercio_id($usuario_id)
    {
        $this->db->where('usuario_id', $usuario_id);        
        $query = $this->db->get('comercios');

        return ($query->num_rows() === 1) ? $query->row()->negocio_id : NULL;
    }    

}

/* End of file Common_model.php */
/* Location: ./application/models/Common_model.php */
