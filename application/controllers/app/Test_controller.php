<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller extends CI_Controller
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
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('requerimiento_model');
        $this->load->model('keywords_model');
    }

    function new()
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

    /**/

    /**
     * [new description]
     * @return [type] [description]
     */
    public function addrequirement()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 116, $finish = false);
        json_header();
        if (!is_null($this->permiso_id)) {

            $this->form_validation->set_rules('que_necesita', 'qué necesitas', 'trim|max_length[300]|required');
            $this->form_validation->set_rules('cantidad', 'en qué cantidad', 'trim|max_length[50]|required');
            $this->form_validation->set_rules('tiempo_entrega', 'tiempo de entrega', 'trim|integer|required');
            $this->form_validation->set_rules('especificaciones', 'especificaciones técnicas', 'trim|max_length[300]|required');

            if ($this->form_validation->run() && $this->input->is_ajax_request()) {
                $que_necesita           = $this->input->post('que_necesita');
                $cantidad               = $this->input->post('cantidad');
                $tiempo_entrega         = $this->input->post('tiempo_entrega');
                $especificaciones       = $this->input->post('especificaciones');


                $arr_insert = array(
                    "busq_nec"          => $que_necesita,
                    "qty"               => $cantidad,
                    "entrega"           => $tiempo_entrega,
                    "especificaciones"  => $especificaciones,
                    "usuario_id"        => $this->usuario_id,
                );

                $update_req = $this->requerimiento_model->create($arr_insert, $this->usuario_id);
                if ($update_req) {
                    echo json_encode(
                        array(
                            "response_code" => 200,
                            "response_type" => 'success',
                            "message"       => "Requerimiento registrado correctamente",
                        )
                    );
                }

                /*Si no podemos editar y el modelo retorna una excepcion*/ else {
                    echo json_encode(
                        array(
                            "response_code" => 500,
                            "response_type" => 'error',
                            "message"       => $update_req,
                        )
                    );
                }


                //end foreach

            }

            /*Si la validación de campos es incorrecta*/ else {
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

        /*Si no tenemos permisos*/ else {
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


    /**
     * [showmatchlistrequiremnt description]
     * @return [type] [description]
     */
    public function showmatchlistrequiremnt()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 116, $finish = false);

        if (!is_null($this->permiso_id)) {

            $this->form_validation->set_rules('que_necesita', 'qué necesitas', 'trim|max_length[300]|required');

            if (true /*$this->form_validation->run() && $this->input->is_ajax_request()*/) {

                $que_necesita           = $this->input->post('que_necesita');

                $lista_usurios = $this->keywords_model->get_list_users_by_keywords($que_necesita);

                $data['match_usuarios'] = $this->keywords_model->get_list_users_by_keywords($que_necesita);

                if ($data['match_usuarios'] != null && !empty($data['match_usuarios'])) {
                }

                //revisar el html
                $html = $this->load->view('app/private/fragments/modules/requirements/card_result', $data, TRUE);

                echo $html;
            }

            /*Si la validación de campos es incorrecta*/ else {
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

        /*Si no tenemos permisos*/ else {
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



    /**/
    public function get_list_users_by_keywords_afiliado()
    {
        $lista_usurios = $this->keywords_model->get_list_users_by_keywords('min');
        die(print_r($lista_usurios));
    }
}

/* End of file Requirements.php */
