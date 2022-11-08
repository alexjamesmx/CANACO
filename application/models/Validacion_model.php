<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validacion_model extends CI_Model
{
  public function validacion($user)
  {
    $cmd = ("SELECT * FROM  comercios , archivos_comercio WHERE comercios.negocio_id = archivos_comercio.negocio_id  AND  comercios.usuario_id = '" . $user . "' ");
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }

  /**
   * [validaciones1 description]
   * @param  [type] $ID [description]
   * @return [type]     [description]
   */
  public function validacion_comercio($ID)
  {
    $cmd = ("SELECT * FROM comercios where usuario_id=$ID");
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }

  public function validacion_archivos($IDC)
  {
    $cmd = ("SELECT * FROM archivos_comercio WHERE negocio_id= '" . $IDC . "'");
    $query = $this->db->query($cmd);
    return ($query->num_rows() === 1) ? $query->row() : NULL;
  }

  public function validacion_afiliado($ID)
  {
    $cmd = ("SELECT afiliado_canaco FROM comercios where usuario_id = '" . $ID . "' ");
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }
  public function validacion_usuario($ID)
  {
    $cmd = ("SELECT  rol_id,nombre,apellido1  , apellido2 , email_auth , telefono_auth FROM usuarios where usuario_id = '" . $ID . "' ");
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }

  function valida_keywords($id)
  {
    $cmd = "SELECT * FROM  keywords_comercio WHERE comercio_id IN (SELECT negocio_id FROM comercios WHERE usuario_id = $id)";
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }
  function insert_porcentaje($id, $data)
  {
    try {
      $this->db
        ->where('usuario_id', $id)
        ->update('usuarios', $data);
      return TRUE;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
  function validar_atencion_cliente($id, $data)
  {
    $cmd = ("SELECT  rol_id,nombre,apellido1  , apellido2 , email_auth , telefono_auth FROM usuarios where usuario_id = '" . $ID . "' ");
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
  }
  function validar_bandera($id)
  {
    $cmd = "SELECT bandera_porcentaje FROM  usuarios WHERE  usuario_id = $id AND bandera_porcentaje=0 ";
    $query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? FALSE :  TRUE;
  }

  function insert_bandera($id, $data)
  {
    try {
      $this->db
        ->where('usuario_id', $id)
        ->update('usuarios', $data);
      return TRUE;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
