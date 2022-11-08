<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afilcomercios extends CI_Controller
{
    private $usuario_id;
    private $rol_id;
    private $estatus_id;
    private $permiso_id;
    /*
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

        $this->load->model('Afiliador_model');
        $this->load->model('Gfe_afiliador');
    }

    function newafilenlace()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 123
        );
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio ENLACE';
        $data['scripts'][] = 'app/private/modules/newafilenlace';
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['scripts'][] = 'app/private/modules/afiliacionAfil';
        $data['styles'][] = 'vendor/smart_wizard.min';
        $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
        $data['comercios'] = $this->Afiliador_model->get_comercios(
            $this->usuario_id
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

        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/newafilenlace_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function newafilcomercio()
    {

        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 129
        );

        $data['datos'] = $this->Afiliador_model->get_actividades();
        $data['comercios'] = $this->Afiliador_model->get_comercios(
            $this->usuario_id
        );

        $data['styles'][] = 'vendor/component-custom-switch.min';
        $data['styles'][] = '../../admin/percircle/percircle';
        $data['styles'][] = 'vendor/select2.min';
        $data['styles'][] = 'vendor/select2-bootstrap.min';
        $data['styles'][] = 'vendor/bootstrap-tagsinput';
        $data['scripts'][] = 'vendor/datatables.min';
        $data['scripts'][] = 'vendor/jquery.mask.min';
        $data['scripts'][] = 'vendor/select2.full';
        $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
        $data['scripts'][] = 'app/private/modules/modales';
        $data['scripts'][] = 'app/private/modules/myaccount';
        $data['scripts'][] = '../../admin/percircle/percircle';
        $data['scripts'][] = 'app/private/modules/afiliador_pro';
        $data['scripts'][] = 'app/private/modules/afiliador';
        // $data['scripts'][] = 'app/private/modules/jey_afiliador';

        $data['modals'][] = $this->load->view(
            'app/private/fragments/modules/config/addkeywords_m',
            $data,
            true
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/newcomercio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function datospruebas()
    {
        $data['tipos_actividad'] = $this->Afiliador_model->get_actividades();
        echo json_encode($data);
    }
    function listafil()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 130
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/afiliador_listaafil';
        $data['comercios'] = $this->Afiliador_model->get_comercios_afil(
            $this->usuario_id
        );
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Lista afiliador';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Lista afiliador'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/listafil_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function lista()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 125
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/afiliador_lista';
        $data['comercios'] = $this->Afiliador_model->get_comercios(
            $this->usuario_id
        );
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Lista ENLACE';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Lista ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/lista_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function newcomercio()
    {

        $actividades = $this->Afiliador_model->get_actividades();
        $arr_data_actividades_tipos = [];
        foreach ($actividades as $k => $v) {
            // var_dump_format($k); 
            // var_dump_format($v);

            $arr_data_actividades_tipos[$k]['actividad'] = $v;
            $tipo_actividades = $this->Afiliador_model->get_tipos(
                "actividad_id = '" . $v->actividad_id . "'"
            );

            $arr_data_actividades_tipos[$k]['tipos'] = [];
            if (!is_null($tipo_actividades)) {
                foreach ($tipo_actividades as $k2 => $v2) {
                    $arr_data_actividades_tipos[$k]['tipos'][$k2] = $v2;
                }
            }
        }

        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 124
        );
        $data['tipos_actividad'] = $arr_data_actividades_tipos;

        $data['styles'][] = 'vendor/component-custom-switch.min';
        $data['styles'][] = '../../admin/percircle/percircle';
        $data['styles'][] = 'vendor/select2.min';
        $data['styles'][] = 'vendor/select2-bootstrap.min';
        $data['styles'][] = 'vendor/bootstrap-tagsinput';
        $data['scripts'][] = 'vendor/datatables.min';
        $data['scripts'][] = 'vendor/jquery.mask.min';
        $data['scripts'][] = 'vendor/select2.full';
        $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
        $data['scripts'][] = 'app/private/modules/modales';
        $data['scripts'][] = 'app/private/modules/myaccount';
        $data['scripts'][] = '../../admin/percircle/percircle';
        $data['scripts'][] = 'app/private/modules/afiliador_pro';
        $data['scripts'][] = 'app/private/modules/afiliador';
        $data['scripts'][] = 'app/private/modules/actualizar_afiliador';
        // $data['scripts'][] = 'app/private/modules/jey_afiliador';

        $data['modals'][] = $this->load->view(
            'app/private/fragments/modules/config/addkeywords_m',
            $data,
            true
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['login_c'] = $this->load->view(
            'public/components/loginafi_c',
            $data,
            true
        );
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/newcomercio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function seguimiento()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 126
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/controladortabla';

        $data['scripts'][] = 'app/private/modules/seguimiento_afiliador';
        $data['comercios'] = $this->Afiliador_model->mis_comercios(
            $this->usuario_id
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Seguimiento';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Seguimiento'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/seguimiento_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function detalleseguimiento($id = null)
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 138
        );

        $data['usuario'] = $this->Afiliador_model->mis_comercios_detalle(
            $this->usuario_id,
            $id
        );
        $data['notas'] = $this->Afiliador_model->get_notas($id, $this->usuario_id);

        $data['scripts'][] = 'app/private/modules/seguimiento_afiliador';

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Detalle seguimiento';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Seguimiento'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/detalleseguimiento_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function negociossinvistas()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 130
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Negocios visitados sin afiliar';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Negocios'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/negociossinvistas_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function perfilcierres()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 130
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Perfil cierres';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['perfil cierres'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/perfilcierres_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function perfilcierressinafiliacion()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 130
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio ENLACE';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/perfilcierressinafiliacion_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function requeriminetosvigentes()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 130
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio ENLACE';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/requeriminetosvigentes_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function matchtemp()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 139
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Match';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/matchtemp_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function newtractora()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 139
        );
        $data['scripts'][] = 'app/private/modules/new_tractora_afiliador';
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nueva Tractora';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio ENLACE'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/new_tractora_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function mis_tractoras()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 139
        );

        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/newtractora_afil';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista';

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Tractora';
        $data['tractoras'] = $this->Gfe_afiliador->Tractoras_por_usuario(
            $this->usuario_id
        );
        //ALEX_NOTA print_r($data['tractoras']);
        $data['afiliadores'] = $this->Gfe_afiliador->afliadores_all();

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Lista de tractora'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/lista_tractora_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function converciones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 139
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/newtractora_afil';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista';
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Conversiones';
        $data['conversiones'] = $this->Gfe_afiliador->afliadores_converciones();
        $data['afiliadores'] = $this->Gfe_afiliador->afliadores_all();

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
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
        $data['_APP_BREADCRUMBS'] = ['Lista de tractora'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/afiliador/reasignacion_list',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
}

/* End of file Afilcomercios.php */
/* Location: ./application/controllers/app/Afilcomercios.php */
