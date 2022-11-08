<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recompensas_model extends CI_Model
{

    public function medallas(){

        $query = $this->db->query("SELECT * FROM medalla LIMIT 8");
        return $query->num_rows() >= 1 ? $query->result() : null;
    
    }
    

    public function insignias(){    

        $query = $this->db->query("SELECT * FROM insignia ");
        return $query->num_rows() >= 1 ? $query->result() : null;
    
    }
    public function recompensas($id){
        $query = $this->db->query("SELECT * FROM recompensas where usuario = $id LIMIT 8");
        return $query->num_rows() >= 1 ? $query->result() : null;
    
    }
    function validar_recompensas($id)
    {
        $query = $this->db->query("SELECT * FROM recompensas where usuario = $id  ");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    function validar_medallas($id, $medalla)
    {
        $query = $this->db->query("SELECT * FROM recompensas where usuario = $id  and medalla=$medalla");
        return $query->num_rows() >= 1 ? TRUE : FALSE;
    }
    function validar_insignia($id, $insignia)
    {
        $query = $this->db->query("SELECT * FROM recompensas where usuario = $id  and insignia=$insignia");
        return $query->num_rows() > 1 ? TRUE : FALSE;
    }
    function medallas_user($id)
    {
        $query = $this->db->query("SELECT * FROM recompensas, medalla WHERE medalla.medallas_id = recompensas.medalla     AND  ( recompensas.usuario = $id)        ");    
        return $query->num_rows() >0 ? $query->result() : null;
    }
    function insignia_user($id)
    {
        $query = $this->db->query("SELECT * FROM recompensas, insignia WHERE insignia.insignia_id = recompensas.insignia     AND  ( recompensas.usuario = $id)");    
        return $query->num_rows() >0 ? $query->result(): null;
    }
    function insert_recompensas ($data)
    {
      try {
        $this->db->insert( "recompensas", $data );  
        return ($this->db->affected_rows() != 1)? FALSE : TRUE;
        
        return TRUE;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
    function conve ($id){
        $query= $this->db->query("SELECT * FROM recompensas WHERE usuario =$id ORDER BY insignia desc");
        return $query->num_rows() > 0 ? $query->result(): null;
    }
    public function borrar_medalla($id_medalla,$usuario)
    {
      
        $this->db->where('medalla', $id_medalla);
        $this->db->where('usuario',$usuario);
        $this->db->delete('recompensas');    
    }
    
    public function borrar_insignia($id_insignia,$usuario)
    {
      
        $this->db->where('insignia', $id_insignia);
        $this->db->where('usuario',$usuario);
        $this->db->delete('recompensas');    
    }

}

/* End of file Recompensa_model.php */
/* Location: ./application/models/Reg_user.php */
