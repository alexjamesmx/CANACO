<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Afiliador_comercio extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
        $this->load->model('Reg_user');
        $this->load->model('Notificacion_model');
        $this->load->model('Mensaje_model');
        $this->load->model('Comercio_model');
    }
    public function index(){
    }

    public function registro(){
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email'); 
        $this->form_validation->set_rules('user', 'user', 'trim|required|max_length[70]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[16]');
      //  $this->form_validation->set_rules('rfc', 'rfc', 'trim|required|max_length[13]');

        if ($this->form_validation->run()) {
            $user = $this->input->post('user');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $rfc = $this->input->post('rfc');
            //$regimen=$this->input->post('regimen'); 

            $data = array(
                'rol_id'=>"2",
                'estatus_id'=>3,
                'nombre' => $user,
                'password' => md5($password),
                'email_auth' => $email,
                'fecha_creacion'=>date('Y-m-d H:i:s') ,
                'afiliador'=> $this->usuario_id ,  
            );
            
            $user_mail=$data["email_auth"];   
            $new_mail=  $this->Reg_user->check_mail($user_mail);
            if($new_mail){
               $reg_user=null;
               $reg_user = $this->Reg_user->create($data, $reg_user);
               //$data["Mensaje"] = $reg_user;
               if(isset($reg_user)){  
                   if($rfc==''){
                        $rfc=null;
                    } 
                    $data_comercio = array(
                        'usuario_id'=>$reg_user,
                        //'negocio_persona'=>$regimen,
                        'negocio_rfc' => $rfc,                 
                    );
                $reg_comerce = $this->Reg_user->create_comerce($data_comercio);
                if($reg_comerce){
                    $exit=array(
                        "response_code" => 200, 
                        "response_type" => 'success',
                        "message" => "registrado satisfactoriamente"
                    );
                    
                    $newconsult = $this->Comercio_model->newget_registro();
                    $data_mail=$this->Notificacion_model->get_notificacion("1");
                    $string=$data_mail->titulo;
                    $data_mail->titulo=str_replace('%NOMBRE%', $data["nombre"], $string);
                        //$email_array=array(1=>"j.lipe.cacino@gmail.com", 2=>"jfelipe.garc@gmail.com"); 
                    $string=$data_mail->callback_users;
                    $data_mail->callback_users=str_replace('$regsitro$', $newconsult->registros, $string);
                    
                    send_mail(
                        'ENLACE-CANACO' , //Quien lo envia
                        $data["email_auth"], //destinatario
                        $data_mail->titulo, //asunto
                        $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
                        $attach = NULL //adjunto
                    );
                }else{
                    $exit=array(
                        "response_code" => 500, 
                        "response_type" => 'error',
                        "message" => $reg_comerce
                    );
                }
            }else{
                $exit=array(
                    "response_code" => 500, 
                    "response_type" => 'error',
                    "message" => $reg_user
                );
            } 
        }else{
            $exit=array(
                "response_code" => 401, 
                "response_type" => 'warning',
                "message" => "El E-mail que intentas registrar ya ha sido utilizado "
            );

        }

    }else {

        $exit=array(
            "response_code" => 403, 
            "response_type" => 'error',
            "message" => 'Todos los campos deben ser llenados'
        );
    }
    echo json_encode($exit);
}










        public function registroafiliador(){
            $this->form_validation->set_rules('empleado', 'empleado', 'trim|required'); 
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email'); 
            $this->form_validation->set_rules('user', 'user', 'trim|required|max_length[70]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[16]');
            if ($this->form_validation->run()) {
                $clave_empleado =  $this->input->post('empleado');
                $user = $this->input->post('user');
                $password = $this->input->post('password');
                $email = $this->input->post('email');

                $data = array(
                    'rol_id'=>"14",
                    'estatus_id'=>3,
                    'nombre' => $user,
                    'password' => md5($password),
                    'email_auth' => $email,
                    'fecha_creacion'=>date('Y-m-d H:i:s') ,  
                    'jefe_afiliador' => $this->usuario_id,
                    'clave_empleado' =>$clave_empleado ,
                );
                $user_mail=$data["email_auth"];   
                $new_mail=  $this->Reg_user->check_mail($user_mail);
                if($new_mail){
                $reg_user=null;
                $reg_user = $this->Reg_user->create($data, $reg_user);
                $exit=array(
                    "response_code" => 200, 
                    "response_type" => 'success',
                    "message" => "Afiliador creado"
                );
                
                //$data["Mensaje"] = $reg_user; 
                }else{
                    $exit=array(
                        "response_code" => 401, 
                        "response_type" => 'warning',
                        "message" => "El E-mail que intentas registrar ya ha sido utilizado "
                    );
                }   
            }else {
                $exit=array(
                    "response_code" => 403, 
                    "response_type" => 'error',
                    "message" => 'Todos los campos deben ser llenados'
                );
            }
            echo json_encode($exit);
            }





            public function registrotractora(){
                $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email'); 
                $this->form_validation->set_rules('user', 'user', 'trim|required|max_length[70]');
                $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[16]');
        
                if ($this->form_validation->run()) {
                    $user = $this->input->post('user');
                    $password = $this->input->post('password');
                    $email = $this->input->post('email');
                    $regimen=$this->input->post('regimen'); 
        
                    $data = array(
                        'rol_id'=>"19",
                        'estatus_id'=>3,
                        'nombre' => $user,
                        'password' => md5($password),
                        'email_auth' => $email,
                        'fecha_creacion'=>date('Y-m-d H:i:s') ,
                        'afiliador'=> $this->usuario_id ,  
                    );
                    $user_mail=$data["email_auth"];   
                    $new_mail=  $this->Reg_user->check_mail($user_mail);
                    if($new_mail){
                       $reg_user=null;
                       $reg_user = $this->Reg_user->create($data, $reg_user);
                       //$data["Mensaje"] = $reg_user;
                       if(isset($reg_user)){    
                        $data_comercio = array(
                            'usuario_id'=>$reg_user,
                            'negocio_persona'=>$regimen,                 
                        );
                        $reg_comerce = $this->Reg_user->create_comerce($data_comercio);
                        if($reg_comerce){
                            $exit=array( 
                                "response_code" => 200, 
                                "response_type" => 'success',
                                "message" => "registrado satisfactoriamente"
                            );
                            
                            $newconsult = $this->Comercio_model->newget_registro();
                            $data_mail=$this->Notificacion_model->get_notificacion("1");
                            
                            $string=$data_mail->titulo;
                            $data_mail->titulo=str_replace('%NOMBRE%', $data["nombre"], $string);
                            $string=$data_mail->callback_users;
                            $data_mail->callback_users=str_replace('$regsitro$', $newconsult->registros, $string);
                                //$email_array=array(1=>"j.lipe.cacino@gmail.com", 2=>"jfelipe.garc@gmail.com");
                            
                            
                            send_mail(
                                'ENLACE-CANACO' , //Quien lo envia
                                $data["email_auth"], //destinatario
                                $data_mail->titulo, //asunto
                                $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
                                $attach = NULL //adjunto
                            );
                        }else{
                            $exit=array(
                                "response_code" => 500, 
                                "response_type" => 'error',
                                "message" => $reg_comerce
                            );
                        }
                    }else{
                        $exit=array(
                            "response_code" => 500, 
                            "response_type" => 'error',
                            "message" => $reg_user
                        );
                    } 
                }else{
                    $exit=array(
                        "response_code" => 401, 
                        "response_type" => 'warning',
                        "message" => "El E-mail que intentas registrar ya ha sido utilizado "
                    );
        
                }
        
            }else {
        
                $exit=array(
                    "response_code" => 403, 
                    "response_type" => 'error',
                    "message" => 'Todos los campos deben ser llenados'
                );
            }
            echo json_encode($exit);
        }






}
/* End of file Afiliador_comercial.php */




/* Location: ./application/controllers/Afiliador_comercial.php */

