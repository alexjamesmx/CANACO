<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Files extends CI_Controller

{
    private $usuario_id;
    private $rol_id;
    private $estatus_id;
    private $permiso_id;

    public function __construct()
    {
        parent::__construct();
        is_user_logged_in();
        $this->load->helper('download');
        $this->usuario_id = $this->session->userdata('usuario_id');
        $this->rol_id     = $this->session->userdata('rol_id');
        update_user_estatus($this->usuario_id);
        $this->estatus_id = $this->session->userdata('estatus_id');

        $this->load->model('accounts_model');
        $this->load->model('File_model');
        $this->load->model('actividad_model');
        $this->load->model('tipoActividad_model');
        $this->load->model('afiliacion_modal');
        $this->load->model('Reg_user');
        $this->load->model('Mensaje_model');
        $this->load->model('Notificacion_model');
        $this->load->model('Afiliate_model');
        $this->load->model('Prueba_model_f');
        $this->load->model('Validacion_model');
        $this->load->model('Oportunidades_negocio_model');
        $this->load->model('perfil_model');
    }

    public function borrar_cp()
    {
        json_header();

        $IDC   = get_comercio_id($this->usuario_id);
        $data_cv = array(
            "cv_doc"          => null,
        );
        $this->perfil_model->borrar_cp($IDC, $data_cv);
        $d =    array(
            "response_code" => 200,
            "response_type" => 'success',
            "message" => 'Tu cp ha sido eliminado',
        );
        echo json_encode($d);
    }

    public function subirArchivo()
    {
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
        json_header();
        $clave = $this->usuario_id;
        $ds     = $this->Prueba_model_f->get_comers($clave);
        if (!is_null($this->permiso_id)) {
            $this->input->post('s');
            foreach ($ds as $d) {
                $sd = $d->negocio_id;
            }

            $hoy = date("YmdHis");
            $nuevoNombreImg = "shshsjsa" . $sd . $hoy = date("YmdHis");;
            $config['file_name'] = strtolower($nuevoNombreImg);
            $config['upload_path'] = 'static/uploads/archivos/';
            $config['allowed_types'] = 'pdf|xlsx|docx';
            $config['max_size'] = '20048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('docs1')) {

                $data['errorArch'] = $this->upload->display_errors();
                $d =  array(
                    "response_code" => 400,
                    "response_type" => 'error',
                    "message" => "Archivos no subido",
                );
            } else {

                $clave = $this->usuario_id;
                $file_info = $this->upload->data();

                $archivo = $file_info['file_name'];
                $data = array(
                    'cv_act_constitutiva'        =>         $archivo,
                    'cv_act_constitutiva_status' =>          1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d =  array(

                        "response_code" => 200,

                        "response_type" => 'success',

                        "message" => "Negocio actualizado satisfactoriamente",

                    );
                    //   echo json_encode($d);
                } else {

                    $d =  array(

                        "response_code" => 400,

                        "response_type" => 'error',

                        "message" => "Problemas al subir documento",


                    );
                    //  echo json_encode($d);
                }
            }
            //2    
            $hoy = date("YmdHis");

            $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;

            $config['file_name'] = strtolower($nuevoNombreImg);

            $config['upload_path'] = 'static/uploads/archivos/';

            $config['allowed_types'] = 'pdf|xlsx|docx';

            $config['max_size'] = '20048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('docs2')) {

                $data['errorArch'] = $this->upload->display_errors();


                $d1 =  array(

                    "response_code" => 400,

                    "response_type" => 'error',

                    "message" => "Problemas al subir documento",


                );
                // echo json_encode($d1);
            } else {


                $file_info = $this->upload->data();

                $archivo = $file_info['file_name'];
                $data = array(
                    'cv_compro_domicio' => $archivo,
                    'cv_compro_domicio_status' => 1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d1 =  array(

                        "response_code" => 200,

                        "response_type" => 'success',

                        "message" => "Negocio actualizado satisfactoriamente",

                    );
                    //  echo json_encode($d1);
                } else {

                    $d =  array(

                        "response_code" => 400,

                        "response_type" => 'error',

                        "message" => "Problemas al subir documento",


                    );
                    //    echo json_encode($d1);
                }
            }
            //3
            $hoy = date("YmdHis");

            $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;

            $config['file_name'] = strtolower($nuevoNombreImg);

            $config['upload_path'] = 'static/uploads/archivos/';

            $config['allowed_types'] = 'pdf|xlsx|docx';

            $config['max_size'] = '20048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('docs3')) {

                $data['errorArch'] = $this->upload->display_errors();
                $d2 =  array(

                    "response_code" => 400,

                    "response_type" => 'error',

                    "message" => "Problemas al subir documento",

                );
                //  echo json_encode($d2);
            } else {

                $file_info = $this->upload->data();

                $archivo = $file_info['file_name'];
                $data = array(
                    'cv_ine' => $archivo,
                    'cv_ine_status' => 1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d2 =  array(
                        "response_code" => 200,
                        "response_type" => 'success',
                        "message" => "Negocio actualizado satisfactoriamente",

                    );
                } else {

                    if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                        $d2 =  array(

                            "response_code" => 200,

                            "response_type" => 'success',

                            "message" => "Problemas al subir documento",

                        );
                        // echo json_encode($d2);
                    } else {

                        $d2 =  array(

                            "response_code" => 400,

                            "response_type" => 'error',

                            "message" => "Problemas al subir documento",


                        );
                        //    echo json_encode($d2);
                    }
                }
            }
            //    4
            $hoy = date("YmdHis");

            $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;

            $config['file_name'] = strtolower($nuevoNombreImg);

            $config['upload_path'] = 'static/uploads/archivos/';

            $config['allowed_types'] = 'pdf|xlsx|docx';

            $config['max_size'] = '20048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('docs4')) {

                $data['errorArch'] = $this->upload->display_errors();
                $d3 =  array(

                    "response_code" => 400,

                    "response_type" => 'error',

                    "message" => "Problemas al subir documento",


                );
                // echo json_encode($d3);

            } else {



                $file_info = $this->upload->data();

                $archivo = $file_info['file_name'];
                $data = array(

                    'cv_costancia_fiscal' => $archivo,
                    'cv_costancia_fiscal_status' => 1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d3 =  array(

                        "response_code" => 200,

                        "response_type" => 'success',

                        "message" => "Negocio actualizado satisfactoriamente",

                    );
                    //  echo json_encode($d3);
                } else {

                    $d3 =  array(

                        "response_code" => 400,

                        "response_type" => 'error',

                        "message" => "Problemas al subir documento",


                    );
                    //    echo json_encode($d3);
                }
            }
            //    5
            $hoy = date("YmdHis");

            $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;

            $config['file_name'] = strtolower($nuevoNombreImg);

            $config['upload_path'] = 'static/uploads/archivos/';

            $config['allowed_types'] = 'pdf|xlsx|docx';

            $config['max_size'] = '20048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('docs5')) {

                $data['errorArch'] = $this->upload->display_errors();
                $d4 =  array(

                    "response_code" => 400,

                    "response_type" => 'error',

                    "message" => "Problemas al subir documento",


                );
            } else {
                $file_info = $this->upload->data();
                $archivo = $file_info['file_name'];
                $data = array(
                    'cv_catalgo' => $archivo,
                    'cv_catalogo_status' => 1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d4 =  array(
                        "response_code" => 200,
                        "response_type" => 'success',
                        "message" => "Negocio actualizado satisfactoriamente",
                    );
                } else {
                    $d4 =  array(
                        "response_code" => 400,
                        "response_type" => 'error',
                        "message" => "Problemas al subir documento",
                    );
                }
            }
            $hoy = date("YmdHis");
            $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");;
            $config['file_name'] = strtolower($nuevoNombreImg);
            $config['upload_path'] = 'static/uploads/archivos/';
            $config['allowed_types'] = 'pdf|xlsx|docx';
            $config['max_size'] = '20048';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('docs6')) {
                $data['errorArch'] = $this->upload->display_errors();
                $d5 =  array(
                    "response_code" => 400,
                    "response_type" => 'error',
                    "message" => "Problemas al subir documento",
                );
            } else {
                $file_info = $this->upload->data();
                $archivo = $file_info['file_name'];
                $data = array(
                    'cv_doc' => $archivo,
                    'cv_doc_status' => 1,
                );
                if ($subir = $this->Prueba_model_f->subir($data, $sd)) {
                    $d5 =  array(
                        "response_code" => 200,
                        "response_type" => 'success',
                        "message" => "Negocio actualizado satisfactoriamente",
                    );
                } else {
                    $d5 =  array(
                        "response_code" => 400,
                        "response_type" => 'error',
                        "message" => "Problemas al subir documento",
                    );
                }
            }
        }
        /*Si no tenemos permisos*/ else {

            fuchi_wakala($redir = FALSE);
        }
        redirect(base_url('app/myaccount'), 'refresh');
    }

    public function downloads($name)
    {

        $data = file_get_contents('./uploads/archivos/' . $name);
        force_download($name, $data);
    }

    public function subirImagen()
    {
        $clave = $this->usuario_id;
        $config['upload_path'] = 'static/uploads/test/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000';
        $hoy = date("YmdHis");

        $nuevoNombreImg = "shshsjsa" . $hoy = date("YmdHis");
        $config['file_name'] = strtolower($nuevoNombreImg);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileImagen")) {
            $bandera = 0;
        } else {
            $bandera = 1;
            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            $data = array(
                'negocio_logo' => $imagen
            );
        }
    }

    public function subirCotizacion($oportunidad)
    {
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
        json_header();
        $this->input->post('s');
        $hoy = date("YmdHis");
        $nuevoNombreImg = "cotizacion" . $hoy . $oportunidad;
        $config['file_name'] = strtolower($nuevoNombreImg);
        $config['upload_path'] = 'static/uploads/cotizaciones/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('cotizacion')) {
            $data['errorArch'] = $this->upload->display_errors();
            $d4 =  array(
                "response_code" => 400,
                "response_type" => 'error',
                "message" => "Problemas al subir documento",
            );
        } else {
            $file_info = $this->upload->data();
            $archivo = $file_info['file_name'];
            $data = array(
                'cotizacion_opng' => $archivo,
            );
            if ($subir = $this->Oportunidades_negocio_model->cotizacion($data, $oportunidad)) {
                $d4 =  array(
                    "response_code" => 200,
                    "response_type" => 'success',
                    "message" => "Negocio actualizado satisfactoriamente",
                );
                $id_cliente = $this->input->post('id_cliente');
                $opnegocio_id = $this->input->post('opnegocio_id');
                $id_req = $this->Reg_user->get_estatus_req($opnegocio_id);
                $mail = $this->Reg_user->get_name($id_cliente); //cambio por $this->usuarios_id
                $info = $this->Mensaje_model->info_req($opnegocio_id);
                $req_id = $info[0]->requerimiento_id;
                $id_cliente = $info[0]->comercio_id;
                $fecha = date("YmdHis");
                $this->Mensaje_model->agregar_detalle($req_id, $id_cliente, $fecha);
                $this->Reg_user->update_opnegocio($opnegocio_id, '18'); //debe estar 18
                $doc = $info[0]->cotizacion_opng;
                $email = $mail[0]->email_auth;
                $data_mail = $this->Notificacion_model->get_notificacion("14"); //traer la informacion de la notificacion correspondiente
                $this->load->view('app/private/components/noti', $data_mail);
                if (isset($doc)) {
                    $atach = base_url() . '/static/uploads/cotizaciones/' . $doc; // doc es el nombre de la coizacion gusradad en la base de  datos 
                } else {
                    $atach = null;
                }
                send_mail(
                    'ENLACE-CANACO', //Quien lo envia
                    $email, //destinatario rempplazar por $email
                    $data_mail->titulo, //asunto
                    $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                    $attach = $atach //adjunto
                );
            }
        }
        redirect(base_url('app/mis_oportunidades/misoportunidades/'), 'refresh');
    }

    public function subirRecibo()
    {
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
        json_header();
        $this->input->post('s');
        $hoy = date("YmdHis");
        $nuevoNombreImg = "recibo" . $hoy . $this->usuario_id;
        $config['file_name'] = strtolower($nuevoNombreImg);
        $config['upload_path'] = 'static/uploads/recibos/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';
        $this->load->library('upload', $config);
        $rec = $_FILES['r']['name'];
        if (!$this->upload->do_upload('r')) {
            $data['errorArch'] = $this->upload->display_errors();
            $d4 =  array(
                "response_code" => 400,
                "response_type" => 'error',
                "message" =>  'El formato debe ser PDF: ' . $rec
            );
        } else {
            $file_info = $this->upload->data();
            $archivo = $file_info['file_name'];
            //OBTENER MI INFORMACION PARA SABER SI TENGO AFILIADOR
            $miinfo = $this->Afiliate_model->me_registraron($this->usuario_id);

            if (isset($miinfo[0]->afiliador)) {
                $data = array(
                    'validacion_pago' => $archivo,
                    'estatus' => '25',
                    'afiliador_alta' => $miinfo[0]->afiliador

                );
            } else {
                $data = array(
                    'validacion_pago' => $archivo,
                    'estatus' => '25'
                );
            }
            if ($this->Afiliate_model->recibo($data, $this->usuario_id)) {
                $d4 =  array(
                    "response_code" => 200,
                    "response_type" => 'success',
                    "message" => "Recibo subido correctamente",
                );
            }
        }
        echo json_encode($d4);
    }

    public function subirReciboAfil()
    {
        $id = $this->input->post('id');
        $this->permiso_id  = get_role_permission($this->estatus_id, $this->rol_id, 'seccion', $seccion_id = 3, $finish = FALSE);
        json_header();
        $this->input->post('s');
        $hoy = date("YmdHis");
        $nuevoNombreImg = "recibo" . $hoy . $id;
        $config['file_name'] = strtolower($nuevoNombreImg);
        $config['upload_path'] = 'static/uploads/recibos/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('r')) {
            $data['errorArch'] = $this->upload->display_errors();
            $d4 =  array(
                "response_code" => 400,
                "response_type" => 'error',
                "message" => $data['errorArch'],
            );
        } else {
            $file_info = $this->upload->data();
            $archivo = $file_info['file_name'];
            $data = array(
                'validacion_pago' => $archivo,
                'estatus' => '25'
            );
            if ($this->Afiliate_model->recibo($data, $id)) {
                $d4 =  array(
                    "response_code" => 200,
                    "response_type" => 'success',
                    "message" => $id,
                );
            }
        }
        echo json_encode($d4);
    }

    public function subirfactura($id_clave)
    {
        $this->input->post('s');
        $inout = 'clave' . $id_clave;
        $formu = 'formulario' . $id_clave;
        $pdfs = 'pdf' . $id_clave;
        $xmls = 'xml' . $id_clave;
        $hoy = date("YmdHis");
        $nuevoNombrefac = "Factura" . $hoy;
        $config['file_name'] = strtolower($nuevoNombrefac);
        $config['upload_path'] = 'static/uploads/facturas_afiliaciones/';
        $config['allowed_types'] = 'pdf|xml';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        $file_info = $this->upload->data();
        $archivopd = $file_info['file_name'];
        if (!$this->upload->do_upload($pdfs)) {
            $data['errorArch'] = $this->upload->display_errors();
            $data_subir =  array(
                "response_code" => 400,
                "response_type" => 'error',
                "message" =>  $data['errorArch'],
            );
        } else {
            $file_info = $this->upload->data();
            $archivopd = $file_info['file_name'];
            $data_subir = array(
                'factura_pdf' => $archivopd,
            );
            $hoy = date("YmdHis");
            $nuevoNombrefac = "Facturaxml" . $hoy;
            $config['file_name'] = strtolower($nuevoNombrefac);
            $config['upload_path'] = 'static/uploads/facturas_afiliaciones/';
            $config['allowed_types'] = 'pdf|xml';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);
            $file_info = $this->upload->data();
            $archivoxm = $file_info['file_name'];
            if (!$this->upload->do_upload($xmls)) {
                $data['errorArch'] = $this->upload->display_errors();
                $data_subir =  array(
                    "response_code" => 400,
                    "response_type" => 'error',
                    "message" =>  $data['errorArch'],
                );
            } else {
                $file_info = $this->upload->data();
                $archivoxm = $file_info['file_name'];
                $data_subir_xml = array(
                    'factura_xml' => $archivoxm,
                );
                $this->File_model->subir_fatura($id_clave, $data_subir_xml);
            }
            $this->File_model->subir_fatura($id_clave, $data_subir);
            $correo = $this->File_model->get_correo_enviar($id_clave);
            $email = $correo[0]->email_auth;
            $data_mail = $this->Notificacion_model->get_notificacion("59");  //traer la informacion de la notificacion correspondiente
            if (isset($archivoxm)) {
                $atach = base_url() . '/static/uploads/facturas_afiliaciones/' . $archivoxm; // doc es el nombre de la coizacion gusradad en la base de  datos 
                $atach2 = base_url() . '/static/uploads/facturas_afiliaciones/' . $archivopd;
            } else {
                $atach = null;
            }
            send_mail(
                'ENLACE-CANACO', //Quien lo envia
                $email, //destinatario rempplazar por $email
                $data_mail->titulo, //asunto
                $html = ($this->load->view('app/private/components/noti', $data_mail, true)), //Cuerpo (puede ser una vista) 
                $attach =  $atach, //adjunto
                $attach2 =  $atach2  //adjunto
            );
        }
        echo json_encode($data_subir);
    }
}
