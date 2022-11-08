<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_user_logged_in($login = TRUE);
    }

    function index()
    {
        $data['_APP']['title'] = "Iniciar sesión";
        $data['scripts'][] = 'app/private/modules/olv_pass';
        $arr_backgrounds[] = base_url('static/images/it/bg1.webp');
        $data['bg'] = $arr_backgrounds[rand(0, sizeof($arr_backgrounds) - 1)];
        $data['bg_img_side'] = base_url('static/admin/img/login-img-dark-4.webp');
        $data['APP_PASS_OLVIDADA'] = base_url('public/password_olv_m');
        $this->load->view('public/login_v', $data, FALSE);
    }

    function auth()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|max_length[70]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[35]');

        // json_header();

        if ($this->form_validation->run()) {

            $this->load->model('auth_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);

            $datos_usuario = $this->auth_model->login($username);

            if (!is_null($datos_usuario)) {
                if ($datos_usuario->password === $password) {
                    $datos_usuario = (array) $datos_usuario;
                    $datos_usuario['signin'] = TRUE;
                    if ($datos_usuario['validado'] == 0) {
                        $json["response_code"] = 777;
                    }
                    if ($datos_usuario['estatus_id'] == 3 && $datos_usuario['validado'] == 1) {
                        $this->session->set_userdata($datos_usuario);
                        $json['estatus_id'] = (int) $datos_usuario['estatus_id'];
                        $json['rol_id'] = (int) $datos_usuario['rol_id'];
                        $json["response_code"] = 200;
                        $json['nombre'] = $datos_usuario['nombre'];
                    }
                } else {
                    $json["response_code"] = 404;
                }
            } else {
                $json["response_code"] = 404;
            }
            echo json_encode($json);
        } else {
            http_error(400);
        }
    }
}
