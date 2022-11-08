<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Requerimiento_model');
    }
    //PRIMERA FUNCION AL ENTRAR A CANACO
    function index()
    {
        $data['scripts'][] = 'admin/js/app/private/modules/script_registro';
        $data['scripts'][] = 'js/app/match.keywords';
        $data['scripts'][] = 'admin/toastr/toastr.min';
        $data['styles'][] = 'admin/toastr/toastr.min';

        $data['requerimientos'] = $this->Requerimiento_model->get_requerimiento_publico();


        $data['_APP']['header'] = $this->load->view(
            'public/header_f',
            $data,
            true
        );
        $data['_APP']['footer'] = $this->load->view(
            'public/footer_f',
            $data,
            true
        );
        $data['login_c'] = $this->load->view(
            'public/components/login_c',
            $data,
            true
        );
        $data['_APP']['fragment'] = $this->load->view(
            'public/inicio_f',
            $data,
            true
        );
        $this->load->view('public/landing_v', $data, false);
    }
    function get_comerce()
    {
        $etesech = $this->input->post('busqueda');
        $data['filtro_req'] = $this->Requerimiento_model->get_requerimiento_publico_filter(
            $etesech
        );
        echo json_encode($data);
    }
    function demo_mail_bienvenida()
    {
        $data = [];
        $this->load->view('public/preregistro_template', $data, false);
    }

    function send_infoemail()
    {
        if ($this->input->is_ajax_request()) {
            json_header();
            $this->form_validation->set_rules(
                'nombre',
                'nombre',
                'trim|required'
            );
            $this->form_validation->set_rules(
                'correo',
                'correo',
                'trim|required|valid_email'
            );
            $this->form_validation->set_rules(
                'telefono',
                'telefono',
                'trim|required'
            );

            if ($this->form_validation->run()) {
                $nombre = $this->input->post('nombre');
                $correo = $this->input->post('correo');
                $telefono = $this->input->post('telefono');

                $data = [
                    'nombre' => $nombre,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'direccion' => null,
                    'fecha_visita' => null,
                    'hora_visita' => null,
                ];

                send_mail(
                    'Handy Hogar',
                    'handyhogar@gmail.com',
                    'Titulo del correo',
                    $html = $this->load->view('_URL_A_LA_VISTA', $data, true),
                    $attach = null
                );

                $response = ['code' => 200];

                echo json_encode($response);
            }
        } else {
            http_error(403);
        }
    }
}
