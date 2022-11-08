<?php
defined('BASEPATH') or exit('No direct script access allowed');

class reportes extends CI_Controller
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


        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        $this->load->model('reportes_model');
    }


    function todosreqs(){
        $data = $this->reportes_model->total_reqs();
        echo json_encode($data);
    }
    function todosreqsvigs(){
        $data = $this->reportes_model->total_reqs_vigentes();
        echo json_encode($data);
    }
    function todosreqssol(){
        $data = $this->reportes_model->total_reqs_solventados();
        echo json_encode($data);
    }
    function todosmatch(){
        $data = $this->reportes_model->total_matchs();
        echo json_encode($data);
    }
    function todosnoafils(){
        $data = $this->reportes_model->total_noafils();
        echo json_encode($data);
    }
    function todosignorados(){
        $data = $this->reportes_model->total_ignorados();
        echo json_encode($data);
    }
    function todosdiamondnoafil(){
        $data = $this->reportes_model->total_dna();
        echo json_encode($data);
    }

    
    //tablas
    function top20califs(){
        $data = $this->reportes_model->top20mejor();
        echo json_encode($data);
    }
    function top50califs(){
        $data = $this->reportes_model->top50peor();
        echo json_encode($data);
    }
}

/* End of file Reportes.php */
/* Location: ./application/controllers/app/Afilcomercios.php */
