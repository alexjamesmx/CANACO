<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jefeafilcomercios extends CI_Controller
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
        $this->load->model('Gfe_afiliador');
        $this->load->model('jefe_afiliador_model');
        $this->load->model('comercio_model');
    }

    function index()
    {
    }

    function listacom()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 141
        );

        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/jefeafiliador_listacom';

        $data['comercios'] = $this->jefe_afiliador_model->get_comercioslista();
     
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Lista de comercios';

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
        $data['_APP_BREADCRUMBS'] = ['Lista de comercios'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/listacom_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function newcomercio()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 136
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

    function cierresconf()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 142
        );
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/jefeafiliador_listacom';
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Cierres confirmados';

        $data['scripts'][] = 'app/private/modules/seguimiento_jefeafiliador';
        $data['comercios'] = $this->jefe_afiliador_model->get_cierres_conf();

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
        $data['_APP_BREADCRUMBS'] = ['Cierres confirmados'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/cierresconf_f',
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
            $seccion_id = 140
        );
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
    $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

    $data['scripts'][] = 'app/private/modules/controladortabla';
    
        $data['scripts'][] = 'app/private/modules/seguimiento_jefeafiliador';
        $data['comercios'] = $this->jefe_afiliador_model->get_comercios();
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
            'app/private/fragments/modules/jefeafiliador/seguimiento_f',
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
            $seccion_id = 146
        );

        $data['usuario'] = $this->jefe_afiliador_model->get_comercios_detalle(
            $id
        );
        $data['notas'] = $this->jefe_afiliador_model->get_notas($id,$this->usuario_id);

        $data['scripts'][] = 'app/private/modules/seguimiento_jefeafiliador';

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
        $data['_APP_BREADCRUMBS'] = ['Detalle seguimiento'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/detalleseguimiento_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function reagcomercio()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 134
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        $data['comercios']  =  $this->comercio_model->get_comercio();
        $data['afiliadores']  =  $this->comercio_model->get_afiliadores();
        $data['scripts'][]      =   'app/private/modules/cambiar_afiliador';
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Reasignar comercio';
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
        $data['_APP_BREADCRUMBS'] = ['Reasignar comercio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/reagcomercio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function listareasig()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 135
        );
        $afiliados = $this->jefe_afiliador_model->get_all_afiliadores();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
    $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

    $data['scripts'][] = 'app/private/modules/controladortabla';
    $data['scripts'][] = 'app/private/modules/reasignacion';
    
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Listado de reasignación';
        $data['scripts'][] = 'app/private/modules/newafilenlace';
        $data['scripts'][] = 'app/private/modules/reasignacionlist';
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
        $data["reasignaciones"]=$this->jefe_afiliador_model->get_user_asg();
        $data["usuarios"]=$this->jefe_afiliador_model->get_usuarios();
        
        $data['_APP_BREADCRUMBS'] = ['Listado de reasignación'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/listareasig_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function reasignaciones(){
        $data["reasignaciones"]=$this->jefe_afiliador_model->get_user_asg();
        $data["usuarios"]=$this->jefe_afiliador_model->get_usuarios();
         echo json_encode($data);
    }
    function showlistreasignacionescomercios()
    {
        if (/*$this->input->is_ajax_request()*/ true) {
            $data[
                'afiliados'
            ] = $this->comercio_model->get_comercios_w_afiliador();

            if ($data['afiliados'] != null) {
                foreach ($data['afiliados'] as $k) {
                    //
                    $k->historico_afil = $this->jefe_afiliador_model->get_historico(
                        $k->negocio_id
                    );
                    //echo(var_dump_format($k));
                }
            }

            $html = $this->load->view(
                'app/private/fragments/modules/jefeafiliador/reasignacion_list',
                $data,
                true
            );

            echo $html;
        } else {
            echo json_encode([
                'response_code' => 403,
                'response_type' => 'error',
                'message' => 'Bad Request',
            ]);
        }
    }

    function newafilenlace()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 147
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio ENLACE';
        $data['scripts'][] = 'app/private/modules/newafilenlace';
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['styles'][] = 'vendor/smart_wizard.min'; 
        $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['comercios'] = $this->jefe_afiliador_model->get_comercios(
            $this->usuario_id
        );
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
            'app/private/fragments/modules/jefeafiliador/newafilenlace_f',
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
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/newafilcomercio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function listafil()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 148
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/jefeafiliador_listacom';

        $data['comercios'] = $this->jefe_afiliador_model->get_comercioslista2(
            $this->usuario_id
        );
        $data['afiliadores'] = $this->jefe_afiliador_model->get_afiliadores();

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Comercios afiliados';

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
        $data['_APP_BREADCRUMBS'] = ['Comercios afiliados'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/listafil_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function estadisticaconv()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 149
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Estadísticas de conversión';
        $data['script'][] = 'app/private/modules/estadis_conver_jefeafil';
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
        $data['_APP_BREADCRUMBS'] = ['Estadísticas de conversión'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/estadisticaconv_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function newafil()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 151
        );
        $data['scripts'][] = 'app/private/modules/jefe_afiliador';
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo afiliador';

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
        $data['_APP_BREADCRUMBS'] = ['Nuevo afiliador'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/newafil_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function listafiliados()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 152
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista';   
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Lista de afiliadores';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
        $data['afliadores'] = $this->Gfe_afiliador->afliadores(
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
        $data['_APP_BREADCRUMBS'] = ['Lista de afiliadores'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/listafiliados_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function historial_afiliadores($id)
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 152
        );
        $IDC   = get_comercio_id($id);
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista';   
        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Detalle historial';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
        $data['historial'] = $this->Gfe_afiliador->historial($id);
        $data['comercios'] = $this->Gfe_afiliador->comercios($IDC);
        $comercio  = $this->Gfe_afiliador->comercios($IDC);
       
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
        $data['_APP_BREADCRUMBS'] = ['Lista de afiliadores'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/afiliadorhistorial',
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
            $seccion_id = 152
        );
     
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/newtractora_afil';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista'; 

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Detalle historial';

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
        $data['_APP_BREADCRUMBS'] = ['Lista de afiliadores'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/jefeafiliador/new_tractora_f',
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
            $seccion_id = 152
        );
     
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/newtractora_afil';
        $data['scripts'][] = 'app/private/modules/afiliadoresl_lista';  

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Tractora';
        $data['tractoras'] = $this->Gfe_afiliador->all_tractoras(
            $this->usuario_id
        );
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
            'app/private/fragments/modules/jefeafiliador/lista_tractora_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }


    public function toptenaltas(){
        $data =  $this->jefe_afiliador_model->get_top_afils();
        echo json_encode($data);
    }
    function converciones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 227
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
