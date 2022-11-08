<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validar extends CI_Controller
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
        error_reporting(0);
        $this->load->model('Admin_model_D');
        $this->load->model('accounts_model');
        $this->load->model('actividad_model');
        $this->load->model('tipoActividad_model');
        $this->load->model('Keywords_model');
        $this->load->model('Validacion_model');
        
    }

    /**
     * [index description]
     * @return [type] [description]
     */
        
        public function pruebas()
        {
        
        $Respuesta =  $this->Admin_model_D->datauser();
        foreach($Respuesta as $res)
            {
        
                 $id = $res->usuario_id;
                 
        
                $porciones = explode("@", $res->email_auth);
                $arr1 = str_split($res->email_auth);
                $contador =0; 
                $bandera = 0;
                $pass ='';
                foreach($arr1 as $letra){
                    
                   
                    if ($letra === "@")
                    {
                        $bandera = 1;
                    }
                    if ($bandera == 0)
                    {
                        $pass =  $pass.$letra;
                    
                    }
                
                    
                $contador = $contador+1;
                    
                }
                $passmedia = ($pass.'22');
                $passFuerte    = md5($passmedia);
           
                    $data =   array(
                             "password" => $passFuerte,

                         );
                         
                           $Respuesta =  $this->Admin_model_D->edit($id, $data);
                
                
           
                
            }
        
        }
    

    
}
    