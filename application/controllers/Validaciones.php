<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validaciones extends CI_Controller
{

  private $usuario_id;
  private $rol_id;
  private $estatus_id;
  public function __construct()
  {
    parent::__construct();

    is_user_logged_in();

    $this->usuario_id = $this->session->userdata('usuario_id');
    $this->rol_id     = $this->session->userdata('rol_id');
    update_user_estatus($this->usuario_id);
    $this->estatus_id = $this->session->userdata('estatus_id');

    $this->load->model('accounts_model');
    $this->load->model('actividad_model');
    $this->load->model('tipoActividad_model');
    $this->load->model('Keywords_model');
    $this->load->model('Validacion_model');
    $this->load->model('Notificacion_model');
    $this->load->model('Comercio_model');
  }


  public function index()
  {
  }

  public function valirdar_locacion()
  {

    $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
    json_header();
    $ID = $this->usuario_id;
    $bandera_locacion = FALSE;
    $validacion_locacion = $this->Validacion_model->validacion_comercio($ID);

    foreach ($validacion_locacion as $data) {
      if (is_null($data->negocio_calle) || $data->negocio_calle == "") {
        $bandera_locacion = TRUE;
      }
      if (is_null($data->negocio_calle) || $data->negocio_calle == "") {
        $bandera_locacion = TRUE;
      }
      if (is_null($data->negocio_numero_ex) || $data->negocio_numero_ex == "") {
        $bandera_locacion = TRUE;
      }
      if (is_null($data->negocio_numero_int) || $data->negocio_numero_int == "") {
        $bandera_locacion = TRUE;
      }
      if (is_null($data->negocio_cp) || $data->negocio_cp == "") {
        $bandera_locacion = TRUE;
      }
    }
    // se se entrega false si se tienen datos
    if ($bandera_locacion) {

      $d =    array(
        "response_code" => 400,
        "response_type" => 'error',
        "message" => $bandera_locacion,
      );
    } else {
      $d =    array(
        "response_code" => 200,
        "response_type" => 'success',
        "message" => $bandera_locacion,
      );
    }

    echo json_encode($d);
  }
  // Crear entrada de 
  public function validacionGrande()
  {
    // json_header();

    $bandera_tractora = 0;

    //SI ES TRACTORA COMIENZA CON 100 DE VALORACION
    if ($this->rol_id == 19) {

      $bandera_datos_negocio = 1;
      $bandera_documentos = 1;
      $bandera_cv = 1;
      $bandera_afiliacion = 1;
      $bandera_tractora = 1;
      $bandera_datos_usuario = 95;

      $IDC   = get_comercio_id($this->usuario_id);
    }
    //COMERCIO SI TIENE VALORACION DINAMICA
    else {
      $bandera_datos_negocio = 25;
      $bandera_documentos = 10;
      $bandera_cv = 5;
      $bandera_afiliacion = 4;
      $bandera_datos_usuario = 26;
      $bandera_keywords = 30;

      //eliminar para tractoras
      $IDC  = get_comercio_id($this->usuario_id);
    }

    $bandera_modal = 0;

    $validacion_archivos = $this->Validacion_model->validacion_archivos($IDC);
    $validacion_afiliado = $this->Validacion_model->validacion_afiliado($this->usuario_id);
    $validacion_comercio = $this->Validacion_model->validacion_comercio($this->usuario_id);
    $validacion_usuario  = $this->Validacion_model->validacion_usuario($this->usuario_id);
    $validacion_keywords = $this->Validacion_model->valida_keywords($this->usuario_id);

    //afiliacion canaco 10
    foreach ($validacion_usuario as $data) {
      if (is_null($data->nombre)  || $data->nombre == "") {
        $bandera_datos_usuario = 0;
      } else if (is_null($data->email_auth) || $data->email_auth == "") {
        $bandera_datos_usuario = 0;
      } else if (is_null($data->telefono_auth) || $data->telefono_auth == "") {
        $bandera_datos_usuario = 0;
      }
    }
    foreach ($validacion_afiliado as $data3) {
      if ($data3->afiliado_canaco == 0 || $data3->afiliado_canaco == "") {
        $bandera_afiliacion = 0;
      }
    }


    if (is_null($validacion_archivos->cv_act_constitutiva) || $validacion_archivos->cv_act_constitutiva == "") {
      $bandera_documentos = 0;
    }
    if (is_null($validacion_archivos->cv_compro_domicio) || $validacion_archivos->cv_compro_domicio == "") {
      $bandera_documentos = 0;
    }
    if (is_null($validacion_archivos->cv_costancia_fiscal) || $validacion_archivos->cv_costancia_fiscal == "") {
      $bandera_documentos = 0;
    }
    if (is_null($validacion_archivos->cv_doc) || $validacion_archivos->cv_doc == "") {
      $bandera_cv = 0;
    }

    // datos negocios  15%
    foreach ($validacion_comercio as $data) {
      if (is_null($data->negocio_rfc)) {
        if (is_null($data->negocio_nombre) || $data->negocio_nombre == "") {
          $bandera_datos_negocio = 0;
        }
      } else {
        if (is_null($data->negocio_nombre) || $data->negocio_nombre == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_persona) || $data->negocio_persona == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_razon) || $data->negocio_razon == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_comp_correo) || $data->negocio_comp_correo == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_comp_nombre) || $data->negocio_comp_nombre == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_comp_numero) || $data->negocio_comp_numero == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_vent_nombre) || $data->negocio_vent_nombre == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_vent_whatsp) || $data->negocio_vent_whatsp == "") {
          $bandera_datos_negocio = 0;
        }
        if (is_null($data->negocio_rfc) || $data->negocio_rfc == "") {
          $bandera_datos_negocio = 0;
        }
      }
    }

    if (is_null($validacion_keywords)) {
      $bandera_keywords = 0;
    }



    $all = $bandera_datos_negocio + $bandera_documentos + $bandera_cv + $bandera_afiliacion + $bandera_datos_usuario + $bandera_keywords;

    //ACTUALIZAMOS EL PORCENTAJE DE COMPLETADO EN USUARIOS 
    $arr_update = array(
      "porcentaje"     => $all,
    );
    if ($this->Validacion_model->insert_porcentaje($this->usuario_id, $arr_update)) {
      if ($all >= 80) {

        // aqui valido mi bandera para mandar correo
        if ($this->Validacion_model->validar_bandera($this->usuario_id)) {
          $bandera_modal = 0;
        } else {
          $bandera_modal = 1;
          // aqui cuando no  tiene validacion
          $resultado_consult = $this->Comercio_model->newget_registro();
          $data_mail = $this->Notificacion_model->get_notificacion("2");
          $string = $data_mail->titulo;
          $data_mail->titulo = str_replace('%NOMBRE%', $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'), $string);

          $string = $data_mail->callback_users;
          $data_mail->callback_users = str_replace('$regsitro$', $resultado_consult->registros, $string);
          send_mail(
            'ENLACE-CANACO', //remitente
            $this->session->userdata('email_auth'), //destinatario
            $data_mail->notificacion, //asunto 
            $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //cuerpo  
            $attach = NULL
          );

          // aqui va el insert de la bandera
          $arr_bandera = array(
            "bandera_porcentaje"     => 1,
          );

          $this->Validacion_model->insert_bandera($this->usuario_id, $arr_bandera);
          if ($bandera_tractora == 1) {
            $this->Validacion_model->insert_bandera($this->usuario_id, $arr_bandera);
          }
        }
      } else {

        if ($bandera_tractora == 1) {
          $arr_bandera = array(
            "bandera_porcentaje"     => 1,
          );
        } else {
          $arr_bandera = array(
            "bandera_porcentaje"     => 0,
          );
        }
        $this->Validacion_model->insert_bandera($this->usuario_id, $arr_bandera);
      }
    }
    $d =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => $all,
      "bandera_datos_negocio" => $bandera_datos_negocio,
      "bandera_documentos" => $bandera_documentos,
      "bandera_cv" => $bandera_cv,
      "bandera_afiliacion" => $bandera_afiliacion,
      "bandera_datos_usuario" => $bandera_datos_usuario,
      "bandera_keywords" => $bandera_keywords,
      "bandera_modal" => $bandera_modal,
    );
    echo json_encode($d);
  }



  function email_notification($notification_id = 2)
  {
    $this->load->model('notificacion_model');
    $data['notification'] = $this->notificacion_model->get_notificacion($notification_id);
    if (!is_null($data['notification'])) {
      $titulo_perso = str_replace('%NOMBRE%', $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'), $data['notification']->titulo);
      // $data['titulo_perso'] = $titulo_perso;
      $this->load->view('app/private/components/notification_template', $data, FALSE);
    } else {
      die('
            <br>
            <br>
            <br>
            <center>
            <h1>ERROR</h1>
            <h2>DB_ROWS : 0</h2>
            <h3>#' . $notification_id . ' identificador no encontrado </h3>
            </center>
            ');
    }
  }
  //fin   
}
