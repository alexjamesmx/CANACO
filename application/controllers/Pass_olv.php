<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass_olv extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('pass_olv_model');
    }

    public function index()
    {

    }
    public function recuperar_pass ()
    {
        mt_srand (time());
        $numero_aleatorio1 = mt_rand(0,9);
        $numero_aleatorio2 = mt_rand(0,9);
        $numero_aleatorio3 = mt_rand(0,9);
        $numero_aleatorio4 = mt_rand(0,9);
        $numero_aleatorio5 = mt_rand(0,9);
        $token = ($numero_aleatorio4.$numero_aleatorio1.$numero_aleatorio2.$numero_aleatorio3.$numero_aleatorio5);  
        $data['token'] = $token;
        $correo     = $this->input->post('correo');
        $data['correo'] = $correo;
        $hoy = date("Y-m-d");
        if($this->pass_olv_model->revisar_correo($correo))
        {
            $data_token = array(
                "correo" => $correo,
                "fecha_solicitud" => $hoy ,
                "fecha_fin" => $hoy,
                "token" => $token ,  
            );  
            // validamos el usuario no tenga un token 
            if($this->pass_olv_model->validar_insert_token($correo))
            {
                $this->pass_olv_model->insert_token($data_token);
            }else
            {
                $data_token = array(
                    "correo" => $correo,
                    "fecha_solicitud" => $hoy ,
                    "fecha_fin" => $hoy,
                    "token" => $token ,  
                );  
                $this->pass_olv_model->insert_token_when_tiene($correo,$data_token);
            }
            send_mail(
                'ENLACE-CANACO' , //Quien lo envia
                $correo, //destinatario
                'Recuperar contraseña' , //asunto 
                $html = ( $this->load->view('app/private/components/recuperar_pass', $data, true)),//Cuerpo (puede ser una vista) 
                $attach = NULL //adjunto
              );
            $mensaje =    array(
                "response_code" => 200, 
                "response_type" => 'success',
                "message" => 'Se ha mandado un correo a la direccion indicada con instrucciones',
            );          
            // existe el correo podemos seguir
        }else
        {   
            // no existe mandalo lejos  
            $mensaje =    array(
                "response_code" => 400, 
                "response_type" => 'error',
                "message" => 'no existe el correo, vuelve a intentarlo'.$correo,
            );          
        }
        echo json_encode($mensaje);
    }
    public function recuperar ()
    {
       
        $correo =4; 
        $data['correo'][] = '4';
        $data['scripts'][] = 'static/admin/js/app/public/olv_code';
        $this->load->view('app/private/components/recuperar_code',$data,false);//Cuerpo (puede ser una vista) 
        
    }
    public function validar_codigo() 
    {
        $correo     = $this->input->post('email');
        $token     = $this->input->post('code');
        $pass     = md5($this->input->post('pass'));
        $respuestamodel =$this->pass_olv_model->comparar_data($token,$correo);
        if($respuestamodel)
        {
            $respuestaup =$this->pass_olv_model->update_pass($correo,$pass);
            if($respuestaup){
                $this->pass_olv_model->matar_data($token,$correo);
                $respuesta = array ( 
                        "response_code" =>200,
                        "response_type" =>'success',
                        "message"      => 'Contraseña actualizada satisfactoriamente',
                );
            }
        }else
        { 
            $respuesta = array (
                "response_code" =>  400,
                "response_type" => 'warning',
                "message"      => 'Codigo o correo incorrecto, valida tu código en el correo electronico que te enviamos',
            ); 
        }
        echo json_encode($respuesta);

    }

} 