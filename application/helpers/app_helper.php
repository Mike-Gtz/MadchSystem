<?php
/**
 * @author    Raúl Zavaleta Zea <raul.zavaletazea@gmail.com>
 * @package   application.helpers
 * @copyright 2019 Losn International, Todos los Derechos Reservados
 * @version   1.0
 */

defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('America/Mexico_City');

if (!function_exists('app_name')) {
    /**
     * Retornamos el nombre comercial del proyecto
     * @return String Nombre del proyecto
     */
    function app_name()
    {
        return 'lomichis';
    }
}

if (!function_exists('safe_url')) {
    /**
     * A partir de una cadena de texto, generamos un parametro valido en URL
     * @param  String $cadena cadena d etexto
     * @return String         parametro valido de URL
     */
    function safe_url($cadena)
    {
        $cadena = safe_string($cadena);
        $cadena = strtolower($cadena);
        $cadena = str_replace(' ', '-', $cadena);

        return $cadena;
    }
}

 

if (!function_exists('json_header')) {
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

if (!function_exists('http_error')) {
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

if (!function_exists('safe_string')) {
    /**
     * limpiamos los caracteres especiales de una cadena de
     * texto, nada mas agregale mas caracteres.
     *
     *
     * @param  String  $string   cadena de texto a limpiar
     * @param  boolean $espacios define si respetamos los espacios o los
     *                           reemplazamos por guiones medios
     * @return String            Cadena sin caracteres especiales
     */
    function safe_string($string, $espacios = false)
    {
        $string = str_replace(['á', 'à', 'â', 'ã', 'ª', 'ä'], 'a', $string);
        $string = str_replace(['Á', 'À', 'Â', 'Ã', 'Ä'], 'A', $string);
        $string = str_replace(['Í', 'Ì', 'Î', 'Ï'], 'I', $string);
        $string = str_replace(['í', 'ì', 'î', 'ï'], 'i', $string);
        $string = str_replace(['é', 'è', 'ê', 'ë'], 'e', $string);
        $string = str_replace(['É', 'È', 'Ê', 'Ë'], 'E', $string);
        $string = str_replace(['ó', 'ò', 'ô', 'õ', 'ö', 'º'], 'o', $string);
        $string = str_replace(['Ó', 'Ò', 'Ô', 'Õ', 'Ö'], 'O', $string);
        $string = str_replace(['ú', 'ù', 'û', 'ü'], 'u', $string);
        $string = str_replace(['Ú', 'Ù', 'Û', 'Ü'], 'U', $string);
        $string = str_replace(['[', '^', '´', '`', '¨', '~', ']'], '', $string);
        $string = str_replace('ç', 'c', $string);
        $string = str_replace('Ç', 'C', $string);
        $string = str_replace('ñ', 'ni', $string);
        $string = str_replace('Ñ', 'NI', $string);
        $string = str_replace('Ý', 'Y', $string);
        $string = str_replace('ý', 'y', $string);

        $string = str_replace('&aacute;', 'a', $string);
        $string = str_replace('&Aacute;', 'A', $string);
        $string = str_replace('&eacute;', 'e', $string);
        $string = str_replace('&Eacute;', 'E', $string);
        $string = str_replace('&iacute;', 'i', $string);
        $string = str_replace('&Iacute;', 'I', $string);
        $string = str_replace('&oacute;', 'o', $string);
        $string = str_replace('&Oacute;', 'O', $string);
        $string = str_replace('&uacute;', 'u', $string);
        $string = str_replace('&Uacute;', 'U', $string);

        $string = str_replace(',', '', $string);
        $string = str_replace(':', '', $string);
        $string = str_replace(';', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('+', '', $string);
        $string = str_replace('!', '', $string);
        $string = str_replace('¡', '', $string);
        $string = str_replace('$', '', $string);
        $string = str_replace("'", '', $string);

        return $espacios ? str_replace(' ', '-', $string) : $string;
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
    function is_user_logged_in($login = false)
    {
        $CI = &get_instance();
        if ($login) {
            if ($CI->session->userdata('signin')) {
                redirect(base_url('app/home'), 'refresh');
            }
        } elseif (!$login) {
            if (!$CI->session->userdata('signin')) {
                $CI->session->set_flashdata(
                    'message',
                    '<h3> <i class="fas fa-exclamation-triangle"></i> Acceso Restringido</h3> Por favor inicia sesión para continuar'
                );
                $CI->session->set_flashdata('message_type', 'danger');
                redirect(base_url('login'));
            }
        }
    }
}

if (!function_exists('update_user_estatus')) {
    /**
     * Actualizamos el estatus del usuario en cada petición a un controlador
     * @param  int  $id_usuario id del usuario con sesion activa
     * @return void             actualizamos el estatus de la sesion en la lista
     *                          de sesiones (userData)
     */
    function update_user_estatus($id_usuario)
    {
        $CI = &get_instance();
        $CI->load->model('auth_model');
        $CI->session->set_userdata(
            'estatus_id',
            $CI->auth_model->get_estatus_by_user_id($id_usuario)
        );
    }
}

if (!function_exists('fuchi_wakala')) {
    /**
     * Eliminamos las sesiones y direccionamos al login
     * @return void retornamos al inicio sin sesiones
     */
    function fuchi_wakala($redir = true)
    {
        $CI = &get_instance();
        $CI->session->sess_destroy();
        $CI->session->set_flashdata(
            'message',
            '<h3> <i class="fas fa-exclamation-triangle"></i> Acceso Restringido</h3> Por favor inicia sesión para continuar'
        );
        $CI->session->set_flashdata('message_type', 'danger');

        if ($redir) {
            redirect(base_url('login'), 'refresh');
        }
    }
}
  
if (!function_exists('var_dump_format')) {
    /**
     * Retornamos un var_dump formateado
     */
    function var_dump_format($expression)
    {
        echo '<pre>';
        var_dump($expression);
        echo '</pre>';
    }
}

if (!function_exists('send_mail')) {
    function send_mail(
        $user_send,
        $to_email,
        $asunto,
        $html = '',
        $attach = null
    ) {
        $CI = &get_instance();
        $CI->load->library('email', null, 'ci_email');

        /*$config['mailpath'] = '/usr/sbin/sendmail';*/
        $config['protocol'] = 'smtp';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = true;
        $config['smtp_host'] = 's161.servername.online';
        $config['smtp_user'] = 'noresponder@losn.mx';
        $config['smtp_pass'] = 'Losn_2020';
        $config['smtp_port'] = 587;
        $config['smtp_crypto'] = 'tls';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $CI->ci_email->initialize($config);

        $from_email = 'noresponder@losn.mx';

        $CI->ci_email->from($from_email, $user_send);
        $CI->ci_email->to($to_email);
        $CI->ci_email->subject($asunto);
        if (!is_null($attach)) {
            // var_dump($attach);
            $CI->ci_email->attach($attach);
        }
        $CI->ci_email->message($html);
        $CI->ci_email->send();
        /*var_dump_format($CI->ci_email->print_debugger());*/
    }
}
 

if (!function_exists('selecciona')) {
    function selecciona($variable, $valor)
    {
        //die("$variable $valor");
        if ($variable == $valor) {
            return 'selected="selected"';
        }
        return '';
    }
}

if (!function_exists('checked_form')) {
    function checked_form($variable, $valor)
    {
        //die("$variable $valor");
        if ($variable == $valor) {
            return 'checked="checked"';
        }
        return '';
    }
}

if (!function_exists('validaAlfanumericoAcentosEspacio')) {
    function validaAlfanumericoAcentosEspacio($variable)
    {
        if (preg_match('[a-zA-Z áéíóúÁÉÍÓÚñÑ]', $texto)) {
            return true;
        }
        return false;
    }
}


final class Session_singleton{ 
    private static $session_singleton;
    private $session_usuario;
    protected function __construct() {
        //singleton
        $this->session_usuario = "datos del usuario"; 
    }
    public static function get_instancia(){
        if(self::$session_singleton==null){
            self::$session_singleton = new Session_singleton();
        }
        return self::$session_singleton;
    }
 

}
