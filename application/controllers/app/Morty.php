<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Morty extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('morty_model');
    }
    
    public function index()
    {
var_dump('hola');
    }

 
    public function infogeneral()
    {
        $data['styles'][] = 'vendor/component-custom-switch.min';
       $data['styles'][] = '../../admin/percircle/percircle';
       $data['styles'][] = 'vendor/select2.min';
       $data['styles'][] = 'vendor/select2-bootstrap.min';
       $data['styles'][] = 'vendor/bootstrap-tagsinput';
       $data['styles'][] = 'vendor/smart_wizard.min';        
       $data['scripts'][] = '../../admin/percircle/percircle';

       $data['scripts'][] = 'vendor/jquery.mask.min';
       $data['scripts'][] = 'vendor/select2.full';
       $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
       $data['scripts'][] = 'vendor/jquery.smartWizard.min';

       $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/ntocar/vistamorty',$data,true );
        // $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/ntocar/vistamorty', $data, true);
        $this->load->view('app/private/fragments/modules/ntocar/mortybasico', $data, false);
    } 
    public function detalle_info($id)
    {
        $data['styles'][] = 'vendor/component-custom-switch.min';
       $data['styles'][] = '../../admin/percircle/percircle';
       $data['styles'][] = 'vendor/select2.min';
       $data['styles'][] = 'vendor/select2-bootstrap.min';
       $data['styles'][] = 'vendor/bootstrap-tagsinput';
       $data['styles'][] = 'vendor/smart_wizard.min';        
       $data['scripts'][] = '../../admin/percircle/percircle';
       $data['scripts'][] = 'app/private/modules/encuestam';
       $data['scripts'][] = 'vendor/jquery.mask.min';
       $data['scripts'][] = 'vendor/select2.full';
       $data['scripts'][] = 'vendor/bootstrap-tagsinput.min';
       $data['scripts'][] = 'vendor/jquery.smartWizard.min';
        $data['clave'] = $id;
        $data['like'] = $this->morty_model->reacciones_like($id);
        $data['dislike'] = $this->morty_model->reacciones_dislike($id);
        $data['_APP_FRAGMENT'] = $this->load->view('app/private/fragments/modules/ntocar/detalle',$data,true );
        // $data['_APP_FRAGMENT']      = $this->load->view('app/private/fragments/modules/ntocar/vistamorty', $data, true);
        $this->load->view('app/private/fragments/modules/ntocar/mortybasico', $data, false);
    } 
        
        public function get_data()
            {
                $like = $this->morty_model->reacciones_like();
                $dislike = $this->morty_model->reacciones_dislike();
            }

            public function add_reaccion()
            {    
                $id_personaje       = $this->input->post('id_personaje');
                $nombre_personaje   = $this->input->post('nombre_personaje');
                $reaccion           = $this->input->post('reaccion');
                $arr_reacion = array(
                    "nombre_personaje"     => $nombre_personaje,
                    "reaccion"             => $reaccion,  
                    "id_personaje"         => $id_personaje
                  );
           
                $this->morty_model->up_raccion($arr_reacion);
                $like       =  $this->morty_model->reacciones_like($id_personaje);
                $dislike    = $this->morty_model->reacciones_dislike($id_personaje);
                  $d =    array(
                    "response_code" => 200, 
                    "response_type" => 'success',
                    "likes"         =>   $like,
                    "dislikes"      => $dislike,
                  );          
                echo json_encode($d);
                
            }


}


/* End of file Perfil.php */
