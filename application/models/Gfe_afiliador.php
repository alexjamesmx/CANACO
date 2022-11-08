<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gfe_afiliador extends CI_Model
{

    public function afliadores($id)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE jefe_afiliador = $id");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }

    public function Tractoras_por_usuario($id)
    {
        $query = $this->db->query("SELECT comercios.negocio_id,comercios.negocio_nombre,comercios.negocio_persona,comercios.negocio_razon,comercios.negocio_rfc,usuarios.nombre,usuarios.afiliador FROM comercios ,usuarios WHERE usuarios.usuario_id=comercios.usuario_id AND (usuarios.rol_id=19 AND usuarios.afiliador = $id)	");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function all_tractoras()
    {
        $query = $this->db->query("SELECT comercios.negocio_id,comercios.negocio_nombre,comercios.negocio_persona,comercios.negocio_razon,comercios.negocio_rfc,usuarios.nombre,usuarios.afiliador FROM comercios ,usuarios WHERE usuarios.usuario_id=comercios.usuario_id AND (usuarios.rol_id=19)");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function historial($id)
    {
        $cmd = ("SELECT historial_id, historial.afiliador,historial.date_historico,usuarios.nombre,usuarios.apellido1,usuarios.apellido2 ,clave_empleado FROM historial , usuarios WHERE historial.usuario_id = $id AND historial.afiliador = usuarios.usuario_id ");
        $query = $this->db->query($cmd);
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function comercios($clave)
    {
        $cmd = ("SELECT * FROM comercios WHERE negocio_id = $clave ");
        $query = $this->db->query($cmd);
        return $query->num_rows() >= 1 ?  $query->row() : null;
    }
    public function afliadores_all()
    {
        $query = $this->db->query("SELECT usuario_id, nombre,apellido1,apellido2,clave_empleado FROM  usuarios WHERE rol_id= 14 OR  rol_id= 16  OR rol_id=1 ");
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function afliadores_converciones()
    {
        $cmd = ("SELECT * FROM comercios ,afiliados WHERE comercios.usuario_id = afiliados.usuario AND (afiliados.afiliador IS NULL   AND afiliados.afiliador_alta IS NOT NULL AND (afiliados.estatus=26))");
        $query = $this->db->query($cmd);
        return $query->num_rows() >= 1 ? $query->result() : null;
    }
    public function afliadores_converciones_count($fecha_actual)
    {
        $cmd = ("SELECT * FROM comercios,
        afiliados, (Select EXTRACT(YEAR from '" . $fecha_actual . "') as year) as year,(Select EXTRACT(MONTH from '" . $fecha_actual . "') as month) as month, (select if('" . $fecha_actual . "' between  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-01') as DATE)   
and  CAST(DATE_FORMAT('" . $fecha_actual . "','%Y-%m-15') as DATE),'primera quincena','segunda quincena') as fecha) as fecha 

        
    WHERE comercios.usuario_id = afiliados.usuario 
    AND afiliados.afiliador IS NULL AND afiliados.afiliador_alta IS NOT NULL
    AND afiliados.estatus=26 
    AND EXTRACT(MONTH from '" . $fecha_actual . "') =  EXTRACT(MONTH from '" . $fecha_actual . "') 
    AND EXTRACT(YEAR from '" . $fecha_actual . "') =  EXTRACT(YEAR from '" . $fecha_actual . "') 
    AND if('" . $fecha_actual . "' between  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-01') as DATE)   
and  CAST(DATE_FORMAT('" . $fecha_actual . "','%Y-%m-15') as DATE),'" . $fecha_actual . "' between  CAST(DATE_FORMAT('" . $fecha_actual . "','%Y-%m-01') as DATE)   
and  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-15') as DATE),'" . $fecha_actual . "' between  CAST(DATE_FORMAT('" . $fecha_actual . "','%Y-%m-16') as DATE)and LAST_DAY(DATE_ADD('" . $fecha_actual . "', INTERVAL 1 MONTH)))");
        $query = $this->db->query($cmd);


        if ($query->num_rows() == 0) {
            $cdm = "SELECT *, (Select EXTRACT(YEAR from '" . $fecha_actual . "') as year) as year,(Select EXTRACT(MONTH from '" . $fecha_actual . "') as month) as month, (select if('" . $fecha_actual . "' between  CAST(DATE_FORMAT('" . $fecha_actual . "' ,'%Y-%m-01') as DATE)   
and  CAST(DATE_FORMAT('" . $fecha_actual . "','%Y-%m-15') as DATE),'primera quincena','segunda quincena') as fecha) as fecha from afiliados
";
        }

        $json = [$query->num_rows() > 0 ? $query->result_array() : $this->db->query($cdm)->result_array()[0], $query->num_rows()];
        return $json;
    }
}

/* End of file Actividad_model.php */
