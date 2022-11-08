<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reg_user');
        $this->load->model('Comercio_model');
        $this->load->model('Notificacion_model');
    }

    function index()
    {
        $data                     = array();
        $data['scripts'][] = 'admin/js/app/private/modules/script_registro';
        $data['scripts'][] = 'admin/toastr/toastr.min';
        $data['styles'][] = 'admin/toastr/toastr.min';
        $data['_APP']['header']   = $this->load->view('public/headersignup_f', $data, TRUE);
        $data['_APP']['footer']   = $this->load->view('public/footer_f', $data, TRUE);
        $data['login_c']          = $this->load->view('public/components/login_c', $data, TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/signup_f', $data, TRUE);
        $this->load->view('public/landing_v', $data, FALSE);
    }
    public function confirmarEmail($usuario_id)
    {
        $this->Reg_user->validar($usuario_id);
        $user = $this->Reg_user->get_name($usuario_id);


        $resultado_consult = $this->Comercio_model->newget_registro();
        $data_mail = $this->Notificacion_model->get_notificacion("1");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace('%NOMBRE%', $user[0]['nombre'], $string);
        $string = $data_mail->callback_users;
        $data_mail->callback_users = str_replace('$regsitro$', $resultado_consult->registros, $string);

        send_mail(
            'ENLACE-CANACO', //Quien lo envia
            $user[0]['email_auth'], //destinatario
            $data_mail->titulo, //asunto
            $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
            $attach = NULL //adjunto
        );
        $json = [];
        $json['user'] = $user;
        $CI = &get_instance();
        $CI->session->set_flashdata('message', '<h3> <i class="fas fa-exclamation-triangle"></i>Registro finalizado.</h3> Por favor inicia sesión para continuar');
        $CI->session->set_flashdata('message_type', 'success');
        $this->load->view('public/correo_validar', $json);
        // redirect(base_url('correo_validar'));
    }
    //Alex_nota
    public function reenviarCorreo()
    {
        $email_auth = $this->input->post('email_auth');
        $reg_user = $this->Reg_user->get_user_through_email($email_auth);
        $tmp = [];
        $tmp['reg_user'] = $reg_user['0']['usuario_id'];
        $data['res'] = false;
        if ($tmp > 0) $data['res'] = true;
        send_mail(
            'ENLACE-CANACO', //Quien lo envia
            $email_auth, //destinatario
            "CANACO - Confirmar registro ", //asunto
            $html = ($this->load->view('app/private/components/noti_validar_correo', $tmp, true)), //Cuerpo (puede ser una vista) 
            $attach = NULL //adjunto
        );
        echo json_encode($data);
    }
}
