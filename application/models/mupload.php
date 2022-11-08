<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mupload extends CI_Model {

    public function construct() {
        parent::__construct();
    }
    
    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($data,$clave)
    {
        try {
            $this->db->where('negocio_id', $user);
            $this->db->update('archivos_comercio', $data);
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_comers($user) {
		$cmd=("SELECT * FROM  comercios , archivos_comercio WHERE comercios.negocio_id = archivos_comercio.negocio_id  AND  comercios.usuario_id = $user ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
}