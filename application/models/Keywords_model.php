<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keywords_model extends CI_Model {

    public function create($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('keywords_usuario', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
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


    public function delete($kwus_id) {
        try {
            $this->db->where('kwus_id', $kwus_id);
            $this->db->delete('keywords_usuario');

            return TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }


    public function deleteall($user_id, $tactividad, $tipo_transaccion) {
        try {
            $this->db->where('usuario_id', $user_id);
            $this->db->where('tipoactividad_id', $tactividad);
            $this->db->where('tipo_transaccion', $tipo_transaccion);
 
            $this->db->delete('keywords_usuario');

            return TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function iskeword($usuario_id, $tactividad, $kw) {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->where('tipoactividad_id', $tactividad);  
            $this->db->where('keyword', $kw);            

            $query = $this->db->get('keywords_usuario');

            return ($query->num_rows() === 1) ? TRUE : FALSE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }


    public function get_keywords($usuario_id, $tactividad, $ttransaccion) {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->where('tipoactividad_id', $tactividad);  
            $this->db->where('tipo_transaccion', $ttransaccion);  

            $query = $this->db->get('keywords_usuario');

            return ($query->num_rows() >0 ) ? $query->result() : NULL;   
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }

    //este va en actividades
    public function get_actividades_usuario($usuario_id)
    {
        $instruccion = "SELECT distinct usuario_id, tipoactividad_id, tipo_transaccion, tipo_actividad.tipo_actividad, actividad.actividad_id, actividad, actividad.inegi_id FROM keywords_usuario INNER JOIN tipo_actividad on keywords_usuario.tipoactividad_id=tipo_actividad.tactividad_id INNER JOIN actividad on tipo_actividad.actividad_id=actividad.actividad_id WHERE usuario_id=$usuario_id";

        $query = $this->db->query($instruccion);

        return ($query->num_rows() >0 ) ? $query->result() : NULL;   

    }    

    public function get_list_users_by_keywords($search_kw) {
        try {
            $this->db->select('keywords_usuario.usuario_id');
            $this->db->select('kwus_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');            
            $this->db->select('keyword');
            $this->db->select('profile_pic');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');
            $this->db->select('negocio_nombre');            

            $this->db->like('keyword', $search_kw);  
            $this->db->where('usuarios.estatus_id', '3');

            $this->db->distinct();
            $this->db->join('usuarios', 'keywords_usuario.usuario_id = usuarios.usuario_id');
            $this->db->join('tipo_actividad', 'keywords_usuario.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'comercios.usuario_id = usuarios.usuario_id');

            $query = $this->db->get('keywords_usuario');

            return ($query->num_rows() >0 ) ? $query->result() : NULL;   
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function get_list_users_by_keywords_search($search_kw) {
        try {
            $this->db->select('keywords_usuario.usuario_id');
            $this->db->select('kwus_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('keyword');
            $this->db->select('profile_pic');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');
 
            $this->db->like('keyword', $search_kw);  
            $this->db->where('usuarios.estatus_id', '3');

            $this->db->distinct();
            $this->db->join('usuarios', 'keywords_usuario.usuario_id = usuarios.usuario_id');
            $this->db->join('tipo_actividad', 'keywords_usuario.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');

            $query = $this->db->get('keywords_usuario');

            return ($query->num_rows() >0 ) ? $query->result() : NULL;   
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }





}

/* End of file Accounts_model.php */
/* Location: ./application/models/Accounts_model.php */
