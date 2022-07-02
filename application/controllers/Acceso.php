<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { 
        $data = array();
        $data['_APP']['title'] = "Inicio";
        $data['_APP']['header'] = $this->load->view('public/componentes/public_header_f', $data , TRUE);
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/public_css', $data , TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/public_footer_f', $data, TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/index_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/test';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function login()
    {

        $this->load->model('usuarios_model');
        $registros = array();
        $registros = $this->usuarios_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;      
        $data['_APP']['title'] = "Madch System | Iniciar sesion";
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/public_css', $data , TRUE);
        $data['_APP']['header'] = $this->load->view('public/componentes/public_header_f', $data , TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/public_footer_f', $data, TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/login_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/auth';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

}

