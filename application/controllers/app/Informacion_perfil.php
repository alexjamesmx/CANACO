<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informacion_perfil extends CI_Controller
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
    $this->load->model('informacion_perfil_model');
    $this->load->model('Recompensas_model');
    $this->load->model('Notificacion_model');
    $this->load->model('Comercio_model');
  }

  /**
   * [validacionGrande description]
   * @return [type] [description]
   */

  public function index()
  {
  }
  public function update()
  {

    $comercio = get_comercio_id($this->usuario_id);
    $arr_comercio = array(
      "estatus"     => 1,
    );
    $this->informacion_perfil_model->insert_bandera($this->usuario_id, $arr_comercio);
    $d =    array(
      "response_code" => 200,
      "response_type" => 'success',

    );
    echo json_encode($d);
  }
  public function recompensas_mostrar()
  {
    $medallas_mostrar = array();
    $i = 0;
    $recompensa_m = $this->informacion_perfil_model->get_medallas_0($this->usuario_id);
    if (isset($recompensa_m)) {
      foreach ($recompensa_m as $medalla) {
        if ($medalla->estatus == 0) {
          $medallas_mostrar[$i] = array($medalla->medalla, $medalla->medalla_nombre, $medalla->medalla_descripcion);
          $i++;
        }
      }
    }

    $recompensa_i = $this->informacion_perfil_model->get_insignia_0($this->usuario_id);

    if (isset($recompensa_i)) {
      foreach ($recompensa_i as $insignia) {
        if ($insignia->estatus == 0) {
          $medallas_mostrar[$i] = array($insignia->insignia, $insignia->insignia_nombre, $insignia->insignia_descripcion);
          $i++;
        }
      }
    }

    $d =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => "",
      "respuesta" => $medallas_mostrar,
    );
    echo json_encode($d);
  }
  public function medalla1()
  {
    $medalla = 1;
    $insignia = 1;
    $cuantas_medallas = 0;
    $cuantas_insignias = 0;
    $cuantas_recompensas = $this->informacion_perfil_model->cuantas_recompensas($this->usuario_id);
    foreach ($cuantas_recompensas as $recompensa) {
      if (!is_null($recompensa->insignia)) {
        $cuantas_insignias = $cuantas_insignias + 1;
      } else {
        $cuantas_medallas = $cuantas_medallas + 1;
      }
    }
    if ($cuantas_insignias >= 5) {
      if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia)) {
        $hoy = date("Ymd");
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $this->Recompensas_model->insert_recompensas($data);
        $id_usuario = $this->session->userdata('usuario_id');
        $resultado = $this->Comercio_model->count_transacciones($id_usuario);
        $resultado1 = $this->Comercio_model->medallas($id_usuario);
        $tama = count($resultado1);
        $resultado2 = 5 - $tama;
        $data_mail = $this->Notificacion_model->get_notificacion("37");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%TOTAL%', $tama, $string);

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%FALTA%', $resultado2, $string);

        $string = $data_mail->llamado_accion;
        $data_mail->llamado_accion = str_replace('%TRANSACCIONES%', $resultado->transacc, $string);

        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );
        // no la tiene


      } else {
        // Ya la tiienee
      }
      if ($cuantas_medallas >= 5) {
        if ($this->informacion_perfil_model->validacion_medalla($this->usuario_id, $insignia)) {
          $hoy = date("Ymd");
          $data = array(
            "usuario" => $this->usuario_id,
            "medalla" => $medalla,
            "date_win" => $hoy,
            "estatus"  => 0,
          );
          $this->Recompensas_model->insert_recompensas($data);

          $resultado_consult = $this->Comercio_model->medallas($id_usuario);
          $tama = count($resultado_consult);
          $medallas = "Medallas:";
          $tama = $tama - 1;
          for ($x = 0; $tama >= $x; $x++) {
            $medallas = $medallas . ", " . $resultado_consult[$x]->obtenidas;
          }
          $resultado_consult2 = $this->Comercio_model->insignias($id_usuario);
          $tama1 = count($resultado_consult2);
          $tama1 = $tama1 - 1;
          $medallas = $medallas . ". Insignias:";
          for ($x = 0; $tama1 >= $x; $x++) {
            $medallas = $medallas . ", " . $resultado_consult2[$x]->obtenidas;
          }

          $data_mail = $this->Notificacion_model->get_notificacion("27");
          $string = $data_mail->titulo;
          $data_mail->titulo = str_replace(
            '%NOMBRE%',
            $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
            $string
          );
          send_mail(
            'ENLACE-CANACO', //Quien lo envia
            $this->session->userdata('email_auth'), //destinatario
            $data_mail->notificacion, //asunto 
            $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
            $attach = NULL //adjunto
          );
        } else {
        }
      }
    } else {
      // si no tiene las 5 validamos que nola tenga
      if (!$this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia)) {
        // aqui le parto su madre
        $this->Recompensas_model->borrar_insignia($insignia, $this->usuario_id);
        if (!$this->informacion_perfil_model->validar_medallas($this->usuario_id, $medalla)) {
          $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
        }
      }
    }
  }


  public function medalla8()
  {
    $medalla = 8;
    $bandera = 0;
    foreach ($this->informacion_perfil_model->top_transacciones() as $top) {
      if ($top->id == $this->usuario_id) {
        $bandera = 1;
      }
    }
    if ($this->informacion_perfil_model->validacion_medalla($this->usuario_id, $medalla)) {
      if ($bandera == 1) {
        $hoy = date("Ymd");
        $data = array(
          "usuario" => $this->usuario_id,
          "medalla" => $medalla,
          "date_win" => $hoy,
          "estatus"  => 0,
        );

        $this->Recompensas_model->insert_recompensas($data);

        $data_mail = $this->Notificacion_model->get_notificacion("34");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );


        $medals = $this->Notificacion_model->get_medallas($this->usuario_id);
        $medallas = (10 - $medals);
        $string2 = $data_mail->info_general;
        $data_mail->info_general = str_replace('%medals%', $medallas, $string2);


        $reqs = $this->Notificacion_model->reqpd();
        $string3 = $data_mail->llamado_accion;
        $data_mail->llamado_accion = str_replace('%publicados%', $reqs, $string3);


        $reqsr = $this->Notificacion_model->reqpdrs();

        if ($reqs > 0  || $reqsr > 0) {
          $porcentajehoy = ($reqsr / $reqs) * 100;
        } else {
          $porcentajehoy = 0;
        }

        $string4 = $data_mail->llamado_accion;
        $data_mail->llamado_accion = str_replace('%porcentaje%', $porcentajehoy, $string4);

        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );
      } else {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }
    } else {
      if ($bandera == 0) {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }
    }
  }

  public function prueba()
  {
    $data_mail = $this->Notificacion_model->get_notificacion("34");
    $string = $data_mail->titulo;
    $data_mail->titulo = str_replace(
      '%NOMBRE%',
      $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
      $string
    );


    $medals = $this->Notificacion_model->get_medallas($this->usuario_id);
    $medallas = (10 - $medals);
    $string2 = $data_mail->info_general;
    $data_mail->info_general = str_replace('%medals%', $medallas, $string2);


    $reqs = $this->Notificacion_model->reqpd();
    $string3 = $data_mail->llamado_accion;
    $data_mail->llamado_accion = str_replace('%publicados%', $reqs, $string3);


    $reqsr = $this->Notificacion_model->reqpdrs();
    $porcentajehoy = ($reqsr / $reqs) * 100;
    $string4 = $data_mail->llamado_accion;
    $data_mail->llamado_accion = str_replace('%porcentaje%', $porcentajehoy, $string4);

    send_mail(
      'ENLACE-CANACO', //Quien lo envia
      'j.lipe.cacino@gmail.com', //destinatario
      $data_mail->notificacion, //asunto 
      $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
      $attach = NULL //adjunto
    );
  }

  public function all_transacciones()
  {

    $medalla = 7;
    $porcentaje40 = 0;
    $procentaje2 = 0;
    $cuantos_oportunidades  = $this->informacion_perfil_model->cuantos_me_eligieron($this->usuario_id);
    $cuantos_requerimientos = $this->informacion_perfil_model->cuantos_solicite($this->usuario_id);
    $urgentes               = $this->informacion_perfil_model->urgentes($this->usuario_id);
    $cerrados               = $this->informacion_perfil_model->cerrados($this->usuario_id);
    $validacion_medalla7    = $this->informacion_perfil_model->validacion_medalla7($this->usuario_id);
    $urgentes_solventados   = $this->informacion_perfil_model->urgentes_solventados($this->usuario_id);
    $calificados            = $this->informacion_perfil_model->cuantos_califique($this->usuario_id);

    if ($cuantos_oportunidades == 0) {

      $porcentaje_medalla_5 = 0;
    } else {
      $porcentaje_medalla_5 = (($calificados / $cuantos_oportunidades) * 100);
    }

    // all_transacciones($porcentaje_medalla_5);
    //  var_dump($cuantos_oportunidades);
    //  var_dump($validacion_medalla8);
    $this->medalla5($porcentaje_medalla_5);
    $this->medalla8();
    $this->insignias_perfil();
    $this->lainsiginia_dorada();
    if ($validacion_medalla7) {

      // no la tiene bro
      if ($cuantos_oportunidades == 0) {
        $porcentaje40 = 0;
      } else {
        // var_dump('entrando');
        $porcentaje40 = (($urgentes_solventados / $cuantos_oportunidades) * 100);
        if ($porcentaje40  > 40) {
          // medalla            

          if ($this->Recompensas_model->validar_medallas($this->usuario_id, $medalla)) {
            //CUANDO YA TIENE UNA MEDALLA 
            $respuesta = array(

              "response_type" => 'complete',
              "message"       => 'd',

            );
          } else {
            $hoy = date("Ymd");
            // CUANDO NO TENEMOS MEDALLA
            $data = array(
              "usuario" => $this->usuario_id,
              "medalla" => $medalla,
              "date_win" => $hoy,
              "estatus"  => 0,
            );
            $respuesta = array(
              "response_type" => 'complete',
              "message"       => 'Felicidades por tu nueva medalla',
            );

            $this->Recompensas_model->insert_recompensas($data);
            $data_mail = $this->Notificacion_model->get_notificacion("33");
            $string = $data_mail->titulo;
            $data_mail->titulo = str_replace('%NOMBRE%', $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'), $string);
            send_mail(
              'ENLACE-CANACO', //Quien lo envia
              $this->session->userdata('email_auth'), //destinatario
              $data_mail->notificacion, //asunto 
              $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
              $attach = NULL //adjunto
            );
          }
        } else {
          $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
        }
      }
    } else {
      $porcentaje40 = (($urgentes_solventados / $cuantos_oportunidades) * 100);
      if ($porcentaje40  > 40) {
      } else {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }

      // ya tiene la medalla

    }
    $total = ($cuantos_requerimientos + $cuantos_oportunidades);
    $d =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 32,
      "procentaje"    => number_format((float)  $porcentaje40, 2, '.', ''),
      "oportunidades"     => $cuantos_oportunidades,
      "requerimientos"    => $cuantos_requerimientos,
      "urgentes"          => $urgentes,
      "calificados"       => $calificados,
      "total"             => $total,
    );
    echo json_encode($d);
  }


  public function  insignia($medalla1)
  {
    $medalla = 5;
    $validacion_medalla  = $this->informacion_perfil_model->validacion_medalla($this->usuario_id, $medalla);
    // var_dump($porcentaje);
    if ($validacion_medalla) {

      if ($porcentaje > 80) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "medalla" => $medalla,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);
        $data_mail = $this->Notificacion_model->get_notificacion("31");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );
        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );

        // fin de if porcentaje
      } else {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }
    }
  }
  public function  medalla5($porcentaje)
  {
    $medalla = 5;
    $validacion_medalla  = $this->informacion_perfil_model->validacion_medalla($this->usuario_id, $medalla);
    // var_dump($porcentaje);
    if ($validacion_medalla) {

      if ($porcentaje > 80) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "medalla" => $medalla,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);
        $data_mail = $this->Notificacion_model->get_notificacion("31");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );
        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );

        // fin de if porcentaje
      } else {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }
    } else {
      // ya la tiene 

      if ($porcentaje > 80) {
      } else {
        $this->Recompensas_model->borrar_medalla($medalla, $this->usuario_id);
      }
    }

    return TRUE;
  }
  public function  insignias_perfil()
  {
    //ALEX_NOTA

    $insignia10 = 10;
    $insignia8 = 8;
    $insignia14 = 14;
    $insignia11 = 11;

    if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia10)) {
      $IDC   = get_comercio_id($this->usuario_id); //funcion para traer al comercio del usuario
      if ($this->informacion_perfil_model->validar_liga_negocio($IDC)) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia10,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);
        $data_mail = $this->Notificacion_model->get_notificacion("46");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );
        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );

        // qui si tiene la 10
      } else {

        // no tiene la tienda online
      }
    } else {
      // ya la tiene 
    }
    if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia8)) {
      $IDC   = get_comercio_id($this->usuario_id); //funcion para traer al comercio del usuario
      if ($this->informacion_perfil_model->validar_liga_geo_localizacion($IDC)) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia8,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);
        $data_mail = $this->Notificacion_model->get_notificacion("44");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );
        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );

        // qui si tiene la 10
      } else {

        // no tiene la tienda online
      }
    } else {
      // ya la tiene 
    }
    if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia14)) {
      if ($this->informacion_perfil_model->surcusales($this->usuario_id)) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia14,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);

        $data_mail = $this->Notificacion_model->get_notificacion("45");
        $resultado_consult = $this->Comercio_model->countempresas();

        $resultado_consult1 = $this->Comercio_model->countoportunidades(date("Y-m-d 00:00:00"));


        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%EMPRESAS%', $resultado_consult->empresas, $string);

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%PUBLICACIONES%', $resultado_consult1->total, $string);

        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );
      }
    } else {
      // ya la tiene 
    }
    if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia11)) {
      if ($this->informacion_perfil_model->validar_8y10($this->usuario_id)) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia11,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);
        $data_mail = $this->Notificacion_model->get_notificacion("47");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );
        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );
      }
    } else {
      // ya la tiene 
    }

    return TRUE;
  }
  public function  lainsiginia_dorada()
  {
    $insignia1 = 1;


    // $insignia10_vali  = $this->informacion_perfil_model->validacion_insignia($this->usuario_id,$insignia10);
    // $insignia8_vali   = $this->informacion_perfil_model->validacion_insignia($this->usuario_id,$insignia8);
    // $insignia14_vali  = $this->informacion_perfil_model->validacion_insignia($this->usuario_id,$insignia14);
    // $insignia11_vali  = $this->informacion_perfil_model->validacion_insignia($this->usuario_id,$insignia11);
    // var_dump($porcentaje);
    if ($this->informacion_perfil_model->validacion_insignia($this->usuario_id, $insignia1)) {
      $IDC   = get_comercio_id($this->usuario_id); //funcion para traer al comercio del usuario
      if ($this->informacion_perfil_model->validardorada_5($this->usuario_id)) {
        $hoy = date("Ymd");
        // CUANDO NO TENEMOS MEDALLA
        $data = array(
          "usuario" => $this->usuario_id,
          "insignia" => $insignia1,
          "date_win" => $hoy,
          "estatus"  => 0,
        );
        $respuesta = array(
          "response_type" => 'complete',
          "message"       => 'Felicidades por tu nueva medalla',
        );

        $this->Recompensas_model->insert_recompensas($data);

        $id_usuario = $this->session->userdata('usuario_id');
        $resultado = $this->Comercio_model->count_transacciones($id_usuario);
        $resultado1 = $this->Comercio_model->medallas($id_usuario);
        $tama = count($resultado1);
        $resultado2 = 5 - $tama;

        $data_mail = $this->Notificacion_model->get_notificacion("37");
        $string = $data_mail->titulo;
        $data_mail->titulo = str_replace(
          '%NOMBRE%',
          $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido1'),
          $string
        );

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%TOTAL%', $tama, $string);

        $string = $data_mail->info_general;
        $data_mail->info_general = str_replace('%FALTA%', $resultado2, $string);

        $string = $data_mail->llamado_accion;
        $data_mail->llamado_accion = str_replace('%TRANSACCIONES%', $resultado->transacc, $string);

        send_mail(
          'ENLACE-CANACO', //Quien lo envia
          $this->session->userdata('email_auth'), //destinatario
          $data_mail->notificacion, //asunto 
          $html = ($this->load->view('app/private/components/notificacion_100por', $data_mail, true)), //Cuerpo (puede ser una vista) 
          $attach = NULL //adjunto
        );
        // qui si tiene la 10
      } else {

        // no tiene la tienda online
      }
    } else {
      // ya la tiene 
    }

    return TRUE;
  }
}
