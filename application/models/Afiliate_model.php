<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afiliate_model extends CI_Model
{


    public function preafiliacion($data)
    {
        try {
            $this->db->where('usuario', $data['usuario']);
            $query = $this->db->get('afiliados');
            if ($query->num_rows() >= 1) {
                $this->db
                    ->where('usuario', $data['usuario'])
                    ->update('afiliados', $data);
                return TRUE;
            } else if ($query->num_rows() == 0) {
                $this->db->insert('afiliados', $data);
                return true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function miafil($id)
    {
        try {
            $this->db->where('usuario_id', $id);
            $query = $this->db->get('usuarios');
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public function conocer_afil($id)
    {
        try {
            $this->db->where('usuario', $id);
            $query = $this->db->get('afiliados');
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function me_registraron($id)
    {
        try {
            $this->db->where('usuario_id', $id);
            $query = $this->db->get('usuarios');
            return $query->num_rows() >= 1 ? $query->result() : null;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function recibo($data, $id)
    {
        try {
            $this->db->where('usuario', $id);
            $this->db->update('afiliados', $data);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afiliate_comprobar($id)
    {
        try {
            $this->db->where('usuario', $id);
            $query = $this->db->get('afiliados');
            return $query->num_rows() >= 1 ? TRUE : FALSE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function afiliacion_incert($id, $data)
    {
        try {
            $this->db->where('usuario', $id);
            $this->db->update('afiliados', $data);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

/* End of file Afiliador_model.php */
/* Location: ./application/models/Afiliador_model.php */
