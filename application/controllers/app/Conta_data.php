<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_data extends CI_Controller {

    private $usuario_id;
    private $rol_id;
    private $estatus_id;
    private $permiso_id;
    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();

        is_user_logged_in();

        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        
        $this->load->model('contaduria_model');
        $this->load->model('jefe_afiliador_model');
    }
    
    function index ()
    {
      
    }
    
    function cuantos_faltan_por_pagar()
    {

        $cuantos_pendientes = $this->contaduria_model->get_por_pagar();
       
        $d =    array(
            "response_code" => 200, 
            "response_type" => 'success',
            "cuantos" => $cuantos_pendientes,
          );
        
              
        echo json_encode($d); 
    }
    
}