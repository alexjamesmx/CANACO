<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class Presidencia_model extends CI_Model{
    
    function get_giros(){
        $this->db->from("actividad");
        $this->db->join("tipo_actividad","actividad.actividad_id=tipo_actividad.actividad_id");
        $this->db->join("keywords_comercio","keywords_comercio.tipoactividad_id=tipo_actividad.tactividad_id");
        $this->db->group_by("actividad.actividad_id"); // Produces: GROUP BY title
        $query =  $this->db->get();
       return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function get_rechazados()
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id AND estatus_req.estatus='19'  ORDER BY fecha_req desc" 
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    
}