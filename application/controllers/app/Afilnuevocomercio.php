<? phpdefined('BASEPATH') or exit('No direct script access allowed');
class Jefeafilcomercios extends CI_Controller
{
    private $usuario_id;
    private $rol_id;
    private $estatus_id;
    private $permiso_id;
    /**     * [__construct description]     */    public function __construct()
    {
        parent::__construct();
        is_user_logged_in();
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
    }
    function listacom()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 141);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Lista de comercios";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Lista de comercios");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/listacom_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function newcomercio()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 136);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Nuevo comercio";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Nuevo comercio");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/newcomercio_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function cierresconf()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 142);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Cierres confirmados";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Cierres confirmados");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/cierresconf_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function seguimiento()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 140);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Seguimiento";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Seguimiento");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/seguimiento_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function detalleseguimiento()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 146);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Detalle seguimiento";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Detalle seguimiento");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/detalleseguimiento_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function reagcomercio()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 134);
        $data['_APP_TITLE']       = "Home";
        $data['_APP_VIEW_NAME']   = "Reasignar comercio";
        $data['_APP_MENU']        = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']         = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']   = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS'] = array("Reasignar comercio");
        $data['_APP_FRAGMENT']    = $this->load->view('app/private/fragments/modules/jefeafiliador/reagcomercio_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function listareasig()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 135);
        $data['_APP_TITLE']       = "Home";
        $data['_APP_VIEW_NAME']   = "Listado de reasignación";
        $data['scripts'][]        = 'app/private/modules/newafilenlace';
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['_APP_MENU']        = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']         = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']   = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS'] = array("Listado de reasignación");
        $data['_APP_FRAGMENT']    = $this->load->view('app/private/fragments/modules/jefeafiliador/listareasig_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function newafilenlace()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 147);
        $data['_APP_TITLE']       = "Home";
        $data['_APP_VIEW_NAME']   = "Nuevo comercio ENLACE";
        $data['scripts'][]        = 'app/private/modules/newafilenlace';
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['_APP_MENU']        = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']         = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']   = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS'] = array("Nuevo comercio ENLACE");
        $data['_APP_FRAGMENT']    = $this->load->view('app/private/fragments/modules/jefeafiliador/newafilenlace_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function newafilcomercio()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 129);
        $data['_APP_TITLE']       = "Home";
        $data['_APP_VIEW_NAME']   = "Nuevo comercio";
        $data['_APP_MENU']        = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']         = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']   = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS'] = array("Nuevo comercio");
        $data['_APP_FRAGMENT']    = $this->load->view('app/private/fragments/modules/jefeafiliador/newafilcomercio_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function listafil()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 148);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Comercios afiliados";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Comercios afiliados");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/listafil_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function estadisticaconv()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 149);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Estadísticas de conversión";
        $data['scripts'][] = 'app/private/modules/estadis_conver_jefeafil';
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Estadísticas de conversión");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/estadisticaconv_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function newafil()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 151);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Nuevo afiliador";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Nuevo afiliador");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/newafil_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
    function listafiliados()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 152);
        $data['_APP_TITLE']              = "Home";
        $data['_APP_VIEW_NAME']          = "Lista de afiliadores";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Lista de afiliadores");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/jefeafiliador/listafiliados_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
    }
}/* End of file Afilcomercios.php *//* Location: ./application/controllers/app/Afilcomercios.php */