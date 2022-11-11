<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
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

        $this->load->model('accounts_model');
        $this->load->model('actividad_model');
        $this->load->model('tipoActividad_model');
        $this->load->model('keywords_model'); //eliminar
        $this->load->model('comercio_model');
        $this->load->model('keywords_comercio_model');
        $this->load->model('reg_user');
        $this->load->model('prueba_model_f');
        $this->load->model('recompensas_model');
        $this->load->model('informacion_perfil_model');
    }
    public function index()
    {

        /*
        Usuarios tipo Tractora
         */
        if (($this->rol_id == '19')) {

            $actividades = $this->actividad_model->get_actividades();
            $arr_data_actividades_tipos = [];
            $this->permiso_id = get_role_permission(
                $this->estatus_id,
                $this->rol_id,
                'seccion',
                $seccion_id = 3
            );
            $section_data = get_section_module_data('sec', $seccion_id = 3);
            $module_data = get_module_data_by_sec($seccion_id = 3);
            $clave = $this->usuario_id;
            $data['module_data'] = $module_data;
            $data['section_data'] = $section_data;
            $data['permiso_id'] = $this->permiso_id;
            $data['tipos_actividad'] = $arr_data_actividades_tipos;
            //estilos de terceros
            $data['styles'][] = 'vendor/component-custom-switch.min';
            $data['styles'][] = '../../admin/percircle/percircle';
            $data['styles'][] = 'vendor/select2.min';
            $data['styles'][] = 'vendor/select2-bootstrap.min';
            $data['styles'][] = 'vendor/bootstrap-tagsinput';
            $data['styles'][] = 'vendor/smart_wizard.min';
            //scripts de terceros 
            $data['scripts'][] = '../../admin/percircle/percircle';
            $data['scripts'][] = 'vendor/datatables.min';
            $data['scripts'][] = 'vendor/jquery.mask.min';
            $data['scripts'][] = 'vendor/select2.full';
            $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
            $data['scripts'][] = 'vendor/jquery.smartWizard.min';
            //mis script
            $data['scripts'][] = 'app/private/modules/myaccount';
            $data['scripts'][] = 'app/private/modules/profilecomercio';
            $data['scripts'][] = 'app/private/modules/subir';
            $data['scripts'][] = 'app/private/modules/validaciones';
            $data['scripts'][] = 'app/private/modules/modales';
            $data['scripts'][] = 'app/private/modules/keywords.list';

            $data['account_data'] = $this->accounts_model->get_accounts("WHERE usuarios.estatus_id IN (3) AND usuario_id='" . $this->usuario_id . "'", 0, 0)[0];
            $data['medallas'] = $this->recompensas_model->medallas();
            $data['insignias'] = $this->recompensas_model->insignias();
            $data['recompensas'] = $this->recompensas_model->recompensas($clave);
            $data['insigniaU'] = $this->recompensas_model->insignia_user($clave);
            $data['medallaU'] = $this->recompensas_model->medallas_user($clave);
            $data['account_data_n'] = $this->prueba_model_f->get_comers($clave);
            $data['_APP_TITLE'] = $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME'] = $section_data->ico_sec . ' ' . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
            $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " .  $section_data->nombre_sec;
            $data['_APP_MENU'] = get_role_menu($this->rol_id,  $module_data->modulo_id,  $section_data->seccion_id);
            $data['_APP_NAV'] = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
            $data['_APP_MEDALLA'] = $this->load->view('app/private/fragments/modules/config/medallas_m', $data, true);
            $data['_APP_INSIGNIA'] = $this->load->view('app/private/fragments/modules/config/insignia_m', $data, true);
            $data['_APP_VIEW_MENU'] = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
            $data['_APP_BREADCRUMBS'] = [['', $module_data->nombre_mod], $section_data->nombre_sec,];
            $data['_APP_DATOS_AFILIACION'] = $this->load->view('app/private/fragments/modules/config/afiliacioncanaco', $data, true);
            $data['_APP_DATOS_CONTACTO'] = $this->load->view('app/private/fragments/modules/config/datos_contacto', $data, true);
            $data['_APP_DATOS_NEGOCIO'] = $this->load->view('app/private/fragments/modules/config/negocioscanaco', $data, true);
            $data['_APP_DATOS_PASS'] = $this->load->view('app/private/fragments/modules/config/datos_pass', $data, true);
            $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/config/micuentatractora_f', $data, true);
            // print_r($data['account_data_n']);
            // die();
            $this->load->view('app/private/main_view', $data, false);
        }
        // usuarios comercios
        else if ($this->rol_id == '2') {
            //obtenemos todas las actividades
            $actividades = $this->actividad_model->get_actividades();

            //obtenemos tipos de actividades
            $arr_data_actividades_tipos = [];
            foreach ($actividades as $k => $v) {
                $arr_data_actividades_tipos[$k]['actividad'] = $v;
                $tipo_actividades = $this->tipoActividad_model->get_tipos(
                    "actividad_id = '" . $v->actividad_id . "'"
                );
                $arr_data_actividades_tipos[$k]['tipos'] = [];
                if (!is_null($tipo_actividades)) {
                    foreach ($tipo_actividades as $k2 => $v2) {
                        $arr_data_actividades_tipos[$k]['tipos'][$k2] = $v2;
                    }
                }
            }

            //obtenemos permiso
            $this->permiso_id = get_role_permission(
                $this->estatus_id,
                $this->rol_id,
                'seccion',
                $seccion_id = 3
            );
            //obtenemos secciones y modulo
            $section_data = get_section_module_data('sec', $seccion_id = 3);
            $module_data = get_module_data_by_sec($seccion_id = 3);

            //obtenemos oportunidades y requerimientos
            $cuantos_oportunidades = $this->informacion_perfil_model->cuantos_me_eligieron($this->usuario_id);
            $cuantos_requerimientos = $this->informacion_perfil_model->cuantos_solicite($this->usuario_id);
            $cerrados               = $this->informacion_perfil_model->cerrados($this->usuario_id);

            $total = ($cuantos_requerimientos + $cuantos_oportunidades);
            if ($total != 0) {
                $porcentaje = (($cerrados / $total) * 100);
                $procentaje = number_format((float) $porcentaje, 2, '.', '');
            } else {
                $procentaje = 0;
            }
            //data
            $data['module_data'] = $module_data;
            $data['section_data'] = $section_data;
            $data['permiso_id'] = $this->permiso_id;
            $data['tipos_actividad'] = $arr_data_actividades_tipos;
            //estilos de terceros
            // $data['styles'][] = 'vendor/component-custom-switch.min';
            $data['styles'][] = '../../admin/percircle/percircle';
            // $data['styles'][] = 'vendor/select2.min';
            // $data['styles'][] = 'vendor/select2-bootstrap.min';
            // $data['styles'][] = 'vendor/bootstrap-tagsinput';
            $data['styles'][] = 'vendor/smart_wizard.min';
            //scripts de terceros
            // $data['scripts'][] = 'vendor/datatables.min';
            $data['scripts'][] = 'vendor/jquery.mask.min';
            // $data['scripts'][] = 'vendor/select2.full';
            // $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
            $data['scripts'][] = 'vendor/jquery.smartWizard.min';
            $data['scripts'][] = '../../admin/percircle/percircle';
            //mis scripts
            $data['scripts'][] = 'app/private/modules/keywords.list';
            $data['scripts'][] = 'app/private/modules/myaccount';
            $data['scripts'][] = 'app/private/modules/profilecomercio';
            $data['scripts'][] = 'app/private/modules/subir';
            $data['scripts'][] = 'app/private/modules/validaciones';
            $data['scripts'][] = 'app/private/modules/modales';
            $data['scripts'][] = 'app/private/modules/afiliacion';
            $data['scripts'][] = 'app/private/modules/noti_menu';


            $data['modals'][] = $this->load->view('app/private/fragments/modules/config/addkeywords_m', $data, true);
            $data['account_data'] = $this->accounts_model->get_accounts("WHERE usuarios.estatus_id IN (3) AND usuario_id='" . $this->usuario_id . "'", 0, 0)[0];
            $data['medallas'] = $this->recompensas_model->medallas();
            $data['insignias'] = $this->recompensas_model->insignias();
            $data['recompensas'] = $this->recompensas_model->recompensas($this->usuario_id);
            $data['insigniaU'] = $this->recompensas_model->insignia_user($this->usuario_id);


            $data['medallaU'] = $this->recompensas_model->medallas_user($this->usuario_id);
            $data['circulo_data'] = $procentaje;
            $data['account_data_n'] = $this->prueba_model_f->get_comers($this->usuario_id);

            //SECCIONES Y ENCABEZADOS-----------------------------------------------------------------------------
            $data['_APP_TITLE'] = $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME'] = $section_data->ico_sec . ' ' . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
            $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " .  $section_data->nombre_sec;
            $data['_APP_MENU'] = get_role_menu($this->rol_id,  $module_data->modulo_id,  $section_data->seccion_id);
            $data['_APP_NAV'] = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
            //------------------------------------------------------------------------------------------------------
            $data['_APP_MEDALLA'] = $this->load->view('app/private/fragments/modules/config/medallas_m', $data, true);
            $data['_APP_INSIGNIA'] = $this->load->view('app/private/fragments/modules/config/insignia_m', $data, true);
            $data['_APP_VIEW_MENU'] = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
            $data['_APP_BREADCRUMBS'] = [['', $module_data->nombre_mod], $section_data->nombre_sec,];
            $data['_APP_DATOS_AFILIACION'] = $this->load->view('app/private/fragments/modules/config/afiliacioncanaco', $data, true);
            $data['_APP_DATOS_CVNEGOCIO'] = $this->load->view('app/private/fragments/modules/config/cvnegocio', $data, true);
            $data['_APP_DATOS_DOCSNEGOCIO'] = $this->load->view('app/private/fragments/modules/config/documetosnegocio', $data, true);
            $data['_APP_DATOS_CONTACTO'] = $this->load->view('app/private/fragments/modules/config/datos_contacto', $data, true);
            $data['_APP_DATOS_NEGOCIO'] = $this->load->view('app/private/fragments/modules/config/negocioscanaco', $data, true);
            $data['_APP_DATOS_PASS'] = $this->load->view('app/private/fragments/modules/config/datos_pass', $data, true);
            $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/config/micuentacomercio_f', $data, true);



            $this->load->view('app/private/main_view', $data, false);
        } else if ($this->rol_id !== '2' && $this->rol_id !== '19') {
            /*Cuenta estandar para los usuarios de canaco que NO SON COMERCIOS*/
            $section_per_page = 20;
            $this->permiso_id = get_role_permission(
                $this->estatus_id,
                $this->rol_id,
                'seccion',
                $seccion_id = 3
            );

            $section_data = get_section_module_data('sec', $seccion_id = 3);
            $module_data = get_module_data_by_sec($seccion_id = 3);
            $data['module_data'] = $module_data;
            $data['section_data'] = $section_data;
            $data['permiso_id'] = $this->permiso_id;
            $data['styles'][] = 'vendor/component-custom-switch.min';
            $data['scripts'][] = 'app/private/modules/myaccount';
            $data['scripts'][] = 'vendor/datatables.min';
            $data['scripts'][] = 'vendor/jquery.mask.min';
            $data['account_data'] = $this->accounts_model->get_accounts("WHERE usuarios.estatus_id IN (3) AND usuario_id='" . $this->usuario_id . "'", 0, 0)[0];
            $data['medallas'] = $this->recompensas_model->medallas();
            $data['insignia'] = $this->recompensas_model->insignias();
            $data['recompensas'] = $this->recompensas_model->recompensas($this->usuario_id);
            $data['_APP_TITLE'] = $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
            $data['_APP_VIEW_NAME'] = $section_data->ico_sec . ' ' . $section_data->nombre_sec;
            $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
            $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " .
                $section_data->nombre_sec;
            $data['_APP_MENU'] = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
            $data['_APP_NAV'] = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
            $data['_APP_VIEW_MENU'] = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
            $data['_APP_BREADCRUMBS'] = [['', $module_data->nombre_mod], $section_data->nombre_sec,];
            $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/config/micuenta_f', $data, true);
            $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/config/micuenta_f', $data, true);

            $this->load->view('app/private/main_view', $data, false);
        }
    }
    public function sendDataMail()
    {
        $data = $this->accounts_model->get_datauser(
            $this->usuario_id
        );

        echo json_encode($data[0]->email_auth);


        // send_mail(
        //     'ENLACE-CANACO', //Quien lo envia
        //     $data['comercios'][$i]->email_auth, //destinatario
        //     $data['mail']->titulo, //asunto
        //     $html = $this->load->view(
        //         'app/private/components/notificacion_id16',
        //         $data,
        //         true
        //     ), //Cuerpo (puede ser una vista)
        //     $attach = null //adjunto
        // );
    }

    public function doupdate()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 3,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $this->form_validation->set_rules(
                'nombre',
                'nombre',
                'trim|required'
            );
            $this->form_validation->set_rules(
                'apellido1',
                'apellido1',
                'trim|required'
            );
            $this->form_validation->set_rules('apellido2', 'apellido2', 'trim');
            $this->form_validation->set_rules(
                'email_auth',
                'email_auth',
                'trim|required|valid_email'
            );
            $this->form_validation->set_rules(
                'email_auth_c',
                'email_auth_c',
                'trim|required|matches[email_auth]'
            );
            $this->form_validation->set_rules(
                'telefono_auth',
                'telefono_auth',
                'trim|required'
            );
            $this->form_validation->set_rules(
                'telefono_auth_c',
                'telefono_auth_c',
                'trim|required|matches[telefono_auth]'
            );

            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                $nombre = $this->input->post('nombre');
                $apellido1 = $this->input->post('apellido1');
                $apellido2 = $this->input->post('apellido2');
                $email_auth = $this->input->post('email_auth');
                $telefono_auth = $this->input->post('telefono_auth');
                $email_ventas = $this->input->post('email_ventas');
                $nombre_ventas = $this->input->post('nombre_ventas');
                $numero_ventas = $this->input->post('numero_ventas');
                $whatps_ventas = $this->input->post('whatps_ventas');
                $email_compras = $this->input->post('email_compras');
                $nombre_compras = $this->input->post('nombre_compras');
                $numero_compras = $this->input->post('numero_compras');

                $arr_update = [
                    'profile_pic' => null,
                    'nombre' => $nombre,
                    'apellido1' => $apellido1,
                    'apellido2' => $apellido2,
                    'email_auth' => $email_auth,
                    'telefono_auth' => limpia_telefono($telefono_auth),
                    'usuario_id_umod' => $this->usuario_id,
                    'fecha_umod' => date('Y-m-d H:i:s'),
                ];
                $arr_comercio_update = [
                    'negocio_comp_correo' => $email_compras,
                    'negocio_comp_nombre' => $nombre_compras,
                    'negocio_comp_numero' => limpia_telefono($numero_compras),
                    'negocio_vent_correo' => $email_ventas,
                    'negocio_vent_nombre' => $nombre_ventas,
                    'negocio_vent_numero' => limpia_telefono($numero_ventas),
                    'negocio_vent_whatsp' => limpia_telefono($whatps_ventas),
                ];

                /*En caso de insertar correctamente*/
                if ($this->accounts_model->check_phone(limpia_telefono($telefono_auth), $this->usuario_id)) {
                    $update_account = $this->accounts_model->edit(
                        $this->usuario_id,
                        $arr_update
                    );

                    $insert_negocio = $this->prueba_model_f->up_negocio(
                        $this->usuario_id,
                        $arr_comercio_update
                    );

                    if ($insert_negocio) {
                        $d = [
                            'response_code' => 200,
                            'response_type' => 'success',
                            'message' => 'Negocio actualizado satisfactoriamente',
                        ];
                    }

                    if ($update_account) {
                        echo json_encode([
                            'response_code' => 200,
                            'response_type' => 'success',
                            'message' => 'Cuenta actualizado satisfactoriamente',
                        ]);
                    } /*Si no podemos editar y el modelo retorna una excepcion*/ else {
                        echo json_encode([
                            'response_code' => 500,
                            'response_type' => 'error',
                            'message' => $update_account,
                        ]);
                    }
                } else {
                    echo json_encode([
                        'response_code' => 403,
                        'response_type' => 'error',
                        'message' => 'Número de teléfono no valido',
                    ]);
                }
            } /*Si la validación de campos es incorrecta*/ else {
                $err = validation_errors();
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                    'errors'    => $err,
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

    /**
     * [new description]
     * @return [type] [description]
     */
    public function addkeywords()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 117,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $this->form_validation->set_rules(
                'prodserv',
                'productos o servicios que ofrece',
                'trim|required'
            );
            $this->form_validation->set_rules(
                'tactividad',
                'tactividad',
                'trim|required'
            );
            $this->form_validation->set_rules(
                'keywords',
                'keywords',
                'trim|required'
            );

            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                $prodserv = $this->input->post('prodserv');
                $tactividad = $this->input->post('tactividad');
                $keywords = $this->input->post('keywords');

                //obtener de la sesion el id del usuario
                $arr_keywords = explode(',', $keywords);

                //obtenemos el id del negocio
                $comercio = $this->comercio_model->get_comercio_usuario(
                    $this->usuario_id
                );

                if ($comercio != null && !empty($comercio)) {
                    //arrays para guardar los errores
                    $arr_badinsert = [];
                    $is_error = false;

                    /*En caso de insertar correctamente*/
                    foreach ($arr_keywords as $kw) {
                        $kw = trim($kw);
                        if (
                            $this->keywords_comercio_model->iskeword(
                                $comercio->negocio_id,
                                $tactividad,
                                $kw
                            ) == false
                        ) {
                            $arr_insert = [
                                'comercio_id' => $comercio->negocio_id,
                                'tipoactividad_id' => $tactividad,
                                'tipo_transaccion' => $prodserv,
                                'keyword' => $kw,
                            ];

                            $update_account = $this->keywords_comercio_model->create(
                                $arr_insert,
                                $comercio->negocio_id
                            );
                            if ($update_account) {
                            } /*Si no podemos editar y el modelo retorna una excepcion*/ else {
                                $is_error = true;
                                array_push($arr_badinsert, $update_account); //cambiar por la $kw
                            }
                        } else {
                            /*La palabra ya se encuentra registrada para este servicio*/
                        }
                    }
                } else {
                    //no hay comercio
                }

                if ($is_error) {
                    $the_error = implode(',', $arr_badinsert);
                    echo json_encode([
                        'response_code' => 500,
                        'response_type' => 'error',
                        'message' => $the_error,
                    ]);
                } else {
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' => 'Palabra registrada correctamente',
                    ]);
                }
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

    /**
     * [showkeywordsproductoservicio description]
     * @return [type] [description]
     */
    public function showkeywordsproductoservicio()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 117,
            $finish = false
        );

        if (!is_null($this->permiso_id)) {
            if ($this->input->is_ajax_request()) {
                $comercio = $this->comercio_model->get_comercio_usuario(
                    $this->usuario_id
                );

                $data['actividades'] = null;

                if ($comercio != null && !empty($comercio)) {
                    $data['actividades'] = $this->keywords_comercio_model->get_actividades_comercio(
                        $comercio->negocio_id
                    );
                }

                if (
                    $data['actividades'] != null &&
                    !empty($data['actividades'])
                ) {
                    foreach ($data['actividades'] as $act) {
                        $act->keywords = $this->keywords_comercio_model->get_keywords(
                            $comercio->negocio_id,
                            $act->tipoactividad_id,
                            $act->tipo_transaccion
                        );
                    }
                }

                $html = $this->load->view(
                    'app/private/fragments/modules/config/keywordslist_f',
                    $data,
                    true
                );

                echo $html;
            } /*Si la validación de campos es incorrecta*/ else {
                $err = validation_errors();
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                    'error'     => $err,
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

    /**
     * [deleteonlykeyword description]
     * @return [type] [description]
     */
    public function deleteonlykeyword()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 117,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $id = $this->input->post('id');
            $this->form_validation->set_rules(
                'id',
                'id',
                'trim|integer|required'
            );

            $kw_del = $this->keywords_comercio_model->delete($id);
            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                if ($kw_del) {
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' => 'Palabra eliminada del servicio',
                    ]);
                } else {
                    echo json_encode([
                        'response_code' => 400,
                        'response_type' => 'error',
                        'message' => $kw_del,
                    ]);
                }
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

    /**
     * [deleteallkeyword description]
     * @return [type] [description]
     */
    public function deleteallkeyword()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 117,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $tactividad = $this->input->post('tactividad');
            $tipo_transaccion = $this->input->post('tipo_transaccion');

            $this->form_validation->set_rules(
                'tactividad',
                'tactividad',
                'trim|integer|required'
            );

            $comercio = $this->comercio_model->get_comercio_usuario(
                $this->usuario_id
            );

            if ($comercio != null && !empty($comercio)) {
                $kw_del = $this->keywords_comercio_model->deleteall(
                    $comercio->negocio_id,
                    $tactividad,
                    $tipo_transaccion
                );
            }

            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                if ($kw_del) {
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' => 'Se ha eliminado la actividad economica',
                    ]);
                } else {
                    echo json_encode([
                        'response_code' => 400,
                        'response_type' => 'error',
                        'message' => $kw_del,
                    ]);
                }
            } /*Si la validación de campos es incorrecta*/ else {
                $error = validation_errors();
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message'       => 'Bad Request',
                    'error'    => $error,
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

    public function update_keyword()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 117,
            $finish = false
        );
        json_header();

        if (!is_null($this->permiso_id)) {

            $this->form_validation->set_rules('kwus_id', 'kwus_id', 'trim|required');
            $this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

            if ($this->form_validation->run()) {
                $kwus_id = $this->input->post('kwus_id');
                $keyword = $this->input->post('keyword');

                $this->keywords_comercio_model->edit_keyword(
                    $kwus_id,
                    array(
                        'keyword' => $keyword
                    )
                );

                echo json_encode([
                    'response_code' => 200
                ]);
            }

            /*Si la validación de campos es incorrecta*/ else {
                $error = validation_errors();
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message'       => 'Bad Request',
                    'error'    => $error,
                ]);
            }
        }

        /*
        Si no tenemos permisos
         */ else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'Acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }


    public function misops()
    {

        $micom = $this->reg_user->get_comername($this->usuario_id);
        $idcom = $micom[0]->negocio_id;
        $myopn = $this->reg_user->get_myop_number($idcom);

        echo json_encode($myopn);
    }

    public function misreqs()
    {

        $myreqn = $this->reg_user->get_myreq_number($this->usuario_id);
        echo json_encode($myreqn);
    }
    public function awards()
    {


        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 108
        );
        $clave = $this->usuario_id;
        $section_data = get_section_module_data('sec', $seccion_id = 108);
        $module_data = get_module_data_by_sec($seccion_id = 108);
        $data['module_data'] = $module_data;
        $data['section_data'] = $section_data;
        $data['permiso_id'] = $this->permiso_id;
        $data['modals'][] = $this->load->view('app/private/fragments/modules/requirements/previewresults_m', $data, true);
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $data['scripts'][] = 'app/private/modules/noti_menu';
        $actividades = $this->actividad_model->get_actividades();
        $data['medallas'] = $this->recompensas_model->medallas();
        $data['insignias'] = $this->recompensas_model->insignias();
        $data['insigniaU'] = $this->recompensas_model->insignia_user($clave);
        $data['medallaU'] = $this->recompensas_model->medallas_user($clave);
        $data['_APP_TITLE'] = $module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME'] = $section_data->ico_sec . ' ' . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
        $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU'] = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
        $data['_APP_NAV'] = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
        $data['_APP_VIEW_MENU'] = $this->load->view('app/private/fragments/menu/main_menu', $data,  true);
        $data['_APP_BREADCRUMBS'] = [['', $module_data->nombre_mod], $section_data->nombre_sec,];
        $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/perfil/misrecompensas', $data, true);
        $this->load->view('app/private/main_view', $data, false);
    }

    public function doupdatepass()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'seccion',
            $seccion_id = 3,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            $this->form_validation->set_rules(
                'password',
                'password',
                'trim|min_length[8]|max_length[12]'
            );
            $this->form_validation->set_rules(
                'password_c',
                'password_c',
                'trim|matches[password]'
            );

            if (
                $this->form_validation->run() &&
                $this->input->is_ajax_request()
            ) {
                $password = $this->input->post('password');

                $arr_update = [
                    'password' => md5($password)
                ];

                /*En caso de insertar correctamente*/
                $update_account = $this->accounts_model->edit(
                    $this->usuario_id,
                    $arr_update
                );

                if ($update_account) {
                    echo json_encode([
                        'response_code' => 200,
                        'response_type' => 'success',
                        'message' => 'Contraseña actualizada correctamente',
                    ]);
                } /*Si no podemos editar y el modelo retorna una excepcion*/ else {
                    echo json_encode([
                        'response_code' => 500,
                        'response_type' => 'error',
                        'message' => $update_account,
                    ]);
                }
            } /*Si la validación de campos es incorrecta*/ else {
                $err = validation_errors();
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                    'errors'    => $err,
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
    public function comercio()
    {
        $result = $this->prueba_model_f->data_check($this->usuario_id);
        echo json_encode([
            'response_code' => 200,
            'response_type' => 'success',
            'message' => $result,
        ]);
    }
    public function contacto()
    {
        $result = $this->prueba_model_f->data_check_contacto($this->usuario_id);
        echo json_encode([
            'response_code' => 200,
            'response_type' => 'success',
            'message' => $result,
        ]);
    }
}

/* End of file Myaccount.php */
/* Location: ./application/controllers/app/Myaccount.php */
