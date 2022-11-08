<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_model extends CI_Model
{

    public function total_reqs()
    {
        $query = $this->db->query('SELECT * FROM requerimientos;');
        return $query->num_rows();
    }

    public function total_reqs_vigentes()
    {
        $query = $this->db->query('SELECT * FROM requerimientos where estatus is null');
        return $query->num_rows();
    }

    public function total_reqs_solventados()
    {
        $query = $this->db->query('SELECT * FROM requerimientos where estatus="21" || estatus="22" ');
        return $query->num_rows();
    }

    public function total_nomatchs()
    {
        $query = $this->db->query('SELECT * FROM nomatch where status=1');
        return $query->num_rows();
    }

    public function total_matchs()
    {
        $query = $this->db->query('SELECT * FROM oportunidades_negocio');
        return $query->num_rows();
    }

    public function total_noafils()
    {
        //$query = $this->db->query('SELECT * FROM nomatch');
        return 0;
    }
    public function total_ignorados()
    {
    $query = $this->db->query(
        'SELECT * FROM requerimientos inner JOIN oportunidades_negocio ON oportunidades_negocio.requerimiento_id=requerimientos.req_id INNER JOIN estatus_req ON estatus_req.opnegocio_id = oportunidades_negocio.opneg_id INNER JOIN usuarios ON usuarios.usuario_id= requerimientos.usuario_id INNER JOIN comercios ON comercios.usuario_id=usuarios.usuario_id WHERE fecha_req < NOW() - INTERVAL 72 HOUR AND estatus_req.estatus=17'
    );
    return $query->num_rows();
    }
    
    public function total_dna()
    {
        $query = $this->db->query("select * FROM (SELECT usuarios.usuario_id AS id, (SELECT COUNT(*) FROM recompensas WHERE recompensas.usuario=id AND recompensas.medalla=1) AS diamantes  FROM usuarios INNER JOIN comercios ON comercios.usuario_id=usuarios.usuario_id WHERE comercios.afiliado_canaco=1) AS dna WHERE diamantes='1'");
        return $query->num_rows();
    }

    //tablas 
    //top 20 calificados
    public function top20mejor(){
        $query = $this->db->query("SELECT *, comercios.usuario_id AS id, (SELECT COUNT(*) FROM requerimientos WHERE requerimientos.req_calf_status=1 AND requerimientos.usuario_elegido=id )AS num_evas, (SELECT COUNT(*) FROM oportunidades_negocio WHERE oportunidades_negocio.comercio_id = comercios.negocio_id)AS num_trans FROM comercios  INNER JOIN usuarios ON usuarios.usuario_id=comercios.usuario_id ORDER BY negocio_calif DESC LIMIT 20");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    //top 50 usuarios
    public function top50peor(){
        $query = $this->db->query("SELECT *, comercios.usuario_id AS id, (SELECT COUNT(*) FROM requerimientos WHERE requerimientos.req_calf_status=1 AND requerimientos.usuario_elegido=id )AS num_evas, (SELECT COUNT(*) FROM oportunidades_negocio WHERE oportunidades_negocio.comercio_id = comercios.negocio_id)AS num_trans FROM comercios  INNER JOIN usuarios ON usuarios.usuario_id=comercios.usuario_id ORDER BY negocio_calif ASC LIMIT 50");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    //todas las oportuniddes
    public function get_reqs()
    {
        $query = $this->db->query(
            "SELECT * FROM requerimientos, comercios, oportunidades_negocio, estatus_req, usuarios WHERE  oportunidades_negocio.opneg_id=estatus_req.opnegocio_id AND requerimientos.req_id=oportunidades_negocio.requerimiento_id AND oportunidades_negocio.comercio_id =comercios.negocio_id AND comercios.usuario_id=usuarios.usuario_id ORDER BY fecha_req desc"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    //Top 10 requerimientos
    public function top10reqs()
    {
        $query = $this->db->query(
            "SELECT *, (SELECT COUNT(*) FROM requerimientos WHERE requerimientos.usuario_id=usuarios.usuario_id)AS mis_reqs FROM usuarios,comercios WHERE usuarios.usuario_id=comercios.usuario_id ORDER BY mis_reqs DESC LIMIT 10;"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    //Negocios afiliados
    public function todosafils()
    {
        $query = $this->db->query(
            "SELECT * FROM usuarios, comercios, afiliados WHERE afiliados.usuario=usuarios.usuario_id and usuarios.usuario_id=comercios.usuario_id;"
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }


}

?>