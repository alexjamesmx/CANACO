<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grafica_model extends CI_Model
{

    public function afliadores($id)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE jefe_afiliador = $id");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }

    public function countall()
    {
        $query = $this->db->query("SELECT count(*) as total FROM comercios ");
        return $query->row() != null ? $query->row() : 0;
    }
    public function countall_unregistered()
    {
        $query = $this->db->query("SELECT count(*) as total FROM comercios WHERE negocio_municipio is null");
        return $query->row() != null ? $query->row() : 0;
    }

    public function countqro()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Querétaro'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }

    public function countamealco()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Amealco de Bonfil'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }

    public function countarroyo()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Arroyo Seco'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countcadereyta()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Cadereyta de montes'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countcolon()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Colón'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countcorregidora()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Corregidora'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }

    public function countmarques()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'El marqués'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function counthumilpan()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Huimilpan'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countjalpan()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Jalpan de serra'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countpinamiller()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Peñamiller'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countamoles()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Pinal de Amoles'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countjoaquin()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'San joaquín'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countsanrio()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'San juan del rio'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function counttoliman()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Toliman'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function counttequis()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Tequisquiapan'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countlanda()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Landa de matamoros'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countescobedo()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Pedro Escobedo'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    public function countezequiel()
    {
        $query = $this->db->query("SELECT *   FROM comercios WHERE negocio_municipio = 'Ezequiel montes'");
        return $query->num_rows() >= 1 ? $query->num_rows() : null;
    }
    //CODIGOS POSTALES
    public function get_cp()
    {
        $query = $this->db->query("SELECT negocio_cp, count(*) as total from comercios WHERE negocio_cp IS NOT NULL AND  NOT negocio_cp = '' GROUP BY negocio_cp order by total desc LIMIT 10");
        return $query->num_rows() >= 1 ? $query->result_array() : null;
    }

    // public function cuantos($cp)
    // {
    //     $query = $this->db->query("SELECT negocio_cp from comercios WHERE negocio_cp = '$cp' ");
    //     return $query->num_rows() >= 1 ? $query->num_rows() : null;
    // }

    //Graficas de meses

    //total
    public function countenero()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function countfeb()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 2 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countmar()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 3 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countapril()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 4 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countmay()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 5 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countjune()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 6 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countjuly()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 7 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countago()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 8 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countsept()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 9 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countoct()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 10 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countnov()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 11 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function countdec()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 12 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }


    //solventadas
    public function sol1()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 1 AND (estatus=21||estatus=22) AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol2()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 2 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol3()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 3 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol4()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 4 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol5()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 5 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol6()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 6 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol7()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 7 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol8()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 8 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol9()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 9 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol10()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 10 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol11()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 11 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function sol12()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 12 AND (estatus=21||estatus=22)AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    //sin solventar
    public function nsol1()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 1 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol2()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 2 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol3()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 3 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol4()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 4 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol5()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 5 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol6()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 6 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol7()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 7 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol8()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 8 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol9()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 9 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol10()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 10 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol11()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 11 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function nsol12()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 12 AND estatus=23 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    //pendientes

    public function pen1()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 1 AND estatus IS NUll AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen2()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 2 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen3()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 3 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function pen4()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 4 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function pen5()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 5 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function pen6()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 6 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function pen7()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 7 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen8()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 8 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen9()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 9 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen10()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 10 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen11()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 11 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function pen12()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 12 AND estatus IS null AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    //0;

    public function cal1()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 1 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function cal2()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 2 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal3()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 3 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal4()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 4 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal5()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 5 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal6()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 6 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal7()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 7 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal8()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 8 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal9()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 9 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal10()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 10 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal11()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 11 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }
    public function cal12()
    {
        $query = $this->db->query("SELECT * FROM requerimientos WHERE MONTH(fecha_req) = 12 AND req_calf_status=1 AND YEAR(fecha_req) = YEAR(now())");
        return $query->num_rows() >= 1 ? $query->num_rows() : 0;
    }

    public function total_afiliaciones_actuales()
    {
        $q = $this->db->query("SELECT * FROM comercios where afiliado_canaco = 1");
        return $q->num_rows() >  0 ? $q->num_rows() : 0;
    }
    public function no_oportunidades_negocio()
    {
        $q = $this->db->query("SELECT * from requerimientos");
        return $q->num_rows() > 0 ? $q->num_rows() : 0;
    }
}
