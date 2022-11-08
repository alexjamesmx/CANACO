<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
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
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('accounts_model');
        $this->load->model('actividad_model');
        $this->load->model('tipoActividad_model');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        /*Cuenta estandar para los usuarios de canaco que NO SON COMERCIOS*/
        if ($this->rol_id !== "2") {
            $section_per_page           = 20;
            $this->permiso_id           = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3);
            $section_data               = get_section_module_data('sec', $seccion_id = 3);
            $module_data                = get_module_data_by_sec($seccion_id = 3);
            $data['module_data']        = $module_data;
            $data['section_data']       = $section_data;
            $data['permiso_id']         = $this->permiso_id;
            $data['styles'][]           = 'vendor/component-custom-switch.min';
            $data['scripts'][]          = 'app/private/modules/myaccount';
            $data['scripts'][]          = 'vendor/datatables.min';
            $data['scripts'][]          = 'vendor/jquery.mask.min';
            $data['account_data']       = $this->accounts_model->get_accounts("WHERE usuarios.estatus_id IN (3) AND usuario_id='" . $this->usuario_id . "'", 0, 0)[0];
            $data['_APP_TITLE']         = $module_data->nombre_mod . " - " . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME']     = $section_data->ico_sec . " " . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] = "https://www.youtube.com/embed/tgbNymZ7vqY";
            $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
            $data['_APP_MENU']          = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
            $data['_APP_NAV']           = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
            $data['_APP_VIEW_MENU']     = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
            $data['_APP_BREADCRUMBS']   = array(array('', $module_data->nombre_mod), $section_data->nombre_sec);
            $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/config/micuenta_f', $data, true);
            $this->load->view('app/private/main_view', $data, false);
        }

        /*
        Usuarios tipo comercio
         */
        else {

            $actividades                = $this->actividad_model->get_actividades();
            $arr_data_actividades_tipos = array();
            foreach ($actividades as $k => $v) {
                // var_dump_format($k);
                // var_dump_format($v);

                $arr_data_actividades_tipos[$k]['actividad'] = $v;
                $tipo_actividades                            = $this->tipoActividad_model->get_tipos("actividad_id = '" . $v->actividad_id . "'");

                $arr_data_actividades_tipos[$k]['tipos'] = array();
                if (!is_null($tipo_actividades)) {
                    foreach ($tipo_actividades as $k2 => $v2) {
                        $arr_data_actividades_tipos[$k]['tipos'][$k2] = $v2;
                    }
                }
            }

            // die(var_dump_format($arr_data_actividades_tipos));

            $this->permiso_id           = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3);
            $section_data               = get_section_module_data('sec', $seccion_id = 3);
            $module_data                = get_module_data_by_sec($seccion_id = 3);
            $data['module_data']        = $module_data;
            $data['section_data']       = $section_data;
            $data['permiso_id']         = $this->permiso_id;
            $data['tipos_actividad']    = $arr_data_actividades_tipos;
            $data['styles'][]           = 'vendor/component-custom-switch.min';
            $data['styles'][]           = '../../admin/percircle/percircle';
            $data['styles'][]           = 'vendor/select2.min';
            $data['styles'][]           = 'vendor/select2-bootstrap.min';
            $data['styles'][]           = 'vendor/bootstrap-tagsinput';
            $data['scripts'][]          = 'app/private/modules/myaccount';
            $data['scripts'][]          = '../../admin/percircle/percircle';
            $data['scripts'][]          = 'app/private/modules/profilecomercio';
            $data['scripts'][]          = 'vendor/datatables.min';
            $data['scripts'][]          = 'vendor/jquery.mask.min';
            $data['scripts'][]          = 'vendor/select2.full';
            $data['scripts'][]          = 'vendor/bootstrap-tagsinput.min';
            $data['modals'][]           = $this->load->view('app/private/fragments/modules/config/addkeywords_m', $data, true);
            $data['account_data']       = $this->accounts_model->get_accounts("WHERE usuarios.estatus_id IN (3) AND usuario_id='" . $this->usuario_id . "'", 0, 0)[0];
            $data['_APP_TITLE']         = $module_data->nombre_mod . " - " . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME']     = $section_data->ico_sec . " " . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] = "https://www.youtube.com/embed/tgbNymZ7vqY";
            $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
            $data['_APP_MENU']          = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
            $data['_APP_NAV']           = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
            $data['_APP_VIEW_MENU']     = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
            $data['_APP_BREADCRUMBS']   = array(array('', $module_data->nombre_mod), $section_data->nombre_sec);
            $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/config/micuentacomercio_f', $data, true);
            $this->load->view('app/private/main_view', $data, false);
        }

    }

    /**
     * [new description]
     * @return [type] [description]
     */
    public function doupdate()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = false);
        json_header();
        if (!is_null($this->permiso_id)) {

            $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
            $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required');
            $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
            $this->form_validation->set_rules('email_auth', 'email_auth', 'trim|required|valid_email');
            $this->form_validation->set_rules('email_auth_c', 'email_auth_c', 'trim|required|matches[email_auth]');
            $this->form_validation->set_rules('telefono_auth', 'telefono_auth', 'trim|required');
            $this->form_validation->set_rules('telefono_auth_c', 'telefono_auth_c', 'trim|required|matches[telefono_auth]');
            $this->form_validation->set_rules('password', 'password', 'trim|min_length[8]|max_length[12]');
            $this->form_validation->set_rules('password_c', 'password_c', 'trim|matches[password]');

            if ($this->form_validation->run() && $this->input->is_ajax_request()) {
                $nombre        = $this->input->post('nombre');
                $apellido1     = $this->input->post('apellido1');
                $apellido2     = $this->input->post('apellido2');
                $email_auth    = $this->input->post('email_auth');
                $telefono_auth = $this->input->post('telefono_auth');
                $password      = $this->input->post('password');

                $arr_update = array(
                    "profile_pic"     => null,
                    "nombre"          => $nombre,
                    "apellido1"       => $apellido1,
                    "apellido2"       => $apellido2,
                    "email_auth"      => $email_auth,
                    "telefono_auth"   => limpia_telefono($telefono_auth),
                    "usuario_id_umod" => $this->usuario_id,
                    "fecha_umod"      => date('Y-m-d H:i:s'),
                );

                if (strlen($password) > 0) {
                    $arr_update['password'] = md5($password);
                }

                /*En caso de insertar correctamente*/
                $update_account = $this->accounts_model->edit($this->usuario_id, $arr_update);
                if ($update_account) {
                    echo json_encode(
                        array(
                            "response_code" => 200,
                            "response_type" => 'success',
                            "message"       => "Cuenta actualizado satisfactoriamente",
                        )
                    );
                }

                /*Si no podemos editar y el modelo retorna una excepcion*/
                else {
                    echo json_encode(
                        array(
                            "response_code" => 500,
                            "response_type" => 'error',
                            "message"       => $update_account,
                        )
                    );
                }
            }

            /*Si la validación de campos es incorrecta*/
            else {
                die(validation_errors());
                echo json_encode(
                    array(
                        "response_code" => 403,
                        "response_type" => 'error',
                        "message"       => 'Bad Request',
                    )
                );
            }
        }

        /*Si no tenemos permisos*/
        else {
            echo json_encode(
                array(
                    "response_code" => 401,
                    "response_type" => 'warning',
                    "message"       => "Acceso no autorizado",
                )
            );
            fuchi_wakala($redir = false);
        }
    }

}

/* End of file Myaccount.php */
/* Location: ./application/controllers/app/Myaccount.php */
