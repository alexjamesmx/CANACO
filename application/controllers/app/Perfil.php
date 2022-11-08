<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perfil extends CI_Controller
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
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('requerimiento_model');
        $this->load->model('keywords_comercio_model');
        $this->load->model('Reg_user');
        $this->load->model('notificacion_model');
        $this->load->model('oportunidades_negocio_model');
        $this->load->model('Requerimiento_model');
        $this->load->model('actividad_model');
        $this->load->model('Recompensas_model');
        $this->load->model('Perfil_model');

    }

    public function index()
    {

    }


    public function perfil_publico($id_negocio)
    {
        $data['recompensas']  = $this->Recompensas_model->conve($id_negocio);
        
        $data['scripts'][] = 'app/private/modules/noti_menu';
        $medallas=$this->Recompensas_model->medallas_user($id_negocio);
        $data['medallas']=$medallas;
        $insignias=$this->Recompensas_model->insignia_user($id_negocio);
        $data['insignias']=$insignias;
        $data['info']               = $this->Reg_user->get_comername($id_negocio);
        
        $trans = $this->Perfil_model->req_solventados($id_negocio);
        $data['transaccionesf']=intval($trans);
        $transc = $this->Perfil_model->transacciones_completados( $id_negocio);
        $data['transaccionesc']=intval($transc); 
        $id_comercio=get_comercio_id($id_negocio);
        $data['keys']=$this->Perfil_model->get_mis_keywords($id_comercio);
        $data['kwac']=$this->Perfil_model->get_mis_keywords_actividades($id_comercio);
        $data['coms']=$this->Perfil_model->get_mi_perfil($id_comercio);
        $data['get_docs']=$this->Perfil_model->get_docs($id_comercio);

        // $this->permiso_id           = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 116);
        $section_data               = get_section_module_data('sec', $seccion_id = 137);
        $module_data                = get_module_data_by_sec($seccion_id = 137);
        $data['module_data']        = $module_data;
        $data['section_data']       = $section_data;
        $data['permiso_id']         = $this->permiso_id;
        $data['modals'][]           = $this->load->view('app/private/fragments/modules/requirements/previewresults_m', $data, true);
        $data['scripts'][]          = 'app/private/modules/perfil_publico';
        $actividades                = $this->actividad_model->get_actividades();
        $data['requerimientos']       = $this->Requerimiento_model->get_mis_requerimientos($this->usuario_id);
        $data['_APP_TITLE']         = $module_data->nombre_mod . " - " . $section_data->nombre_sec;
        $data['_APP_VIEW_NAME']     = $section_data->ico_sec . " " . $section_data->nombre_sec;
        $data['_APP_VIDEO_SUPPORT'] = "https://www.youtube.com/embed/tgbNymZ7vqY";
        $data['_APP_TITLE_SUPPORT'] = "<i class=\"iconsminds-support\"></i> " . $section_data->nombre_sec;
        $data['_APP_MENU']          = get_role_menu($this->rol_id, $module_data->modulo_id, $section_data->seccion_id);
        $data['_APP_NAV']           = $this->load->view('app/private/fragments/nav/main_nav', $data, true);
        $data['_APP_VIEW_MENU']     = $this->load->view('app/private/fragments/menu/main_menu', $data, true);
        $data['_APP_BREADCRUMBS']   = array(array('', $module_data->nombre_mod), $section_data->nombre_sec);
        $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/perfil/perfilpublic_f', $data, true);
        $this->load->view('app/private/main_view', $data, false);
    } 

    /**/

    /**
     * [new description] 
     * @return [type] [description]
     */

        
        public function solventados()
        {
            
            $TOTAL = $this->Perfil_model->req_solventados( $this->usuario_id);
            $All =intval($TOTAL);        
            echo json_encode($All);   
        }

        public function completados()
            {
                
                $TOTAL = $this->Perfil_model->transacciones_completados( $this->usuario_id);
                $All =intval($TOTAL);        
                echo json_encode($All);   
            }

            public function profiles($id_usuario=null)
            {
                
                $data['scripts'][] = 'app/private/modules/profile_card';
                $trans = $this->Perfil_model->req_solventados($id_usuario);
                $data['transaccionesf']=intval($trans);
                $transc = $this->Perfil_model->transacciones_completados( $id_usuario);
                $data['transaccionesc']=intval($transc);
                $data['medallas'] = $this->Perfil_model->medallas_user( $id_usuario);
                $data['insignias'] = $this->Perfil_model->insignia_user( $id_usuario);
                $data['transaccionesc']=intval($transc); 
                $id_comercio=get_comercio_id($id_usuario);
                $data['keys']=$this->Perfil_model->get_mis_keywords($id_comercio);
                $data['kwac']=$this->Perfil_model->get_mis_keywords_actividades($id_comercio);
                $data['coms']=$this->Perfil_model->get_mi_perfil($id_comercio);
                       
                $this->load->view('app/private/components/profile_c',$data);
                //echo json_encode($data); 

            }

            public function profile_card(){
                
                // $trans = $this->Perfil_model->req_solventados($id_usuario);
                // $data['transaccionesf']=intval($trans);
                // $transc = $this->Perfil_model->transacciones_completados( $id_usuario);
                // $data['transaccionesc']=intval($transc);
                // $data['medallas'] = $this->Perfil_model->medallas_user( $id_usuario);
                // $data['insignias'] = $this->Perfil_model->insignia_user( $id_usuario);
                // $data['transaccionesc']=intval($transc); 
                // $id_comercio=get_comercio_id($id_usuario);
                // $data['keys']=$this->Perfil_model->get_mis_keywords($id_comercio);
                // $data['kwac']=$this->Perfil_model->get_mis_keywords_actividades($id_comercio);
                // $data['coms']=$this->Perfil_model->get_mi_perfil($id_comercio);
                $data=0;
                $this->load->view('app/private/components/profile_c',$data);
            }

}


/* End of file Perfil.php */
