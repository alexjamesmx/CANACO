<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contaduria extends CI_Controller {

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
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        
        $this->load->model('contaduria_model');
        $this->load->model('jefe_afiliador_model');
    }

    function porconfirm()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 154);
        $data = array();
        $data['_APP_TITLE']              = "Afiliaciones por confirmar";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones por confirmar";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Afiliaciones por confirmar");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/afilporconfirmar_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function cut(){
        
        $data['comercios']=$this->contaduria_model->get_afiliados_corte();
        var_dump($data);
    }

    function detalleseguimiento($id = null)
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 154);
      

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
            'app/private/fragments/modules/contaduria/detalleseguimiento_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }



    function acumulados()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 155);
        $data = array();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
    $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

    $data['scripts'][] = 'app/private/modules/controladortabla';
    
        $data['_APP_TITLE']              = "Afiliaciones acumuladas";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones acumuladas";
        
        
        $data['comercios']=$this->contaduria_model->get_afiliados();
        $data['scripts'][] = 'app/private/modules/seguimiento_conta';
        

        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Afiliaciones acumuladas");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/afilacumu_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function aldiadehoy()
    {
        
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 157);
        $data = array();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        $data['_APP_TITLE']              = "Afiliaciones al día de hoy";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones al día de hoy";

        $data['comercios']=$this->contaduria_model->get_afiliados_corte();
        $data['scripts'][] = 'app/private/modules/tablas_conta';        
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Al día de hoy");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/afilaldia_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function porafiliador()
    {
        
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 158);
        $data = array();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        $data['_APP_TITLE']              = "Afiliaciones por afiliador";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones por afiliador";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Por afiliador");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/porafiliador_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function comacum()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 159);
        $data = array();
        $data['_APP_TITLE']              = "Comisiones acumuladas";        
        $data['_APP_VIEW_NAME']          = "Comisiones acumuladas";
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        $data['comercios']=$this->contaduria_model->get_afiliados_comisiones();
        $data['scripts'][] = 'app/private/modules/tablas_conta';        
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Comisiones acumuladas");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/conacum_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function ingracum()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 160);
        $data = array();
        $data['_APP_TITLE']              = "Ingresos acumulados";        
        $data['_APP_VIEW_NAME']          = "Ingresos acumulados";
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        
        $data['comercios']=$this->contaduria_model->get_afiliados_total();
        $data['scripts'][] = 'app/private/modules/tablas_conta';       

        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Ingresos acumulados");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/ingracum_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function comporpagar()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 161);
        $data = array();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        
        $data['_APP_TITLE']              = "Comisiones por pagar";        
        $data['_APP_VIEW_NAME']          = "Comisiones por pagar";
        
        $data['comercios']=$this->contaduria_model->get_afiliados_comisiones_pendientes();
        $data['scripts'][] = 'app/private/modules/tablas_conta';        

        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Comisiones por pagar");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/comporpagar_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    function validarafil()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 153);
        $data = array();
        $data['scripts'][] = 'vendor/jquery.mask.min';
        $data['scripts'][] = 'vendor/select2.full';
        $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
        $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['scripts'][] = 'app/private/modules/pdfs';
        $data['scripts'][] = 'app/private/modules/modales_validarafil';
        $data['scripts'][] = 'app/private/modules/showaddnota';
        $data['modals'][] = $this->load->view('app/private/fragments/modules/contaduria/documento_m',$data,true);
        $data['modals'][] = $this->load->view('app/private/fragments/modules/contaduria/addnotaafilporvalidar_m',$data,true);
        $data['validaciones'] = $this->contaduria_model->validar_afiliacion();
        $data['_APP_TITLE']              = "Contaduria";        
        $data['_APP_VIEW_NAME']          = "Por validar afiliación";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Por validar afiliación");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/validarafil_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);

    }
    function validardocs()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 153);
        $data = array();
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';
        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['scripts'][] = 'app/private/modules/pdfs';
        $data['scripts'][] = 'app/private/modules/modales_validarafil';
        $data['scripts'][] = 'app/private/modules/showaddnota';
        $data['modals'][] = $this->load->view('app/private/fragments/modules/contaduria/documento_m',$data,true);
        $data['modals'][] = $this->load->view('app/private/fragments/modules/contaduria/addnotaafilporvalidar_m',$data,true);
        $data['validaciones'] = $this->contaduria_model->validar_afiliacion();
        $data['documentos']   = $this->contaduria_model->validar_docs();
        $data['_APP_TITLE']              = "Contaduria";        
        $data['_APP_VIEW_NAME']          = "Por validar afiliación";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Por validar afiliación");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/validar_docs', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);

    }
    function altacomercio()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 233);
        $data = array();
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
        $data['_APP_TITLE']              = "Contaduria";        
        $data['_APP_VIEW_NAME']          = "Agregar Comercio";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Por validar afiliación");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/altacomercio_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);

    }

    function comercios()
    {

        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 233);
        $data = array();
        $data['styles'][] = 'vendor/component-custom-switch.min';
        $data['styles'][] = '../../admin/percircle/percircle';
        $data['styles'][] = 'vendor/select2.min';
        $data['styles'][] = 'vendor/select2-bootstrap.min';
        $data['styles'][] = 'vendor/bootstrap-tagsinput';
        $data['miscomercios']   = $this->contaduria_model->get_comercio_usuario($this->usuario_id);
        $data['_APP_TITLE']              = "Contaduria";        
        $data['_APP_VIEW_NAME']          = "Mis negocios";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Negocios");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/vercomercios', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);

    }

    function afiliacionesN(){
        $data =  $this->contaduria_model->afiliacionesN();
        echo json_encode($data);
    }
    function dineroT(){
        $data =  $this->contaduria_model->dineroT();
        echo json_encode($data);
    }
    function dineroFT(){
        $data =  $this->contaduria_model->dineroFT();
        echo json_encode($data);
    }
    function afils24(){
        $data =  $this->contaduria_model->afils24();
        echo json_encode($data);
    }


}
