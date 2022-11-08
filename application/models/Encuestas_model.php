<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Encuestas_model extends CI_Model{
    
    public function subir_encuesta_model($array,$id_req){
        $req = array(
          "req_calf_status"=>1, 
          "promedio_eva"=>$array['promedio']       
        );
        $this->db->insert("evaluacion_req",$array);
        if($this->db->affected_rows()>0){
            $this->db->where('req_id', $id_req);
            $this->db->update("requerimientos",$req);
          
                $consulta = $this->db->query("SELECT usuario_elegido FROM requerimientos WHERE req_id='".$id_req."'");
                $inforeq=$consulta->result();
                $id=$inforeq[0]->usuario_elegido;
                $promi = $this->db->query("SELECT usuario_elegido AS id, (SUM(promedio_eva)/(SELECT COUNT(*)FROM requerimientos WHERE usuario_elegido='".$id."' AND req_calf_status=1))AS promedio_g  FROM requerimientos WHERE usuario_elegido='".$id."'");
                $promedio=$promi->result();
                $promclean=$promedio[0]->promedio_g;
                $promfinal=number_format((float)  $promclean, 2, '.', '');
                $mipromedio =array('negocio_calif'=>$promfinal);  
                $this->db->where('usuario_id', $id);
                $this->db->update("comercios",$mipromedio);
                return $promedio;
               
            
        }else{
            return false;
        }
    }  
    
    
    public function subir_encuesta_model_op($array,$id_req){
        $this->db->insert("evaluacion_op",$array);
        if($this->db->affected_rows()>0){
            //  $this->db->where('req_id', $id_req);
            // $this->db->update("requerimientos",$req);
        }else{
            return false;
        }
    }  


    
    public function subir_encuesta_model_op_req($array,$id){
        try {
            $this->db->where('opneg_id', $id);
            $this->db->update('oportunidades_negocio', $array);
            
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }  
}
