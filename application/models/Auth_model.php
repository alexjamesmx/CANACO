<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($username)
    {
        $cmd = "SELECT * FROM usuarios WHERE (email_auth LIKE BINARY '$username' OR telefono_auth LIKE BINARY '$username') AND estatus_id <> 8";

        $query = $this->db->query($cmd);
        return ($query->num_rows() === 1) ? $query->row() : NULL;
    }

    public function get_estatus_by_user_id($usuario_id)
    {
        $this->db->select('estatus_id');
        $this->db->from('usuarios');
        $this->db->where('usuario_id', $usuario_id);

        $query = $this->db->get();

        return ($query->num_rows()  === 1) ? $query->row()->estatus_id : NULL;
    }

    public function get_role_permission_in_module_section($rol_id, $elem_type, $elem_id)
    {
        $cmd = "SELECT a.* FROM sl_rol_mod_sec_per a JOIN sl_roles b USING(rol_id) WHERE rol_id = '$rol_id' AND " . $elem_type . "_id = $elem_id AND b.estatus_id = 3";
        $query = $this->db->query($cmd);

        return ($query->num_rows() === 1) ? $query->row()->permiso_id : NULL;
    }

    public function get_modules_by_role($rol_id)
    {
        $cmd = "SELECT DISTINCT a.* FROM sl_modulos a JOIN sl_rol_mod_sec_per b USING(modulo_id) WHERE a.estatus_id in (3) AND b.rol_id = $rol_id ORDER BY a.orden ASC";

        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_module_sections_by_role($rol_id, $modulo_id)
    {
        $cmd = "SELECT DISTINCT a.* FROM sl_secciones a JOIN sl_rol_mod_sec_per b USING(seccion_id) 
        WHERE a.modulo_id = $modulo_id AND b.rol_id = $rol_id AND a.estatus_id IN (3) AND a.visible = 1 ORDER BY a.orden asc";

        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_section_module_data($elem_type, $elem_id)
    {
        $cmd = "SELECT " . (($elem_type == 'mod') ? 'modulo' : 'seccion') . "_id, ico_" . (($elem_type == 'mod') ? 'mod' : 'sec') . ", url_" . (($elem_type == 'mod') ? 'mod' : 'sec') . ", nombre_" . (($elem_type == 'mod') ? 'mod' : 'sec') . " FROM sl_" . (($elem_type == 'mod') ? 'modulos' : 'secciones') . " WHERE " . (($elem_type == 'mod') ? 'modulo' : 'seccion') . "_id = '$elem_id'";
        $query = $this->db->query($cmd);

        return $query->row();
    }

    public function get_module_data_by_sec($seccion_id)
    {
        $cmd = "SELECT modulo_id, ico_mod, nombre_mod FROM sl_modulos WHERE modulo_id IN (SELECT modulo_id FROM sl_secciones WHERE seccion_id = $seccion_id)";
        $query = $this->db->query($cmd);

        return $query->row();
    }
}

/* End of file Auth_model.php */
/* Location: ./application/controllers/Auth_model.php */
