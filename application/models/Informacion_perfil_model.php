<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacion_perfil_model extends CI_Model {




  public function validacion($user) {
    $cmd=("SELECT * FROM  comercios , archivos_comercio WHERE comercios.negocio_id = archivos_comercio.negocio_id  AND  comercios.usuario_id = '".$user."' ");
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
      $cmd=("SELECT * FROM comercios where usuario_id=$ID");
      $query = $this->db->query($cmd);
      return ($query->num_rows() > 0) ? $query->result() : 0;

    }

    public function cuantos_me_eligieron($id)
    {
      $cmd=("SELECT * FROM requerimientos WHERE usuario_elegido= $id ");
      $query = $this->db->query($cmd);
      return ($query->num_rows() > 0 ) ? $query->num_rows() : 0;
    }
    public function cuantos_califique($id)
    {
      $cmd=("SELECT * FROM requerimientos,evaluacion_op WHERE usuario_elegido = $id AND evaluacion_op.id_req = requerimientos.req_id");
      $query = $this->db->query($cmd);
      return($query->num_rows());
    }
    public function cuantos_solicite($id)
    {
      $cmd=("SELECT * FROM requerimientos WHERE usuario_id= $id");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->num_rows() : 0;       
    }
    // public function cuantos_solicite($id)
    // {
    //   $cmd=("SELECT * FROM requerimientos WHERE usuario_id= $id");
    //   $query = $this->db->query($cmd); 
    //   return ($query->num_rows() > 0) ? $query->num_rows() : 0;       
    // }
     
    public function urgentes($id)
    {
      $cmd=("SELECT * FROM requerimientos WHERE usuario_id= $id AND (requerimientos.entrega =1) ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->num_rows() : 0;       
    }

    
    public function cerrados($id)
    {
      $cmd=("SELECT * FROM requerimientos WHERE usuario_id = $id AND  (requerimientos.estatus != '' ) ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->num_rows() : 0;       
    }
    public function validacion_medalla7($id)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id AND medalla =7   ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? FALSE : TRUE;       
    }

    public function urgentes_solventados($id)
    {
      $cmd=("SELECT * FROM requerimientos WHERE usuario_elegido= $id AND entrega=1   ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->num_rows() : 0;       
    }

    public function validacion_medalla($id,$medalla)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id AND medalla = $medalla   ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? FALSE : TRUE;       
    }
    public function validacion_insignia($id,$insignia)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id AND insignia = $insignia   ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? FALSE : TRUE;       
      // si es mayor que 0 regresa un falso else true
    }
    public function top_transacciones()
    {
      $cmd=("  SELECT usuario_id AS id, (SELECT COUNT(*) FROM requerimientos WHERE usuario_id=id)AS transacciones FROM usuarios ORDER BY transacciones DESC LIMIT 10");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->result() : NULL;       
    }
    public function cuantas_recompensas($id)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->result() : NULL;       
    }
    public function d5($id)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->result() : NULL;       
    }
    public function get_medallas_0 ($id)
    {
      $cmd=("SELECT * FROM recompensas, medalla WHERE usuario = $id and(recompensas.estatus = 0 and (medalla.medallas_id = recompensas.medalla ))");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->result() : NULL;       
    }
    public function get_insignia_0 ($id)
    {
      $cmd=("SELECT * FROM recompensas,insignia WHERE usuario = $id and(recompensas.estatus = 0 and (insignia.insignia_id = recompensas.insignia))");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? $query->result() : NULL;       
    }
    public function validar_liga_negocio ($id)
    {
      $cmd=("SELECT * FROM comercios WHERE comercios.negocio_id= $id AND 
      comercios.negocio_liga_ecomers IS NOT NULL AND comercios.negocio_liga_ecomers!='' ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? TRUE : FALSE;       
    }
    public function validar_liga_geo_localizacion ($id)
    {
      $cmd=("SELECT * FROM comercios WHERE comercios.negocio_id=  $id AND 
      comercios.negocio_liga_google IS NOT NULL AND comercios.negocio_liga_google !='' ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? TRUE : FALSE;       
    }
    public function validar_8y10 ($id)
    {
      $cmd=("SELECT * FROM recompensas WHERE usuario = $id   &&   ( insignia =8  OR  insignia =10 )  ");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() == 2) ? TRUE : FALSE;       
    }
    public function surcusales ($id)
    {
      $cmd=("SELECT * FROM comercios WHERE comercios.usuario_id= $id  AND (comercios.negocio_sucursales != 0 
      || comercios.negocio_sucursales != 'No')");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() > 0) ? TRUE : FALSE;       
    }
    public function validardorada_5 ($id)
    {
      $cmd=("SELECT * FROM recompensas WHERE recompensas.usuario = $id  AND recompensas.insignia IS NOT  null");
      $query = $this->db->query($cmd); 
      return ($query->num_rows() >= 5) ? TRUE : FALSE;       
    }
    function insert_bandera ($id,$data)
    {
      try {
        $this->db->where('usuario', $id);
        $this->db->where('estatus',0);
        $this->db->update('recompensas', $data);
        return TRUE;
       }

    catch(Exception $e) {
        return $e->getMessage();
          }
    }

  
  }
  /* End of file Validacion_model.php */
  /* Location: ./application/models/Validacion_model.php */
