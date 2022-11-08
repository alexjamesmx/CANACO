<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reg_user');
        $this->load->model('Notificacion_model');
        $this->load->model('Mensaje_model');
        $this->load->model('Comercio_model');
    }
    public function index()
    {
    }

    public function registro()
    {
        $this->form_validation->set_rules('user', 'user', 'trim|required|max_length[70]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('rfc', 'rfc', 'trim|required|max_length[13]');
        if ($this->form_validation->run() && $this->input->is_ajax_request()) {
            $user = $this->input->post('user');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $rfc = $this->input->post('rfc');

            // $regimen=$this->input->post('regimen'); 
            $data = array(
                'rol_id' => "2",
                'estatus_id' => 3,
                'nombre' => $user,
                'password' => md5($password),
                'email_auth' => $email,
                'fecha_creacion' => date('Y-m-d H:i:s'),
            );
            $user_mail = $data["email_auth"];
            $new_mail =  $this->Reg_user->check_mail($user_mail);
            if ($new_mail) {

                $reg_user = null;
                $reg_user =  $this->Reg_user->create($data, $reg_user);
                $tmp = [];
                $tmp['reg_user'] = $reg_user;

                send_mail(
                    'ENLACE-CANACO', //Quien lo envia
                    $data["email_auth"], //destinatario
                    "CANACO - Confirmar registro ", //asunto
                    $html = ($this->load->view('app/private/components/noti_validar_correo', $tmp, true)), //Cuerpo (puede ser una vista) 
                    $attach = NULL //adjunto
                );
                if (isset($reg_user)) {
                    if ($rfc == '') {
                        $rfc = null;
                        $regimen = null;
                    } else if (strlen($rfc) == 12) {
                        $regimen = 'moral';
                    } else if (strlen($rfc) == 13) {
                        $regimen = 'fisica';
                    }

                    $data_comercio = array(
                        'usuario_id' => $reg_user,
                        'negocio_persona' => $regimen,
                        'negocio_rfc' => $rfc,
                    );

                    $reg_comerce = $this->Reg_user->create_comerce($data_comercio);
                    if ($reg_comerce) {
                        $exit = array(
                            "response_code" => 200,
                            "response_type" => 'success',
                            "message" => "¡Bien! Valida tu correo para continuar"
                        );
                    } else {
                        $exit = array(
                            "response_code" => 500,
                            "response_type" => 'error',
                            "message" => $reg_comerce
                        );
                    }
                } else {
                    $exit = array(
                        "response_code" => 500,
                        "response_type" => 'error',
                        "message" => $reg_user
                    );
                }
            } else {
                $exit = array(
                    "response_code" => 401,
                    "response_type" => 'warning',
                    "message" => "El E-mail que intentas registrar ya ha sido utilizado "
                );
            }
        } else {

            $exit = array(
                "response_code" => 403,
                "response_type" => 'error',
                "message" => 'Todos los campos deben ser llenados'
            );
        }
        echo json_encode($exit);
    }

    public function not()
    {

        $data["mail"] = $this->Notificacion_model->get_notificacion("1");
        $requerimiento = array("cantidad" => "2", "especificaciones" => "Papel de impresora", "fecha" => "2021-09-21 16:08:29");
        $string = $data["mail"]->subtitulo;
        $usuarios = array("usuario" => "Daniel");
        $data["requerimiento"] = $requerimiento;
        $data["usuarios"] = $usuarios;
        $data["mail"]->subtitulo = str_replace('%REQ%', ' ', $string);
        // $this->load->view('app/private/components/notificacion_id16', $data);
        var_dump($data["mail"]);
    }
    function experiment()
    {
        echo date("Ymd");
    }
    public function search_keyword()
    {
        sleep(1.5);
        $que_necesita = $this->input->post('que_necesita');
        $data['match_usuarios'] = $this->Reg_user->get_list_users_by_keywords($que_necesita);

        $mailsnoAfils = [];
        $mailsAfils = [];

        if (isset($data['match_usuarios'])) {

            foreach ($data['match_usuarios'] as $comercio) {
                if ($comercio->afiliado_canaco == 0) {

                    array_push($mailsnoAfils, $comercio->email_auth);
                } else if ($comercio->afiliado_canaco == 1) {
                    array_push($mailsAfils, $comercio->email_auth);
                }
            }
            $mails_cleanA = array_unique($mailsAfils); //Mostrar
            $mails_cleanB = array_unique($mailsnoAfils); //No Mostrar y mandar correo

            $data_mail = $this->Notificacion_model->get_notificacion("58");
            foreach ($mails_cleanB as $mail) {
                //echo $mail;

                //  send_mail(
                //      'ENLACE-CANACO' , //Quien lo envia
                //      $mail,
                //     //'jfelipe.garc@gmail.com',
                //      $data_mail->titulo, //asunto
                //      $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
                //     $attach = NULL //adjunto
                //  );

            }

            $new_arr = [];

            foreach ($data['match_usuarios'] as $comercio) {
                foreach ($mails_cleanA as $i => $mail) {
                    if ($mail == $comercio->email_auth) {
                        array_push($new_arr, $comercio);
                        array_splice($mails_cleanA, $i);
                    }
                }
            }
            $data['match_usuarios'] = $new_arr;
        }
        //var_dump($new_arr);



        $html = $this->load->view('app/private/components/search_kw', $data, TRUE);
        echo $html;
    }

    public function search_keyword_home()
    {
        sleep(1.5);
        $que_necesita = $this->input->post('que_necesita');
        $data['match_usuarios'] = $this->Reg_user->get_list_users_by_keywords($que_necesita);

        $mailsnoAfils = [];
        $mailsAfils = [];

        if (isset($data['match_usuarios'])) {

            foreach ($data['match_usuarios'] as $comercio) {
                if ($comercio->afiliado_canaco == 0) {

                    array_push($mailsnoAfils, $comercio->email_auth);
                } else if ($comercio->afiliado_canaco == 1) {
                    array_push($mailsAfils, $comercio->email_auth);
                }
            }
            $mails_cleanA = array_unique($mailsAfils); //Mostrar
            $mails_cleanB = array_unique($mailsnoAfils); //No Mostrar y mandar correo

            $data_mail = $this->Notificacion_model->get_notificacion("58");
            foreach ($mails_cleanB as $mail) {
                //echo $mail;

                send_mail(
                    'ENLACE-CANACO', //Quien lo envia
                    $mail,
                    //'jfelipe.garc@gmail.com',
                    $data_mail->titulo, //asunto
                    $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                    $attach = NULL //adjunto
                );
            }

            $new_arr = [];

            foreach ($data['match_usuarios'] as $comercio) {
                foreach ($mails_cleanA as $i => $mail) {
                    if ($mail == $comercio->email_auth) {
                        array_push($new_arr, $comercio);
                        array_splice($mails_cleanA, $i);
                    }
                }
            }
            $data['match_usuarios'] = $new_arr;
        }
        //var_dump($new_arr);



        $html = $this->load->view('app/private/components/search_kw_home', $data, TRUE);
        echo $html;
    }

    public function un()
    {
        sleep(1.5);
        $que_necesita = $this->input->post('que_necesita');
        $data['match_usuarios'] = $this->Reg_user->get_list_users_by_keywords('a');
        $mailsnoAfils = [];
        $mailsAfils = [];

        foreach ($data['match_usuarios'] as $comercio) {
            if ($comercio->afiliado_canaco == 0) {

                array_push($mailsnoAfils, $comercio->email_auth);
            } else if ($comercio->afiliado_canaco == 1) {
                array_push($mailsAfils, $comercio->email_auth);
            }
        }
        $mails_cleanA = array_unique($mailsAfils); //Mostrar
        $mails_cleanB = array_unique($mailsnoAfils); //No Mostrar y mandar correo

        $data_mail = $this->Notificacion_model->get_notificacion("58");
        foreach ($mails_cleanB as $mail) {
            echo $mail;

            //  send_mail(
            //      'ENLACE-CANACO' , //Quien lo envia
            // //     $data["email_auth"], //destinatario
            //     $mail,
            //      $data_mail->titulo, //asunto
            //      $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
            //     $attach = NULL //adjunto
            //  );

        }
        $new_arr = [];
        foreach ($data['match_usuarios'] as $comercio) {
            foreach ($mails_cleanA as $i => $mail) {
                if ($mail == $comercio->email_auth) {
                    array_push($new_arr, $comercio);
                    array_splice($mails_cleanA, $i);
                }
            }
        }
        var_dump($new_arr);
    }


    public function getForm()
    {
        $html2 = $this->load->view('public/components/login_c_modal', TRUE);
        //$this->load->view('app/private/fragments/modules/requirements/card_result', $data);
        echo json_encode($html2);
    }

    public function not3()
    {
        $email_array = array(0 => "j.lipe.cacino@gmail.com", 1 => "jfelipe.garc@gmail.com");
        $nombre_array = array(0 => "juan", 1 => "felipe");

        $newconsult = $this->Comercio_model->newget_registro();
        $data_mail = $this->Notificacion_model->get_notificacion("1");
        $string = $data_mail->titulo;
        $string = $data_mail->callback_users;
        $data_mail->callback_users = str_replace('$regsitro$', $newconsult->registros, $string);
        for ($i = 0; $i < sizeof($email_array); $i++) {
            echo $email_array[$i];
            $data_mail->titulo = str_replace('%NOMBRE%', $nombre_array[$i], $string);
            send_mail(
                'Canaco Prueba 2', //Quien lo envia
                $email_array[$i], //destinatario
                $data->notificacion, //asunto
                $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                $attach = NULL //adjunto
            );
        }
    }



    public function not4()
    {
        $que_necesita = "papel";
        $cantidad = "32";
        $tiempo_entrega = "2021-09-21 16:08:29";
        $especificaciones = "Papel de impresora";
        $arr_insert = array(
            "busq_nec"          => $que_necesita,
            "qty"               => $cantidad,
            "entrega"           => $tiempo_entrega,
            "especificaciones"  => $especificaciones,
        );
        $nombre = $this->Reg_user->get_name("118");
        $data["comercios"] = $this->Reg_user->get_list_users_by_keywords($que_necesita);
        $data["mail"] = $this->Notificacion_model->get_notificacion("1"); //traer la informacion de la notificacion correspondiennte
        $string = $data["mail"]->subtitulo; //crear la cadena en la que se remplaza la expresion regular
        $usuarios = $nombre[0]->nombre . " " . $nombre[0]->apellido1 . " " . $nombre[0]->apellido2; //nombre de la persona que subió el requerimiento
        $data["requerimiento"] = $arr_insert;
        $data["usuarios"] = array("usuarios" => $usuarios); //guardar en la info que se enviará a la vista
        for ($i = 0; $i < sizeof($data["comercios"]); $i++) { //For para enviar correo a cada uno de los  usuarios
            // echo  $data["comercios"][$i]->email_auth; //destinatario
            $data["mail"]->subtitulo = str_replace('%REQ%', " ", $string); //remplazar expresion regular en la cadena correspondiente
            // funcion para enviar correo 
            send_mail(
                'Canaco', //Quien lo envia
                "jfelipe.garc@gmail", //destinatario
                $data["mail"]->notificacion, //asunto
                $html = ($this->load->view('app/private/components/notificacion_id16', $data, true)), //Cuerpo (puede ser una vista) 
                $attach = NULL //adjunto
            );
        }

        $this->load->view('app/private/components/notificacion_id16', $data);
        //echo $nombre[0]->nombre ." ". $nombre[0]->apellido1 ." ". $nombre[0]->apellido2;
    }



    public function aplicar()
    {
        //USUARIO AL QUE SE LE APLICARA LA NOTIFICACION
        $id_cliente = $this->input->post('id_cliente');
        $opnegocio_id = $this->input->post('opnegocio_id');
        $doc = $this->input->post('doc');

        //INFO DEL USUARIO AL QUE SE LE APLICARA LA NOTIFICACION
        $usuario = $this->Reg_user->get_name($id_cliente);
        //INFO DE LA OPORTUNIDAD NEGOCIO
        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");
        //DOCUMENTO DE COTIZACION
        $doc = $info[0]->cotizacion_opng;
        //DETALLE Y ESTATUS DE MENSAJE
        $this->Mensaje_model->agregar_detalle($req_id, $id_cliente, $fecha);
        //ESTATUS 18 = Notificación aceptada con respuesta del candidato - ACEPTAR APLICACION
        $this->Reg_user->update_opnegocio($opnegocio_id, '18');

        $email = $usuario[0]['email_auth'];
        // //NOTIFICACION - Interés por tu requerimiento
        $data_mail = $this->Notificacion_model->get_notificacion("14");

        //COMERCIO QUE APLICA
        $comercio_interesado = $this->Reg_user->get_comercio_data_by_userid($this->session->userdata('usuario_id'));
        $data_mail->titulo = str_replace('%EMPRESA%', $comercio_interesado['usuario_id'], $data_mail->titulo);

        $this->load->view('app/private/components/noti', $data_mail);
        if (isset($doc)) {
            $atach = base_url() . '/static/uploads/cotizaciones/' . $doc; // doc es el nombre de la cotizacion guardada en la base de datos 
        } else {
            $atach = null;
        }

        send_mail(
            'ENLACE-CANACO', //Quien lo envia
            $email, //destinatario rempplazar por $email
            $comercio_interesado['negocio_nombre'] . ' ha aplicado para tu requerimiento', //asunto
            $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
            $attach = $atach //adjunto
        );
    }


    public function cancelar()
    {
        //$req_id= $this->input->post('req_id');
        // $nombre=$this->Reg_user->get_comername("186"); //cambio por $this->usuarios_id
        //$comercio=$nombre[0]->negocio_nombre;
        $id_cliente = $this->input->post('id_cliente');
        $opnegocio_id = $this->input->post('opnegocio_id');
        $queja = $this->input->post('queja');

        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");



        $this->Mensaje_model->actualizar_mensaje_cancelado($queja, $opnegocio_id, $req_id, $id_cliente, $fecha);
        $mail = $this->Reg_user->get_name($id_cliente); //cambio por $this->usuarios_id
        $this->Reg_user->update_opnegocio($opnegocio_id, "19"); //cambiar por '19' 
        /*
        $email=$mail[0]->email_auth;
        $data_mail=$this->Notificacion_model->get_notificacion("14"); //traer la informacion de la notificacion correspondiennte
        $this->load->view('app/private/components/noti', $data_mail);
        send_mail(   
            'ENLACE-CANACO' , //Quien lo envia
            $email, //destinatario rempplazar por $email
            $data_mail->titulo, //asunto
            $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
            $attach = NULL //adjunto

            
        );

        */
    }
    public function rechazar()
    {
        //$req_id= $this->input->post('req_id');
        // $nombre=$this->Reg_user->get_comername("186"); //cambio por $this->usuarios_id
        //$comercio=$nombre[0]->negocio_nombre;
        $id_cliente = $this->input->post('id_cliente');
        $opnegocio_id = $this->input->post('opnegocio_id');
        $queja = $this->input->post('queja');

        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");


        $this->Mensaje_model->actualizar_mensaje_rechazo($queja, $opnegocio_id, $req_id, $id_cliente, $fecha);
        $mail = $this->Reg_user->get_name($id_cliente); //cambio por $this->usuarios_id
        $this->Reg_user->update_opnegocio($opnegocio_id, "19"); //cambiar por '19' 


        /*
        $email=$mail[0]->email_auth;
        $data_mail=$this->Notificacion_model->get_notificacion("14"); //traer la informacion de la notificacion correspondiennte
        $this->load->view('app/private/components/noti', $data_mail);
        send_mail(   
            'ENLACE-CANACO' , //Quien lo envia
            $email, //destinatario rempplazar por $email
            $data_mail->titulo, //asunto
            $html = ($this->load->view('app/private/components/noti', $data_mail,true)),//Cuerpo (puede ser una vista) 
            $attach = NULL //adjunto

            
        );

        */
    }
    public function mensaje_whats()
    {
        $opnegocio_id = $this->input->post('opnegocio_id');
        $mensaje = $this->input->post('mensaje');

        //   $this->Reg_user->update_opnegocio($opnegocio_id,'18'); //debe estar 18

        $info = $this->Mensaje_model->info_req($opnegocio_id);
        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");


        $id_req = $this->Reg_user->get_estatus_req($opnegocio_id);
        if ($id_req[0]->estatus != 18) {
            $mail = $this->Reg_user->get_name2($req_id);
            //    $req_id=$info[0]->requerimiento_id;
            $doc = $id_req[0]->cotizacion_opng;
            $this->Mensaje_model->agregar_detalle($req_id, $id_cliente, $fecha);
            $this->Reg_user->update_opnegocio($opnegocio_id, '18'); //debe estar 18
            $email = $mail[0]->email_auth;
            $data_mail = $this->Notificacion_model->get_notificacion("14"); //traer la informacion de la notificacion correspondiente
            $this->load->view('app/private/components/noti', $data_mail);
            if (isset($doc) && $doc != '') {
                $atach = base_url() . '/static/uploads/cotizaciones/' . $doc; // doc es el nombre de la coizacion gusradad en la base de  datos 
            } else {
                $atach = null;
            }

            send_mail(
                'ENLACE-CANACO', //Quien lo envia
                $email, //destinatario rempplazar por $email
                $data_mail->titulo, //asunto
                $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                $attach = $atach //adjunto
            );
            var_dump($mail);
        }




        $this->Mensaje_model->actualizar_mensaje_whats($mensaje, $opnegocio_id, $req_id, $id_cliente, $fecha);
    }


    public function respuesta_whats()
    {
        $opnegocio_id = $this->input->post('opnegocio_id');
        $mensaje = $this->input->post('mensaje');

        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");


        $this->Mensaje_model->actualizar_respuesta_whats($mensaje, $opnegocio_id, $req_id, $id_cliente, $fecha);
    }
    public function mensaje_correo()
    {


        $mymail = $this->input->post('mymail');
        $clientemail = $this->input->post('clientemail');
        $opnegocio_id = $this->input->post('opnegocio_id');
        $this->Reg_user->update_opnegocio($opnegocio_id, '18'); //debe estar 18

        $mensaje = $this->input->post('mensaje');

        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");

        $this->load->library('email');
        $this->email->from($mymail, 'Canaco');
        $this->email->to($clientemail);
        $this->email->subject('Interes en requerimiento canaco');
        $this->email->message($mensaje);
        $this->email->send();


        $id_req = $this->Reg_user->get_estatus_req($opnegocio_id);
        if ($id_req[0]->estatus != 18) {
            $doc = $id_req[0]->cotizacion_opng;
            $mail = $this->Reg_user->get_name2($req_id); //cambio por $this->usuarios_id
            // $req_id=$info[0]->requerimiento_id;
            $this->Mensaje_model->agregar_detalle($req_id, $id_cliente, $fecha);
            $this->Reg_user->update_opnegocio($opnegocio_id, '18'); //debe estar 18
            $email = $mail[0]->email_auth;
            $data_mail = $this->Notificacion_model->get_notificacion("14"); //traer la informacion de la notificacion correspondiente
            $this->load->view('app/private/components/noti', $data_mail);

            //Primero debemos de consultar en la base de datos si existe un documento al mandar el correo
            if (isset($doc)) { //$doc es el nombre del documento pdf guardado en la base de datos
                $atach = base_url() . '/static/uploads/cotizaciones/' . $doc; // doc es el nombre de la coizacion gusradad en la base de  datos 
            } else {
                $atach = null;
            }
            send_mail(
                'ENLACE-CANACO', //Quien lo envia
                $email, //destinatario rempplazar por $email
                $data_mail->titulo, //asunto
                $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                $attach = $atach //adjunto
            );
        }


        $this->Mensaje_model->actualizar_mensaje_correo($mensaje, $opnegocio_id, $req_id, $id_cliente, $fecha);
    }


    public function respuesta_correo()
    {


        $mymail = $this->input->post('mymail');
        $clientemail = $this->input->post('clientemail');
        $opnegocio_id = $this->input->post('opnegocio_id');
        $mensaje = $this->input->post('mensaje');

        $info = $this->Mensaje_model->info_req($opnegocio_id);

        $req_id = $info[0]->requerimiento_id;
        $id_cliente = $info[0]->comercio_id;
        $fecha = date("YmdHis");

        $this->load->library('email');
        $this->email->from($mymail, 'Canaco');
        $this->email->to($clientemail);
        $this->email->subject('Interes en requerimiento canaco');
        $this->email->message($mensaje);
        $this->email->send();


        $this->Mensaje_model->actualizar_respuesta_correo($mensaje, $opnegocio_id, $req_id, $id_cliente, $fecha);
    }

    public function emailp()
    {

        $this->load->library('email');
        $this->email->from('j.lipe.cacino@gmail.com', 'Usuario prueba');
        $this->email->to('jfelipe.garc@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        if ($this->email->send()) {
            echo "nice";
        }
    }


    public function miinfo()
    {
        //conseguir el id de mi comercio
        $micom = $this->Reg_user->get_comername("201"); //cambio por $this->usuarios_id
        $idcom = $micom[0]->negocio_id;
        //buscar requerimientos de este comercio
        $misreq = $this->Reg_user->get_myreq($idcom);
        echo json_encode($misreq);
    }





    public function not5()
    {
        $email_array = array(0 => "j.lipe.cacino@gmail.com", 1 => "jfelipe.garc@gmail.com"); //correos a los que se enviara el email 
        $nombre_array = array(0 => "juan", 1 => "felipe"); //nombre de los comercios
        //$com_array= array(0=>array("email"=>"j.lipe.cacino@gmail.com", "nombre"=>"Juan"), 1=>array("email"=>"jfelipe.garc@gmail.com", "nombre"=>"Felipe"));
        $data["mail"] = $this->Notificacion_model->get_notificacion("16"); //traer la informacion de la notificacion correspondiennte
        $requerimiento = array("cantidad" => "2", "especificaciones" => "Papel de impresora", "fecha" => "2021-09-21 16:08:29"); // Requerimiennto que se subió
        $string = $data["mail"]->subtitulo; //crear la cadena en la que se remplaza la expresion regular
        $usuarios = array("usuario" => "Daniel"); //nombre de la persona que subió el requerimiento
        $data["requerimiento"] = $requerimiento; //guardar en la info que se enviará a la vista el requerimiento que se subió
        $data["usuarios"] = $usuarios; //guardar en la info que se enviará a la vista
        for ($i = 0; $i < sizeof($email_array); $i++) { //For para enviar correo a cada uno de los  usuarios
            //echo $email_array[$i];
            $data["mail"]->subtitulo = str_replace('%REQ%', " ", $string); //remplazar expresion regular en la cadena correspondiente
            //funcion para enviar correo 
            send_mail(
                'ENLACE-CANACO', //Quien lo envia
                $email_array[$i], //destinatario
                $data["mail"]->notificacion, //asunto
                $html = ($this->load->view('app/private/components/notificacion_id16', $data, true)), //Cuerpo (puede ser una vista) 
                $attach = NULL //adjunto
            );
        }
    }
    public function not6()
    {
        $arr_insert = array(
            "busq_nec"          => "agua",
            "qty"               => "22",
            "entrega"           => "3",
            "especificaciones"  => "agua de jamaica",
        );
        // $nombre=$this->Reg_user->get_name($this->usuario_id);
        $data["comercios"] = $this->Reg_user->get_list_users_by_keywords("agua");
        $data["mail"] = $this->Notificacion_model->get_notificacion("16"); //traer la informacion de la notificacion correspondiennte
        $string = $data["mail"]->subtitulo; //crear la cadena en la que se remplaza la expresion regular
        $usuarios = "nombre del cliente"; //nombre de la persona que subió el requerimiento
        $data["requerimiento"] = $arr_insert;
        $data["usuarios"] = array("usuarios" => $usuarios); //guardar en la info que se enviará a la vista
        for ($i = 0; $i < sizeof($data["comercios"]); $i++) { //For para enviar correo a cada uno de los  usuarios
            echo  $data["comercios"][$i]->email_auth; //destinatario
            $data["mail"]->subtitulo = str_replace('%REQ%', " ", $string); //remplazar expresion regular en la cadena correspondiente
            // funcion para enviar correo 
            /*  send_mail(   
                    'Canaco' , //Quien lo envia
                    $data["comercios"][$i]->email_auth, //destinatario
                    $data["mail"]->notificacion, //asunto
                    $html = ($this->load->view('app/private/components/notificacion_id16', $data,true)),//Cuerpo (puede ser una vista) 
                    $attach = NULL //adjunto
                );
        */
            //$this->load->view('app/private/components/notificacion_id16', $data);
            /*
        $insertdata=array(
        "req_id"=>$req_id,
        "id_comercio"=>$data["comercios"][$i]->comercio_id,
        'fecha_creacion'=>date('Y-m-d H:i:s') );
            */
            var_dump($data["comercios"][$i]->comercio_id);
        }
    }
}
/* End of file User.php */
