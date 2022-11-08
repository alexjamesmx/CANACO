<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afiliacion_modal extends CI_Model
{

    public function conocer_afil(){
        try {
            $this->db->where('usuario', $id);
            $query = $this->db->get('afiliados');       
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    function get_afiliados($id)
    {
      $cmd = "SELECT * FROM  afiliados WHERE afiliados_id = $id ";
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    function validar_validacion ($id,$data)
    {
      try {
        $this->db->where('afiliados_id', $id);
        $this->db->update('afiliados', $data);
        // $date $this->db->affected_rows();
        
        return $data;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }


    function afiliar_comercio ($id,$data)
    {
      try {
        $this->db->where('usuario_id', $id);
        $this->db->update('comercios', $data);
        // $date $this->db->affected_rows();
        return $data;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
   
    function historial ($data)
    {
        try {
            $this->db->insert('historico_afiliacion', $data);
            return  TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }
 
    function correo_nombre_users ($id)
    {
        $cmd = "SELECT usuario_id,nombre,email_auth FROM  usuarios WHERE usuario_id = $id ";
        $query = $this->db->query($cmd); 
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    function requiere_factura ($id)
    {
        $cmd = "SELECT * FROM afiliados WHERE colonia is NOT NULL   AND factura is NOT NULL  AND  usuario= $id ";
        $query = $this->db->query($cmd); 
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
    
    function requiere_se_subio ($id)
    {
        $cmd = "SELECT * FROM afiliados WHERE colonia is NOT NULL   AND factura is NOT NULL  AND  usuario= $id ";
        $query = $this->db->query($cmd); 
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
    function requieretienefactura ($id)
    {
        $cmd = "SELECT * FROM afiliados WHERE afiliados_id= $id ";
        $query = $this->db->query($cmd); 
        return ($query->result());
    }
    function afiliar_factura ($id,$data)
    {
      try {
        $this->db->where('usuario', $id);
        $this->db->update('afiliados', $data);
        // $date $this->db->affected_rows();
        return $data;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
    function subio($id)
    {
        $cmd = ("SELECT * FROM afiliados where afiliados.afiliados_id = $id AND (afiliados.factura_pdf IS NOT NULL AND afiliados.factura_xml IS NOT NULL)");
        $query = $this->db->query($cmd); 
        return ($query->num_rows() > 0) ? TRUE : FALSE;
    }

}


/* End of file Afiliador_model.php */
/* Location: ./application/models/Afiliador_model.php */
