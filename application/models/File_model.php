<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

    public function get_comers_files($clave) {
		$cmd=("SELECT * FROM archivos_comercio WHERE negocio_id = $clave");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
    
    function subir($data,$clave)
    {
        try {
            $this->db->where('negocio_id', $clave);
            $this->db->update('archivos_comercio', $data);
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
       
    function subir_fatura($clave,$data)
    {
        try {
            $this->db->where('afiliados_id', $clave);
            $this->db->update('afiliados', $data);
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function get_correo_enviar($clave) {
		$cmd=("SELECT usuarios.email_auth FROM afiliados , usuarios WHERE afiliados.usuario = usuarios.usuario_id AND afiliados.afiliados_id = '$clave' ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
    
}