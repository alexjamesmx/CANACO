<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consejero extends CI_Controller
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
        $this->load->model('Gfe_afiliador');
        $this->load->model('jefe_afiliador_model');
        $this->load->model('comercio_model');
        $this->load->model('Afiliador_model');
        $this->load->model('Reg_user');
        $this->load->model('Prueba_model_f');
        $this->load->model('Consejero_model');
        $this->load->model('accounts_model');
        $this->load->model('Notificacion_model');
        $this->load->model('Model_afiliador_comercio');
        $this->load->model('Comercio_model');
    }

    function index()
    {
    }
    function newafilcomercio()
    {
        
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 230
        );
        
        $data['datos'] = $this->Afiliador_model->get_actividades();
        $data['comercios'] = $this->Afiliador_model->get_comercios(
            $this->usuario_id
        );

        $data['styles'][] = 'vendor/component-custom-switch.min';
        $data['styles'][] = '../../admin/percircle/percircle';
        $data['styles'][] = 'vendor/select2.min';
        $data['styles'][] = 'vendor/select2-bootstrap.min';
        $data['styles'][] = 'vendor/bootstrap-tagsinput';
        $data['scripts'][] = 'vendor/datatables.min';
        $data['scripts'][] = 'vendor/jquery.mask.min';
        $data['scripts'][] = 'vendor/select2.full';
        $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
        $data['scripts'][] = 'app/private/modules/modales';
        $data['scripts'][] = 'app/private/modules/myaccount';
        $data['scripts'][] = '../../admin/percircle/percircle';
        $data['scripts'][] = 'app/private/modules/afiliador_pro';
        $data['scripts'][] = 'app/private/modules/afiliador';
        $data['scripts'][] = 'app/private/modules/actualizar_afiliador';
        // $data['scripts'][] = 'app/private/modules/jey_afiliador';

        $data['modals'][] = $this->load->view(
            'app/private/fragments/modules/config/addkeywords_m',
            $data,
            true
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Nuevo comercio';

        $data['_APP_MENU'] = get_role_menu($this->rol_id, 2);
        $data['_APP_NAV'] = $this->load->view(
            'app/private/fragments/nav/main_nav',
            $data,
            true
        );
        $data['_APP_VIEW_MENU'] = $this->load->view(
            'app/private/fragments/menu/main_menu',
            $data,
            true
        );
        $data['_APP_BREADCRUMBS'] = ['Nuevo comercio'];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/consejeros/newcomercio_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
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
                'id_consejero'=> $this->usuario_id ,  
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
                    
                    $resultado_consult = $this->Comercio_model->newget_registro();
                    $data_mail=$this->Notificacion_model->get_notificacion("1");
                    $string=$data_mail->titulo;
                    $data_mail->titulo=str_replace('%NOMBRE%', $data["nombre"], $string);
                        //$email_array=array(1=>"j.lipe.cacino@gmail.com", 2=>"jfelipe.garc@gmail.com");
                    $string=$data_mail->callback_users;
                    $data_mail->callback_users=str_replace('$regsitro$', $resultado_consult->registros, $string);
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
    function acumulados()
    {
        $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 231);
        $data = array();
        $data['stylescdn'][] =
        'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
        'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

        $data['scripts'][] = 'app/private/modules/controladortabla';
    
        $data['_APP_TITLE']              = "Afiliaciones acumuladas";        
        $data['_APP_VIEW_NAME']          = "Afiliaciones acumuladas";
        
        
        $data['comercios']=$this->contaduria_model->get_afiliados();
        $data['scripts'][] = 'app/private/modules/seguimiento_conta';
        

        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Afiliaciones acumuladas");
        $data['_APP_FRAGMENT']           = $this->load->view('app/private/fragments/modules/contaduria/afilacumu_f', $data, TRUE);
        $this->load->view('app/private/main_view', $data, FALSE);
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
                            $usuario_Registrad = $this->Consejero_model->id_negocio_registrado(
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
                    $RFC                 = $this->input->post('RFC');

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
                        "negocio_rfc"                       =>  $RFC,
                        "negocio_calle"                     => $calle,
                        "negocio_colonia"                   => $colonia,
                        "negocio_numero_ex"                 => $exterior,
                        "negocio_numero_int"                => $interior,
                        "negocio_cp"                        => $cp,
                        
                    );

                    $usuario_Registrad = $this->Consejero_model->id_negocio_registrado(
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


}