<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

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

    public function req_solventados($id)
    {
        $query = $this->db->query("SELECT * FROM requerimientos where usuario_elegido='".$id."'");
        return $query->num_rows();
    }
    
    public function transacciones_completados($id)
    {
        $query = $this->db->query("SELECT * FROM requerimientos  WHERE usuario_id = '".$id."' AND estatus = 21 OR estatus = 22 " );
        return $query->num_rows() ;
    }
    public function  borrar_cp ($clave,$data)
    {
            try {
                $this->db->where('negocio_id', $clave);
                $this->db->update('archivos_comercio', $data);

                return true;
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }


    public function get_mis_keywords_actividades($idcom)
    {
        $query = $this->db->query(
            " SELECT * FROM keywords_comercio INNER JOIN tipo_actividad on keywords_comercio.tipoactividad_id=tipo_actividad.tactividad_id INNER JOIN actividad on tipo_actividad.actividad_id=actividad.actividad_id WHERE comercio_id='".$idcom."'"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;

    }

    
    public function get_mis_keywords($idcom)
    {
        $query = $this->db->query(
            " SELECT * FROM keywords_comercio WHERE comercio_id='".$idcom."'"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;

    }

    public function get_mi_perfil($idcom)
    {
        $query = $this->db->query(
            " SELECT * FROM usuarios,comercios where usuarios.usuario_id=comercios.usuario_id and negocio_id='".$idcom."'"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;

    }


    function medallas_user($id)
    {
        $query = $this->db->query("SELECT * FROM recompensas, medalla WHERE medalla.medallas_id = recompensas.medalla     AND  ( recompensas.usuario = '".$id."')        ");    
        return $query->num_rows() >0 ? $query->result() : null;
    }
    function insignia_user($id)
    {
        $query = $this->db->query("SELECT * FROM recompensas, insignia WHERE insignia.insignia_id = recompensas.insignia     AND  ( recompensas.usuario = '".$id."')");    
        return $query->num_rows() >0 ? $query->result(): null;
    }

    public function get_docs($idcom)
    {
        $query = $this->db->query(
            "SELECT * FROM usuarios,comercios, archivos_comercio
            WHERE  usuarios.usuario_id=comercios.usuario_id  
            AND (archivos_comercio.negocio_id = comercios.negocio_id)
            AND comercios.negocio_id ='".$idcom."'");
        return $query->num_rows() >= 1 ? $query->result() : null;

    }



}