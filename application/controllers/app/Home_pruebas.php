<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_pruebas extends CI_Controller {

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
        $this->load->model('comercio_model');

    }

    public function index()
    {       
        $this->permiso_id        = get_role_permission($this->estatus_id, $this->rol_id, 'modulo', 1);

        if ($this->rol_id == 1) {
            $data['scripts'][] = 'app/private/modules/home_admin';            
        }
        $data['_APP_TITLE']              = "Home";        
        $data['_APP_VIEW_NAME']          = "Inicio";
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Inicio");
        $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/home_test_f', $data, TRUE);

        if ($this->rol_id == 2) {
            // $data['modals'][] = $this->load->view('app/private/fragments/modules/transactions/addcomment_m', $data, true);
        }
        $this->load->view('app/private/main_view', $data, FALSE);
    }

    public function getdata_chart_client() {
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'modulo', $modulo_id = 1, $finish = FALSE);
        json_header();
        if (!is_null($this->permiso_id)) {
            if ($this->input->is_ajax_request()) {
                $this->load->model('clients_model');
                for($i = 1; $i<=((int)date('m')); $i++) {
                    $data_charts[] = (int) $this->clients_model->get_data_chart_month($this->usuario_id, date('Y'), $i < 10 ? '0'.$i : $i );
                }

                echo json_encode(
                    array(
                        "response_code"      => 200, 
                        "response_type"      => 'success',
                        "message"            => 'Data loaded',
                        "chart_data_client" => $data_charts
                    )
                );
            }

            /*Si la validación de campos es incorrecta*/
            else {                    
                echo json_encode(
                    array(
                        "response_code" => 403, 
                        "response_type" => 'error',
                        "message" => 'Bad Request',
                    )
                );
            }
        }

        /*Si no tenemos permisos*/
        else {            
            echo json_encode(
                array(
                    "response_code" => 401, 
                    "response_type" => 'warning',
                    "message" => "acceso no autorizado"
                )
            );
            fuchi_wakala($redir = FALSE);
        }
    }

    function email_notification($notification_id = 1) 
    {
     $this->load->model('notificacion_model');
     $data['notification'] = $this->notificacion_model->get_notificacion($notification_id);
     if (!is_null($data['notification'])) {
        $titulo_perso = str_replace('%NOMBRE%', $this->session->userdata('nombre').' '.$this->session->userdata('apellido1'), $data['notification']->titulo);            
        $data['titulo_perso'] = $titulo_perso;
        $this->load->view('app/private/components/notification_template', $data, FALSE);
    }
    else {
        die('
            <br>
            <br>
            <br>
            <center>
            <h1>ERROR</h1>
            <h2>DB_ROWS : 0</h2>
            <h3>#'.$notification_id.' identificador no encontrado </h3>
            </center>
            ');
    }
    
}



        /**
         * [showuserrequirements description]
         * @return [type] [description]
         */
        public function showuserrequirements()
        {
            $this->permiso_id = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 117, $finish = false);
            
            if (!is_null($this->permiso_id)) {

                if (/*$this->input->is_ajax_request()*/ true) {

                    $requerimientos = $this->requerimiento_model->get_mis_requerimientos($this->usuario_id);
                    
                    $contadores['cont_guardadoenv']   = 0;// 17
                    $contadores['cont_conresp']       = 0;// 18
                    $contadores['cont_seleccionado']  = 0;// 19


                    $comentarios['cont_guardadoenv']   = " ";// 17
                    $comentarios['cont_conresp']       = " ";// 18
                    $comentarios['cont_seleccionado']  = " ";// 19


                    if($requerimientos != null && !empty($requerimientos)){

                        foreach ($requerimientos as $rq) {
                            $op_negocio = array();
                            $op_temp = $this->oportunidades_negocio_model->get_opnegocio_req($rq->req_id);
                            
                            if($op_temp != null && !empty($op_temp) ){
                            foreach ($op_temp as $opn) {
                                $maxdate    = $this->oportunidades_negocio_model->get_max_estatus_req($opn->opneg_id);
                                if($maxdate != null && !empty($maxdate)){
                                    $maxrow     = $this->oportunidades_negocio_model->get_max_info_req($opn->opneg_id, $maxdate->fecha);

                                    $opn->fecha_estatus = $maxrow->fecha;
                                    $opn->estatus_desc  = $maxrow->comentario;
                                    $opn->estatus_id    = $maxrow->estatus;
                                    if($opn->estatus_id == 17){
                                        $contadores['cont_guardadoenv'] = $contadores['cont_seleccionado']++;
                                        $comentarios['cont_guardadoenv'] = $maxrow->comentario;
                                     }
                                    if($opn->estatus_id == 18){
                                        $contadores['cont_conresp']     = $contadores['cont_seleccionado']++;
                                        $comentarios['cont_conresp']     = $maxrow->comentario;

                                    }
                                    if($opn->estatus_id == 19){
                                        $contadores['cont_seleccionado'] = $contadores['cont_seleccionado']++;
                                        $comentarios['cont_seleccionado'] = $maxrow->comentario;

                                    }

                                }
                                 
                            }
                        }

                            $rq->contadores     = $contadores; 
                            $rq->comentarios     = $comentarios;                      

                        }
                    }

                    $data['arr_lista_req'] = $requerimientos;

                    $html = $this->load->view('app/private/fragments/modules/req_list_tab_f', $data, TRUE);

                    echo $html;
 
                }

                /*Si la validación de campos es incorrecta*/
                else {
                     echo json_encode(
                        array(
                            "response_code" => 403,
                            "response_type" => 'error',
                            "message"       => 'Bad Request',
                        )
                    );
                }
            }

            /*Si no tenemos permisos*/
            else {
                echo json_encode(
                    array(
                        "response_code" => 401,
                        "response_type" => 'warning',
                        "message"       => "Acceso no autorizado",
                    )
                );
                fuchi_wakala($redir = false);
            }
        }


}

/* End of file Home.php */
/* Location: ./application/controllers/control-panel/Home.php */
