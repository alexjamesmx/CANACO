<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presidencia extends CI_Controller {

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
        $this->load->model('Gfe_afiliador');
        $this->load->model("Presidencia_model");
    }


    function detallenotas()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 162);

        $data['_APP_TITLE']              = "Detalle Notas ";        
        $data['_APP_VIEW_NAME']          = "Detalle notas";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Detalle notas");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/detallenotas_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }

    function ultimasemana()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 164);

        $data['_APP_TITLE']              = "Última semana";        
        $data['_APP_VIEW_NAME']          = "afiliaciones de la última semana";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Última semana");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/ultimasemana_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function acumuladas()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 165);

        $data['_APP_TITLE']              = "Acumuladas";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones acumuladas";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Acumuladas");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/acumuladas_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function mensuales()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 166);

        $data['_APP_TITLE']              = "Mensuales";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones mensuales";
        $data['scripts'][] = 'app/private/modules/pre_g_men';
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Mensuales");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/mensuales_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function ultimasemanadplat()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 168);

        $data['_APP_TITLE']              = "Última semana";        
        $data['_APP_VIEW_NAME']          = "afiliaciones de la última semana desde plataforma";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Última semana desde plataforma");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/ultimasemanadplat_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function acumuladasdplat()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 169);

        $data['_APP_TITLE']              = "Acumuladas";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones acumuladas desde plataforma";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Acumuladas desde plataforma");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/acumuladasdplat_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function mensualesdplat()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 170);

        $data['_APP_TITLE']              = "Mensuales";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones mensuales desde plataforma";
        $data['scripts'][] = 'app/private/modules/pre_g_men_p';
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Mensuales desde plataforma");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/mensualesdplat_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }

    function ultimasemanacons()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 172);

        $data['_APP_TITLE']              = "Última semana";        
        $data['_APP_VIEW_NAME']          = "afiliaciones de la última semana consejeros";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Última semana consejeros");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/ultimasemanacons_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function acumuladascons()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 173);

        $data['_APP_TITLE']              = "Acumuladas";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones acumuladas consejeros";
        
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Acumuladas consejeros");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/acumuladascons_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);


    }
    function mensualescons()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 174);

        $data['_APP_TITLE']              = "Mensuales";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones mensuales consejeros";
        $data['scripts'][] = 'app/private/modules/pre_g_men_c';
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Mensuales consejeros");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/mensualescons_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);

    }

    public function giros()
    {
       $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 175);
       $data['_APP_TITLE']              = "Giros";        
       $data['_APP_VIEW_NAME']          = "Giros";

       $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
       $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
       $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
       $data['_APP_BREADCRUMBS']        = array("Giros");
       $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/giros_f', $data, TRUE);
       $this->load->view('app/private/main_view', $data, FALSE);
   }  

   public function oportunidades()
   {
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 177);
    $data['_APP_TITLE']              = "Oportunidades";        
    $data['_APP_VIEW_NAME']          = "Oportunidades";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Oportunidades");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/oportunidades_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function requerimientos()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 178);
    $data['_APP_TITLE']              = "Requerimientos";        
    $data['_APP_VIEW_NAME']          = "Requerimientos";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Requerimientos");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/requerimientos_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function requerimientosigno()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 204);
    $data['_APP_TITLE']              = "Requerimientos ignorados";        
    $data['_APP_VIEW_NAME']          = "Requerimientos ignorados";
    
    $data['requerimientos']  = $this->Presidencia_model->get_rechazados();
    $data['scripts'][] = 'app/private/modules/seguimiento_jefeafiliador';


    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Requerimientos ignorados");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/requerimientosigno_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function zona()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 180);
    $data['_APP_TITLE']              = "Zona";        
    $data['_APP_VIEW_NAME']          = "Zona";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Zona");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/zona_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function nusgiro()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 181);
    $data['_APP_TITLE']              = "Giros";        
    $data['_APP_VIEW_NAME']          = "Giros";
    $data['giros'] = $this->Presidencia_model->get_giros();
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Giros");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/nusgiro_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function fismorinf()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 182);
    $data['_APP_TITLE']              = "Físicas, morales e informales";        
    $data['_APP_VIEW_NAME']          = "Físicas, morales e informales";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Físicas, morales e informales");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/fismorinf_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function municipios()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 173);
    $data['_APP_TITLE']              = "Municipios";        
    $data['_APP_VIEW_NAME']          = "Municipios";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Municipios");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/municipios_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function nomatch()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 185);
    $data['_APP_TITLE']              = "No Match";        
    $data['_APP_VIEW_NAME']          = "No Match";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("No Match");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/nomatch_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function diezbusqueda()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 186);
    $data['_APP_TITLE']              = "Top 10 búsquedas";        
    $data['_APP_VIEW_NAME']          = "Top 10 búsquedas";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Top 10 búsquedas");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/diezbusqueda_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function reqvigentes()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 187);
    $data['_APP_TITLE']              = "Requerimientos vigentes";        
    $data['_APP_VIEW_NAME']          = "Requerimientos vigentes";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Requerimientos vigentes");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/reqvigentes_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function reqsolventados()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 188);
    $data['_APP_TITLE']              = "Requerimientos solventados";        
    $data['_APP_VIEW_NAME']          = "Requerimientos solventados";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Requerimientos solventados");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/reqsolventados_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function conversiones()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 190);
    $data['_APP_TITLE']              = "Conversiones";        
    $data['_APP_VIEW_NAME']          = "Conversiones";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Conversiones");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/conversiones_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function tdiezcierresconf()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 191);
    $data['_APP_TITLE']              = "Top 10 cierres confirmados";        
    $data['_APP_VIEW_NAME']          = "Top 10 cierres confirmados";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Top 10 cierres confirmados");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/tdiezcierresconf_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function sinafilcierreconf()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 192);
    $data['_APP_TITLE']              = "Sin afiliar c/ cierres confirmados";        
    $data['_APP_VIEW_NAME']          = "Sin afiliar c/ cierres confirmados";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Sin afiliar c/ cierres confirmados");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/sinafilcierreconf_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function jefeafil()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 193);
    $data['_APP_TITLE']              = "Jefe afiliador";        
    $data['_APP_VIEW_NAME']          = "Jefe afiliador";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Jefe afiliador");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/jefeafil_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function afiliador()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 194);
    $data['_APP_TITLE']              = "Afiliador";        
    $data['_APP_VIEW_NAME']          = "Afiliador";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Afiliador");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/afiliador_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function contabilidad()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 196);
    $data['_APP_TITLE']              = "Contabilidad";        
    $data['_APP_VIEW_NAME']          = "Contabilidad";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Contabilidad");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/contabilidad_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function administrador()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 197);
    $data['_APP_TITLE']              = "Administrador";        
    $data['_APP_VIEW_NAME']          = "Administrador";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Administrador");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/administrador_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function capacitacion()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 198);
    $data['_APP_TITLE']              = "Capacitación";        
    $data['_APP_VIEW_NAME']          = "Capacitación";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Capacitación");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/capacitacion_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function mesadirec()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 200);
    $data['_APP_TITLE']              = "Mesa directiva";        
    $data['_APP_VIEW_NAME']          = "Mesa directiva";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Mesa directiva");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/mesadirec_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function constit()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 201);
    $data['_APP_TITLE']              = "Consejeros titulares";        
    $data['_APP_VIEW_NAME']          = "Consejeros titulares";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Consejeros titulares");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/constit_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

public function consinvi()
{
    $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 202);
    $data['_APP_TITLE']              = "Consejeros invitados";        
    $data['_APP_VIEW_NAME']          = "Consejeros invitados";
    
    $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
    $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
    $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
    $data['_APP_BREADCRUMBS']        = array("Consejeros invitados");
    $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/presidencia/consinvi_f', $data, TRUE);
    $this->load->view('app/private/main_view', $data, FALSE);
}

}

/* End of file Afilcomercios.php */
/* Location: ./application/controllers/app/Afilcomercios.php */
