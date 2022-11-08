<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts_model extends CI_Model
{
    public function get_accounts($cond = null, $permiso_id = 0, $usuario_id = 0)
    {
        $cmd =
            'SELECT usuarios.*, sl_roles.nombre_rol, estatus.comentario FROM usuarios JOIN estatus USING(estatus_id) JOIN sl_roles USING(rol_id)';

        if (!is_null($cond)) {
            $cmd .= ' ' . $cond;
        }

        if ($permiso_id == 7) {
            $cmd .=
                (is_null($cond) ? ' WHERE ' : ' AND ') .
                ' user_add = ' .
                $usuario_id;
        }

        $query = $this->db->query($cmd);
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function create($account, $return_id = false)
    {
        try {
            $this->db->insert('usuarios', $account);
            return $return_id ? $this->db->insert_id() : true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function can_access_account_recordset(
        $account_id,
        $permiso_id,
        $usuario_id
    ) {
        $this->db->where('usuario_id', $account_id);

        if ($permiso_id == 7) {
            $this->db->where('user_add ', $usuario_id);
        }

        $query = $this->db->get('usuarios');

        return $query->num_rows() == 1
            ? ['access' => true, 'data' => $query->row()]
            : ['access' => false, 'data' => null];
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
    public function get_datauser($usuario_id)
    {
        $this->db->where('usuario_id', $usuario_id);
        $query = $this->db->get('usuarios');
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function check_phone($phone,$usuario)
    {
      $cmd = "SELECT * FROM  usuarios WHERE telefono_auth = $phone AND  usuario_id != $usuario";
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? FALSE : TRUE;
    
    }
}

/* End of file Accounts_model.php */
/* Location: ./application/models/Accounts_model.php */
