<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conta extends CI_Controller
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
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('afiliacion_modal');
        $this->load->model('jefe_afiliador_model');
    }



    public function validarfactura($id)
    {
        //1 factura y no tiene datos
        // 2  no ocupa factura
        // 3 todo ok
        $resultados = $this->afiliacion_modal->requieretienefactura($id);
        if ($resultados[0]->estado == null) {
            $d =    array(
                "response_code" => 200,
                "response_type" => 'success',
                "message" => 'el usuario No requiere factura ahora es canaco',
                "status" => 2,
            );
        } else if ($resultados[0]->factura == null) {
            $d =    array(
                "response_code" => 200,
                "response_type" => 'warning',
                "message" => 'el usuario requiere factura por favor subela para continuar',
                "status" => 1,
            );
        } else {
            $d =    array(
                "response_code" => 200,
                "response_type" => 'success',
                "message" => 'Puedes continuar',
                "status" => 3,
            );
        }


        echo json_encode($d);
    }
    public function se_subio_facturas($id)
    {
        //1 factura y no tiene datos
        // 2  no ocupa factura
        // 3 todo ok
        $resultados = $this->afiliacion_modal->subio($id);
        if ($resultados) {
            $d =    array(
                "response_code" => 200,
                "response_type" => 'success',
                "message" => 'Documentos se han subido de manera correcta',
                "status" => 2,
            );
        } else {
            $d =    array(
                "response_code" => 400,
                "response_type" => 'error',
                "message" => 'Algo sucedio mal por favor valida los documentos o intentalo más tarde',
                "status" => 0,
            );
        }


        echo json_encode($d);
    }
}
