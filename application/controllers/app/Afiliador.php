<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Afiliador extends CI_Controller
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

        $this->load->model('afiliador_model');
        $this->load->model('reportes_afiliador_model');
        $this->load->model('gfe_afiliador');
    }

    public function index()
    {
    }

    public function detalles_comercio()
    {
        $id = $this->input->post('id');
        $comercio = $this->afiliador_model->get_comercio_usuario($id);

        $this->output->set_content_type('application/json');
        echo json_encode($comercio);
    }

    public function count_converciones()
    {

        $fecha_actual = date("Y-m-d");
        $count = $this->gfe_afiliador->afliadores_converciones_count($fecha_actual);
        //SI NO HAY ULTIMOS CORTES - REGISTROS ENTONCES SACAMOS DATOS ESTATICOS
        if (($count[1]) == 0) {
            $periodo_corte = $count[0];
            $data =    array(
                "response_code" => 200,
                "response_type" => 'success',
                "periodo_corte" => $periodo_corte['fecha'],
                "year" => $periodo_corte['year'],
                "month" => $periodo_corte['month']
            );
        } //SI HAY ULTIMOS CORTES - REGISTROS ENTONCES DATOS DINAMICOS
        else {
            $periodo_corte = $count[0];
            $data =    array(
                "response_code" => 200,
                "response_type" => 'success',
                "cuantos" => $count,
                "periodo_corte" => $periodo_corte
            );
        }

        echo json_encode($data);
    }

    public function getNomatchs()
    {
        $numero = $this->afiliador_model->get_no_matchs_por_semana();
        $this->output->set_content_type('application/json');
        echo json_encode($numero);
    }

    public function upNota()
    {
        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $cuerpo = $this->input->post('cuerpo');

        $data = [
            'usuario_id' => $id,
            'fecha_nota' => date('YmdHis'),
            'titulo' => $titulo,
            'texto' => $cuerpo,
            'id_autor' => $this->usuario_id
        ];
        $up = $this->afiliador_model->up_notas($data);

        echo json_encode($up);
    }

    public function getMisregs()
    {
        $numero = $this->afiliador_model->get_mis_regs_hoy($this->usuario_id);
        $this->output->set_content_type('application/json');
        echo json_encode($numero);
    }

    public function lista_notas($id)
    {
        $data['notas'] = $this->afiliador_model->get_notas($id, $this->usuario_id);
        $this->load->view('app/private/components/nota', $data);
    }

    public function lista_comercios()
    {
        $select_fecha = $this->input->post('select_fecha');
        $selet_data_afiliados = $this->input->post('selet_data_afiliados');
        $select_data_actividad = $this->input->post('select_data_actividad');
        $select_servicio = $this->input->post('select_servicio');
        $fecha_init_1 = $this->input->post('fecha_init_1');
        $fecha_end_1 = $this->input->post('fecha_end_1');

        $fecha_init_2 = $this->input->post('fecha_init_2');
        $fecha_end_2 = $this->input->post('fecha_end_2');
        $fecha_init_3 = $this->input->post('fecha_init_3');
        $fecha_end_3 = $this->input->post('fecha_end_3');
        $fecha_init_4 = $this->input->post('fecha_init_4');
        $fecha_end_4 = $this->input->post('fecha_end_4');

        $data['comercios'] = $this->afiliador_model->get_comercios_filter(
            $this->usuario_id,
            $select_fecha,
            $selet_data_afiliados,
            $select_servicio,
            $fecha_init_1,
            $fecha_end_1,
            $fecha_init_2,
            $fecha_end_2,
            $fecha_init_3,
            $fecha_end_3,
            $fecha_init_4,
            $fecha_end_4
        );
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }

    public function requerimientos_de_mis_afiliados()
    {
        $numero = $this->reportes_afiliador_model->requerimientos_de_mis(
            $this->usuario_id
        );
        $this->output->set_content_type('application/json');
        echo json_encode($numero);
    }

    public function no_afils_con_cierres()
    {
        $ids = $this->reportes_afiliador_model->no_afils_con_cierres_lista(
            $this->usuario_id
        );
        $this->output->set_content_type('application/json');
        // echo json_encode($numero);
        foreach ($ids as $id) {
            var_dump($id->usuario_id);
        }
    }
}

/* End of file Afiliadores.php */
/* Location: ./application/controllers/app/Afilcomercios.php */
