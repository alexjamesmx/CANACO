<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pass_olv_model extends CI_Model
{

    public function revisar_correo($correo)
    {
        $cmd="SELECT email_auth FROM usuarios WHERE  email_auth= '$correo' ";
        $query = $this->db->query($cmd);
        return $query->num_rows() > 0 ?  TRUE : FALSE;
    }
    public function validar_insert_token($correo)
    {
        $cmd="SELECT * FROM pass_olv_token WHERE correo= '$correo' ";
        $query = $this->db->query($cmd);
        return $query->num_rows() == 0 ?  TRUE :  FALSE ;
    }
    function insert_token ($data)
    {
        $this->db->insert( "pass_olv_token", $data );  
        return ($this->db->affected_rows() != 1)? FALSE : TRUE;
    }
    function insert_token_when_tiene ($correo,$data)
    {
        $this->db->where('correo', $correo);
        $this->db->update('pass_olv_token', $data);
        return TRUE;
    }
    public function comparar_data($token,$correo)
    {
        $cmd="SELECT * FROM pass_olv_token WHERE token = '$token'  AND correo = '$correo'";
        $query = $this->db->query($cmd);
        return $query->num_rows() != 0 ?   TRUE : FALSE ;
    }
    
    public function matar_data($token,$correo)
    {
        $cmd="delete FROM pass_olv_token WHERE token = '$token'  AND correo = '$correo'";
        $query = $this->db->query($cmd);
        return true;
    }

    public function update_pass($correo,$pass)
    {
        $cmd="update usuarios set password='$pass' where email_auth='$correo'";
        $this->db->query($cmd);
        return ($this->db->affected_rows() != 1)? FALSE : TRUE;
    
    }
}

/* End of file Actividad_model.php */
