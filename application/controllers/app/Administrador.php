<?php
defined('BASEPATH') or exit('No direct script access allowed');

class administrador extends CI_Controller
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
        $this->load->model('admin_model'); 
        $this->load->model('reportes_model');
        $this->load->model('jefe_afiliador_model');
        $this->load->model('admin_model_D');
    }

    function detalleseguimiento($id = null)
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 232
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
            'app/private/fragments/modules/administrador/detalleseguimiento_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function valoraciones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 102
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['_APP_TITLE'] = 'Detalle Notas ';
        $data['_APP_VIEW_NAME'] = 'Valoraciones';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV'] = $this->load->view(
            'app/private/fragments/nav/main_nav',
            $data,
            true
        );
        $data['top20'] = $this->reportes_model->top20mejor();
        $data['top50'] = $this->reportes_model->top50peor();
        $data['_APP_VIEW_MENU'] = $this->load->view(
            'app/private/fragments/menu/main_menu',
            $data,
            true
        );
        $data['_APP_BREADCRUMBS'] = ['Valoraciones'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/valoraciones_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    
    function badges()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 207
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['comercios']  = $this->admin_model->listacoms();   
        $data['top20'] = $this->admin_model_D->recompensas();
        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['_APP_TITLE'] = 'Última semana';
        $data['_APP_VIEW_NAME'] = 'Badges';

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
        $data['_APP_BREADCRUMBS'] = ['badges'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/badges_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function afiliadores()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 208
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/controladortabla';

        $data['scripts'][] = 'app/private/modules/graficas_admin';
        $data['afiliadores'] = $this->Gfe_afiliador->afliadores_all();
        $data['_APP_TITLE'] = 'Top afiliadores';
        $data['_APP_VIEW_NAME'] = 'Top afiliadores';

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
        $data['_APP_BREADCRUMBS'] = ['Top afiliadores'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/afiliadores_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function masnegocios()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 209
        );
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['scripts'][] = 'app/private/modules/zonas_admin';
        $data['scripts'][] = 'app/private/modules/graficas_admin';

        $data['_APP_TITLE'] = 'Zonas con más  negocios';
        $data['_APP_VIEW_NAME'] = 'Zonas con más negocios';

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
        $data['_APP_BREADCRUMBS'] = ['Más negocios'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/masnegocios_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function ultimasconversiones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 210
        );

        $data['_APP_TITLE'] = 'Últimas conversiones';
        $data['_APP_VIEW_NAME'] = 'Última conversiones';

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
        $data['_APP_BREADCRUMBS'] = ['Últimas conversiones'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/ultimasconversiones_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function ultimosnomatch()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 211
        );

        $data['_APP_TITLE'] = 'Últimos no match';
        $data['_APP_VIEW_NAME'] = 'Últimos no match';
        $data['nomatchs'] = $this->admin_model->nomatchs();
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
        $data['_APP_BREADCRUMBS'] = ['Últimos no match'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/ultimosnomatch_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function conversiones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 212
        );

        $data['_APP_TITLE'] = 'Conversiones';
        $data['_APP_VIEW_NAME'] = 'Conversiones';

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
        $data['_APP_BREADCRUMBS'] = ['Conversiones'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/conversiones_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function oprtnegocio()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 213
        );

        $data['_APP_TITLE'] = 'Oportunidades de negocio';
        $data['_APP_VIEW_NAME'] = 'Oportunidades de negocio';
        
        $data['reqs'] = $this->reportes_model->get_reqs();
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
        $data['_APP_BREADCRUMBS'] = ['Oportunidades de negocio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/oprtnegocio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function requerimientospublicos()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 214
        );

        $data['_APP_TITLE'] = 'Requerimientos';
        $data['_APP_VIEW_NAME'] = 'Requerimientos';
        $data['reqs'] = $this->admin_model->listagrandereqs();
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
        $data['_APP_BREADCRUMBS'] = ['Requerimientos'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/requerimientos_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
    function reasignaciones()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 215
        );

        $data['_APP_TITLE'] = 'Reasignaciones';
        $data['_APP_VIEW_NAME'] = 'Reasignaciones';

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
        $data['_APP_BREADCRUMBS'] = ['Reasignaciones'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/reasignaciones_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function toprequerimientos()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 217
        );
        $data['_APP_TITLE'] = 'Top requerimientos';
        $data['_APP_VIEW_NAME'] = 'Top requerimientos';

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
        
        $data['reqs'] = $this->reportes_model->top10reqs();
        $data['_APP_BREADCRUMBS'] = ['Top requerimientos'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/toprequerimientos_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function negconfirm()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 218
        );
        $data['_APP_TITLE'] = 'Negocios Confirmados';
        $data['_APP_VIEW_NAME'] = 'Negocios Confirmados';

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
        $data['_APP_BREADCRUMBS'] = ['Negocios Confirmados'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/negconfirm_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function negafiliados()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 219
        );
        $data['_APP_TITLE'] = 'Negocios afiliados';
        $data['_APP_VIEW_NAME'] = 'Negocios afiliados';
        $data['ignorado'] = $this->admin_model->listacomsafil();
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
        
        $data['comercios'] = $this->reportes_model->todosafils();
        $data['_APP_BREADCRUMBS'] = ['Negocios afiliados'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/negafiliados_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    function reqignorados()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 220
        );
        $data['_APP_TITLE'] = 'Requerimientos ignorados';
        $data['_APP_VIEW_NAME'] = 'Requerimientos ignorados';

        //$data['requerimientos'] = $this->administrador_model->get_rechazados();
        $data['scripts'][] = 'app/private/modules/seguimiento_jefeafiliador';
        $data['reqigno'] = $this->admin_model->reqigno();
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
        $data['_APP_BREADCRUMBS'] = ['Requerimientos ignorados'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/administrador/reqignorados_f',
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
            $seccion_id = 229
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
    function userspw(){
         $data = $this->admin_model->userspw();
        echo json_encode($data);
    }
    
    function afilspw(){   
        $data = $this->admin_model->afilspw();
       echo json_encode($data);
   }

   function  reqpd(){   
            $data = $this->admin_model->reqpd();
            echo json_encode($data);
        }
   
        function usuarios()
        {
            $this->permiso_id = get_role_permission(
                $this->estatus_id,
                $this->rol_id,
                'seccion',
                $seccion_id = 235
            );
            $data['stylescdn'][] =
                'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
            $data['scriptscdn'][] =
                'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
            $data['comercios']  = $this->admin_model->listacoms();   

            $data['scripts'][] = 'app/private/modules/controladortabla';
            $data['scripts'][] = 'app/private/modules/usuarios_admin';
            $data['_APP_TITLE'] = 'Usuarios canaco';
            $data['_APP_VIEW_NAME'] = 'Usuarios';

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
            $data['_APP_BREADCRUMBS'] = ['Usuarios canaco'];
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/administrador/usuarios',
                $data,
                true
            );
            $this->load->view('app/private/main_view', $data, false);
        }
}

/* End of file Afilcomercios.php */
/* Location: ./application/controllers/app/Afilcomercios.php */
