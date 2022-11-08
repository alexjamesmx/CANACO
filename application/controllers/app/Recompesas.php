<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Files extends CI_Controller

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
        $this->load->model('accounts_model');
        $this->load->model('actividad_model');

        // $this->load->model('mupload');
    }
    /**
     * [index description]
     * @return [type] [description]
     */

     public function downloads($name){

     }

     public function medallas(){

        $medallas=$this->Recompensas_model->medallas();
        $data['medallas']=$medallas;
        var_dump($data);
     
    }
    public function insignia(){

        $medallas=$this->Recompensas_model->medallas();
        $data['medallas']=$medallas;
     
    }
    public function medallas(){

        $medallas=$this->Recompensas_model->medallas();
        $data['medallas']=$medallas;
     
    }



 }



 /* End of file Myaccount.php */

 /* Location: ./application/controllers/app/Recompensas.php */

