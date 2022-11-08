<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Recompensas extends CI_Controller

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
        $this->load->helper('download');
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');       
        $this->load->model('Recompensas_model');
        $this->load->model('Notificacion_model');
        // $this->load->model('mupload');
    }
    /**
     * [index description]
     * @return [type] [description]
     */

     public function medallas(){

        $medallas=$this->Recompensas_model->medallas();
        $data['medallas']=$medallas;
 
    }
    public function insignia(){
 
        $medallas=$this->Recompensas_model->insignia();
        $data['medallas']=$medallas;
     
    }
    public function recompesas(){

        $medallas=$this->Recompensas_model->recompesas();
        $data['medallas']=$medallas;
     
    }

    public function insertMedalla($medalla){        
        if($this->Recompensas_model->validar_medallas())
        {
            
        }else
        {
            $data = array(
                "usuario" => 186,
                "medalla" => 6,  
            ); 

          $this->Recompensas_model->recompesas();
        }
    }

    public function medalla6()
        {
            $medalla=6;
            if($this->Recompensas_model->validar_medallas($this->usuario_id,$medalla))
            {
                //CUANDO YA TIENE UNA MEDALLA 
                $respuesta = array(
                    
                    "response_type" => 'complete',
                    "message"       => 'd',

                );
            }else
            {
                $hoy = date("Ymd");
            
                // CUANDO NO TENEMOS MEDALLA
                $data = array(
                    "usuario" => $this->usuario_id,
                    "medalla" => 6,  
                    "date_win" =>$hoy,
                    "estatus"  =>0,
                );
                $respuesta = array(
                    "response_type" => 'complete',
                    "message"       => 'Felicidades por tu nueva medalla',

                );
              $this->Recompensas_model->insert_recompensas($data);

              $data_mail = $this->Notificacion_model->get_notificacion("32");
              $string=$data_mail->titulo;
              $data_mail->titulo=str_replace('%NOMBRE%', $this->session->userdata('nombre').' '.$this->session->userdata('apellido1'), $string);
                    send_mail(
                      'ENLACE-CANACO' , //Quien lo envia
                      $this->session->userdata('email_auth') , //destinatario
                      $data_mail->notificacion, //asunto 
                      $html = ( $this->load->view('app/private/components/notificacion_100por' , $data_mail,true)),//Cuerpo (puede ser una vista) 
                      $attach = NULL //adjunto
                    );
            }   
            
            echo json_encode($respuesta);
        }

        public function medalla8()
        {
            $medalla=8;
            if($this->Recompensas_model->validar_medallas($this->usuario_id,$medalla))
            {
                //CUANDO YA TIENE UNA MEDALLA 
                $respuesta = array(
                    
                    "response_type" => 'complete',
                    "message"       => 'd',

                );
            }else
            {
                $hoy = date("Ymd");     
                // CUANDO NO TENEMOS MEDALLA
                $data = array(
                    "usuario" => $this->usuario_id,
                    "medalla" => $medalla,  
                    "date_win" =>$hoy,
                    "estatus"  =>0,
                );
                $respuesta = array(
                    "response_type" => 'complete',
                    "message"       => 'Felicidades por tu nueva medalla',
                );
                
              $this->Recompensas_model->insert_recompensas($data);
              $data_mail = $this->Notificacion_model->get_notificacion("33");
              $string=$data_mail->titulo;
              $data_mail->titulo=str_replace('%NOMBRE%', $this->session->userdata('nombre').' '.$this->session->userdata('apellido1'), $string);
                    send_mail(
                      'ENLACE-CANACO' , //Quien lo envia
                      $this->session->userdata('email_auth') , //destinatario
                      $data_mail->notificacion, //asunto 
                      $html = ( $this->load->view('app/private/components/notificacion_100por' , $data_mail,true)),//Cuerpo (puede ser una vista) 
                      $attach = NULL //adjunto
                    );
            }   
            
            echo json_encode($respuesta);
        }
 }



 /* End of file Myaccount.php */

 /* Location: ./application/controllers/app/Recompensas.php */

