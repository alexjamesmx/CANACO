<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Afiliador_reportes extends CI_Controller
{
    private $usuario_id;

    public function __construct()
    {
        parent::__construct();
        is_user_logged_in();
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        $this->load->model('reportes_afiliador_model');
    }

    //ALEX_MEJORA

    public function requerimientos_de_mis_afiliados()
    {
        $numero['mis_afiliados'] = $this->reportes_afiliador_model->requerimientos_de_mis($this->usuario_id);
        $numero['totales'] = $this->reportes_afiliador_model->requerimientos_vigentes_totales();
        $this->output->set_content_type('application/json');
        echo json_encode($numero);
    }


    public function no_afils_con_cierres()
    {

        $ids = $this->reportes_afiliador_model->no_afils_con_cierres_lista($this->usuario_id);
        $total['mis_afiliados'] = 0;

        if ($ids) {
            foreach ($ids as $id) {
                $num = $this->reportes_afiliador_model->no_afils_con_cierres($id->usuario_id);
                if ($num >= 1) {
                    $total['mis_afiliados']  =    $total['mis_afiliados']  + 1;
                }
            }
        }


        $ids = $this->reportes_afiliador_model->no_afils_con_cierres_lista_todos();
        $total['totales'] = 0;
        if ($ids) {
            foreach ($ids as $id) {
                $num = $this->reportes_afiliador_model->no_afils_con_cierres($id->usuario_id);
                if ($num >= 1) {
                    $total['totales'] =  $total['totales'] + 1;
                }
            }
        }


        $this->output->set_content_type('application/json');
        echo json_encode($total);
    }

    public function afils_con_cierres()
    {
        $ids = $this->reportes_afiliador_model->afils_con_cierres_lista($this->usuario_id);

        $total['mis_afiliados']  = 0;
        foreach ($ids as $id) {
            $num = $this->reportes_afiliador_model->afils_con_cierres($id->usuario_id);
            if ($num >= 1) {
                $total['mis_afiliados']  =    $total['mis_afiliados']  + 1;
            }
        }

        $ids = $this->reportes_afiliador_model->afils_con_cierres_lista_todos();
        $total['totales'] = 0;
        foreach ($ids as $id) {
            $num = $this->reportes_afiliador_model->afils_con_cierres($id->usuario_id);
            if ($num >= 1) {
                $total['totales'] =  $total['totales'] + 1;
            }
        }
        $this->output->set_content_type('application/json');
        echo json_encode($total);
    }
    public function contar_no_afiliados()
    {

        $negocios = $this->reportes_afiliador_model->get_users_id();
        ($negocios);
        foreach ($negocios as $negocio) {
            echo ($negocio->usuario_id);
        }
    }
    public function negocios_registros_completos()
    {
        header('Content-Type: application/json; charset=utf-8');
        $data['completos'] = $this->reportes_afiliador_model->get_registros_completos();
        $data['incompletos'] = $this->reportes_afiliador_model->get_registros_incompletos();
        echo json_encode($data);
    }
}
