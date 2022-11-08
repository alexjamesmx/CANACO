<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consejero_model extends CI_Model {

    public function id_negocio_registrado   ($usuario_id)
    {
        $instruccion = "SELECT usuario_id from usuarios where id_consejero =  $usuario_id ORDER BY usuario_id DESC LIMIT 1";

        $query = $this->db->query($instruccion);

        return ($query->num_rows() >0 ) ? $query->row() : NULL;   
/*
stdClass Object ( [negocio_id] => 2 [usuario_id] => 7 [negocio_nombre] => CHEVES [negocio_correo] => [negocio_persona] => fisica [negocio_razon] => Cheves chapoS,A V,C [negocio_comp_correo] => elchapo@chapo.com [negocio_comp_nombre] => NULL [negocio_comp_numero] => 4442884 [negocio_vent_correo] => elchapo@chapo.com [negocio_vent_nombre] => sr chapo [negocio_vent_numero] => 4442884 [negocio_vent_whatsp] => 4424886 [negocio_rfc] => CEFR454102A2S [afiliado_canaco] => 0 [fecha_inicio_afiliacion] => [fecha_fin_afiliacion] => ) 1`

*/
    }    
  
}

















