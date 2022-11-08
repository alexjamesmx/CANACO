<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Afiliate extends CI_Controller
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

        $this->load->model('notificacion_model');
        $this->load->model('afiliate_model');
        $this->load->model('reg_user');
        $this->load->model('Comercio_model');
    }
    public function vl()
    {

        $this->load->view(
            'public\components\procesoafil'

        );
    }

    public function solicitar_afiliacion()
    {

        $tipo = $this->input->post('tipo');
        if ($tipo == '1') {
            $afiliacion = 'Emprendedor';
        } else if ($tipo == '2') {
            $afiliacion = 'Pyme';
        } else if ($tipo == '3') {
            $afiliacion = 'Visionario';
        } else if ($tipo == '4') {
            $afiliacion = 'Consolidado';
        } else if ($tipo == '5') {
            $afiliacion = 'Proyección';
        }

        $data = array(
            'usuario' => $this->usuario_id,
            'estatus' => '24',
            'tipo' => $afiliacion,
            'importe' => $tipo
        );
        $up = $this->afiliate_model->preafiliacion($data);
        if ($up) {

            // $mail = $this->reg_user->get_name($this->usuario_id);
            // print_r($mail);
            // die();
            // $email = $mail[0]['email_auth'];
            // $data_mail = $this->notificacion_model->get_notificacion("3");
            // $string = $data_mail->titulo;
            // $nombre = $mail[0]['nombre'];
            // $data_mail->titulo = str_replace('%NOMBRE%', $nombre, $string);
            // $atach = base_url() . '/static/afiliacion/ejemplo.jpeg';
            // send_mail(
            //     'ENLACE-CANACO', //Quien lo envia
            //     $email, //destinatario rempplazar por $email
            //     $data_mail->titulo, //asunto
            //     $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
            //     $attach = $atach //adjunto
            // );

            $exit = array(
                "response_code" => 200,
                "response_type" => 'success',
                "message" => '¿' . $afiliacion  . '?  Avanza al siguiente paso!'
            );
        } else {
            $exit = array(
                "response_code" => 403,
                "response_type" => 'error',
                "message" => "Ocurrió un error"
            );
        }

        echo json_encode($exit);
    }


    public function solicitar_afiliacion_afil()
    {

        $id = $this->input->post('id');
        $tipo = $this->input->post('tipo');
        if ($tipo == '1') {
            $afiliacion = 'Emprendedor';
        } else if ($tipo == '2') {
            $afiliacion = 'Pyme';
        } else if ($tipo == '3') {
            $afiliacion = 'Visionario';
        } else if ($tipo == '4') {
            $afiliacion = 'Consolidado';
        } else if ($tipo == '5') {
            $afiliacion = 'Proyeccion';
        }


        $miafil = $this->afiliate_model->miafil($id);
        $data = array(
            'usuario' => $id,
            'afiliador' => $this->usuario_id,
            'afiliador_alta' => $miafil[0]->afiliador,
            'estatus' => '24',
            'tipo' => $afiliacion,
            'importe' => $tipo

        );
        $up = $this->afiliate_model->preafiliacion($data);
        if ($up) {

            $mail = $this->reg_user->get_name($id);
            $email = $mail[0]->email_auth;
            $resultado_consult = $this->Comercio_model->countafiliados();
            $data_mail = $this->notificacion_model->get_notificacion("3");
            $string = $data_mail->titulo;
            $nombre = $mail[0]->nombre;
            $data_mail->titulo = str_replace('%NOMBRE%', $nombre, $string);

            $string = $data_mail->callback_users;
            $data_mail->callback_users = str_replace('$afiliados$', $resultado_consult->afiliados, $string);
            $atach = base_url() . 'static/afiliacion/ejemplo.jpeg';
            send_mail(
                'ENLACE-CANACO', //Quien lo envia
                $email, //destinatario rempplazar por $email
                $data_mail->titulo, //asunto
                $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                $attach = $atach //adjunto
            );

            $exit = array(
                "response_code" => 200,
                "response_type" => 'success',
                "message" => "registrado satisfactoriamente"
            );
        } else {
            $exit = array(
                "response_code" => 403,
                "response_type" => 'error',
                "message" => "Ocurrion un error"
            );
        }

        echo json_encode($exit);
    }

    public function conocer_afiliacion()
    {
        $my = $this->afiliate_model->conocer_afil($this->usuario_id);
        $this->output->set_content_type("application/json");
        echo json_encode($my);
    }


    public function conocer_afiliacion_afil()
    {

        $id = $this->input->post('id');
        $my = $this->afiliate_model->conocer_afil($id);
        $this->output->set_content_type("application/json");
        //echo $id;
        echo json_encode($my);
    }

    public function direcc_factura()
    {

        $this->form_validation->set_rules('estado_fac', 'estado_fac', 'trim|required');
        $this->form_validation->set_rules('municipio_fac', 'municipio_fac', 'trim|required');
        $this->form_validation->set_rules('calle_fac', 'calle_fac', 'trim|required');
        $this->form_validation->set_rules('codigopos_fac', 'codigopos_fac', 'trim|required');
        $this->form_validation->set_rules('colonia_fac', 'colonia_fac', 'trim|required');
        $this->form_validation->set_rules('numext_fac', 'numext_fac', 'trim|required');

        if ($this->form_validation->run() && $this->input->is_ajax_request()) {
            $id              = $this->input->post('id_r');
            $estado              = $this->input->post('estado_fac');
            $municipio           = $this->input->post('municipio_fac');
            $calle              = $this->input->post('calle_fac');
            $codigopos            = $this->input->post('codigopos_fac');
            $colonia               = $this->input->post('colonia_fac');
            $numinte                 = $this->input->post('numinte_fac');
            $numext             = $this->input->post('numext_fac');
            $arr_update_direc = array(
                "estado"                    =>  $estado,
                "municipio"                   =>  $municipio,
                "calle"                     =>  $calle,
                "codigo_postal"                       =>  $codigopos,
                "colonia"                 =>  $colonia,
                "num_int"                 =>  $numinte,
                "num_ext"                     => $numext,
            );
            if (strlen($id) <= 0) {
                $id = $this->usuario_id;
            }
            $validar_afiliacion = $this->afiliate_model->afiliate_comprobar($id);

            if ($validar_afiliacion) {
                //
                $insertar_data = $this->afiliate_model->afiliacion_incert($id, $arr_update_direc);
                if ($insertar_data) {
                    $respuesta = "Tu dirección ha sido agregada, espera tu factura";
                } else {
                    $respuesta = "Ocurrio un error vuelve a intentarlo , o realiza el cambio mas tarde";
                }
            } else {
                // 
                $respuesta = "Regresa al primer paso y selecciona una afiliacion y sube tu recibo ";
            }

            $mensaje = array(
                "response_code" => 200,
                "response_type" => 'success',
                "message"       => $respuesta,
            );

            echo json_encode($mensaje);
        } else {

            $mensaje = array(
                "response_code" => 400,
                "response_type" => 'warning',
                "message"       => 'Revisa que todos los datos estan completos',
            );
        }
    }
}

/* End of file Requirements.php */
