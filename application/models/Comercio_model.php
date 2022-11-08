<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercio_model extends CI_Model {

    public function get_comercio_usuario($usuario_id)
    {
        $instruccion = "SELECT * from comercios where usuario_id=$usuario_id";

        $query = $this->db->query($instruccion);

        return ($query->num_rows() >0 ) ? $query->row() : NULL;   
/*
stdClass Object ( [negocio_id] => 2 [usuario_id] => 7 [negocio_nombre] => CHEVES [negocio_correo] => [negocio_persona] => fisica [negocio_razon] => Cheves chapoS,A V,C [negocio_comp_correo] => elchapo@chapo.com [negocio_comp_nombre] => NULL [negocio_comp_numero] => 4442884 [negocio_vent_correo] => elchapo@chapo.com [negocio_vent_nombre] => sr chapo [negocio_vent_numero] => 4442884 [negocio_vent_whatsp] => 4424886 [negocio_rfc] => CEFR454102A2S [afiliado_canaco] => 0 [fecha_inicio_afiliacion] => [fecha_fin_afiliacion] => ) 1`
*/
    }
////////////////////////////////////////////////////////
    //Nuevos Consultas agregadas
    public function countoportunidades($fecha){

        $cmd="SELECT COUNT(*) as total FROM oportunidades_negocio opn WHERE opn.fecha_inicio >= '$fecha'";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    } 
    public function countempresas(){

        $cmd="SELECT COUNT(comercios.negocio_id) as empresas FROM comercios";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    }
    public function count_transacciones($ID){

        $cmd="SELECT COUNT(req.req_calf_status) as transacc from requerimientos req where req.usuario_id = $ID and req.req_calf_status=0;";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    }
    public function insignias($ID){

        $cmd="SELECT insignia.insignia_nombre as obtenidas
                FROM
                insignia, recompensas where
                insignia.insignia_id = recompensas.insignia
                AND
                recompensas.usuario = $ID;";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->result() : null;
    } 
    public function medallas($ID){

        $cmd="SELECT medalla.medalla_nombre as obtenidas
                FROM
                medalla, recompensas where
                medalla.medallas_id = recompensas.medalla
                AND
                recompensas.usuario = $ID;";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->result() : null;
    } 
    
    public function countafiliados(){

        $cmd="SELECT COUNT(afiliado_canaco) as afiliados FROM comercios where afiliado_canaco = 1";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    }
    
    public function newget_registro(){

        $cmd="SELECT COUNT(usuario_id) as registros FROM `usuarios`";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    } 
    public function get_nameempresa($ID){

        $cmd="select comercios.negocio_nombre from usuarios, comercios where usuarios.usuario_id = comercios.usuario_id and usuarios.usuario_id =$ID";

        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->row() : null;
    } 
    public function get_useractual($ID){

        $cmd="select comercios.negocio_nombre from usuarios, comercios where usuarios.usuario_id = comercios.usuario_id and usuarios.usuario_id =$ID";

        $cmd="SELECT cor.negocio_nombre as name, key_co.keyword as keywords, (SELECT COUNT(oportunidades_negocio.opneg_id) from oportunidades_negocio) as oportunidades,
            (select COUNT(*) from estatus_req where estatus_req.estatus = 21) AS op_cerrados
            from comercios cor join keywords_comercio key_co on cor.negocio_id = key_co.comercio_id WHERE cor.usuario_id = $ID";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ?  $query->result() : null;
    }    
    
//////////////
    public function get_comercio()
    {   
        $instruccion = ("SELECT usuarios.usuario_id, nombre, afiliador ,jefe_afiliador ,negocio_id ,comercios.negocio_nombre FROM usuarios ,comercios WHERE usuarios.usuario_id = comercios.usuario_id " );
        $query = $this->db->query($instruccion);
        return ($query->num_rows() >0 ) ?  $query->result() : NULL;   
    }    
    public function get_afiliadores()
    {
        $instruccion = ("SELECT usuario_id, nombre, apellido1,apellido2  FROM usuarios WHERE rol_id=14 OR rol_id=16" );
        $query = $this->db->query($instruccion);
        return ($query->num_rows() >0 ) ?  $query->result() : NULL;   
    }
    
    
    public function updateafiliador($id,$data)
    {
      try {
        $this->db->where('usuario_id', $id);
        $this->db->update('usuarios', $data);
        return TRUE;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }

    function insert_historial ($data)
    {
        try {
            $this->db->insert('historial', $data);
            return  TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function baja_usu($id,$data)
    {
      try {
        $this->db->where('usuario_id', $id);
        $this->db->update('usuarios', $data);
        return TRUE;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
    public function actualizar_afiliador($id,$data)
    {
      try {
        $this->db->where('usuario_id', $id);
        $this->db->update('usuarios', $data);
        return TRUE;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
    public function usuario_numero($numero)
    {   
        $instruccion = ("SELECT * FROM usuarios WHERE telefono_auth= $numero");
        $query = $this->db->query($instruccion);
        return ($query->num_rows() ==1 ) ?  TRUE : FALSE;   
    }
    public function actualizar_comercio($id,$data)
    {
      try {
        $this->db->where('negocio_id', $id);
        $this->db->update('comercios', $data);
        return TRUE;
       }
    catch(Exception $e) {
        return $e->getMessage();
          }
    }
     
}

/* End of file Comercio_model.php */
/* Location: ./application/models/Comercio_model.php */
