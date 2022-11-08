<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->model('informacion_perfil_model');
        $this->load->model('Reg_user');
        $this->load->model('Recompensas_model');
    }

    public function index()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'modulo',
            1
        );

        $data['_APP_TITLE'] = 'Home';
        $data['_APP_VIEW_NAME'] = 'Inicio';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);

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
        $data['_APP_BREADCRUMBS'] = ['Inicio'];
        //Si eres de Presidencia este es tu sección
        if ($this->rol_id == 1) {
            $data['scripts'][] = 'app/private/modules/home_presidencia';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_presidencia',
                $data,
                true
            );
        }
        //Si eres Comercio
        if ($this->rol_id == 2) {


            $data['scriptscdn'][] = 'https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js';
            $data['stylescdn'][] = 'https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css';

            $data['scripts'][] = 'app/private/modules/controlencuesta';
            $data['scripts'][] = 'app/private/modules/misrequerimientos';
            $data['scripts'][] = 'app/private/modules/noti_menu';
            $data['scripts'][] = 'app/private/modules/oportunidades';
            $data['scripts'][] = 'app/private/modules/paginacion';
            $data['scripts'][] = 'app/private/modules/marq_nomatchs';
            $data['scripts'][] = 'app/private/modules/modal_medallas';

            $data['micom'] = $this->Reg_user->get_comername($this->usuario_id);
            $data['recompensas'] =   $this->recompensas_mostrar();
            $data['modals'][] = $this->load->view('app/private/fragments/modules/config/medallas', $data, true);
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_f',
                $data,
                true
            );
        }

        //Si eres contabilidad este es tu sección
        if ($this->rol_id == 13) {
            $data['modals'][] = $this->load->view(
                'app/private/fragments/modules/contaduria/afilporvalidar_m',
                $data,
                true
            );
            $data['scripts'][] = 'app/private/modules/showafilporvalidarse';
            $data['scripts'][] = 'app/private/modules/modales_validarafil';
            $data['scripts'][] = 'app/private/modules/home_contaduria';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_contabilidad_f',
                $data,
                true
            );
        }
        //Si eres afiliador este es tu sección
        if ($this->rol_id == 14) {

            //Demo graficas
            $data['scripts'][] = 'app/private/modules/afiliador_principal';
            $data['scripts'][] = 'app/private/modules/home_afiliador';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_afiliador_f',
                $data,
                true
            );
        }
        //Si eres Gerencia este es tu sección
        if ($this->rol_id == 15) {
            $data['scripts'][] = 'app/private/modules/home_admin';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_gerencia',
                $data,
                true
            );
        }
        //Si eres jefe afiliador este es tu sección
        if ($this->rol_id == 16) {
            //Demo graficas
            $data['scripts'][] = 'app/private/modules/home_jefeafiliador';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_jefeafiliador_f',
                $data,
                true
            );
        }
        //Si eres de consejo este es tu sección
        if ($this->rol_id == 17) {
            //Demo graficas
            $data['scripts'][] = 'app/private/modules/home_admin';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_consejero',
                $data,
                true
            );
        }
        //Si eres ADMIN
        if ($this->rol_id == 18) {
            $data['scripts'][] = 'app/private/modules/home_admin';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_administrador',
                $data,
                true
            );
        }
        //Si eres Tractora
        if ($this->rol_id == 19) {
            // $data['scripts'][] = 'app/private/modules/home_admin';
            $data['_APP_FRAGMENT'] = $this->load->view(
                'app/private/fragments/modules/home_tractora',
                $data,
                true
            );
        }

        $this->load->view('app/private/main_view', $data, false);
    }

    public function getdata_chart_client()
    {
        $this->permiso_id = get_role_permission(
            $this->estatus_id,
            $this->rol_id,
            'modulo',
            $modulo_id = 1,
            $finish = false
        );
        json_header();
        if (!is_null($this->permiso_id)) {
            if ($this->input->is_ajax_request()) {
                $this->load->model('clients_model');
                for ($i = 1; $i <= ((int) date('m')); $i++) {
                    $data_charts[] = (int) $this->clients_model->get_data_chart_month(
                        $this->usuario_id,
                        date('Y'),
                        $i < 10 ? '0' . $i : $i
                    );
                }
                echo json_encode([
                    'response_code' => 200,
                    'response_type' => 'success',
                    'message' => 'Data loaded',
                    'chart_data_client' => $data_charts,
                ]);
            }
            /*Si la validación de campos es incorrecta*/ else {
                echo json_encode([
                    'response_code' => 403,
                    'response_type' => 'error',
                    'message' => 'Bad Request',
                ]);
            }
        }
        /*Si no tenemos permisos*/ else {
            echo json_encode([
                'response_code' => 401,
                'response_type' => 'warning',
                'message' => 'acceso no autorizado',
            ]);
            fuchi_wakala($redir = false);
        }
    }

    function email_notification($notification_id = 1)
    {
        $this->load->model('notificacion_model');
        $data['notification'] = $this->notificacion_model->get_notificacion(
            $notification_id
        );
        if (!is_null($data['notification'])) {
            $titulo_perso = str_replace(
                '%NOMBRE%',
                $this->session->userdata('nombre') .
                    ' ' .
                    $this->session->userdata('apellido1'),
                $data['notification']->titulo
            );
            $data['titulo_perso'] = $titulo_perso;
            $this->load->view(
                'app/private/components/notification_template',
                $data,
                false
            );
        } else {
            die('
                <br>
                <br>
                <br>
                <center>
                <h1>ERROR</h1>
                <h2>DB_ROWS : 0</h2>
                <h3>#' .
                $notification_id .
                ' identificador no encontrado </h3>
                </center>
                ');
        }
    }

    /**
     * [demo_tablas description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    function demo_tablas($value = '')
    {
        $data['_APP_TITLE'] = 'Demo Tablas';
        $data['_APP_VIEW_NAME'] = 'Inicio';
        $data['_APP_MENU'] = get_role_menu($this->rol_id, 1);

        $data['scripts'][] = 'app/private/demotabla';
        $data['stylescdn'][] =
            'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css';
        $data['scriptscdn'][] =
            'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js';

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
        $data['_APP_BREADCRUMBS'] = ['Inicio'];

        $data['_APP_FRAGMENT'] = $this->load->view(
            'app/private/demotablas_f',
            $data,
            true
        );

        $this->load->view('app/private/main_view', $data, false);
    }

    /**
     * [consulta_demo_tabla description]
     * @return [type] [description]
     */
    function consulta_demo_tabla()
    {

        $draw            = $_POST['draw'];
        $row             = $_POST['start'];
        $rowperpage      = $_POST['length']; // Rows display per page
        $columnIndex     = $_POST['order'][0]['column']; // Column index
        $columnName      = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue     = $_POST['search']['value']; // Search value

        $this->load->model('demodatatable_model');

        $nofilter_data = $this->demodatatable_model->get_all_munis();
        $filter_data = $this->demodatatable_model->get_munis($row, $rowperpage, $searchValue, $columnName, $columnSortOrder);

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $nofilter_data->num_rows(),
            "iTotalDisplayRecords" => $nofilter_data->num_rows(),
            "aaData" => $filter_data->result()
        );

        echo json_encode($response);
    }
    public function recompensas_mostrar()
    {
        $medallas_mostrar = array();
        $i = 0;
        $recompensa_m = $this->informacion_perfil_model->get_medallas_0($this->usuario_id);
        if (isset($recompensa_m)) {
            foreach ($recompensa_m as $medalla) {
                if ($medalla->estatus == 0) {
                    $medallas_mostrar[$i] = array($medalla->medalla, $medalla->medalla_nombre, $medalla->medalla_descripcion, $medalla->medalla_img);
                    $i++;
                }
            }
        }

        $recompensa_i = $this->informacion_perfil_model->get_insignia_0($this->usuario_id);

        if (isset($recompensa_i)) {
            foreach ($recompensa_i as $insignia) {
                if ($insignia->estatus == 0) {
                    $medallas_mostrar[$i] = array($insignia->insignia, $insignia->insignia_nombre, $insignia->insignia_descripcion, $insignia->insignia_img);
                    $i++;
                }
            }
        }
        return ($medallas_mostrar);
    }
}
