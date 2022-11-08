<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model_D extends CI_Model
{
    
    public function userspw(){
        $query= $this->db->query('SELECT * FROM usuarios WHERE YEARWEEK(fecha_creacion) = YEARWEEK(now())');
        return $query->num_rows();
    }
  public function edit($usuario_id, $data)
    {
        try {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->update('usuarios', $data);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        $query= $this->db->query('SELECT * FROM nomatch');
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

    public function recompensas(){
        $cmd=('SELECT usuarios.usuario_id, usuarios.nombre,usuarios.apellido1,usuarios.apellido2,usuarios.email_auth,usuarios.telefono_auth, 
          comercios.negocio_nombre,comercios.negocio_persona, comercios.negocio_logo,comercios.afiliado_canaco, 
		  (SELECT COUNT(*) FROM recompensas WHERE recompensas.usuario=usuarios.usuario_id )AS num_recompensas,
		  (SELECT COUNT(*) FROM recompensas WHERE recompensas.usuario=usuarios.usuario_id AND recompensas.insignia IS NOT null)AS num_insignias,
		  (SELECT COUNT(*) FROM recompensas WHERE recompensas.usuario=usuarios.usuario_id AND recompensas.medalla IS NOT null)AS num_medallas
          FROM usuarios, comercios
          where usuarios.usuario_id =comercios.usuario_id 
          GROUP BY  usuarios.usuario_id ORDER BY num_recompensas desc LIMIT 20');
        $query= $this->db->query($cmd);
        return $query->num_rows() > 0 ? $query->result() : null;
    }



    public function datauser()
    {
        $cmd= ('SELECT usuario_id, email_auth FROM `usuarios`   ');
        $query= $this->db->query($cmd);
          return $query->num_rows() > 0 ? $query->result() : null;
    }


}