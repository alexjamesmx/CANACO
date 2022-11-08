<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mensaje_model extends CI_Model {
    function info_req($id){
        $query = $this->db->query( "select * from oportunidades_negocio where opneg_id='" .$id."'");  
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    function agregar_detalle($req_id, $id_cliente,$fecha){

        $data=array(
            'req_id'=>$req_id,
            'id_cliente'=>$id_cliente,
            'fecha_detalle'=>$fecha,
            'accion'=>'El comercio interesado aplico para tu requerimiento',
            'mensaje'=>null,
            'estatus_detalle'=>'31'
        ); 
        $this->db->insert('detalles_req', $data);  
       
    }

    function actualizar_mensaje_whats($data,$clave,$req_id, $id_cliente,$fecha)
    {
        try {
           
            $query = $this->db->query( "update oportunidades_negocio set mensaje_whats='" . $data ."' where opneg_id='" .$clave."'");  
            //$query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','El comercio interesado te contactó por Whatsapp', '".$data."','31')");        
            $data=array(
                'req_id'=>$req_id,
                'id_cliente'=>$id_cliente,
                'fecha_detalle'=>$fecha,
                'accion'=>'El comercio interesado te contactó por Whatsapp',
                'mensaje'=>$data,
                'estatus_detalle'=>'31'
            ); 
            $this->db->insert('detalles_req', $data);        
           
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    function actualizar_respuesta_whats($data,$clave,$req_id, $id_cliente,$fecha)
    {
        try {
           
            $query = $this->db->query( "update oportunidades_negocio set respuesta_whatsapp='" . $data ."' where opneg_id='" .$clave."'"); 
          //  $query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','Contactaste por Whatsapp al comercio interesado', '".$data."','31')");        
          $data=array(
            'req_id'=>$req_id,
            'id_cliente'=>$id_cliente,
            'fecha_detalle'=>$fecha,
            'accion'=>'Contactaste por Whatsapp al comercio interesado',
            'mensaje'=>$data,
            'estatus_detalle'=>'31'
        ); 
        $this->db->insert('detalles_req', $data);            
           
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    function actualizar_mensaje_correo($data,$clave,$req_id, $id_cliente,$fecha)
    {
        try {
            
            $query = $this->db->query( "update oportunidades_negocio set mensaje_correo='" . $data ."' where opneg_id='" .$clave."'");
           // $query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','El comercio interesado te contactó por email', '".$data."','31')");        
           $data=array(
               'req_id'=>$req_id,
               'id_cliente'=>$id_cliente,
               'fecha_detalle'=>$fecha,
               'accion'=>'El comercio interesado te contactó por email',
               'mensaje'=>$data,
               'estatus_detalle'=>'31'
           ); 
           $this->db->insert('detalles_req', $data);      
           
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    function actualizar_respuesta_correo($data,$clave,$req_id, $id_cliente,$fecha)
    {
        try {
            
            $query = $this->db->query( "update oportunidades_negocio set respuesta_mail='" . $data ."' where opneg_id='" .$clave."'");  
           // $query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','Coontactaste por email al comercio',, '".$data."','31')");        
           $data=array(
            'req_id'=>$req_id,
            'id_cliente'=>$id_cliente,
            'fecha_detalle'=>$fecha,
            'accion'=>'Contactaste por email al comercio',
            'mensaje'=>$data,
            'estatus_detalle'=>'31'
        ); 
        $this->db->insert('detalles_req', $data);          
           
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    function actualizar_mensaje_rechazo($data,$clave, $req_id, $id_cliente,$fecha)
    {
        try {
           
            $query = $this->db->query( "update oportunidades_negocio set mensaje_rechazo='" . $data ."' where opneg_id='" .$clave."'");        
           // $query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','El comercio rechazó tu requerimiento', '".$data."','31')");        
           $data=array(
            'req_id'=>$req_id,
            'id_cliente'=>$id_cliente,
            'fecha_detalle'=>$fecha,
            'accion'=>'El comercio rechazó tu requerimiento',
            'mensaje'=>$data,
            'estatus_detalle'=>'31'
        ); 
        $this->db->insert('detalles_req', $data);      
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    function actualizar_mensaje_cancelado($data,$clave,$req_id, $id_cliente,$fecha)
    {
        try {
            $query = $this->db->query( "update oportunidades_negocio set mensaje_cancelado='" . $data ."' where opneg_id='" .$clave."'"); 
            //$query2 = $this->db->query( "insert into detalles_req values('".$req_id."','".$id_cliente."','".$fecha."','El comercio canceló tu requerimiento', '".$data."','31')");        
            $data=array(
                'req_id'=>$req_id,
                'id_cliente'=>$id_cliente,
                'fecha_detalle'=>$fecha,
                'accion'=>'El comercio canceló su solicitud por tu requerimiento',
                'mensaje'=>$data,
                'estatus_detalle'=>'31'
            ); 
            $this->db->insert('detalles_req', $data);          
           
            return TRUE;
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }


    function leido($id){
        $query2 = $this->db->query("update detalles_req set estatus_detalle='30' where id_detalle='" .$id."'"); 
        return true;       
    }

    function noleido($id){
        $query2 = $this->db->query("update detalles_req set estatus_detalle='31' where id_detalle='" .$id."'"); 
        return true;       
    }

}