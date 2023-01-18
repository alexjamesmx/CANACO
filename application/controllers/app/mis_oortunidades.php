<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mis_oportunidades extends CI_Controller
{
    private $usuario_id;
    private $rol_id;
    private $estatus_id;
    private $permiso_id;

    public function __construct()
    {
        parent::__construct();
        is_user_logged_in();

        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('requerimiento_model');
        $this->load->model('keywords_comercio_model');
        $this->load->model('reg_user');
        $this->load->model('notificacion_model');
        $this->load->model('oportunidades_negocio_model');
        $this->load->model('Requerimiento_model');
        $this->load->model('actividad_model');
    }

    public function index()
    {
    }
    public function misoportunidades()
    {

        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 116
        );
        $section_data = get_section_module_data('sec', $seccion_id = 116);
        $module_data = get_module_data_by_sec($seccion_id = 116);
        $data['module_data'] = $module_data;
        $data['section_data'] = $section_data;
        $data['permiso_id'] = $this->permiso_id;
        $data['modals'][] = $this->load->view(
            'app/private/fragments/modules/requirements/previewresults_m',
            $data,
            true
        );
        $data['scripts'][] = 'oportunidades';
        $actividades = $this->actividad_model->get_actividades();

        $micom = $this->Reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        $data['misreq'] = $this->Reg_user->get_myreq($idcom);

        $data['_APP_TITLE'] =
            $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME'] =
            $section_data->ico_sec . ' ' . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] =
            'https://www.youtube.com/embed/tgbNymZ7vqY';
        $data['_APP_TITLE_SUPPORT'] =
            "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU'] = get_role_menu(
            $this->rol_id,
            $module_data->modulo_id,
            $section_data->seccion_id
        );
        $data['_APP_NAV'] = $this->load->view(
            'app/private/fragments/nav/main_nav',
            $data,
            true
        );
        $data['_APP_VIEW_MENU'] = $this->load->view(
            'app/private/fragments/menu/main_menu',
            $data,
            true
        );
        $data['_APP_BREADCRUMBS'] = [
            ['', $module_data->nombre_mod],
            $section_data->nombre_sec,
        ];
        $data['_APP_FRAGMENT'] = $this->load->view('public/components/mis_oportunidades', $data, TRUE);
        $this->load->view('app/private/main_view', $data, false);
    }
}

/* End of file Requirements.php */
