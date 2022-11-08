<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_model_f extends CI_Model {

    public function get_accounts($cond = NULL, $permiso_id = 0, $usuario_id = 0)
    {
        $cmd = "SELECT usuarios.*, sl_roles.nombre_rol, estatus.comentario FROM usuarios JOIN estatus USING(estatus_id) JOIN sl_roles USING(rol_id)";

        if(!is_null($cond)) {
            $cmd .= " ".$cond;
        }
 
        if ($permiso_id == 7) {
            $cmd .= ((is_null($cond)) ? ' WHERE ' : ' AND '). ' user_add = '.$usuario_id;
        }

        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function create($account, $return_id = FALSE)
    {
        try {
            $this->db->insert('usuarios', $account);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function can_access_account_recordset($account_id, $permiso_id, $usuario_id) {

        $this->db->where('usuario_id', $account_id);

        if($permiso_id == 7) {
            $this->db->where('user_add ', $usuario_id);
        }

        $query = $this->db->get('usuarios');

        return ($query->num_rows() == 1) ? array("access" => TRUE, "data" => $query->row()) : array("access" => FALSE, "data" => NULL);

    }

    public function edit($usuario_id, $data) {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->update('usuarios', $data);

            return TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function insert_negocio($data) {
        try {
            $this->db->insert('comercios', $data);
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function up_negocio($user,$data) {
        try {
            $this->db->where('usuario_id', $user);
            $this->db->update('comercios', $data);
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }
    
    public function get_comers($user) {
		$cmd=("SELECT * FROM  comercios , archivos_comercio WHERE comercios.negocio_id = archivos_comercio.negocio_id  AND  comercios.usuario_id = '".$user."' ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
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
    
    
    public function data_check($clave) {
		$cmd=("SELECT comercios.negocio_calle,comercios.negocio_municipio, comercios.negocio_colonia,comercios.negocio_numero_ex,comercios.negocio_numero_int,comercios.negocio_cp FROM comercios, usuarios WHERE usuarios.usuario_id = $clave AND (usuarios.usuario_id=comercios.usuario_id) ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
    public function data_check_contacto($clave) {
		$cmd=("SELECT usuarios.telefono_auth,usuarios.email_auth ,
        comercios.negocio_comp_correo, comercios.negocio_comp_numero, comercios.negocio_vent_correo,comercios.negocio_vent_numero,comercios.negocio_vent_whatsp
         FROM comercios, usuarios WHERE usuarios.usuario_id = $clave AND usuarios.usuario_id=comercios.usuario_id  ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
    
    
    public function logo_user($data,$usuario_id) {
            try {
                $this->db->where('usuario_id',$usuario_id );
                $this->db->update('comercios', $data);
                return TRUE;
            }
    
            catch(Exception $e) {
                return $e->getMessage();
            }
            
        }
    
}

/* End of file Accounts_model.php */
/* Location: ./application/models/Accounts_model.php */
