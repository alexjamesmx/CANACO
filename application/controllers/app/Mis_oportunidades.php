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
        $this->load->model('Reg_user');
        $this->load->model('Recompensas_model');
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
        //PERMISOS-------------------------------------------------------------
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 114
        );
        //SECCIONES Y MODULOS 
        $section_data = get_section_module_data('sec', $seccion_id = 114);
        $module_data = get_module_data_by_sec($seccion_id = 114);
        $data['module_data'] = $module_data;
        $data['section_data'] = $section_data;
        $data['permiso_id'] = $this->permiso_id;
        $data['_APP_TITLE'] = $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME'] = $section_data->ico_sec . ' ' . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
        $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU'] = get_role_menu(
            $this->rol_id,
            $module_data->modulo_id,
            $section_data->seccion_id
        );
        $data['_APP_BREADCRUMBS'] = [
            ['', $module_data->nombre_mod],
            $section_data->nombre_sec,
        ];
        //estilos de terceros
        $data['styles'][] = 'vendor/smart_wizard.min';
        $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        //MIS SCRIPTS-----------------------------------------------------------
        // $data['scripts'][] = 'app/private/modules/oportunidades';
        $data['scripts'][] = 'app/private/modules/paginacion';
        $data['scripts'][] = 'app/private/modules/noti_menu';
        $data['scripts'][] = 'app/private/modules/mis_oportunidades';
        //DATA DE MI COMERCIO
        $mi_comercio = $this->Reg_user->get_comername($this->usuario_id);
        $mi_comercio_id = $mi_comercio[0]->negocio_id;
        $data['mis_requerimientos'] = $this->Reg_user->get_mis_requerimientos($mi_comercio_id);
        $data['medallas'] = $this->Recompensas_model->medallas_user($this->usuario_id);
        $data['insignias'] = $this->Recompensas_model->insignia_user($this->usuario_id);

        $data['_APP_NAV'] = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
        $data['_APP_VIEW_MENU'] = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
        $data['_APP_FRAGMENT'] = $this->load->view('public/components/mis_oportunidades', $data, TRUE);
        $this->load->view('app/private/main_view', $data, false);
    }



    public function tablaoportunidades()
    {

        $data['styles'][] = 'vendor/smart_wizard.min';
        $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';

        $data['scripts'][] = 'app/private/modules/oportunidades';
        $micom = $this->Reg_user->get_comername($this->usuario_id);
        if (!is_null($micom)) {
            $idcom = $micom[0]->negocio_id;
            $data['misreq'] = $this->Reg_user->get_myreq($idcom);
            $html = $this->load->view('public/components/mis_oportunidades', $data);
        } else {
            echo '
            <div class="row">
            <div class="col-sm-12">
            <p class="text-center">
            <i class="fas fa-exclamation-triangle fa-3x"></i>
            <br>
            Sin información que mostrar
            </p>
            </div>
            </div>
            ';
        }
    }

    public function soyafiliado()
    {
        $afil = $this->Reg_user->soy_afiliado($this->usuario_id);
        echo json_encode($afil);
    }



    public function tabla_oportunidades($page = 1)
    {
        //OBTENER MIS DATOS
        $mi_comercio = $this->Reg_user->get_comername($this->usuario_id);

        if (!is_null($mi_comercio)) {
            $mi_comercio_id = $mi_comercio[0]->negocio_id;
            $data['mi_id'] = $this->usuario_id;
            $data['mis_requerimientos'] = $this->Reg_user->get_mis_requerimientos_pagina($mi_comercio_id, $page);
            $this->load->view('app/private/components/tablaops', $data);
        } else {
            echo '
            <div class="row">
            <div class="col-sm-12">
            <p class="text-center">
            <i class="fas fa-exclamation-triangle fa-3x"></i>
            <br>
            Sin información que mostrar
            </p>
            </div>
            </div>
            ';
        }
    }

    public function prueba_l()
    {
        $micom = $this->Reg_user->get_comername($this->usuario_id);

        if (!is_null($micom)) {
            $idcom = $micom[0]->negocio_id;
            $data['miid'] = $this->usuario_id;
            $data['misreq'] = $this->Reg_user->get_myreq_test($idcom, 2);
            // $this->load->view('app/private/components/tablaops',$data);
        }
        echo json_encode($data['misreq']);
    }

    public function tablaops_nr($key)
    {

        $micom = $this->Reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        $data['miid'] = $this->usuario_id;
        $data['misreq'] = $this->Reg_user->get_myreq_nr($idcom, $key);
        $this->load->view('app/private/components/tablaops', $data);
    }

    public function tablaops_nr2($key)
    {

        $micom = $this->Reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        //$this->usuario_id
        $data['miid'] = $this->usuario_id;
        $data['misreq'] = $this->Reg_user->get_myreq_nr2($idcom, $key, $this->usuario_id);
        $this->load->view('app/private/components/tablaops', $data);
    }

    public function misops()
    {

        $micom = $this->Reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        $myopn = $this->Reg_user->get_myop_number($idcom);

        echo json_encode($myopn);
    }

    public function misopsnr($key)
    {

        $micom = $this->Reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        $myopn = $this->Reg_user->get_myop_number_nr($idcom, $key);

        echo json_encode($myopn);
    }
}

/* End of file Requirements.php */
