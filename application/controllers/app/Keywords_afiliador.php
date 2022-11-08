<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keywords_afiliador extends CI_Controller
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

        $this->load->model('accounts_model');
        $this->load->model('actividad_model');
        $this->load->model('tipoActividad_model');
        $this->load->model('Keywords_model'); //eliminar
        $this->load->model('comercio_model');
        $this->load->model('keywords_comercio_model');
        $this->load->model('Reg_user');
        $this->load->model('Prueba_model_f');
        $this->load->model('Recompensas_model');
        $this->load->model('Model_afiliador_comercio');
    }

    /**
     * [index description]
     * @return [type] [description]
     */

 
    public function addkeywords()
    {
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
                 $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                    $this->usuario_id
                );
                //obtenemos el id del negocio
                $comercios = $this->comercio_model->get_comercio_usuario(
                    $usuario_Registrad->usuario_id
                 );
                 $comercio  = $comercios->negocio_id;
                if ($comercio != null && !empty($comercio)) {
                    //arrays para guardar los errores
                    $arr_badinsert = [];
                    $is_error = false;
                    /*En caso de insertar correctamente*/
                    foreach ($arr_keywords as $kw) {
                        $kw = trim($kw);
                        if (
                            $this->keywords_comercio_model->iskeword(
                                $comercio,
                                $tactividad,
                                $kw
                            ) == false
                        ) {
                            $arr_insert = [
                                'comercio_id' => $comercio,
                                'tipoactividad_id' => $tactividad,
                                'tipo_transaccion' => $prodserv,
                                'keyword' => $kw,
                            ];

                            $update_account = $this->keywords_comercio_model->create(
                                $arr_insert,
                                $comercio
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
       
    }


    public function showkeywordsproductoservicio()
    {
    
            if ($this->input->is_ajax_request()) {
                $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                    $this->usuario_id
                );
                
                //obtenemos el id del negocio
                $comercios = $this->comercio_model->get_comercio_usuario(
                    $usuario_Registrad->usuario_id
                 );
                 $comercio  = $comercios->negocio_id;
                $data['actividades'] = null;

                if ($comercio != null && !empty($comercio)) {
                    $data[
                        'actividades'
                    ] = $this->keywords_comercio_model->get_actividades_comercio(
                        $comercio
                    );
                }

                if (
                    $data['actividades'] != null &&
                    !empty($data['actividades'])
                ) {
                    //die(print_r($data['actividades']));
                    foreach ($data['actividades'] as $act) {
                        $act->keywords = $this->keywords_comercio_model->get_keywords(
                            $comercio,
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
                die(validation_errors());
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                ]);
            }
     
    }

    /**
     * [deleteonlykeyword description]
     * @return [type] [description]
     */
    public function deleteonlykeyword()
    {
       
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
     
    }

    /**
     * [deleteallkeyword description]
     * @return [type] [description]
     */
    public function deleteallkeyword()
    {
        
            $tactividad = $this->input->post('tactividad');
            $tipo_transaccion = $this->input->post('tipo_transaccion');

            $this->form_validation->set_rules(
                'tactividad',
                'tactividad',
                'trim|integer|required'
            );

            $usuario_Registrad = $this->Model_afiliador_comercio->id_negocio_registrado(
                $this->usuario_id
            );
            
            //obtenemos el id del negocio
            $comercios = $this->comercio_model->get_comercio_usuario(
                $usuario_Registrad->usuario_id
             );
             $comercio  = $comercios->negocio_id;

            if ($comercio != null && !empty($comercio)) {
                $kw_del = $this->keywords_comercio_model->deleteall(
                    $comercio,
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
                die(validation_errors());
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                ]);
            }
      
    }


    public function misops(){

        $micom=$this->Reg_user->get_comername($this->usuario_id);
        $idcom=$micom[0]->negocio_id;
        $myopn=$this->Reg_user->get_myop_number($idcom);

        echo json_encode($myopn);
        
    }

    public function misreqs(){

        $myreqn=$this->Reg_user->get_myreq_number($this->usuario_id);
        echo json_encode($myreqn);
        
    }
    public function awards(){


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
        $data['modals'][] = $this->load->view('app/private/fragments/modules/requirements/previewresults_m',$data,true);
        $data['scripts'][] = 'app/private/modules/newrequirement';
        $actividades = $this->actividad_model->get_actividades();
        $data['medallas'] = $this->Recompensas_model->medallas();
        $data['insignias'] = $this->Recompensas_model->insignias();
        $data['insigniaU'] = $this->Recompensas_model->insignia_user($clave);
        $data['medallaU'] = $this->Recompensas_model->medallas_user($clave);
        $data['_APP_TITLE'] =$module_data->nombre_mod . ' - ' . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME'] =$section_data->ico_sec . ' ' . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] = 'https://www.youtube.com/embed/tgbNymZ7vqY';
        $data['_APP_TITLE_SUPPORT'] ="<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU'] = get_role_menu($this->rol_id,$module_data->modulo_id,$section_data->seccion_id);
        $data['_APP_NAV'] = $this->load->view( 'app/private/fragments/nav/main_nav',$data,true);
        $data['_APP_VIEW_MENU'] = $this->load->view( 'app/private/fragments/menu/main_menu',$data,  true);
        $data['_APP_BREADCRUMBS'] = [['', $module_data->nombre_mod],$section_data->nombre_sec,];
        $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/perfil/misrecompensas', $data,true);
        $this->load->view('app/private/main_view', $data, false);
    }













}

/* End of file Myaccount.php */
/* Location: ./application/controllers/app/Myaccount.php */
