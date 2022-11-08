<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contaduria_model extends CI_Model
{

    function subir($data, $clave)
    {
        try {
            $this->db->where('negocio_id', $clave);
            $this->db->update('archivos_comercio', $data);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function transacciones_Finish($id)
    {
        $query = $this->db->query("SELECT * FROM requerimientos  WHERE usuario_id = $id AND estatus = 21 ");
        return $query->num_rows();
    }
    public function validar_afiliacion()
    {
        $query = $this->db->query("SELECT afiliados_id,validacion_pago,afiliados.estatus,tipo, afiliados.afiliador,afiliados.estado,afiliados.municipio,afiliados.calle,afiliados.codigo_postal,afiliados.colonia,afiliados.num_int,afiliados.num_ext, usuarios.usuario_id,usuarios.fecha_creacion, comercios.negocio_nombre, comercios.negocio_rfc,comercios.negocio_logo FROM afiliados, usuarios,comercios WHERE afiliados.usuario = usuarios.usuario_id AND (usuarios.usuario_id = comercios.usuario_id )  AND (afiliados.estatus=25) ");
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    public function validar_docs()
    {
        $cmd = ("SELECT archivos_comercio.cv_id,archivos_comercio.cv_act_constitutiva,archivos_comercio.cv_act_constitutiva_status,archivos_comercio.cv_compro_domicio,
        archivos_comercio.cv_compro_domicio_status,archivos_comercio.cv_costancia_fiscal,archivos_comercio.cv_costancia_fiscal_status,archivos_comercio.cv_licencia,
        archivos_comercio.cv_licencia_status,archivos_comercio.negocio_id,archivos_comercio.cv_doc,archivos_comercio.cv_doc_status,archivos_comercio.docs_estatus,
        archivos_comercio.cv_estatus,
        usuarios.usuario_id,usuarios.nombre,usuarios.apellido1,usuarios.apellido2,usuarios.email_auth ,usuarios.telefono_auth,
        comercios.negocio_id,comercios.negocio_nombre,comercios.negocio_rfc,comercios.registro_patronal
         FROM archivos_comercio ,usuarios,comercios WHERE usuarios.usuario_id = comercios.usuario_id AND (archivos_comercio.negocio_id = comercios.negocio_id )   ");
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_afiliados()
    {

        $query = $this->db->query('SELECT * FROM afiliados, usuarios, comercios WHERE afiliados.estatus="26" and usuarios.usuario_id=afiliados.usuario AND usuarios.usuario_id=comercios.usuario_id');
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_afiliados_corte()
    {

        $fecha = (date('Y')) . '-' . date('m') . '-25';
        $lastmonth = intval(date('m')) - 1;
        $fecha2 = date('Y') . '-' . $lastmonth . '-25';
        //echo $fecha;
        $query = $this->db->query('SELECT * FROM afiliados, usuarios, comercios WHERE usuarios.usuario_id=afiliados.usuario AND usuarios.usuario_id=comercios.usuario_id and afiliados.inicio_afiliacion between "' . $fecha2 . '" and "' . $fecha . '" ');
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_afiliados_comisiones()
    {

        $query = $this->db->query('SELECT *, (comisiones_afiliador.porcentaje)AS percent FROM afiliados,importe_afiliacion, comisiones_afiliador, usuarios WHERE afiliados.estatus="26" and afiliados.importe=importe_afiliacion.id_importe AND comisiones_afiliador.comafil_id=afiliados.importe and usuarios.usuario_id=afiliados.afiliador;');
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }


    public function get_afiliados_comisiones_pendientes()
    {

        $query = $this->db->query('SELECT *, (comisiones_afiliador.porcentaje)AS percent FROM afiliados,importe_afiliacion, comisiones_afiliador, usuarios WHERE  afiliados.importe=importe_afiliacion.id_importe AND comisiones_afiliador.comafil_id=afiliados.importe and usuarios.usuario_id=afiliados.afiliador AND afiliados.estatus_comision="28"');
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_afiliados_total()
    {

        $query = $this->db->query('SELECT *, (comisiones_afiliador.porcentaje)AS percent FROM afiliados,importe_afiliacion, comisiones_afiliador, usuarios WHERE afiliados.estatus="26" and afiliados.importe=importe_afiliacion.id_importe AND comisiones_afiliador.comafil_id=afiliados.importe and usuarios.usuario_id=afiliados.afiliador;');
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function get_por_pagar()
    {

        $query = $this->db->query('SELECT * FROM afiliados WHERE estatus = 24 OR ( estatus = 25);');
        return ($query->num_rows());
    }
    public function get_comercio_usuario($id)
    {
        $cmd = ("SELECT * from comercios,usuarios WHERE  usuarios.afiliador = $id AND usuarios.usuario_id = comercios.usuario_id");
        $query = $this->db->query($cmd);
        return $query->num_rows() > 0 ? $query->result() : null;
    }


    public function afiliacionesN()
    {
        $cmd = ("SELECT * FROM afiliados WHERE estatus='26'");
        $query = $this->db->query($cmd);
        return $query->num_rows();
    }

    public function dineroT()
    {
        $q = $this->db->query("select IFNULL(SUM(importe_afiliacion.importe), 0)AS total FROM afiliados LEFT JOIN importe_afiliacion ON importe_afiliacion.id_importe = afiliados.importe   WHERE estatus='26' AND EXTRACT(MONTH from inicio_afiliacion) = EXTRACT(MONTH from NOW()) ");
        return $q->num_rows() > 0 ? $q->result() : 0;
    }


    public function dineroFT()
    {
        $cmd = ("SELECT IFNULL(SUM(importe_afiliacion.importe),0) AS total FROM afiliados LEFT JOIN importe_afiliacion ON importe_afiliacion.id_importe = afiliados.importe WHERE estatus='26';");
        $query = $this->db->query($cmd);
        return $query->num_rows() > 0 ? $query->result() : 0;
    }

    public function afils24()
    {
        $cmd = ("SELECT * FROM afiliados WHERE afiliados.estatus=24 GROUP BY usuario");
        $query = $this->db->query($cmd);
        return $query->num_rows();
    }
}
