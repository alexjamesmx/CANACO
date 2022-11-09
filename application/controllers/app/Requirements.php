<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Requirements extends CI_Controller
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
        $this->load->model('requerimiento_model');
        $this->load->model('keywords_comercio_model');
        $this->load->model('reg_user');
        $this->load->model('notificacion_model');
        $this->load->model('oportunidades_negocio_model');
        $this->load->model('Requerimiento_model');
        $this->load->model('actividad_model');
        $this->load->model("encuestas_model");
    }

    function prueba()
    {
        $completado = $this->Requerimiento_model->estoy_completo(
            $this->usuario_id
        );
        echo json_encode($completado[0]->bandera_porcentaje);
    }

    function new($republicar = null)
    {
        $completado = $this->Requerimiento_model->estoy_completo(
            $this->usuario_id
        );
        if ($completado[0]->bandera_porcentaje == 1) {
            $this->permiso_id = get_role_permission(
                $this->estatus_id,
                $this->rol_id,
                'seccion',
                $seccion_id = 116
            );
            $section_data = get_section_module_data('sec', $seccion_id = 116);
            $module_data = get_module_data_by_sec($seccion_id = 116);
            $data['module_data'] = $module_data;
            $data['section_data'] = $section_data;
            $data['permiso_id'] = $this->permiso_id;
            $data['modals'][] = $this->load->view(
                'app/private/fragments/modules/requirements/previewresults_m',
                $data,
                true
            );
            $data['republicar'] = $this->Requerimiento_model->get_un_requerimiento($republicar);
            $data['scripts'][] = 'app/private/modules/newrequirement';
            $data['_APP_TITLE'] =
                $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME'] =
                $section_data->ico_sec . ' ' . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] =
                'https://www.youtube.com/embed/tgbNymZ7vqY';
            $data['_APP_TITLE_SUPPORT'] =
                "<i class=\"iconsminds-support\"></i> " .
                $section_data->nombre_sec;
            $data['_APP_MENU'] = get_role_menu(
                $this->rol_id,
                $module_data->modulo_id,
                $section_data->seccion_id
            );
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
            $data['_APP_BREADCRUMBS'] = [
                ['', $module_data->nombre_mod],
                $section_data->nombre_sec,
            ];
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/requirements/addrequeriment_f',
                $data,
                true
            );

            $data['scripts'][] = 'app/private/modules/noti_menu';
            $this->load->view('app/private/main_view', $data, false);
        } else {
            //else bandera porcentaje
            $this->session->set_flashdata('message', '<h3> <i class="fas fa-exclamation-triangle"></i>Tu perfil debe estar completado con un minimo de 70% para esta acción</h3>');
            $this->session->set_flashdata('message_type', 'warning');
            redirect(base_url('app/myaccount'), 'refresh');
        }
    }
    public function mis_requerimientos()
    {
        $seccion_id = 115;
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id
        );
        $section_data = get_section_module_data('sec', $seccion_id);
        $module_data = get_module_data_by_sec($seccion_id);

        $data['scripts'][] = 'app/private/modules/controladortabla';
        $data['module_data'] = $module_data;
        $data['section_data'] = $section_data;
        $data['permiso_id'] = $this->permiso_id;
        //mis scripts
        $data['scripts'][] = 'app/private/modules/misrequerimientos';
        $data['scripts'][] = 'app/private/modules/noti_menu';
        //$data['scripts'][] = 'app/private/modules/oportunidades';
        // $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['scripts'][] = 'app/private/modules/estilos';
        $actividades = $this->actividad_model->get_actividades();
        $data['requerimientos'] = $this->Requerimiento_model->get_interesados(
            $this->usuario_id
        );
        $data['_APP_TITLE'] =
            $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME'] =
            $section_data->ico_sec . ' ' . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] =
            'https://www.youtube.com/embed/tgbNymZ7vqY';
        $data['_APP_TITLE_SUPPORT'] =
            "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU'] = get_role_menu(
            $this->rol_id,
            $module_data->modulo_id,
            $section_data->seccion_id
        );
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
        $data['_APP_BREADCRUMBS'] = [
            ['', $module_data->nombre_mod],
            $section_data->nombre_sec,
        ];
        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/fragments/modules/requirements/misrequeriment_f',
            $data,
            true
        );
        $this->load->view('app/private/main_view', $data, false);
    }

    public function lista_interesados($req_id)
    {
        $data['interesados'] = $this->Requerimiento_model->get_lista_interesados($req_id);
        $data['req_id'] = $req_id;
        // print_r($data['interesados']);
        // die();
        $this->load->view('app/private/components/interesados', $data);
    }
    public function elegido()
    {
        //POST
        $requerimiento_id = $this->input->post('requerimiento_id');
        $id_usuario_a_elegir = $this->input->post('id_usuario_a_elegir');
        $oportunidad_negocio_id = $this->input->post('oportunidad_negocio_id');
        $datos = ['usuario_elegido' => $id_usuario_a_elegir];
        //ACTUALIZA CAMPO USUARIO ELEGIDO EN TABLA REQUERIMIENTOS 
        $actualiza_elegido = $this->Requerimiento_model->actualiza_elegido(
            $datos,
            $requerimiento_id
        );
        //ACTUALIZA CAMPO SELECCIONADO A 0 EN TABLA OPORTUNIDADES_NEGOCIO
        $oportunidades_negocio_seleccionado_0 = $this->Requerimiento_model->oportunidades_negocio_seleccionado_0($requerimiento_id);
        //ACTUALIZA CAMPO SELECCIONADO A 1 EN TABLA OPORTUNIDADES_NEGOCIO
        $oportunidades_negocio_seleccionado_1 = $this->Requerimiento_model->oportunidades_negocio_seleccionado_1($oportunidad_negocio_id);
        if ($actualiza_elegido && $oportunidades_negocio_seleccionado_1 && $oportunidades_negocio_seleccionado_0) {
            $exit = [
                'response_code' => 200,
                'response_type' => 'success',
                'message' => 'El usuario ha sido seleccionado correctamente',
            ];
        } else {
            $exit = [
                'response_code' => 403,
                'response_type' => 'error',
                'message' => 'Ocurrio un error',
            ];
        }
        echo json_encode($exit);
    }
    public function eselegido()
    {
        //POST 
        $data = json_decode(file_get_contents('php://input'), true);
        $requerimiento_id =  $data["requerimiento_id"];
        $estatus = $data["estatus"];
        $comentario = $data["comentario"];
        $data = [
            'req_id' => $requerimiento_id,
            'estatus' => $estatus,
            'comentarios_req' => $comentario
        ];
        $json['res'] = false;
        $json['response_type'] = '';

        //SE ELIMINA
        // if ($estatus === '8') {
        $response = $this->Requerimiento_model->delete_requerimiento($data);
        echo 'RESPUESTA:', $response;
        if ($response ===  TRUE) {
            $json['message'] = 'Eliminado correctamente';
            $json['res'] = $response;
            $json['response_type'] = 'info';
        }
        // }
        echo json_encode($json);
    }
    public function noelegido()
    {
        $requerimiento_id = $this->input->post('requerimiento_id');
        // $id_usuario_a_deseleccionar = $this->input->post('id_usuario_a_deseleccionar');
        $oportunidad_negocio_id = $this->input->post('oportunidad_negocio_id');
        $datos = ['usuario_elegido' => null];
        $actualiza_elegido = $this->Requerimiento_model->actualiza_elegido($datos, $requerimiento_id);
        $oportunidades_negocio_seleccionado_0 = $this->Requerimiento_model->oportunidades_negocio_seleccionado_0($oportunidad_negocio_id);

        if ($actualiza_elegido && $oportunidades_negocio_seleccionado_0) {
            $exit = [
                'response_code' => 200,
                'response_type' => 'success',
                'message' => 'El usuario ha sido deseleccionado',
            ];
        } else {
            $exit = [
                'response_code' => 403,
                'response_type' => 'error',
                'message' => 'Ocurrion un error',
            ];
        }
        // json_header();
        echo json_encode($exit);
    }
    public function lista_detalles($req_id)
    {
        $data['detalles'] = $this->Requerimiento_model->get_lista_detalles(
            $req_id
        );
        $this->load->view('app/private/components/detalles', $data);
    }

    public function tablareq_todos()
    {

        $data['mis_requerimientos'] = $this->Requerimiento_model->get_mis_requerimientos($this->usuario_id);


        $data['requerimientos'] = $this->Requerimiento_model->get_interesados(
            $this->usuario_id
        );
        // print_r($data['requerimientos']);
        if ($data['requerimientos']) {
            $this->load->view('app/private/components/tablareq', $data);
        } else {
            echo "<script> location.href='https://enlacecanaco.org/app/requirements/new'; </script>";
            exit;
        }
    }
    public function tablareq_activos()
    {
        // $data['scripts'][] = 'app/private/modules/requerimientos';
        // $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['requerimientos'] = $this->Requerimiento_model->get_interesados_activos(
            $this->usuario_id
        );
        if ($data['requerimientos']) {
            $this->load->view('app/private/components/tablareq', $data);
        } else {
            echo 'Sin requerimientos activos...';
            exit;
        }
    }

    public function cancelar_requerimiento()
    {
        $req_id = $this->input->post('idreq');
        $estatus = $this->input->post('estatus');
        $comentario = $this->input->post('comentario');

        $estado = $this->Requerimiento_model->cancelar_requerimiento(
            $req_id,
            $estatus,
            $comentario
        );

        var_dump($estado);
    }

    public function addrequirement($rep = null)
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 116,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            if (
                $this->input->is_ajax_request()
            ) {
                $que_necesita = $this->input->post('que_necesita');
                $cantidad = $this->input->post('cantidad');
                $tiempo_entrega = $this->input->post('tiempo_entrega');
                $especificaciones = $this->input->post('especificaciones');
                $tipo_notificacion = $this->input->post('tipo_notificacion');
                $comercios = $this->input->post('comercios');

                if (isset($rep) && $rep != '' && $rep != 'null') {
                    $republica = 1;
                } else {
                    $republica = null;
                }

                $date = new DateTime();
                $date->setTimezone(new DateTimeZone('America/Mexico_City'));
                $date =  $date->format('Y-m-d h:i:s');

                $arr_insert = [
                    'busq_nec' => $que_necesita,
                    'qty' => $cantidad,
                    'entrega' => $tiempo_entrega,
                    'especificaciones' => $especificaciones,
                    'usuario_id' => $this->usuario_id,
                    'notificados_req' => $tipo_notificacion,
                    'republicado' => $republica,
                    'fecha_req' => $date
                ];
                $update_req = $this->requerimiento_model->create(
                    $arr_insert,
                    $this->usuario_id
                );
                //ALEX IMPORTANTE
                if (
                    $update_req &&
                    isset($rep) &&
                    $rep != '' &&
                    $rep != 'null'
                ) {
                    $this->sendnotificationinsert(
                        $arr_insert,
                        $comercios,
                        $update_req
                    );
                    //
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' =>
                        'Requerimiento republicado correctamente, se ha enviado una notificación a los usuarios seleccionados',
                    ]);
                } elseif ($update_req) {
                    //SE MANDA NOTIFICACION

                    $this->sendnotificationinsert(
                        $arr_insert,
                        $comercios,
                        $update_req
                    );
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' =>
                        'Requerimiento registrado correctamente, se ha enviado una notificación a los usuarios seleccionados',
                    ]);
                } /*Si no podemos editar y el modelo retorna una excepcion*/ else {
                    echo json_encode([
                        'response_code' => 403,
                        'response_type' => 'error',
                        'message' =>
                        'No se pudo solicitar el requerimiento, consulte con el administrador',
                    ]);
                }

                //end foreach
            } /*Si la validación de campos es incorrecta*/ else {
                //die(validation_errors());
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                ]);
            }
        } /*Si no tenemos permisos*/ else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'Acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }
    /*--------------------------------------------------*/
    public function nomatch()
    {
        $this->form_validation->set_rules(
            'que_necesita',
            'qué necesitas',
            'trim|max_length[300]|required'
        );
        $this->form_validation->set_rules(
            'cantidad',
            'en qué cantidad',
            'trim|max_length[50]|required'
        );
        $this->form_validation->set_rules(
            'tiempo_entrega',
            'tiempo de entrega',
            'trim|integer|required'
        );
        $this->form_validation->set_rules(
            'especificaciones',
            'especificaciones técnicas',
            'trim|max_length[300]|required'
        );
        $this->form_validation->set_rules(
            'tipo_notificacion',
            'tipo de notificacion',
            'trim|integer|required'
        );

        if ($this->form_validation->run() && $this->input->is_ajax_request()) {
            $que_necesita = $this->input->post('que_necesita');
            $cantidad = $this->input->post('cantidad');
            $tiempo_entrega = $this->input->post('tiempo_entrega');
            $especificaciones = $this->input->post('especificaciones');
            $tipo_notificacion = $this->input->post('tipo_notificacion');

            $arr_insert = [
                'busq_nec' => $que_necesita,
                'qty' => $cantidad,
                'entrega' => $tiempo_entrega,
                'especificaciones' => $especificaciones,
                'usuario_id' => $this->usuario_id,
                'notificados_req' => $tipo_notificacion,
            ];

            $update_req = $this->requerimiento_model->create(
                $arr_insert,
                $this->usuario_id
            );
        }
    }

    /* ---------------------------------------------------  */
    public function sendnotificationinsert(
        $arr_insert,
        $comercios,
        $requerimiento_id
    ) {

        // echo 'ARR INSERT';
        // print_r($arr_insert);
        // echo 'COMERCIOS';
        // print_r($comercios);
        // echo 'REQUERIMIENTO_ID';
        // print_r($requerimiento_id);

        // die();
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 116,
            $finish = false
        );
        // json_header();
        if (!is_null($this->permiso_id)) {
            //ALEX_IMPORTANTE_NOTIFICACIONES
            $lista_comercios = array_unique(explode(',', $comercios));
            // echo 'LISTA_COMERCIOS';
            // print_r($lista_comercios);
            // die();
            $comercios = [];

            foreach ($lista_comercios as $com_id) {
                array_push(
                    $comercios,
                    $this->keywords_comercio_model->get_user_by_comercio_id(
                        $com_id
                    )
                );
            }

            // echo 'COMERCIOS';
            // print_r($comercios);
            // die();
            $nombre = $this->reg_user->get_name($this->usuario_id);
            // echo 'MI NOMBRE?';
            // print_r($nombre);
            // die();
            //ALEX_NOTA_IMPORTANTE

            //cambiar $data['comercios'] a la consulta datos de comercio de cada $lista_comercios
            $data['comercios'] = $comercios;
            $data['mail'] = $this->notificacion_model->get_notificacion('16'); //traer la informacion de la notificacion correspondiennte
            $string = $data['mail']->subtitulo; //crear la cadena en la que se remplaza la expresion regular

            $usuarios =
                $nombre[0]['nombre'] .
                ' ' .
                $nombre[0]['apellido1'] .
                ' ' .
                $nombre[0]['apellido2']; //nombre de la persona que subió el requerimiento

            $data['requerimiento'] = $arr_insert;
            $data['usuarios'] = ['usuarios' => $usuarios]; //guardar en la info que se enviará a la vista
            ///aqui nos quedamos

            for ($i = 0; $i < sizeof($data['comercios']); $i++) {
                //For para enviar correo a cada uno de los  usuarios

                $arr_opnegocio = [
                    'requerimiento_id' => $requerimiento_id,
                    'comercio_id' => $data['comercios'][$i]->comercio_id,
                ];

                //insertamos en oportunidades negocio
                $update_req = $this->oportunidades_negocio_model->create(
                    $arr_opnegocio,
                    $this->usuario_id
                );

                if ($update_req) {
                    $arr_estus = [
                        'opnegocio_id' => $update_req,
                        'estatus' => '17',
                        'requerimiento_id' => $requerimiento_id,
                    ];

                    $update_stat = $this->oportunidades_negocio_model->createstatus(
                        $arr_estus,
                        $this->usuario_id
                    );

                    if (true) {
                        $data['mail']->subtitulo = str_replace(
                            '%REQ%',
                            ' ',
                            $string
                        ); //remplazar expresion regular en la cadena correspondiente
                        // funcion para enviar correo
                        send_mail(
                            'ENLACE-CANACO', //Quien lo envia
                            $data['comercios'][$i]->email_auth, //destinatario
                            $data['mail']->titulo, //asunto
                            $html = $this->load->view(
                                'app/private/components/notificacion_id16',
                                $data,
                                true
                            ), //Cuerpo (puede ser una vista)
                            $attach = null //adjunto
                        );
                    }
                } else {
                    echo json_encode([
                        'response_code' => 500,
                        'response_type' => 'error',
                        'message' => $update_req,
                    ]);
                }
            } //termina el for
            //todo lo que funcionq
        } else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'Acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }

    /*-------------------------------------------------*/

    /**
     * [sendnotification description]
     * @return [type] [description]
     */
    public function sendnotification()
    {
        //validar imprimir echo
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 116,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $this->form_validation->set_rules(
                'comercios',
                'comercios',
                'required'
            );
            $this->form_validation->set_rules(
                'que_necesita',
                'qué necesitas',
                'trim|max_length[300]|required'
            );
            $this->form_validation->set_rules(
                'cantidad',
                'en qué cantidad',
                'trim|max_length[50]|required'
            );
            $this->form_validation->set_rules(
                'tiempo_entrega',
                'tiempo de entrega',
                'trim|integer|required'
            );
            $this->form_validation->set_rules(
                'especificaciones',
                'especificaciones técnicas',
                'trim|max_length[300]|required'
            );

            $comercios = $this->input->post('comercios');
            $que_necesita = $this->input->post('que_necesita');
            $cantidad = $this->input->post('cantidad');
            $tiempo_entrega = $this->input->post('tiempo_entrega');
            $especificaciones = $this->input->post('especificaciones');

            $arr_insert = [
                'busq_nec' => $que_necesita,
                'qty' => $cantidad,
                'entrega' => $tiempo_entrega,
                'especificaciones' => $especificaciones,
                'usuario_id' => $this->usuario_id,
            ];

            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                $lista_comercios = array_unique(explode(',', $comercios));
                $comercios = [];

                foreach ($lista_comercios as $com_id) {
                    array_push(
                        $comercios,
                        $this->keywords_comercio_model->get_user_by_comercio_id(
                            $com_id
                        )
                    );
                }

                $nombre = $this->reg_user->get_name($this->usuario_id);
                //cambiar $data['comercios'] a la consulta datos de comercio de cada $lista_comercios
                $data['comercios'] = $comercios;
                $data['mail'] = $this->notificacion_model->get_notificacion(
                    '16'
                ); //traer la informacion de la notificacion correspondiennte
                $string = $data['mail']->subtitulo; //crear la cadena en la que se remplaza la expresion regular
                $usuarios =
                    $nombre[0]->nombre .
                    ' ' .
                    $nombre[0]->apellido1 .
                    ' ' .
                    $nombre[0]->apellido2; //nombre de la persona que subió el requerimiento
                $data['requerimiento'] = $arr_insert;
                $data['usuarios'] = ['usuarios' => $usuarios]; //guardar en la info que se enviará a la vista
                ///aqui nos quedamos

                for ($i = 0; $i < sizeof($data['comercios']); $i++) {
                    //For para enviar correo a cada uno de los  usuarios
                    // echo  $data["comercios"][$i]->email_auth; //destinatario

                    $data['mail']->subtitulo = str_replace(
                        '%REQ%',
                        ' ',
                        $string
                    ); //remplazar expresion regular en la cadena correspondiente
                    // funcion para enviar correo
                    send_mail(
                        'ENLACE-CANACO', //Quien lo envia
                        $data['comercios'][$i]->email_auth, //destinatario

                        $data['mail']->titulo, //asunto
                        $html = $this->load->view(
                            'app/private/components/notificacion_id16',
                            $data,
                            true
                        ), //Cuerpo (puede ser una vista)
                        $attach = null //adjunto
                    );
                }
                /*
                //verificar que todos se enviaron

                    if ($all_sended) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Los comercios seleccionados han sido notificados mediante correo electrónico",
                            )
                        );                         

                    }
                    */
                if (true) {
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' =>
                        'Los comercios seleccionados han sido notificados mediante correo electrónico',
                    ]);
                    /*Si no podemos editar y el modelo retorna una excepcion*/
                } else {
                    echo json_encode([
                        'response_code' => 500,
                        'response_type' => 'error',
                        'message' => $update_req,
                    ]);
                }

                //end foreach
            } /*Si la validación de campos es incorrecta*/ else {
                die(validation_errors());
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                ]);
            }
        } /*Si no tenemos permisos*/ else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'Acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }


    public function showmatchlistrequiremnt()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 116,
            $finish = false
        );

        //VERIFICAR SI TIENE PERMISO
        if (!is_null($this->permiso_id)) {

            //POST
            $que_necesita = $this->input->post('que_necesita');
            $tipo_transaccion = $this->input->post('tipo_transaccion');

            $data['busqueda'] = $que_necesita;
            //OBTIENE LOS USUARIOS CON AQUELLAS KEYWORD
            $data['match_usuarios'] = $this->keywords_comercio_model->get_list_users_by_keyword_trans(
                $que_necesita,
                $tipo_transaccion,
                $this->session->usuario_id
            );
            //SI EL KEYWORD EXISTE EN LA TABLA DE KEYWORDS COMERCIO
            if ($data['match_usuarios'] == TRUE) {
                //SI LA BUSQUEDA SE ENCONTRABA EN LA TABLA NOMATCH 
                //SE ACTUALIZA EL ESTATUS A 0 PARA SABER QUE EL NOMATCH 
                //YA NO ES NECESARIO PUESTO QUE YA EXISTE EN LAS BUSQUEDAS
                $toupdate = [
                    'status' => '0'
                ];
                $this->Requerimiento_model->is_nomatch($toupdate, $data['busqueda']);
                //OBTENER TODAS LAS KEYWORDS REFERENTES A LA PALABRA BUSCADA POR CADA NEGOCIO
                // Y METEMOS LOS RESULTADOS EN UN ARRAY
                $i = 0;
                foreach ($data['match_usuarios'] as $row) {
                    $data['match_usuarios'][$i]['keyword'] =
                        $this->keywords_comercio_model->get_keyword_by_search_comercio_trans(
                            $que_necesita,
                            $row['comercio_id'],
                            $row['tipo_transaccion']
                        );
                    $i++;
                }
                //HASTA ESTE PUNTO EL PROCESO DEBE SER EXITOSO Y CREAMOS UN
                $res = [true, 'Exitoso'];
            }
            //SI NO EXISTE EL KETYWORD SE CREA UN NUEVO NOMATCH
            else {


                //SE CREA UN NUEVO REGISTRO EN TABLA NOMATCH
                $data = [
                    'keyword' => $data['busqueda'],
                    'date_nomatch' => date('YmdHis'),
                    'usuario_id' => $this->usuario_id,
                    'status'     =>     '1'
                ];
                $id_insertado =  $this->Requerimiento_model->new_nomatch($data, $que_necesita);

                //CREAMOS UN NUEVO REGISTRO EN LA TABLA NOMATCH DETALLE Y NOMMATCH 
                //PARA SABER QUE PALABRA BUSCO EL USUARIO Y QUE NO SE ENCONTRO Y LA INFORMACION 
                //DEL REQUERIMIENTO QUE SE PRETENDIA AGREGAR
                $que_necesita = trim($this->input->post('que_necesita'));
                $cantidad = trim($this->input->post('cantidad'));
                $tiempo_entrega = trim($this->input->post('tiempo_entrega'));
                $especificaciones = trim($this->input->post('especificaciones'));

                //insert no match detalle 
                $arr_insert = [
                    'busca' => $que_necesita,
                    'cantidad' => $cantidad,
                    'entrega' => $tiempo_entrega,
                    'especificaciones' => $especificaciones,
                    'usuario_id' => $this->usuario_id,
                    'nomatch_id' => $id_insertado
                ];
                $res = $this->requerimiento_model->new_nomatch_detalle(
                    $arr_insert,
                    $this->usuario_id
                );
                //si ya existe un registro con este usuario y esta palabra 
                //buscada mandamos un mensaje, y si no, notificamos (ocultamente)
                //que sí se creó un registro
                if ($res === FALSE) {
                    echo '<p id="message_error" data-message="YA EXISTE ESTE REGISTRO EN nomatch_detalle"><p>';
                } else {
                    echo '<p id="message_error">Se creo un nuevo registro<p>';
                }
            }
            //SE MANDA LA DATA A LA VISTA Y ESTA VISTA LA MANDAMOS EN FORMA DE ECHO
            $data['base_url'] = base_url();
            $html = $this->load->view(
                'app/private/fragments/modules/requirements/card_result',
                $data,
                true
            );
            //elemento oculto para conocer el numero de busquedas exitosas
            if (isset($data['match_usuarios'])) {
                echo '<span hidden id="no-requerimientos">' . count($data['match_usuarios']) . '</span>';
            } else {
                echo '<span hidden id="no-requerimientos">0</span>';
            }

            echo $html;
        } /*Si no tenemos permisos*/ else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'Acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }



    /**/
    public function testshow()
    {
        $busqueda = 'carbon';
        $transaccion = '2';
        $lista_usurios = $this->keywords_comercio_model->get_list_users_by_keyword_trans(
            $busqueda,
            $transaccion
        );

        if (!empty($lista_usurios)) {
            foreach ($lista_usurios as $row) {
                $row->keyword = $this->keywords_comercio_model->get_keyword_by_search_comercio_trans(
                    $busqueda,
                    $row->comercio_id,
                    $transaccion
                );
            }
        }

        echo json_encode($lista_usurios);
    }

    public function testuser()
    {
        $comercio = '62';
        $lista_usurios = $this->keywords_comercio_model->get_user_by_comercio_id(
            $comercio
        );

        echo json_encode($lista_usurios);
    }

    public function validacion_cuatro()
    {
        $req_id = $this->input->post('req_id');
        $numero = $this->Requerimiento_model->cuantos_aplicaron($req_id);
        echo json_encode($numero);
    }

    public function misreqs()
    {
        $myreqn = $this->Requerimiento_model->get_myreq_number(
            $this->usuario_id
        );
        echo json_encode($myreqn);
    }

    public function num_reqs_pagination()
    {
        $myreqn = $this->reg_user->get_myreq_numb(
            $this->usuario_id
        );
        echo json_encode($myreqn);
    }

    public function misreqs_activos()
    {
        $myreqn = $this->Requerimiento_model->get_myreq_number_a(
            $this->usuario_id
        );
        echo json_encode($myreqn);
    }
    public function subir_encuestas()
    {
        $id_req = $this->input->post('id_req');
        $pregunta1 = $this->input->post('p1');
        $pregunta2 = $this->input->post('p2');
        $pregunta3 = $this->input->post('p3');
        $pregunta4 = $this->input->post('p4');
        $comentarios = $this->input->post('nota');
        $total = $pregunta1 + $pregunta2 + $pregunta3 + $pregunta4;
        $prom = $total / 4;
        $array = array(
            'id_req' => $id_req,
            'id_usuario' => $this->usuario_id,
            'pregunta1' => $pregunta1,
            'pregunta2' => $pregunta2,
            'pregunta3' => $pregunta3,
            'pregunta4' => $pregunta4,
            'comentarios' => $comentarios,
            "total" => $total,
            "promedio" => $prom
        );
        $respuesta = $this->encuestas_model->subir_encuesta_model($array, $id_req);

        echo json_encode($respuesta);
    }

    public function subir_encuestas_op()
    {
        $id_req = $this->input->post('id_req');
        $id_op = $this->input->post('id_op');
        $pregunta1 = $this->input->post('p1');
        $pregunta2 = $this->input->post('p2');
        $pregunta3 = $this->input->post('p3');
        $pregunta4 = $this->input->post('p4');
        $comentarios = $this->input->post('nota');
        $total = $pregunta1 + $pregunta2 + $pregunta3 + $pregunta4;
        $prom = $total / 4;
        $array = array(
            'id_req' =>   $id_req,
            'pregunta1' => $pregunta1,
            'id_usuario' => $this->usuario_id,
            'pregunta2' => $pregunta2,
            'pregunta3' => $pregunta3,
            'pregunta4' => $pregunta4,
            'comentario' => $comentarios,
            "total" => $total,
            "promedio" => $prom
        );
        $array2 = array(
            'promedio_calif' => $prom
        );
        $respuesta = $this->encuestas_model->subir_encuesta_model_op($array, $id_req);
        $respuesta2 = $this->encuestas_model->subir_encuesta_model_op_req($array2, $id_op);
        echo json_encode($respuesta);
    }


    public function lista_nomatch()
    {
        $data =  $this->Requerimiento_model->get_nomatch($this->usuario_id);
        echo json_encode($data);
    }

    public function ignorados()
    {
        $data =  $this->Requerimiento_model->reqigno();
        echo json_encode($data);
    }
    public function requerimientos_exist()
    {
        if ($this->session->userdata('rol_id') == '2' || $this->session->userdata('rol_id') == '3') {
            $data['requerimientos'] = $this->Requerimiento_model->get_interesados(
                $this->usuario_id
            );
            if ($data['requerimientos'] == null) {
                $data['res'] = true;
            } else {
                $data['res'] = false;
            }
        } else {
            $data['res'] = '';
        }
        echo json_encode($data);
    }
    public function get_nomatch_detalle($id_del_negocio_con_ese_nomatch, $id_nomatch_id)
    {
        $data = $this->requerimiento_model->get_nomatch_detalle($id_del_negocio_con_ese_nomatch, $id_nomatch_id);
        echo json_encode($data);
    }

    public function get_nomatch_profile($id_del_negocio_con_ese_nomatch)
    {
        $data = $this->requerimiento_model->get_nomatch_profile($id_del_negocio_con_ese_nomatch);
        echo json_encode($data);
    }
}
