<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_afiliador_model extends CI_Model
{
    public function requerimientos_vigentes_totales()
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id  AND (estatus_req.estatus='17'||estatus_req.estatus='18'||estatus_req.estatus='19'||estatus_req.estatus='20') group by requerimientos.req_id"
        );
        return $query->num_rows();
    }
    public function requerimientos_de_mis($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND requerimientos.usuario_id=comercios.usuario_id AND comercios.usuario_id=usuarios.usuario_id  AND (usuarios.afiliador='" .
                $id .
                "' OR usuarios.jefe_afiliador ='" . $id . "') AND (estatus_req.estatus='17'OR estatus_req.estatus='18'||estatus_req.estatus='19'||estatus_req.estatus='20') group by requerimientos.req_id"
        );
        return $query->num_rows();
    }
    public function no_afils_con_cierres_lista_todos()
    {

        $query = $this->db->query(
            "SELECT usuarios.usuario_id FROM usuarios, comercios WHERE usuarios.usuario_id=comercios.usuario_id  AND afiliado_canaco='0' group by usuarios.usuario_id"
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function no_afils_con_cierres_lista($id)
    {

        $query = $this->db->query(
            "SELECT usuarios.usuario_id FROM usuarios, comercios WHERE usuarios.usuario_id=comercios.usuario_id and  (afiliador='" . $id . "' || jefe_afiliador='" . $id . "') AND afiliado_canaco='0' group by usuarios.usuario_id"
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function no_afils_con_cierres($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos where (estatus='22'||estatus='21') and usuario_id='" . $id . "'"
        );
        return $query->num_rows() > 0 ? $query->num_rows() : null;
    }

    public function afils_con_cierres($id)
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos where (estatus='22'||estatus='21') and usuario_id='" . $id . "'"
        );
        return $query->num_rows() > 0 ? $query->num_rows() : null;
    }

    public function afils_con_cierres_lista($id)
    {
        $query = $this->db->query(
            "SELECT usuarios.usuario_id FROM usuarios, comercios WHERE usuarios.usuario_id=comercios.usuario_id and  (afiliador='" . $id . "' || jefe_afiliador='" . $id . "')  AND afiliado_canaco='1' group by usuarios.usuario_id"
        );
        return $query->num_rows() > 0 ? $query->result() : [];
    }
    public function afils_con_cierres_lista_todos()
    {
        $query = $this->db->query(
            "SELECT usuarios.usuario_id FROM usuarios, comercios WHERE usuarios.usuario_id=comercios.usuario_id  AND afiliado_canaco='1' group by usuarios.usuario_id"
        );
        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_registros_completos()
    {
        $q = $this->db->query("SELECT comercios.usuario_id, usuarios.porcentaje from comercios join usuarios on usuarios.usuario_id = comercios.usuario_id where usuarios.porcentaje >= 70");
        return $q->num_rows() == 0 ? [] :  $q->num_rows();
    }
    public function get_registros_incompletos()
    {
        $q = $this->db->query("SELECT comercios.usuario_id, usuarios.porcentaje from comercios join usuarios on usuarios.usuario_id = comercios.usuario_id where usuarios.porcentaje < 70 ");
        return $q->num_rows() == 0 ? [] :  $q->num_rows();
    }
}
