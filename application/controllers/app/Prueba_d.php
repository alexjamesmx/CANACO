<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prueba_d extends CI_Controller
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
        $this->load->model('Keywords_model');
        $this->load->model('Prueba_model_f');
    }



    public function upnegocio()
    {
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
        json_header();
        if (!is_null($this->permiso_id)) {
            $this->form_validation->set_rules('nombre_comercio', 'nombre_comercio', 'trim|required');

            if ($this->form_validation->run() && $this->input->is_ajax_request()) {

                $nombre_comercio     = $this->input->post('nombre_comercio');
                $razon               = $this->input->post('razon');
                $fiscal              = $this->input->post('fiscales');
                $patronal                 = $this->input->post('patronal');
                $clave               = $this->usuario_id;
                $calle         = $this->input->post('calle');
                $RFC           = $this->input->post('RFC');
                $colonia       = $this->input->post('colonia');
                $exterior      = $this->input->post('exterior');
                $interior      = $this->input->post('calle');
                $cp            = $this->input->post('cp');
                $municipio     = $this->input->post('municipio');
                $empleados     = $this->input->post('empleados');
                $liga     = $this->input->post('liga');
                $ecomers = $this->input->post('ecomers');
                $sucursales    = $this->input->post('sucursales');

                $arr_update = array(
                    "negocio_nombre"                    =>  $nombre_comercio,
                    "negocio_persona"                   =>  $fiscal,
                    "negocio_razon"                     =>  $razon,
                    "negocio_rfc"                     =>  $RFC,
                    "registro_patronal"                 =>  $patronal,
                    "negocio_municipio"                 =>  $municipio,
                    "negocio_calle"                     => $calle,
                    "negocio_colonia"                   => $colonia,
                    "negocio_numero_ex"                 => $exterior,
                    "negocio_numero_int"                => $interior,
                    "negocio_cp"                        => $cp,
                    "negocio_tipo_empresa"              => $empleados,
                    "negocio_liga_google"               => $liga,
                    "negocio_liga_ecomers"              => $ecomers,
                    "negocio_sucursales"                => $sucursales,

                );
                /*En caso de insertar correctamente*/
                $insert_negocio = $this->Prueba_model_f->up_negocio($clave, $arr_update);
                if ($insert_negocio) {
                    $d =  array(
                        "response_code" => 200,
                        "response_type" => 'success',
                        "message" => "Negocio actualizado satisfactoriamente",
                    );
                }
                /*Si no podemos editar y el modelo retorna una excepcion*/ else {

                    $d =    array(
                        "response_code" => 400,
                        "response_type" => 'error',
                        "message" => $insert_negocio,
                    );
                }
            }
            // /*Si la validación de campos es incorrecta*/
            else {
                die(validation_errors());
                array(
                    "response_code" => 403,
                    "response_type" => 'error',
                    "message" => 'Bad Request',
                );
            }
        }
        /*Si no tenemos permisos*/ else {
            echo json_encode(
                array(
                    "response_code" => 401,
                    "response_type" => 'warning',
                    "message" => "Acceso no autorizado"
                )
            );
            fuchi_wakala($redir = FALSE);
        }
        echo json_encode($d);
    }

    function mostrar()
    {

        $this->permiso_id           = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 116);
        $section_data               = get_section_module_data('sec', $seccion_id = 116);
        $module_data                = get_module_data_by_sec($seccion_id = 116);
        $data['module_data']        = $module_data;
        $data['section_data']       = $section_data;
        $data['permiso_id']         = $this->permiso_id;
        $data['modals'][]           = $this->load->view('app/private/fragments/modules/requirements/previewresults_m', $data, true);
        $data['scripts'][]          = 'app/private/modules/newrequirement';
        $data['_APP_TITLE']         = $module_data->nombre_mod . " - " . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME']     = $section_data->ico_sec . " " . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] = "https://www.youtube.com/embed/tgbNymZ7vqY";
        $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU']          = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
        $data['_APP_NAV']           = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
        $data['_APP_VIEW_MENU']     = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
        $data['_APP_BREADCRUMBS']   = array(array('', $module_data->nombre_mod), $section_data->nombre_sec);
        $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/requirements/addrequeriment_f', $data, true);
        $this->load->view('app/private/main_view', $data, false);
    }

    public function subirImagen()
    {

        $config['upload_path'] = 'static/uploads/perfil';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000';
        $hoy = date("YmdHis");

        $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;
        $config['file_name'] = strtolower($nuevoNombreImg);

        $this->load->library('upload', $config);
        $res = [];

        if ($this->upload->do_upload("foto")) {
            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            $res['message'] = "Logo actualizado";
            $res['response_type'] = "success";
            $res['negocio_logo'] = $imagen;
            $data = array(
                'negocio_logo' => $imagen
            );

            $this->Prueba_model_f->logo_user($data,  $this->usuario_id);
        } else {
            $res['message'] = "No se pudo actualizar el logo, compruebe el formato o use otra imagen";
            $res['response_type'] = "error";
        }

        echo json_encode($res);
    }

    public function CrearAppi()

    {
        $this->load->helper('url');
        $this->load->view('app/private/fragments/modules/config/testImage_view');
    }
}
