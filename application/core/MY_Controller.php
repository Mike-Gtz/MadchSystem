<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
        parent::__construct();
 
        $this->form_validation->set_message('integer',"El campo %s sólo acepta valores enteros");
        $this->form_validation->set_message('required',"El campo %s es requerido");
        $this->form_validation->set_message('min_length',"El campo %s debe tener al menos %s caracteres");
        $this->form_validation->set_message('max_length',"El campo %s debe tener hasta %s caracteres");
        $this->form_validation->set_message('exact_length',"El campo %s debe tener exáctamente %s caracteres");
        $this->form_validation->set_message('validaAlfanumericoAcentosEspacio','El campo %s sólo permite letras, números, acentos, espacios, guión medio, guión bajo, punto, dos puntos, la arroba y el ampersand.');
        $this->form_validation->set_message('validaUsername','El campo %s sólo permite letras, números, punto');
        $this->form_validation->set_message('matches','El campo %s no coincide con el campo %s');
        $this->form_validation->set_message('valid_email','El campo %s debe contener una dirección de correo electrónica válida');
        $this->form_validation->set_message('alpha_dash','El campo %s debe contener sólo caracteres alfanúmericos, guiones medios y guiones bajos');
        $this->form_validation->set_message('validaStringBoolean','El campo %s sólo strings con el valor de true o false');
        $this->form_validation->set_message('alpha_numeric','El campo %s sólo debe contener letras y números');
        $this->form_validation->set_message('greater_than_equal_to','El campo %s sólo debe ser un número mayor o igual a cero');
        $this->form_validation->set_message('validaFecha','La fecha debe estar en el formato YYYY-MM-DD %s');
        $this->form_validation->set_message('validaFechaHora','La fecha y hora deben estar en el formato YYYY-MM-DD HH:MM:SS %s');
        $this->form_validation->set_message('validaColumnaActualizar','La columna de la cantidad a actualizar sólo puede ser cantidadSurtida o cantidadVerificada');
        $this->form_validation->set_message('validaLatitud','El campo %s debe ser un número entre -90 y 90');
        $this->form_validation->set_message('validaLongitud','El campo %s debe ser un número entre -180 y 180');
    }

    public function validaAlfanumericoAcentosEspacio($texto=""){
    	if(preg_match("/(^$|^[a-z 0-9áéíóúñÁÉÍÓÚÑüÜ&-\.:,_@]+$)/i",$texto))
        	    return TRUE;
      	return FALSE;
    }

    public function validaUsername($texto=""){
        if(preg_match("/(^$|^[a-z0-9\.]+$)/i",$texto))
                return TRUE;
        return FALSE;
    }


    public function validaFecha($texto){
        // Si no se proporciona una fecha que regrese verdadero, 
        // para que sea necesario proporcionarla en el formato, poner required en el
        // form_validation->set_rules
        if($texto=="")
            return TRUE;
        if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$texto))
            return TRUE;
        return FALSE;
    }

    public function validaFechaHora($texto){
        // Si no se proporciona una fecha y hora regrese verdadero, 
        // para que sea necesario proporcionarla en el formato, poner required en el
        // form_validation->set_rules
        if($texto=="")
            return TRUE;
        if(preg_match("/^0000-00-00\s00:00:00$/",$texto))
            return TRUE;
        if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])\s([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/",$texto))
            return TRUE;
        return FALSE;
    }

}


/**
 * 
 */
class PidePassword extends MY_Controller
{
    
    function __construct()
    /*{
        parent::__construct();
                $this->load->model("UsuarioModelo");
        $valido = $this->UsuarioModelo->revisaSesion($this->session->userdata('username'),$this->session->userdata('sesion'));
        //die(print_r($this->router));

        if($valido === FALSE && $this->router->class == 'seguridad' && $this->router->method != 'index')
            redirect(base_url()."index.php/seguridad/index");
        else if($valido === FALSE && $this->router->class != 'seguridad')
            redirect(base_url()."index.php/seguridad/index");

    }*/
{
        parent::__construct();
        $valido = FALSE;
        if( $this->session->userdata('idUsuario') != "" && $this->session->userdata('idUsuario') != null && 
            $this->session->userdata('email') != "" && $this->session->userdata('email') != null && 
            $this->session->userdata('contra_caduca') == false &&
            $this->session->userdata('login') != "" && $this->session->userdata('login') != null){
            /*
                            'idUsuario' => $user->idUsuario,
                            'nombre'    => $user->nombre,
                            'apellidos' => $user->apellidos,
                            'email'     => $email,
                            'tipo'      => $user->tipo,
                            'login'     => true*/

            $valido = TRUE;
        }
        //die(print_r($this->router));

        if($valido === FALSE && $this->router->class == 'seguridad' && $this->router->method != 'index')
            redirect(base_url()."acceso/login");
        else if($valido === FALSE && $this->router->class != 'seguridad')
            redirect(base_url()."acceso/login");

    }

}



















