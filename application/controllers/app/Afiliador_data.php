<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afilador_data extends CI_Controller
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
    }
    function negociosvisitadossin()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 123
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
            'app/private/fragments/modules/afiliador/negociosvisitadossin_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }
}
