<?php

/**
 * @author    Raúl Zavaleta Zea <raul.zavaletazea@gmail.com>
 * @package   application.helpers
 * @copyright 2019 Losn International, Todos los Derechos Reservados
 * @version   1.0
 */

defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set("America/Mexico_City");

if (!function_exists("app_name")) {
    /**
     * Retornamos el nombre comercial del proyecto
     * @return String Nombre del proyecto
     */
    function app_name()
    {
        return "ENLACE - CANACO";
    }
}

if (!function_exists("safe_url")) {
    /**
     * A partir de una cadena de texto, generamos un parametro valido en URL
     * @param  String $cadena cadena d etexto
     * @return String         parametro valido de URL
     */
    function safe_url($cadena)
    {
        $cadena = safe_string($cadena);
        $cadena = strtolower($cadena);
        $cadena = str_replace(" ", "-", $cadena);

        return $cadena;
    }
}

if (!function_exists('limpia_telefono')) {
    /**     
     * Eliminamos los caracteres extras del telefono
     *
     * A partir del telefono con mascara (999) 999-99-99
     * eliminamoos los valores extras y solo nos quedamos con los
     * numros 
     *
     * @since   1.0
     * @version 1.0
     * @author  Raul Zavaleta Zea <raul.zavaletazea@kiapp.mx>  
     * @param   String $telefono  Telefono con mascara
     * @return  String            El telefono sólo en formato numérico 
     */
    function limpia_telefono($telefono)
    {
        $telefono = str_replace(" ", "", $telefono);
        $telefono = str_replace("(", "", $telefono);
        $telefono = str_replace(")", "", $telefono);
        $telefono = str_replace("-", "", $telefono);

        return $telefono;
    }
}

if (!function_exists('fancy_telefono')) {
    /**
     * [fancya_telefono description]
     * @param  [type] $telefono [description]
     * @return [type]           [description]
     */
    function fancy_telefono($telefono)
    {
        $fancy_telefono = "(" . substr($telefono, 0, 3) . ") ";
        $fancy_telefono .= substr($telefono, 3, 3) . "-";
        $fancy_telefono .= substr($telefono, 6, 4);

        return $fancy_telefono;
    }
}

if (!function_exists("json_header")) {
    /**
     * Generamos una cabecera de contenido JSON con
     * charset urf-8 
     * @return void
     */
    function json_header()
    {
        header('Content-Type: application/json; charset=utf-8');
    }
}

if (!function_exists("http_error")) {
    /**
     * Generamos una cabecera http a partir de los codigos de 
     * error estandar de HTTP
     * @param  int $error_code numero de error defecto de http
     * @return void
     */
    function http_error($error_code = 404)
    {
        header('X-PHP-Response-Code: ' . $error_code, true, (int) $error_code);
    }
}

if (!function_exists("safe_string")) {
    /**
     * limpiamos los caracteres especiales de una cadena de 
     * texto, nada mas agregale mas caracteres.
     *
     * De nada paps...
     * 
     * @param  String  $string   cadena de texto a limpiar
     * @param  boolean $espacios define si respetamos los espacios o los 
     *                           reemplazamos por guiones medios
     * @return String            Cadena sin caracteres especiales
     */
    function safe_string($string, $espacios = FALSE)
    {
        $string = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $string);
        $string = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $string);
        $string = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $string);
        $string = str_replace(array('í', 'ì', 'î', 'ï'), "i", $string);
        $string = str_replace(array('é', 'è', 'ê', 'ë'), "e", $string);
        $string = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $string);
        $string = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $string);
        $string = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $string);
        $string = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $string);
        $string = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $string);
        $string = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $string);
        $string = str_replace("ç", "c", $string);
        $string = str_replace("Ç", "C", $string);
        $string = str_replace("ñ", "ni", $string);
        $string = str_replace("Ñ", "NI", $string);
        $string = str_replace("Ý", "Y", $string);
        $string = str_replace("ý", "y", $string);

        $string = str_replace("&aacute;", "a", $string);
        $string = str_replace("&Aacute;", "A", $string);
        $string = str_replace("&eacute;", "e", $string);
        $string = str_replace("&Eacute;", "E", $string);
        $string = str_replace("&iacute;", "i", $string);
        $string = str_replace("&Iacute;", "I", $string);
        $string = str_replace("&oacute;", "o", $string);
        $string = str_replace("&Oacute;", "O", $string);
        $string = str_replace("&uacute;", "u", $string);
        $string = str_replace("&Uacute;", "U", $string);

        $string = str_replace(",", "", $string);
        $string = str_replace(":", "", $string);
        $string = str_replace(";", "", $string);
        $string = str_replace("(", "", $string);
        $string = str_replace(")", "", $string);
        $string = str_replace("+", "", $string);
        $string = str_replace("!", "", $string);
        $string = str_replace("¡", "", $string);
        $string = str_replace("$", "", $string);
        $string = str_replace("'", "", $string);

        return ($espacios) ? str_replace(" ", "-", $string) : $string;
    }
}

if (!function_exists('fancy_date')) {
    /**
     * creamos una feha con un formato especificado a partir de una fecha SQL
     * @param  Date   $sql_date     Fecha en formato SQL (yyyy-mm-dd)
     * @param  String $request_type Nomenclatura para el retorno de una fecha
     * 
     *                              $request_type = 'm-y' 
     *                              Retornamos solo el mes y el año de la fecha
     *                              fancy_date('1988-05-29', 'm-y')
     *                              <<mayo de 1988>>
     *
     *                              $request_type = 'd-m-y' 
     *                              Retornamos el día, mes y año
     *                              fancy_date('1988-05-29', 'd-m-y')
     *                              <<29 de mayo de 1988>>
     *
     *                              $request_type = 'd-m' 
     *                              Retornamos el mes y año
     *                              fancy_date('1988-05-29', 'd-m')
     *                              <<29 de mayo>>
     *
     *                              $request_type = 'w-d-m-y' 
     *                              Retornamos el día de la semana, 
     *                              el día del mes, el mes y año
     *                              fancy_date('1988-05-29', 'w-d-m-y')
     *                              <<domingo 29 de mayo de 1988>>
     *
     *                              $request_type = 'w-d-m-y-h' 
     *                              Retornamos el día de la semana, 
     *                              el día del mes, el mes, año y hora
     *                              fancy_date('1988-05-29 23:34', 'w-d-m-y-h')
     *                              <<domingo 29 de mayo de 1988 a las 23:34H>>
     *
     *                              $request_type = 'w' 
     *                              Retornamos el día de la semana
     *                              fancy_date('1988-05-29', 'w')
     *                              <<domingo>>
     *
     *                              $request_type = 'd-m-y-h' 
     *                              Retornamos el día del mes, el mes, 
     *                              año y hora
     *                              fancy_date('1988-05-29 23:34', 'd-m-y-h')
     *                              <<29 de mayo de 1988 a las 23:34H>>
     *
     *                              $request_type = 'slash' 
     *                              Retornamos el día del mes, el mes y el año
     *                              separado por diagonales
     *                              fancy_date('1988-05-29', 'slash')
     *                              <<29/mayo/1988>>
     *                              
     * @return String               Fecha en el formato especificado
     */
    function fancy_date($sql_date = '', $request_type = NULL)
    {
        $arr_month = array(
            '01' => 'enero',
            '02' => 'febrero',
            '03' => 'marzo',
            '04' => 'abril',
            '05' => 'mayo',
            '06' => 'junio',
            '07' => 'julio',
            '08' => 'agosto',
            '09' => 'septiembre',
            '10' => 'octubre',
            '11' => 'noviembre',
            '12' => 'diciembre'
        );

        $arr_week = array(
            'Mon'  => 'Lunes',
            'Tue'  => 'Martes',
            'Wed'  => 'Miércoles',
            'Thu'  => 'Jueves',
            'Fri'  => 'Viernes',
            'Sat'  => 'Sábado',
            'Sun'  => 'Domingo'
        );

        // echo $sql_date;

        $year  = substr($sql_date, 0, 4);
        $month = substr($sql_date, 5, 2);
        $day   = substr($sql_date, 8, 2);
        $hour  = substr($sql_date, 11, 8);

        $year = !$year ? 0 : $year;
        $month = !$month ? 0 : $month;
        $day = !$day ? 0 : $day;

        if (checkdate($month, $day, $year)) {
            $timestamp = strtotime($sql_date);
            $str_day   = date('D', $timestamp);
            $day       = (int) $day;

            switch ($request_type) {
                case 'm-y':
                    return $arr_month[$month] . ' de ' . $year;
                    break;

                case 'd-m-y': //REGRESAREMOS EL DIA, MES Y EL AÑO
                    return $day . ' de ' . $arr_month[$month] . ' de ' . $year;
                    break;

                case 'd-m': //REGRESAREMOS EL DIA Y EL MES
                    return $day . ' de ' . $arr_month[$month];
                    break;

                case 'w-d-m-y': //REGRESA EL DIA DE LA SEMANA, DIA DEL MES, MES Y AÑO
                    return $arr_week[$str_day] . ' ' . $day . ' de ' . $arr_month[$month] . ' de  ' . $year;
                    break;

                case 'w-d-m-y-h': //REGRESA EL DIA DE LA SEMANA, DIA DEL MES, MES Y AÑO Y LA HORA
                    return $arr_week[$str_day] . ' ' . $day . ' de ' . $arr_month[$month] . ' de  ' . $year . ' a las ' . $hour . 'Hrs';
                    break;

                case 'w': //REGRESA EL DIA DE LA SEMANA
                    return $arr_week[$str_day];
                    break;

                case 'd-m-y-h': //REGRESAREMOS EL DIA, MES Y EL AÑO Y LA HORA
                    return $day . ' de ' . $arr_month[$month] . ' de ' . $year . ' a las ' . $hour . 'Hrs';
                    break;

                case 'slash': //REGRESAREMOS EL DIA, MES Y EL AÑO
                    return $day . '/' . $month . '/' . $year;
                    break;

                case 'slash-ml': //REGRESAREMOS EL DIA, MES EN LETRA Y EL AÑO
                    return $day . '/' . strtoupper(substr($arr_month[$month], 0, 3)) . '/' . $year;
                    break;

                default:
                    return $day . ' de ' . $arr_month[$month] . ' de ' . $year;
                    break;
            }
        } else {
            return "NA";
        }
    }
}

if (!function_exists('get_config_value')) {
    /**
     * Tomamos un valor de configuracion de la base de datos
     * @param  String $config_id indice buscado
     * @return String            valor de la configuracion
     */
    function get_config_value($config_id)
    {
        $CI = &get_instance();
        $CI->load->model('common_model');
        return $CI->common_model->get_config_value($config_id);
    }
}


if (!function_exists('is_user_logged_in')) {
    /**
     * Revisamos si se cuenta con una sesión activa          
     * @param  boolean $login Si no econtramos en la sección d elogin, buscamos 
     *                        redireccionar al panel de control, en las demas 
     *                        secciones es inverso, enviamos al login
     * @return Void           Redireccionamos al controlador designado
     */
    function is_user_logged_in($login = FALSE)
    {
        $CI = &get_instance();
        if ($login) {
            if ($CI->session->userdata('signin')) {
                redirect(base_url('app/home'), 'refresh');
            }
        } else if (!$login) {
            if (!$CI->session->userdata('signin')) {
                $CI->session->set_flashdata('message', '<h3> <i class="fas fa-exclamation-triangle"></i> Acceso Restringido</h3> Por favor inicia sesión para continuar');
                $CI->session->set_flashdata('message_type', 'danger');
                redirect(base_url('login'));
            }
        }
    }
}

if (!function_exists('update_user_estatus')) {
    /**
     * Actualizamos el estatus del usuario en cada petición a un controlador
     * @param  int  $usuario_id id del usuario con sesion activa
     * @return void             actualizamos el estatus de la sesion en la lista 
     *                          de sesiones (userData)
     */
    function update_user_estatus($usuario_id)
    {
        $CI = &get_instance();
        $CI->load->model('auth_model');
        $CI->session->set_userdata("estatus_id", $CI->auth_model->get_estatus_by_user_id($usuario_id));
    }
}

if (!function_exists('fuchi_wakala')) {
    /**
     * Eliminamos las sesiones y direccionamos al login
     * @return void retornamos al inicio sin sesiones
     */
    function fuchi_wakala($redir = TRUE)
    {
        $CI = &get_instance();
        $CI->session->sess_destroy();
        $CI->session->set_flashdata('message', '<h3> <i class="fas fa-exclamation-triangle"></i> Acceso Restringido</h3> Por favor inicia sesión para continuar');
        $CI->session->set_flashdata('message_type', 'danger');

        if ($redir) {
            redirect(base_url('login'), 'refresh');
        }
    }
}

if (!function_exists('get_role_permission')) {
    /**
     * Definimos si el usuario tiene acceso a ese modulo / sección
     * @param  int      $estatus_id estatus dle usuario
     * @param  int      $rol_id     rol del usuario
     * @param  String   $elem_type  tipo de acceso (modulo o sección)
     * @param  id       $elem_id    id del elemento a acceder (modulo o sección)
     * @param  boolean  $finish     indica si al no tener el permiso finalizamos
     *                              la sesión
     * @return int?NULL             En caso de contar con el permiso retornamos
     *                              el identificador del permiso, de lo contrario
     *                              retornamos NULL
     */
    function get_role_permission($estatus_id, $rol_id, $elem_type, $elem_id, $finish = TRUE)
    {
        if ($estatus_id == 3) {
            $CI = &get_instance();
            $CI->load->model('auth_model');
            $permiso_id = $CI->auth_model->get_role_permission_in_module_section($rol_id, $elem_type, $elem_id);
            if (is_null($permiso_id)) {
                if ($finish)
                    fuchi_wakala();
                else
                    return NULL;
            } else {
                return $permiso_id;
            }
        } else {
            fuchi_wakala();
        }
    }
}

if (!function_exists('get_section_module_data')) {
    /**
     * Retornamos la info del módulo o seccion del id dado
     * @param  String   $elem_type  tipo de acceso (modulo o sección)
     * @return Object               Objeto con los datos de la sección
     */
    function get_section_module_data($elem_type, $elem_id)
    {
        $CI = &get_instance();
        $CI->load->model('auth_model');
        return $CI->auth_model->get_section_module_data($elem_type, $elem_id);
    }
}

if (!function_exists('get_module_data_by_sec')) {
    /**
     * Retornamos la info del módulo del id dado
     * @param  int      $seccion_id id del la sección dada
     * @return Object               Objeto con los datos del módulo
     */
    function get_module_data_by_sec($seccion_id)
    {
        $CI = &get_instance();
        $CI->load->model('auth_model');
        return $CI->auth_model->get_module_data_by_sec($seccion_id);
    }
}

if (!function_exists('get_role_menu')) {
    /**
     * Armamos el menu de modulo para el rol en cuestion
     * @param  int $rol_id            Rol del usuario actual
     * @param  int $active_module_id  Modulo en el que se encuentra
     * @param  int $active_seccion_id Seccion en la que se encuentra
     * @return String                 Cadena con el contenido HTML del menu
     *                                correspondiente al rol del usuario
     */
    function get_role_menu($rol_id, $active_modulo_id, $active_seccion_id = NULL)
    {
        $CI = &get_instance();
        $CI->load->model('auth_model');
        $rol_modules = $CI->auth_model->get_modules_by_role($rol_id);

        $menu_html = "";
        $submenu_html = "";


        foreach ($rol_modules as $module) {

            $menu_html .= '
            <li' . (((int)$module->modulo_id == $active_modulo_id) ? ' class="active"' : NULL) . '>
            <a href="' . (is_null($module->url_mod) ? '#module-' . $module->modulo_id : base_url($module->url_mod)) . '">
            ' . $module->ico_mod . '
            ' . $module->nombre_mod . '                 
            </a>
            </li>
            ';

            if (is_null($module->url_mod)) {
                $sections_module = $CI->auth_model->get_module_sections_by_role($rol_id, $module->modulo_id);

                if (!is_null($sections_module)) {
                    $submenu_html .= '<ul class="list-unstyled" data-link="module-' . $module->modulo_id . '">';

                    foreach ($sections_module as $section) {


                        if (!is_null($section->url_sec)) :
                            $submenu_html .= '<li id="' . $section->nombre_sec . '"' . (((int)$section->seccion_id == $active_seccion_id) ? ' class="active"' : NULL) . '>';
                            $submenu_html .= '<a href="' . base_url($section->url_sec) . '">
                            ' . $section->ico_sec . ' <span class="d-inline-block">' . $section->nombre_sec . '</span>
                            </a>';
                        else :
                            $submenu_html .= '<li id="' . $section->nombre_sec . '"' . (((int)$section->seccion_id == $active_seccion_id) ? ' class="active"' : NULL) . ' style="    margin-left: 5px !important;">';
                            $submenu_html .= '<a style="cursor: text !important;"><strong>' . $section->ico_sec . ' <span class="d-inline-block">' . $section->nombre_sec . '</span></strong></a>';
                        endif;
                        $submenu_html .= '</li>';
                    }

                    $submenu_html .= '</ul>';
                }
            }
        }

        return array("menu" => $menu_html, "submenu" => $submenu_html);
    }
}

if (!function_exists('can_i_add')) {
    /**
     * Revisamos si tenemos el permiso para agregar en la sección donde se encuentre
     * @param  int $permiso_id        Permiso del rol del usuario 
     *                                para la sección
     * @return Boolean                
     */
    function can_i_add($permiso_id)
    {
        return ($permiso_id == 2 || $permiso_id == 3 || $permiso_id == 4)
            ? TRUE
            : FALSE;
    }
}

if (!function_exists('can_i_edit')) {
    /**
     * Revisamos si tenemos el permiso para editar en la sección donde se encuentre
     * @param  int $permiso_id        Permiso del rol del usuario 
     *                                para la sección
     * @return Boolean                
     */
    function can_i_edit($permiso_id)
    {
        return ($permiso_id == 3 || $permiso_id == 4)
            ? TRUE
            : FALSE;
    }
}

if (!function_exists('can_i_remove')) {
    /**
     * Revisamos si tenemos el permiso para editar en la sección donde se encuentre
     * @param  int $permiso_id        Permiso del rol del usuario 
     *                                para la sección
     * @return Boolean                
     */
    function can_i_remove($permiso_id)
    {
        return ($permiso_id == 4)
            ? TRUE
            : FALSE;
    }
}

if (!function_exists('var_dump_format')) {
    /**
     * Retornamos un var_dump formateado
     */
    function var_dump_format($expression)
    {
        echo "<pre>";
        var_dump($expression);
        echo "</pre>";
    }
}

if (!function_exists('send_mail')) {
    function send_mail($user_send, $to_email, $asunto, $html = '', $attach = NULL, $attach2 = NULL)
    {
        $CI = &get_instance();
        $CI->load->library('email', NULL, 'ci_email');
        /*$config['mailpath'] = '/usr/sbin/sendmail';*/
        $config['protocol'] = 'smtp';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_host'] =  'enlacecanaco.org';
        $config['smtp_user'] =  'sistema@enlacecanaco.org';
        $config['smtp_pass'] =  'V7g6vrXwzLw6dypB';
        $config['smtp_port'] =  465;
        $config['smtp_crypto'] =  'ssl';
        $config['mailtype'] =  'html';
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $CI->ci_email->initialize($config);

        $from_email = "sistema@enlacecanaco.org";

        $CI->ci_email->from($from_email, $user_send);
        $CI->ci_email->to($to_email);
        $CI->ci_email->subject($asunto);
        if (!is_null($attach)) {
            // var_dump($attach);
            $CI->ci_email->attach($attach);
        }
        if (!is_null($attach2)) {
            // var_dump($attach);
            $CI->ci_email->attach($attach2);
        }
        $CI->ci_email->message($html);
        $CI->ci_email->send();
        /*var_dump_format($CI->ci_email->print_debugger());*/
    }
}

if (!function_exists('get_comercio_id')) {
    /**
     * [get_comercio_id description]
     * @param  [type] $usuario_id [description]
     * @return [type]             [description]
     */
    function get_comercio_id($usuario_id)
    {
        $CI = &get_instance();
        $CI->load->model('common_model');

        return $CI->common_model->get_comercio_id($usuario_id);
    }
}

if (!function_exists("lipsum")) {
    /**
     * Funcion que retorna el lipsum
     */
    function lipsum()
    {
        return "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    }
}

if (!function_exists("mini_lipsum")) {
    /**
     * Funcion que retorna el lipsum acotado
     */
    function mini_lipsum()
    {
        return "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
    }
}

if (!function_exists("micro_lipsum")) {
    /**
     * Funcion que retorna el lipsum acotado
     */
    function micro_lipsum()
    {
        return "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    }
}
