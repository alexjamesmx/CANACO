<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Afiliacion extends CI_Controller
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
        $this->rol_id = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');
      
        $this->load->model('afiliacion_modal');
        $this->load->model('Recompensas_model');
        $this->load->model('Notificacion_model');
        

    }
/**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
    }

    public function afiliacion_complet($id)
    {
        $fecha_actual = date("Y-m-d");
        $fin  =  date("Y-m-d",strtotime($fecha_actual."+ 1 year"));
        $resultados = $this->afiliacion_modal->get_afiliados($id);
                if ($resultados->afiliador_alta == null)
                {
                        if($resultados->afiliador == null)
                        {
                            // aqui va cuando el usuario se registro solo y mandamos el 1
                            $arr_update = array(
                                "estatus"           => 26,  
                                "inicio_afiliacion" => $fecha_actual,
                                "fin_afiliacion"    => $fin,
                                "comafil_id"        => 1,
                            );   
                        }else
                        {
                            //alguien te fue a viisitar y te afilian  ya tienes una cuenta mandamos un 2 
                            $arr_update = array(
                                "estatus"           => 26,  
                                "inicio_afiliacion" => $fecha_actual,
                                "fin_afiliacion"    => $fin,
                                "comafil_id"        => 2,
                                'estatus_comision'  => 28

                            );
                        }
                }else
                {
                    if($resultados->afiliador = null)
                    {
                        // aqui va cuando el usuario lo registraron y pero el se afilio se convierte en una conversión
                        $arr_update = array(
                            "estatus"           => 26,  
                            "inicio_afiliacion" => $fecha_actual,
                            "fin_afiliacion"    => $fin,
                            "comafil_id"        => 1,
                             'estatus_comision'  => 28
                        );   
                    }else
                    {
                        //alguien te fue a viisitar y te insertan la afiliacion es un 15% y te mando un 3 
                        $arr_update = array(
                            "estatus"           => 26,  
                            "inicio_afiliacion" => $fecha_actual,
                            "fin_afiliacion"    => $fin,
                            "comafil_id"        => 3,
                            'estatus_comision'  => 28
                        );
                    }

                }   
                $arr_comercio = array(
                    "afiliado_canaco"    => 1,
                    );
                    
                $validacion_archivos = $this->afiliacion_modal->validar_validacion($id,$arr_update);
                    
                $this->afiliacion_modal->afiliar_comercio($resultados->usuario,$arr_comercio);
                $insignia=5;
        
    
               

                $usuarios = $this->afiliacion_modal->correo_nombre_users($resultados->usuario);
                $data_insignia = array(
                    "usuario" => $usuarios->usuario_id,
                    "insignia" => 5,  
                ); 
              $this->Recompensas_model->insert_recompensas($data_insignia);
              $data_mail = $this->Notificacion_model->get_notificacion("41");
              $string=$data_mail->titulo;
              $data_mail->titulo=str_replace('%NOMBRE%', $this->session->userdata('nombre').' '.$this->session->userdata('apellido1'), $string);
              
             
      $reqs = $this->Notificacion_model->reqpd();
      $string3=$data_mail->llamado_accion;
      $data_mail->llamado_accion=str_replace('%publicados%', $reqs, $string3);

      
      $reqsr = $this->Notificacion_model->reqpdrs();
      $porcentajehoy=($reqsr/$reqs)*100;
      $string4=$data_mail->llamado_accion;
      $data_mail->llamado_accion=str_replace('%porcentaje%', $porcentajehoy, $string4);
                    send_mail(
                      'ENLACE-CANACO' , //Quien lo envia
                      $usuarios->email_auth , //destinatario
                      $data_mail->notificacion, //asunto 
                      $html = ( $this->load->view('app/private/components/notificacion_100por' , $data_mail,true)),//Cuerpo (puede ser una vista) 
                      $attach = NULL //adjunto
                    );
             
            


                $d =    array(
                    "response_code" => 200, 
                    "response_type" => 'success',
                    "message" => $validacion_archivos ,
                );  
        echo json_encode($d);
    }

    public function afiliacion_negada($id)
    {

        $fecha_actual = date("Y-m-d");
        $resultados = $this->afiliacion_modal->get_afiliados($id);
                        $arr_update = array(
                            "validacion_pago"   => null,
                            "estatus"           => 24,  
                            "inicio_afiliacion" => null,
                            "fin_afiliacion"    => null,
                            "comafil_id"        => null,
                        );
                        $arr_insert_historico = array(
                            "usuario_id"    => $resultados->usuario,
                            "afiliacion_id" => $id,  
                            "estatus"       => $resultados->estatus,
                            "fecha"         => $fecha_actual,
                        );
                   
        $validacion_archivos = $this->afiliacion_modal->validar_validacion($id,$arr_update);
        $historico = $this->afiliacion_modal->historial($arr_insert_historico);
                $d =    array(
                    "response_code" => 200, 
                    "response_type" => 'success',
                    "message" => $validacion_archivos ,
                );  
        echo json_encode($d);
    }
    


}
//culeamos?
/* End of file Afiliacion.php */
/* Location: ./application/controllers/app/Afiliacion.php *