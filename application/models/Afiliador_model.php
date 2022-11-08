<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afiliador_model extends CI_Model
{
    public function get_numero_registrados()
    {
        $query = $this->db->query(
            "SELECT * from usuarios where DATE_FORMAT(fecha_creacion, '%Y-%m-%d') = CURDATE()"
        );
        return $query->num_rows();
    }

    //una conversion es cuando  un comercio que di de alta se autoafilia a canaco dentro un tiempo
    //toda la info de la pantalla de inicio es de tu afiliador, excepto los no matchs

    public function get_no_matchs_por_semana()
    {

        $query = $this->db->query(
            'SELECT * FROM nomatch WHERE YEARWEEK(date_nomatch) = YEARWEEK(now())'
        );
        return $query->num_rows();
    }

    public function get_mis_regs_hoy($id)
    {
        $query = $this->db->query(
            ' SELECT * FROM usuarios WHERE afiliador="' .
                $id .
                '" and DAY(fecha_creacion)=DAY(NOW())'
        );
        return $query->num_rows();
    }

    public function get_comercios_afil($id)
    {
        $this->db->from('comercios');
        $this->db->join('usuarios', 'usuarios.usuario_id=comercios.usuario_id');
        $this->db->join(
            'keywords_comercio',
            'comercios.negocio_id=keywords_comercio.comercio_id'
        );
        $this->db->group_by('comercio_id');
        $this->db->where('usuarios.afiliador', $id);
        $this->db->where('afiliado_canaco', 1);
        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function get_comercios_filter(
        $id,
        $select_fecha,
        $selet_data_afiliados,
        $select_servicio,
        $fecha_init_1,
        $fecha_end_1,
        $fecha_init_2,
        $fecha_end_2,
        $fecha_init_3,
        $fecha_end_3,
        $fecha_init_4,
        $fecha_end_4
    ) {
        $this->db->from('comercios');
        $this->db->join('usuarios', 'usuarios.usuario_id=comercios.usuario_id');
        $this->db->join(
            'keywords_comercio',
            'comercios.negocio_id=keywords_comercio.comercio_id'
        );

        if (isset($selet_data_afiliados)) {
            $selet_data_afiliados = intval($selet_data_afiliados);
            $this->db->where('afiliado_canaco', $selet_data_afiliados);
        }

        if (isset($select_servicio)) {
            $select_servicio = intval($select_servicio);
            $this->db->where('tipo_transaccion', $select_servicio);
        }
        /*
        if (isset($fecha_init_1)) {
            $this->db->where('fecha_creacion >=', $fecha_init_1);
        }

        if (isset($fecha_end_1)) {
            $this->db->where('fecha_creacion <=', $fecha_end_1);
        }
        */
        $this->db->where('usuarios.afiliador', $id);
        $this->db->group_by('comercio_id');
        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_comercios_afiliados($id)
    {
        $query = $this->db->query(
            "SELECT * from comercios,usuarios where usuarios.usuario_id=comercios.usuario_id and usuarios.afiliador='" .
                $id .
                "' and afiliado_canaco='1' "
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_comercio_usuario($id)
    {
        $query = $this->db->query(
            "SELECT * from comercios,usuarios where usuarios.usuario_id=comercios.usuario_id and comercios.negocio_id='" .
                $id .
                "' "
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function mis_comercios($id)
    {
        $query = $this->db->query(
            "SELECT * from comercios,usuarios where usuarios.usuario_id=comercios.usuario_id and usuarios.afiliador='" .
                $id .
                "' "
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function mis_comercios_detalle($id, $idafi)
    {
        $query = $this->db->query(
            "SELECT * from comercios,usuarios where usuarios.usuario_id=comercios.usuario_id and usuarios.afiliador='" .
                $id .
                "' and usuarios.usuario_id='" .
                $idafi .
                "' "
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_notas($id, $miid)
    {
        $query = $this->db->query(
            "SELECT * from notas where  usuario_id='" .
                $id .
                "' and id_autor='" . $miid . "' 
                order by fecha_nota desc"
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function up_notas($data)
    {
        try {
            $this->db->insert('notas', $data);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function get_comercios($id)
    {
        $this->db->from('comercios');
        $this->db->join('usuarios', 'usuarios.usuario_id=comercios.usuario_id');
        $this->db->where('usuarios.afiliador', $id);
        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function get_actividades()
    { {
            $query = $this->db->get('actividad');

            return $query->num_rows() > 0 ? $query->result() : null;
        }
    }
    public function get_tipos($where = null)
    {
        if (!is_null($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('tipo_actividad');

        return $query->num_rows() > 0 ? $query->result() : null;
    }
}
