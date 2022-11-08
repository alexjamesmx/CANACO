<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AfiliadorComercioUsuario extends CI_Controller
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
        $this->load->model('Model_afiliador_comercio');
        $this->load->model('comercio_model');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    /**
     * [new description]
     * @return [type] [description]
     */
    public function doupdate()
    {
   
            // segundo formulario 
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
            $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required');
            $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
            $this->form_validation->set_rules('telefono_auth', 'telefono_auth', 'trim|required');
            $this->form_validation->set_rules('telefono_auth_c', 'telefono_auth_c', 'trim|required|matches[telefono_auth]');
            $this->form_validation->set_rules('email_auth', 'email_auth', 'trim|required|valid_email');
            $this->form_validation->set_rules('email_auth_c', 'email_auth_c', 'trim|required|matches[email_auth]');
           
            // tercer formulario 
            $this->form_validation->set_rules('email_compras', 'email_compras', 'trim|required');
            $this->form_validation->set_rules('nombre_compras', 'nombre_compras', 'trim|required');
            $this->form_validation->set_rules('numero_compras', 'numero_compras', 'trim|required');
           

            // cuarto formulario 
            $this->form_validation->set_rules('email_ventas', 'email_ventas', 'trim|required');
            $this->form_validation->set_rules('nombre_ventas', 'nombre_ventas', 'trim|required');
            $this->form_validation->set_rules('numero_ventas', 'numero_ventas', 'trim|required');
            $this->form_validation->set_rules('whatps_ventas', 'whatps_ventas', 'trim|required');

            if ($this->form_validation->run() && $this->input->is_ajax_request()) {
               
                    $nombre        = $this->input->post('nombre');
                    $apellido1     = $this->input->post('apellido1');
                    $apellido2     = $this->input->post('apellido2');
                    $telefono_auth = $this->input->post('telefono_auth');
            
                $email_compras = $this->input->post('email_compras');
                $nombre_compras = $this->input->post('nombre_compras');
                $numero_compras = $this->input->post('numero_compras');
                $email_ventas = $this->input->post('email_ventas');
                $nombre_ventas = $this->input->post('nombre_ventas');
                $numero_ventas = $this->input->post('numero_ventas');
                $whatps_ventas = $this->input->post('whatps_ventas');
              

                $calle         = $this->input->post('calle');
                $colonia       = $this->input->post('colonia');
                $exterior      = $this->input->post('exterior');
                $interior      = $this->input->post('calle');                
                $cp            = $this->input->post('cp');



                $arra_usu = array(
                    "nombre"          => $nombre,
                    "apellido1"       => $apellido1,
                    "apellido2"       => $apellido2,
                    "telefono_auth"   => limpia_telefono($telefono_auth),
                    "fecha_umod"      => date('Y-m-d H:i:s'),     
                );

                $arr_comercio = array(                     
                    "negocio_comp_correo"               => $email_compras,
                    "negocio_comp_nombre"               => $nombre_compras,
                    "negocio_comp_numero"               => limpia_telefono($numero_compras),
                    "negocio_vent_correo"               => $email_ventas,
                    "negocio_vent_nombre"               => $nombre_ventas,
                    "negocio_vent_numero"               => limpia_telefono($numero_ventas),
                    "negocio_vent_whatsp"               => limpia_telefono($whatps_ventas),
       
                    "negocio_calle"                     => $calle,
                    "negocio_colonia"                   => $colonia,
                    "negocio_numero_ex"                 => $exterior,
                    "negocio_numero_int"                => $interior,
                    "negocio_cp"                        => $cp,
                    
                );

                $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                    $this->usuario_id
                );
      
                //obtenemos el id del negocio
                $comercios = $this->comercio_model->get_comercio_usuario(
                    $usuario_Registrad->usuario_id
                 );
                 $comercio  = $comercios->negocio_id;

                /*En caso de insertar correctamente*/
                if($this->accounts_model->check_phone(limpia_telefono($telefono_auth),$this->usuario_id))
                {
                    $update_account = $this->accounts_model->edit( $usuario_Registrad->usuario_id, $arra_usu);
                    if ($update_account) { 
                        // echo json_encode(
                        //     array(
                        //         "response_code" => 200,
                        //         "response_type" => 'success',
                        //         "message"       => "Cuenta actualizado satisfactoriamente",
                        //     )
                        // );
                        $update_comercio = $this->Model_afiliador_comercio->edit( $usuario_Registrad->usuario_id, $arr_comercio);
                        if ($update_account) { 
                            echo json_encode(
                                array(
                                    "response_code" => 200,
                                    "response_type" => 'success',
                                    "message"       => "Cuenta actualizado satisfactoriamente",
                                )
                            );
                            }
                            /*Si no podemos editar y el modelo retorna una excepcion*/
                            else {
                                echo json_encode(
                                    array(
                                        "response_code" => 500,
                                        "response_type" => 'error',
                                        "message"       => $update_account,
                                    )
                                );
                            }
                    } 
                } else
                {
                    echo json_encode([
                        'response_code' => 403,
                        'response_type' => 'error',
                        'message' => 'Número de teléfono no valido',
                    ]);
                }
           
                   
        }
        else {
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

    /**
     * [new description]
     * @return [type] [description]
     */
 


    public function infor_personal()
    {
        

            // segundo formulario 
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
            $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required');
            $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
            $this->form_validation->set_rules('telefono_auth', 'telefono_auth', 'trim|required');
            $this->form_validation->set_rules('telefono_auth_c', 'telefono_auth_c', 'trim|required|matches[telefono_auth]');
            $this->form_validation->set_rules('email_auth', 'email_auth', 'trim|required|valid_email');
            $this->form_validation->set_rules('email_auth_c', 'email_auth_c', 'trim|required|matches[email_auth]');
           

            if ($this->form_validation->run() && $this->input->is_ajax_request()) 
            {
                
                            $nombre        = $this->input->post('nombre');
                            $apellido1     = $this->input->post('apellido1');
                            $apellido2     = $this->input->post('apellido2');
                            $telefono_auth = $this->input->post('telefono_auth');

                        $arra_usu = array(
                            "nombre"          => $nombre,
                            "apellido1"       => $apellido1,
                            "apellido2"       => $apellido2,
                            "telefono_auth"   => limpia_telefono($telefono_auth),
                            "fecha_umod"      => date('Y-m-d H:i:s'),     
                        );
                
                        $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                            $this->usuario_id
                        );
                        
                        //obtenemos el id del negocio
                        $comercios = $this->comercio_model->get_comercio_usuario(
                            $usuario_Registrad->usuario_id
                        );
                        $comercio  = $comercios->negocio_id;

                        /*En caso de insertar correctamente*/
                     $update_account = $this->accounts_model->edit( $usuario_Registrad->usuario_id, $arra_usu);
                        if ($update_account) { 
                            echo json_encode(
                                array(
                                    "response_code" => 200,
                                    "response_type" => 'success',
                                    "message"       => "Cuenta actualizado satisfactoriamente",
                                )
                            );
                        }

                        /*Si no podemos editar y el modelo retorna una excepcion*/
                        else {
                            echo json_encode(
                                array(
                                    "response_code" => 500,
                                    "response_type" => 'error',
                                    "message"       => $update_account,
                                )
                            );
                        }
            

          
        }
                /*Si la validación de campos es incorrecta*/
                else {
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



    public function upnegocio() {
     
            
            $this->form_validation->set_rules('nombre_comercio', 'nombre_comercio', 'trim|required');
            $this->form_validation->set_rules('razon', 'razon', 'trim|required' );
            // $this->form_validation->set_rules('fiscales', 'fiscales', 'trim|required');
            // $this->form_validation->set_rules('RFC', 'RFC', 'trim|required');
            // $this->form_validation->set_rules('CRFC', 'CRFC', 'trim|required|matches[RFC]');
             if ($this->form_validation->run() && $this->input->is_ajax_request()) {

                                $nombre_comercio     = $this->input->post('nombre_comercio');
                                $razon               = $this->input->post('razon');
                                $fiscal              = $this->input->post('fiscales');
                                $RFC                 = $this->input->post('RFC');
                                $patronal            = $this->input->post('patronal');
                                $clave               = $this->usuario_id;
                                $calle         = $this->input->post('calle');
                                $colonia       = $this->input->post('colonia');
                                $exterior      = $this->input->post('exterior');
                                $interior      = $this->input->post('calle');                
                                $cp            = $this->input->post('cp');
                                $municipio     = $this->input->post('municipio');

                                $arr_update = array(                      
                                    "negocio_nombre"                    =>  $nombre_comercio,
                                    "negocio_persona"                   =>  $fiscal,
                                    "negocio_razon"                     =>  $razon,
                                    "negocio_rfc"                       =>  $RFC,
                                    "negocio_municipio"                 =>  $municipio,
                                    "negocio_calle"                     => $calle,
                                    "negocio_colonia"                   => $colonia,
                                    "negocio_numero_ex"                 => $exterior,
                                    "negocio_numero_int"                => $interior,
                                    "negocio_cp"                        => $cp,
                                    "registro_patronal"                 => $patronal
                                    
                                );
                                $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                                    $this->usuario_id
                                );
                                
                                $comercios = $this->comercio_model->get_comercio_usuario(
                                    $usuario_Registrad->usuario_id
                                 );
                                 $comercio  = $comercios->negocio_id;
                
                /*En caso de insertar correctamente*/
                $insert_negocio = $this->Prueba_model_f->up_negocio($usuario_Registrad->usuario_id,$arr_update);
                        if ($insert_negocio) {
                            $d=  array(
                                    "response_code" => 200, 
                                    "response_type" => 'success',
                                    "message" => "Negocio actualizado satisfactoriamente",
                            );
                            
                        }
                        /*Si no podemos editar y el modelo retorna una excepcion*/
                        else {
                            
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
                        $d =   array(
                                "response_code" => 403, 
                                "response_type" => 'error',
                                "message" => 'Bad Request',
                            );
                        
                    }
    
        echo json_encode($d);

    }



    public function updates_afiliador()
    {
        $usuario_id      = $this->input->post('usuario_id');
        $afiliado     = $this->input->post('afiliado');                
     
        $fecha_actual = date("Y-m-d");
        $comercio_id  = get_comercio_id($usuario_id);
        $arr_update = array(                      
            "afiliador"                    =>  $afiliado,
            
        );
        $arr_insert_historial = array(                      
            "usuario_id"                   =>   $usuario_id,
            "afiliador"                    =>   $afiliado,
            "date_historico"                         =>   $fecha_actual,
            "comercio_id"                     =>   $comercio_id,
        );
   
        $usuario_Registrad = $this->comercio_model->updateafiliador(
            $usuario_id,
            $arr_update
        );
        $subir = $this->comercio_model->insert_historial(
            $arr_insert_historial
        );
        echo json_encode([
            'response_code' => 200,
            'response_type' => 'success',
            'message' => 'Tu reasignacion fue un exito',
        ]);
    
    }
    public function baja_afiliador()
    {
        $usuario_id      = $this->input->post('afiliador');
                   
     
        $arr_update = array(                      
            "estatus_id"                    =>  4,
            
        );
        $baja = $this->comercio_model->baja_usu(
            $usuario_id,
            $arr_update
        );
        
        echo json_encode([
            'response_code' => 200,
            'response_type' => 'success',
            'message' => 'El usuario fue desactivado con éxito',
        ]);
    
    }
    public function alta_afiliador()
    {
        $usuario_id      = $this->input->post('afiliador');
                
        $arr_update = array(                      
            "estatus_id"                    =>  3,
        );
        $baja = $this->comercio_model->baja_usu(
            $usuario_id,
            $arr_update
        );
        
        echo json_encode([
            'response_code' => 200,
            'response_type' => 'success',
            'message' => 'Tu activación fue un éxito',
        ]);
    
    }
    public function actualizar_afiliador()
    {
        $usuario_id =   $this->input->post('usuario_id');
        $nombre      = $this->input->post('nombre');
        $apellido1      = $this->input->post('apellido1');
        $apellido2      = $this->input->post('apellido2');
        $telefono_auth      = $this->input->post('telefono_auth');
        $email_auth         = $this->input->post('email_auth');


        $arr_update_user = array(                      
            "nombre"                    =>  $nombre,
            "apellido1"                    =>  $apellido1,
            "apellido2"                    =>  $apellido2,
            "telefono_auth"                =>limpia_telefono($telefono_auth),
            "email_auth"                =>$email_auth,
        );

     
     
                $update = $this->comercio_model->actualizar_afiliador(
                    $usuario_id,
                    $arr_update_user
                );
                
                echo json_encode([
                    'response_code' => 200,
                    'response_type' => 'success',
                    'message' => 'Tu reasignacion fue un exito',
                ]);        
            
            
    }

    public function uptractora() {
     
            
        $this->form_validation->set_rules('nombre_comercio', 'nombre_comercio', 'trim|required');
        $this->form_validation->set_rules('razon', 'razon', 'trim|required' );
        $this->form_validation->set_rules('fiscales', 'fiscales', 'trim|required');
        $this->form_validation->set_rules('RFC', 'RFC', 'trim|required');
        $this->form_validation->set_rules('CRFC', 'CRFC', 'trim|required|matches[RFC]');
         if ($this->form_validation->run() && $this->input->is_ajax_request()) {

                            $nombre_comercio     = $this->input->post('nombre_comercio');
                            $razon               = $this->input->post('razon');
                            $fiscal              = $this->input->post('fiscales');
                            $RFC                 = $this->input->post('RFC');
                            $clave               = $this->usuario_id;
                            $calle         = $this->input->post('calle');
                            $colonia       = $this->input->post('colonia');
                            $exterior      = $this->input->post('exterior');
                            $interior      = $this->input->post('calle');                
                            $cp            = $this->input->post('cp');
                            $municipio     = $this->input->post('municipio');

                            $arr_update = array(                      
                                "negocio_nombre"                    =>  $nombre_comercio,
                                "negocio_persona"                   =>  $fiscal,
                                "negocio_razon"                     =>  $razon,
                                "negocio_rfc"                       =>  $RFC,
                                "negocio_municipio"                 =>  $municipio,
                                "negocio_calle"                     => $calle,
                                "negocio_colonia"                   => $colonia,
                                "negocio_numero_ex"                 => $exterior,
                                "negocio_numero_int"                => $interior,
                                "negocio_cp"                        => $cp,
                                
                            );
                            $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                                $this->usuario_id
                            );
                            
                            $comercios = $this->comercio_model->get_comercio_usuario(
                                $usuario_Registrad->usuario_id
                             );
                             $comercio  = $comercios->negocio_id;
            
            /*En caso de insertar correctamente*/
            $insert_negocio = $this->Prueba_model_f->up_negocio($usuario_Registrad->usuario_id,$arr_update);
                    if ($insert_negocio) {
                        $d=  array(
                                "response_code" => 200, 
                                "response_type" => 'success',
                                "message" => "Negocio actualizado satisfactoriamente",
                        );
                        
                    }
                    /*Si no podemos editar y el modelo retorna una excepcion*/
                    else {
                        
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
                    $d =   array(
                            "response_code" => 403, 
                            "response_type" => 'error',
                            "message" => 'Bad Request',
                        );
                    
                }

    echo json_encode($d);

}

public function data_personal_tractora()
{

        // segundo formulario 
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
        $this->form_validation->set_rules('apellido1', 'apellido1', 'trim|required');
        $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
        $this->form_validation->set_rules('telefono_auth', 'telefono_auth', 'trim|required');
        $this->form_validation->set_rules('telefono_auth_c', 'telefono_auth_c', 'trim|required|matches[telefono_auth]');
        $this->form_validation->set_rules('email_auth', 'email_auth', 'trim|required|valid_email');
        $this->form_validation->set_rules('email_auth_c', 'email_auth_c', 'trim|required|matches[email_auth]');
       
        if ($this->form_validation->run() && $this->input->is_ajax_request()) {
           
                $nombre        = $this->input->post('nombre');
                $apellido1     = $this->input->post('apellido1');
                $apellido2     = $this->input->post('apellido2');
                $telefono_auth = $this->input->post('telefono_auth');

            $arra_usu = array(
                "nombre"          => $nombre,
                "apellido1"       => $apellido1,
                "apellido2"       => $apellido2,
                "telefono_auth"   => limpia_telefono($telefono_auth),
                "fecha_umod"      => date('Y-m-d H:i:s'),     
            );


            $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                $this->usuario_id
            );
            //obtenemos el id del negocio
            $comercios = $this->comercio_model->get_comercio_usuario(
                $usuario_Registrad->usuario_id
             );
             $comercio  = $comercios->negocio_id;

            /*En caso de insertar correctamente*/
            $update_account = $this->accounts_model->edit( $usuario_Registrad->usuario_id, $arra_usu);
           
              
                if ($update_account) { 
                    echo json_encode(
                        array(
                            "response_code" => 200,
                            "response_type" => 'success',
                            "message"       => "Cuenta actualizado satisfactoriamente",
                        )
                    );
                    }
                    /*Si no podemos editar y el modelo retorna una excepcion*/
                    else {
                        echo json_encode(
                            array(
                                "response_code" => 500,
                                "response_type" => 'error',
                                "message"       => $update_account,
                            )
                        );
                    }
       
            }   else {
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
        public function actualizar_tractora()
        {
            $clave_tractora =   $this->input->post('usuario_id');
            $nombre      = $this->input->post('nombre');
            $razon      = $this->input->post('razon');
            $rfc      = $this->input->post('rfc');
            // $comercio_x_usuario   = get_comercio_id($clave_tractora);
            $arr_update_comercio_tractora = array(                      
                "negocio_nombre"                    =>  $nombre,
                "negocio_persona"                    =>  $razon,
                "negocio_razon"                    =>  $rfc,
            );
                    $update = $this->comercio_model->actualizar_comercio(
                        $clave_tractora,
                        $arr_update_comercio_tractora
                    );
                    
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' => 'Tu reasignacion fue un exito',
                    ]);        
                
                
        }

// -------------
// |           |
// |           |
// |           |
// |           |
// |          ||
// |||||||||||||



























    }

    /* End of file AfiliadorComercioUsuario.php */
    /* Location: ./application/controllers/app/AfiliadorComercioUsuario.php */
