<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_afiliador extends CI_Controller {

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

        $this->load->model('Reg_user');
        
    }

    public function index()
    {       
        $this->permiso_id        = get_role_permission($this->estatus_id, $this->rol_id, 'modulo', 1);

        if ($this->rol_id == 1) {
            $data['scripts'][] = 'app/private/modules/home_afiliador';            
        }

        


        $micom=$this->Reg_user->get_comername($this->usuario_id);
        $idcom=$micom[0]->negocio_id;
        $data['misreq']=$this->Reg_user->get_myreq($idcom);
    


        $data['_APP_TITLE']              = "Home";        
        $data['_APP_VIEW_NAME']          = "Inicio";
        $data['scripts'][]               = 'app/private/modules/misrequerimientos';
        $data['_APP_TBO']                = $this->load->view('public/components/mis_oportunidades',$data,TRUE) ;
        $data['_APP_MENU']               = get_role_menu($this->rol_id, 1);
        $data['_APP_NAV']                = $this->load->view('app/private/fragments/nav/main_nav', $data, TRUE);        
        $data['_APP_VIEW_MENU']          = $this->load->view('app/private/fragments/menu/main_menu', $data, TRUE);
        $data['_APP_BREADCRUMBS']        = array("Inicio");
        $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/afiliador/home_afiliador_f', $data, TRUE);

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

}

/* End of file Home.php */
/* Location: ./application/controllers/control-panel/Home.php */
