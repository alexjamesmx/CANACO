<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Mensaje extends CI_Controller

{
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
        $this->load->helper('download');
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        $this->load->model('mensaje_model');
        // $this->load->model('mupload');
    }

    public function index()
    {

    }

    public function leido(){
        $id = $this->input->post('id');  
        $estado=  $this->mensaje_model->leido($id);
        echo json_encode($estado);  

    }

    public function noleido(){
        $id = $this->input->post('id');  
        $estado=  $this->mensaje_model->noleido($id);
        echo json_encode($estado);  

    }


    /**

     * [index description]

     * @return [type] [description]

     */


 }



 /* End of file Mensaje.php */

 /* Location: ./application/controllers/app/Mensaje.php */

