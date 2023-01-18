<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    
    
    public function userspw(){
        $query= $this->db->query('SELECT * FROM usuarios WHERE YEARWEEK(fecha_creacion) = YEARWEEK(now())');
        return $query->num_rows();
    }
    
    public function afilspw(){
        $query= $this->db->query('SELECT * FROM afiliados WHERE YEARWEEK(inicio_afiliacion) = YEARWEEK(now())');
        return $query->num_rows();
    }
    public function reqpd(){
        $query= $this->db->query('SELECT * FROM requerimientos WHERE DAYOFYEAR(fecha_req) = DAYOFYEAR(now())');
        return $query->num_rows();
    }

    public function listagrande(){
        
        $query= $this->db->query('SELECT usuario_id FROM usuarios');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function listagrandereqs(){
        
        $query= $this->db->query('SELECT * FROM requerimientos where notificados_req="3"');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function reqigno(){
        
        $query = $this->db->query(
            'SELECT * FROM requerimientos inner JOIN oportunidades_negocio ON oportunidades_negocio.requerimiento_id=requerimientos.req_id INNER JOIN estatus_req ON estatus_req.opnegocio_id = oportunidades_negocio.opneg_id INNER JOIN usuarios ON usuarios.usuario_id= requerimientos.usuario_id INNER JOIN comercios ON comercios.usuario_id=usuarios.usuario_id WHERE fecha_req < NOW() - INTERVAL 72 HOUR AND estatus_req.estatus=17'
        );
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function nomatchs(){
        $query= $this->db->query('SELECT *,keyword AS keyw, (SELECT COUNT(*) FROM nomatch WHERE nomatch.keyword=keyw)AS no_keys, (SELECT DATEDIFF(NOW(),date_nomatch) FROM nomatch WHERE nomatch.keyword=keyw) AS pasan_dias FROM nomatch where status="1" order by date_nomatch desc ');
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function listacomsafil(){
        $query= $this->db->query('SELECT * FROM usuarios, comercios where usuarios.usuario_id=comercios.usuario_id and afiliado_canaco="1" ');
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    
    public function listacoms(){
        $query= $this->db->query('SELECT * FROM usuarios, comercios where usuarios.usuario_id=comercios.usuario_id');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function toplistacoms(){
        $query= $this->db->query('SELECT * FROM usuarios, comercios where usuarios.usuario_id=comercios.usuario_id limit 20');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function opnegs(){
        $query= $this->db->query('SELECT * FROM oportunidades_negocio left join(requerimientos) on requerimientos.req_id=oportunidades_negocio.requerimientos_id');
        return $query->num_rows() > 0 ? $query->result() : null;
    }



    


}