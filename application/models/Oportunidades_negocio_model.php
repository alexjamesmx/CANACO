<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oportunidades_negocio_model extends CI_Model {

    public function create($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('oportunidades_negocio', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($req_id) {
        try {
            $this->db->where('requerimiento_id', $req_id);
            $this->db->delete('oportunidades_negocio');

            return TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
        
    }    


    public function createstatus($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('estatus_req', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }    

    //get max estatus
    public function get_max_estatus_req($op_neg) {
        try {
            $this->db->select_max('fecha');
            $this->db->where('opnegocio_id', $op_neg);
            
            $query = $this->db->get('estatus_req');

            return ($query->num_rows() >= 1) ? $query->row() : null;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }  

    //get max estatus
    public function get_max_info_req($op_neg, $fecha) {
        try {
            $this->db->where('opnegocio_id', $op_neg);
            $this->db->where('fecha', $fecha);

            $this->db->join('estatus', 'estatus_req.estatus = estatus.estatus_id');

            
            $query = $this->db->get('estatus_req');

            return ($query->num_rows() >= 1) ? $query->row() : null;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_opnegocio_req($req_id) {
        try {
            $this->db->where('requerimiento_id', $req_id);
            $this->db->join('comercios', 'comercios.negocio_id = oportunidades_negocio.comercio_id');

            $query = $this->db->get('oportunidades_negocio');

            return ($query->num_rows() >= 1) ? $query->result() : null;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function cotizacion($data_cotizacion,$id)
    {
        try{
            $this->db->where('opneg_id',$id);
            $this->db->update('oportunidades_negocio', $data_cotizacion);
            return TRUE;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}

/* End of file Oportunidades_negocio_model.php */
/* Location: ./application/models/Oportunidades_negocio_model.php */
