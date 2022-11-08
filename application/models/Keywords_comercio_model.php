<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keywords_comercio_model extends CI_Model
{

    public function create($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('keywords_comercio', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($comercio_id, $data)
    {
        try {
            $this->db->where('comercio_id', $comercio_id);
            $this->db->update('usuarios', $data);

            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($kwus_id)
    {
        try {
            $this->db->where('kwus_id', $kwus_id);
            $this->db->delete('keywords_comercio');

            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function deleteall($comercio_id, $tactividad, $tipo_transaccion)
    {
        try {
            $this->db->where('comercio_id', $comercio_id);
            $this->db->where('tipoactividad_id', $tactividad);
            $this->db->where('tipo_transaccion', $tipo_transaccion);

            $this->db->delete('keywords_comercio');

            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function iskeword($comercio_id, $tactividad, $kw)
    {
        try {
            $this->db->where('comercio_id', $comercio_id);
            $this->db->where('tipoactividad_id', $tactividad);
            $this->db->where('keyword', $kw);

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() === 1) ? TRUE : FALSE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function get_keywords($comercio_id, $tactividad, $ttransaccion)
    {
        try {
            $this->db->where('comercio_id', $comercio_id);
            $this->db->where('tipoactividad_id', $tactividad);
            $this->db->where('tipo_transaccion', $ttransaccion);

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() > 0) ? $query->result() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //este va en actividades
    public function get_actividades_comercio($comercio_id)
    {
        $instruccion = "SELECT distinct comercio_id, tipoactividad_id, tipo_transaccion, tipo_actividad.tipo_actividad, actividad.actividad_id, actividad, actividad.inegi_id FROM keywords_comercio INNER JOIN tipo_actividad on keywords_comercio.tipoactividad_id=tipo_actividad.tactividad_id INNER JOIN actividad on tipo_actividad.actividad_id=actividad.actividad_id WHERE comercio_id=$comercio_id";

        $query = $this->db->query($instruccion);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_list_users_by_keywords($search_kw)
    {
        try {
            $this->db->select('keywords_comercio.comercio_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');
            $this->db->select('profile_pic');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');

            $this->db->select('negocio_nombre');
            $this->db->select('negocio_correo');
            $this->db->select('negocio_persona');
            $this->db->select('negocio_razon');
            $this->db->select('negocio_comp_correo');
            $this->db->select('negocio_comp_nombre');
            $this->db->select('afiliado_canaco');


            $this->db->like('keyword', $search_kw);
            $this->db->where('usuarios.estatus_id', '3');

            $this->db->distinct();
            $this->db->join('tipo_actividad', 'keywords_comercio.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'keywords_comercio.comercio_id = comercios.negocio_id');
            $this->db->join('usuarios', 'usuarios.usuario_id = comercios.usuario_id');

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() >= 1) ? $query->result() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_list_users_by_keyword_trans($search_kw, $filtro = "", $id_del_que_busca)
    {
        try {
            $this->db->select('keywords_comercio.comercio_id');
            $this->db->select('keywords_comercio.keyword');

            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');
            $this->db->select('negocio_logo');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('email_auth');
            $this->db->select('telefono_auth');

            $this->db->select('comercios.usuario_id');
            $this->db->select('negocio_nombre');
            $this->db->select('negocio_correo');
            $this->db->select('negocio_persona');
            $this->db->select('negocio_razon');
            $this->db->select('negocio_comp_correo');
            $this->db->select('negocio_comp_nombre');
            $this->db->select('afiliado_canaco');
            $this->db->select('negocio_calif');
            $this->db->select('negocio_rfc');




            $this->db->like('keyword', $search_kw);
            $this->db->where('usuarios.estatus_id', '3');
            $this->db->where_not_in('usuarios.usuario_id', $id_del_que_busca);

            if ($filtro === "") {
                $this->db->where("tipo_transaccion != 10"); // TODOS 
            }
            if ($filtro === "2") {
                $this->db->where("tipo_transaccion != 1");
            }

            if ($filtro === "1") {
                $this->db->where("tipo_transaccion != 2");
            }


            $this->db->distinct();
            $this->db->join('tipo_actividad', 'keywords_comercio.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'keywords_comercio.comercio_id = comercios.negocio_id');
            $this->db->join('usuarios', 'usuarios.usuario_id = comercios.usuario_id');
            $this->db->group_by('comercios.usuario_id');

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() >= 1) ? $query->result_array() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_keyword_by_search_comercio($search_kw, $comercio_id)
    {
        try {

            $this->db->like('keyword', $search_kw);
            $this->db->where('comercio_id', $comercio_id);

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() > 0) ? $query->result() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_keyword_by_search_comercio_trans($search_kw, $comercio_id, $filtro = "")
    {


        try {

            $q = $this->db->query('SELECT keyword FROM keywords_comercio WHERE keyword like "%' . $search_kw . '%" and comercio_id = ' . $comercio_id . '');

            return $q->num_rows() > 0 ? $q->result_array() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function get_user_by_comercio_id($comercio_id)
    {
        try {
            $this->db->select('usuarios.usuario_id');
            $this->db->select('email_auth');

            $this->db->select('keywords_comercio.comercio_id');
            $this->db->select('tipoactividad_id');
            $this->db->select('tipo_actividad');
            $this->db->select('actividad');

            $this->db->select('tipo_transaccion');
            $this->db->select('profile_pic');
            $this->db->select('nombre');
            $this->db->select('apellido1');
            $this->db->select('apellido2');
            $this->db->select('telefono_auth');

            $this->db->select('negocio_nombre');
            $this->db->select('negocio_correo');
            $this->db->select('negocio_persona');
            $this->db->select('negocio_razon');
            $this->db->select('negocio_comp_correo');
            $this->db->select('negocio_comp_nombre');
            $this->db->select('negocio_rfc');
            $this->db->select('afiliado_canaco');

            $this->db->where('negocio_id', $comercio_id);

            $this->db->distinct();
            $this->db->join('tipo_actividad', 'keywords_comercio.tipoactividad_id = tipo_actividad.tactividad_id');
            $this->db->join('actividad', 'tipo_actividad.actividad_id = actividad.actividad_id');
            $this->db->join('comercios', 'keywords_comercio.comercio_id = comercios.negocio_id');
            $this->db->join('usuarios', 'usuarios.usuario_id = comercios.usuario_id');

            $query = $this->db->get('keywords_comercio');

            return ($query->num_rows() >= 1) ? $query->row() : NULL;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit_keyword($kwus_id, $data)
    {
        $this->db->where('kwus_id', $kwus_id);
        $this->db->update('keywords_comercio', $data);

        return TRUE;
    }
}

/* End of file Keywords_comercio_model.php */
/* Location: ./application/models/Keywords_comercio_model.php */
