<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jefe_afiliador_model extends CI_Model
{
    public function get_numero_registrados()
    {
        $query = $this->db->query("SELECT * from usuarios where DATE_FORMAT(fecha_creacion, '%Y-%m-%d') = CURDATE()");
        return $query->num_rows();
    }
    public function get_comercioslista()
    {
        $query = $this->db->query("SELECT usuarios.usuario_id, usuarios.nombre as nom, usuarios.apellido1 as ap, usuarios.apellido2 as ap2, afil.usuario_id AS afilid, afil.nombre, afil.apellido1, afil.apellido2   from usuarios LEFT JOIN usuarios AS afil ON afil.usuario_id=usuarios.afiliador  ");
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function get_comercioslista2()
    {
        $query = $this->db->query("SELECT * from usuarios,comercios where usuarios.usuario_id=comercios.usuario_id  ");
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function get_afiliadores()
    {
        $this->db->from('usuarios');
        $this->db->where('rol_id', 14);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    public function get_user_asg()
    {
        $query = $this->db->query('SELECT * FROM  afiliados 
        INNER JOIN usuarios ON afiliados.usuario = usuarios.usuario_id 
        INNER JOIN comercios ON comercios.usuario_id = usuarios.usuario_id');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_usuarios()
    {
        $query = $this->db->query('SELECT * FROM  usuarios');
        return $query->num_rows() > 0 ? $query->result() : null;
    }
    //una conversion es cuando  un comercio que di de alta se autoafilia a canaco dentro un tiempo
    //toda la info de la pantalla de inicio es de tu afiliador, excepto los no matchs

    public function get_no_matchs_por_semana()
    {  //los no  match son las busquedas no exitosas
        $query = $this->db->query('SELECT * FROM nomatch WHERE YEARWEEK(date_nomatch) = YEARWEEK(now())');
        return $query->num_rows();
    }
    public function get_no_matchs_totales()
    {  //los no  match son las busquedas no exitosas
        $query = $this->db->query('SELECT * FROM nomatch');
        return $query->num_rows();
    }
    public function get_mis_regs()
    {

        $query = $this->db->query('SELECT * FROM usuarios WHERE DAY(fecha_creacion)=DAY(NOW()) AND MONTH(fecha_creacion)=MONTH(NOW()) AND YEAR(fecha_creacion) = YEAR(now())');
        return $query->num_rows();
    }
    public function get_mis_regs_tractoras()
    {

        $query = $this->db->query('SELECT * FROM usuarios WHERE DAY(fecha_creacion)=DAY(NOW()) AND MONTH(fecha_creacion)=MONTH(NOW()) AND YEAR(fecha_creacion) = YEAR(now()) AND rol_id = 19');
        return $query->num_rows();
    }
    public function get_mis_regs_comercios()
    {

        $query = $this->db->query('SELECT * FROM usuarios WHERE DAY(fecha_creacion)=DAY(NOW()) AND MONTH(fecha_creacion)=MONTH(NOW()) AND YEAR(fecha_creacion) = YEAR(now()) AND rol_id = 2');
        return $query->num_rows();
    }


    public function get_comercios()
    {

        $query = $this->db->query(' SELECT * FROM usuarios,comercios WHERE usuarios.usuario_id=comercios.usuario_id and rol_id !="19"');
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_comercios_detalle($id)
    {
        $query = $this->db->query(
            "SELECT * from comercios,usuarios where usuarios.usuario_id=comercios.usuario_id and usuarios.usuario_id='" . $id . "' "
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

    public function get_all_afiliadores()
    {
        $query = $this->db->query("SELECT usuario_id, rol_id, estatus_id, profile_pic, nombre, apellido1, apellido2, email_auth,telefono_auth, fecha_creacion from usuarios where rol_id=14 and estatus_id=3");
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_historico($comercio_id)
    {
        $query = $this->db->query("SELECT historial_id, historial.afiliador, date_historico, historial.comercio_id, nombre, apellido1, apellido2, profile_pic, email_auth,telefono_auth from historial inner join usuarios on historial.afiliador=usuarios.usuario_id where comercio_id=" . $comercio_id . " order by date_historico");
        return $query->num_rows() > 0 ? $query->result() : null;
    }


    public function get_cierres_conf()
    {
        $query = $this->db->query("SELECT * FROM requerimientos, usuarios, comercios WHERE usuarios.usuario_id=comercios.usuario_id and requerimientos.usuario_id=usuarios.usuario_id AND (requerimientos.estatus='21'||requerimientos.estatus='22') group BY usuarios.usuario_id;");
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    public function get_top_afils()
    {
        $query = $this->db->query(
            "SELECT *, usuario_id AS id, (select COUNT(*) FROM usuarios WHERE afiliador=id)AS afilie FROM usuarios WHERE rol_id='14' OR rol_id='13' OR rol_id='17'  OR rol_id='16' ORDER BY afilie DESC LIMIT 10;"
        );
        return $query->num_rows() > 0 ? $query->result() : null;
    }

    //TOP AFILIADORES QUE HAN REGISTRADO MAS COMERCIOS Y ESTOS COMERCIOS SE AFILIAN 
    public function get_top_convers()
    {
        $q = $this->db->query(
            "SELECT comercios.negocio_id, IFNULL(comercios.negocio_nombre,'SIN NOMBRE') as nombre_negocio ,usuarios.nombre, usuarios.usuario_id, count(afiliados.afiliador_alta) as total_afiliados, afiliados.afiliador_alta as id_afiliador, (SELECT CONCAT(u.nombre,' ', u.apellido1,' ',u.apellido2) from usuarios u where u.usuario_id = afiliados.afiliador_alta) as Nombre_Afiliador from usuarios JOIN afiliados on usuarios.usuario_id = afiliados.usuario JOIN comercios on comercios.usuario_id = usuarios.usuario_id WHERE (usuarios.afiliador IS NOT NULL OR usuarios.jefe_afiliador IS NOT NULL) AND usuarios.usuario_id in (SELECT afiliados.usuario from afiliados) AND comercios.afiliado_canaco = 1 AND afiliados.estatus = 26 AND EXTRACT(MONTH from afiliados.inicio_afiliacion) = EXTRACT(MONTH from now()) GROUP BY id_afiliador;"
        );
        return $q->num_rows() > 0 ? $q->result() : [];
    }
    public function tractoras_con_mas_requerimientos()
    {
        $q = $this->db->query(
            "Select *, count(*) as requerimientos from usuarios JOIN requerimientos on usuarios.usuario_id = requerimientos.usuario_id JOIN comercios on comercios.usuario_id = usuarios.usuario_id where usuarios.rol_id = 19 GROUP BY usuarios.usuario_id ORDER BY requerimientos desc"
        );
        return $q->num_rows() > 0 ? $q->result_array() : 0;
    }

    public function metrica_registro_comparaciones($i, $fecha_actual)
    {
        if ($i == 1) {
            $q = $this->db->query("SELECT count(*) as total FROM usuarios where MONTH (fecha_creacion) = MONTH('" . $fecha_actual . "')  AND YEAR(fecha_creacion) = YEAR('" . $fecha_actual . "') AND fecha_creacion BETWEEN  DATE_SUB('" . $fecha_actual . "', INTERVAL DAYOFMONTH('" . $fecha_actual . "')-1 DAY) AND CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-07') AS DATE)");
        }
        if ($i == 2) {
            $q = $this->db->query("SELECT count(*) as total FROM usuarios where MONTH (fecha_creacion) = MONTH('" . $fecha_actual . "')  AND YEAR(fecha_creacion) = YEAR('" . $fecha_actual . "') AND fecha_creacion BETWEEN  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-07') AS DATE) AND CAST(DATE_FORMAT('" . $fecha_actual . "', '%Y-%m-14') AS DATE)");
        }
        if ($i == 3) {
            $q = $this->db->query("SELECT count(*) as total FROM usuarios where MONTH (fecha_creacion) = MONTH('" . $fecha_actual . "')  AND YEAR(fecha_creacion) = YEAR('" . $fecha_actual . "') AND fecha_creacion BETWEEN  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-14') AS DATE) AND CAST(DATE_FORMAT('" . $fecha_actual . "', '%Y-%m-21') AS DATE)");
        }
        if ($i == 4) {
            $q = $this->db->query("SELECT count(*) as total FROM usuarios where MONTH (fecha_creacion) = MONTH('" . $fecha_actual . "')  AND YEAR(fecha_creacion) = YEAR('" . $fecha_actual . "') AND fecha_creacion BETWEEN  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-21') AS DATE) AND LAST_DAY(DATE_ADD('" . $fecha_actual . "', INTERVAL 1 MONTH))");
        }
        if ($i == 5) {
            $q = $this->db->query("SELECT count(*) as total FROM usuarios where MONTH (fecha_creacion) = MONTH('" . $fecha_actual . "')  AND YEAR(fecha_creacion) = YEAR('" . $fecha_actual . "') AND fecha_creacion  BETWEEN  DATE_SUB('" . $fecha_actual . "', INTERVAL DAYOFMONTH('" . $fecha_actual . "')-1 DAY)  AND LAST_DAY(DATE_ADD('" . $fecha_actual . "', INTERVAL 1 MONTH))");
        }
        return $q->result_array();
    }
}
