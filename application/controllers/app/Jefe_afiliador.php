<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jefe_afiliador extends CI_Controller
{
    private $usuario_id;
    public function __construct()
    {
        parent::__construct();
        is_user_logged_in();
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        $this->load->model('Jefe_afiliador_model');
    }

    public function detalles_comercio()
    {
        $id = $this->input->post('id');
        $comercio = $this->Afiliador_model->get_comercio_usuario($id);
        $this->output->set_content_type("application/json");
        echo json_encode($comercio);
    }

    public function getNomatchs()
    {
        $numero['semana'] = $this->Jefe_afiliador_model->get_no_matchs_por_semana();
        $numero['totales'] = $this->Jefe_afiliador_model->get_no_matchs_totales();
        $this->output->set_content_type("application/json");
        echo json_encode($numero);
    }

    public function getMisregs()
    {
        $numero['totales'] = $this->Jefe_afiliador_model->get_mis_regs();
        $numero['tractoras'] = $this->Jefe_afiliador_model->get_mis_regs_tractoras();
        $numero['comercios'] = $this->Jefe_afiliador_model->get_mis_regs_comercios();
        $this->output->set_content_type("application/json");
        echo json_encode($numero);
    }

    public function toptenaltas()
    {
        header('Content-Type: application/json; charset=utf-8');
        $data =  $this->Jefe_afiliador_model->get_top_afils();
        $this->output->set_content_type("application/json");
        echo json_encode($data);
    }

    public function topconvers()
    {
        $data =  $this->Jefe_afiliador_model->get_top_convers();
        $this->output->set_content_type("application/json");
        echo json_encode($data);
    }
    public function tractoras_con_mas_requerimientos()
    {
        $data =  $this->Jefe_afiliador_model->tractoras_con_mas_requerimientos();
        echo json_encode($data);
    }
    public function metrica_registro_comparaciones()
    {
        $year = date('Y');
        $current_month = date('m');
        $weeks = array(1, 2, 3, 4, 5);
        $months_name = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        //CREA ARREGLO DE FECHAS EN FORMATO SQL -> $FECHAS
        $fechas = array();
        for ($i = 1; $i < count($months_name) + 1; $i++) {
            if (strlen((string)$i) == 2) {
                array_push($fechas, '' . $year . '-' . $i . '-01');
            } else {
                array_push($fechas, '' . $year . '-0' . $i . '-01');
            }
        }
        //OBTENER ARREGLO DE MESES HASTA EL MES ACTUAL -> MONTH_ARRAY
        $months_array = array();
        for ($i = 0; $i < $current_month; $i++) {
            array_push($months_array, $months_name[$i]);
        }
        //OBETNER CONSULTAS 
        $i = 0;
        foreach ($months_array as $month) {

            foreach ($weeks as $week) {
                $data[$month][$week] = $this->Jefe_afiliador_model->metrica_registro_comparaciones($week, $fechas[$i]);
            }
            $i++;
        }
        json_header();
        echo json_encode($data);
    }
}
