<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafica_jefe extends CI_Controller
{

  private $usuario_id;

  public function __construct()
  {
    parent::__construct();

    is_user_logged_in();

    $this->usuario_id = $this->session->userdata('usuario_id');
    $this->rol_id     = $this->session->userdata('rol_id');
    update_user_estatus($this->usuario_id);
    $this->estatus_id = $this->session->userdata('estatus_id');
    $this->load->model('grafica_model');
  }



  public function index()
  {
    $allQro = $this->grafica_model->countqro();
    $allAmealco = $this->grafica_model->countamealco();
    $allArroyo = $this->grafica_model->countarroyo();
    $allCadereyta = $this->grafica_model->countcadereyta();
    $allColon = $this->grafica_model->countcolon();
    $allCorregidora = $this->grafica_model->countcorregidora();
    $allMarques = $this->grafica_model->countmarques();
    $allHuimilpan = $this->grafica_model->counthumilpan();
    $allJalpan = $this->grafica_model->countjalpan();
    $allPinamiller = $this->grafica_model->countpinamiller();
    $allAmoles = $this->grafica_model->countamoles();
    $allJoaquin = $this->grafica_model->countjoaquin();
    $allSanrio = $this->grafica_model->countsanrio();
    $allToliman = $this->grafica_model->counttoliman();
    $allTequis = $this->grafica_model->counttequis();
    $allLanda = $this->grafica_model->countlanda();
    $allEscobedo = $this->grafica_model->countescobedo();
    $allEzequiel = $this->grafica_model->countezequiel();
    $allComercios_unregistered = $this->grafica_model->countall_unregistered();
    $allComercios = $this->grafica_model->countall();

    $json =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "Queretaro"           =>  $allQro,
      "Amealco"             =>  $allAmealco,
      "Arroyo"              =>  $allArroyo,
      "Cadereyta"           =>  $allCadereyta,
      "Colon"               =>  $allColon,
      "Corregidora"         =>  $allCorregidora,
      "Elmarques"           =>  $allMarques,
      "Huimilpan"           =>  $allHuimilpan,
      "Jalpandeserra"       =>  $allJalpan,
      "Penamiller"          =>  $allPinamiller,
      "Pinal"               =>  $allAmoles,
      "Sanjoaquin"          =>  $allJoaquin,
      "Sanjuandelrio"       =>  $allSanrio,
      "Toliman"             =>  $allToliman,
      "Tequisquiapan"       =>  $allTequis,
      "Landa"               =>  $allLanda,
      "Escobedo"               =>  $allEscobedo,
      "Ezequiel"            =>  $allEzequiel,
      "All_unregistered" => (int)($allComercios_unregistered->total),
      "All" => (int)($allComercios->total),

    );

    $this->output->set_content_type('application/json');
    echo json_encode($json);
  }
  public function graficaMes()
  {
    $all1 = $this->grafica_model->countenero();
    $all2 = $this->grafica_model->countfeb();
    $all3 = $this->grafica_model->countmar();
    $all4 = $this->grafica_model->countapril();
    $all5 = $this->grafica_model->countmay();
    $all6 = $this->grafica_model->countjune();
    $all7 = $this->grafica_model->countjuly();
    $all8 = $this->grafica_model->countago();
    $all9 = $this->grafica_model->countsept();
    $all10 = $this->grafica_model->countoct();
    $all11 = $this->grafica_model->countnov();
    $all12 = $this->grafica_model->countdec();


    $sol1 = $this->grafica_model->sol1();
    $sol2 = $this->grafica_model->sol2();
    $sol3 = $this->grafica_model->sol3();
    $sol4 = $this->grafica_model->sol4();
    $sol5 = $this->grafica_model->sol5();
    $sol6 = $this->grafica_model->sol6();
    $sol7 = $this->grafica_model->sol7();
    $sol8 = $this->grafica_model->sol8();
    $sol9 = $this->grafica_model->sol9();
    $sol10 = $this->grafica_model->sol10();
    $sol11 = $this->grafica_model->sol11();
    $sol12 = $this->grafica_model->sol12();


    $nsol1 = $this->grafica_model->nsol1();
    $nsol2 = $this->grafica_model->nsol2();
    $nsol3 = $this->grafica_model->nsol3();
    $nsol4 = $this->grafica_model->nsol4();
    $nsol5 = $this->grafica_model->nsol5();
    $nsol6 = $this->grafica_model->nsol6();
    $nsol7 = $this->grafica_model->nsol7();
    $nsol8 = $this->grafica_model->nsol8();
    $nsol9 = $this->grafica_model->nsol9();
    $nsol10 = $this->grafica_model->nsol10();
    $nsol11 = $this->grafica_model->nsol11();
    $nsol12 = $this->grafica_model->nsol12();


    $pen1 = $this->grafica_model->pen1();
    $pen2 = $this->grafica_model->pen2();
    $pen3 = $this->grafica_model->pen3();
    $pen4 = $this->grafica_model->pen4();
    $pen5 = $this->grafica_model->pen5();
    $pen6 = $this->grafica_model->pen6();
    $pen7 = $this->grafica_model->pen7();
    $pen8 = $this->grafica_model->pen8();
    $pen9 = $this->grafica_model->pen9();
    $pen10 = $this->grafica_model->pen10();
    $pen11 = $this->grafica_model->pen11();
    $pen12 = $this->grafica_model->pen12();


    $cal1 = $this->grafica_model->cal1();
    $cal2 = $this->grafica_model->cal2();
    $cal3 = $this->grafica_model->cal3();
    $cal4 = $this->grafica_model->cal4();
    $cal5 = $this->grafica_model->cal5();
    $cal6 = $this->grafica_model->cal6();
    $cal7 = $this->grafica_model->cal7();
    $cal8 = $this->grafica_model->cal8();
    $cal9 = $this->grafica_model->cal9();
    $cal10 = $this->grafica_model->cal10();
    $cal11 = $this->grafica_model->cal11();
    $cal12 = $this->grafica_model->cal12();
    $totales =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 's',
      "1"             =>  $all1,
      "2"             =>  $all2,
      "3"             =>  $all3,
      "4"             =>  $all4,
      "5"             =>  $all5,
      "6"             =>  $all6,
      "7"             =>  $all7,
      "8"             =>  $all8,
      "9"             =>  $all9,
      "10"            =>  $all10,
      "11"            =>  $all11,
      "12"            =>  $all12,
    );
    $solventados =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 's',
      "1"             =>  $sol1,
      "2"             =>  $sol2,
      "3"             =>  $sol3,
      "4"             =>  $sol4,
      "5"             =>  $sol5,
      "6"             =>  $sol6,
      "7"             =>  $sol7,
      "8"             =>  $sol8,
      "9"             =>  $sol9,
      "10"            =>  $sol10,
      "11"            =>  $sol11,
      "12"            =>  $sol12,
    );
    $data['solventados'] = $solventados;
    $nsolventados =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 's',
      "1"             =>  $nsol1,
      "2"             =>  $nsol2,
      "3"             =>  $nsol3,
      "4"             =>  $nsol4,
      "5"             =>  $nsol5,
      "6"             =>  $nsol6,
      "7"             =>  $nsol7,
      "8"             =>  $nsol8,
      "9"             =>  $nsol9,
      "10"            =>  $nsol10,
      "11"            =>  $nsol11,
      "12"            =>  $nsol12,
    );
    $data['nsolventados'] = $nsolventados;
    $pendientes =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 's',
      "1"             =>  $pen1,
      "2"             =>  $pen2,
      "3"             =>  $pen3,
      "4"             =>  $pen4,
      "5"             =>  $pen5,
      "6"             =>  $pen6,
      "7"             =>  $pen7,
      "8"             =>  $pen8,
      "9"             =>  $pen9,
      "10"            =>  $pen10,
      "11"            =>  $pen11,
      "12"            =>  $pen12,
    );
    $data['pendientes'] = $pendientes;
    $calificadas =    array(
      "response_code" => 200,
      "response_type" => 'success',
      "message" => 's',
      "1"             =>  $cal1,
      "2"             =>  $cal2,
      "3"             =>  $cal3,
      "4"             =>  $cal4,
      "5"             =>  $cal5,
      "6"             =>  $cal6,
      "7"             =>  $cal7,
      "8"             =>  $cal8,
      "9"             =>  $cal9,
      "10"            =>  $cal10,
      "11"            =>  $cal11,
      "12"            =>  $cal12,
    );
    $data['calificadas'] = $calificadas;
    $data['totales'] = $totales;
    $this->output->set_content_type('application/json');
    echo json_encode($data);
  }
  public function datos_cp()
  {
    $allCp = $this->grafica_model->get_cp();
    $d =    array(
      "response_code"   => 200,
      "response_type"   => 'success',
      "message"         =>    's',
      'allCp' => $allCp,
    );
    echo json_encode($d);
  }
  public function total_afiliaciones_actuales()
  {
    $data = $this->grafica_model->total_afiliaciones_actuales();
    echo json_encode($data);
  }
  public function no_oportunidades_negocio()
  {
    $data = $this->grafica_model->no_oportunidades_negocio();
    echo json_encode($data);
  }
}
