<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends PidePassword {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->model('usuarios_model');
        
        $data = array();
        $data['_APP']['title'] = "Madch System | Perfil";
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Mi Perfil';
        $data['_APP']['button_text'] = false;
        $data['_APP']['page_title'] = 'Perfil';


        $is_user = $this->usuarios_model->get_by_id($this->session->userdata('idUsuario'));
        if($is_user != null && $is_user!= false){
 
            $data['idUsuario']      = $is_user->idUsuario;
            $data['nombre']         = $is_user->nombre;
            $data['apellidos']      = $is_user->apellidos;
            $data['email']          = $is_user->email;
            $data['telefono']       = $is_user->telefono;
            $data['tipo']           = $is_user->tipo;
            $data['status']         = $is_user->status;
            $data['vencimiento']    = $is_user->fcContra;
            $data['editable']       = true;   
        }

        $data['_APP']['header'] = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/modulos/perfil_form_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/perfil';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }



    public function edit()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/
            $this->form_validation->set_rules('idUsuario', 'idUsuario', 'trim|integer|required');
            $this->form_validation->set_rules('contra', 'contra', 'trim|max_length[250]|alpha_dash');
            $this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|exact_length[10]|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $idUsuario  = $this->input->post('idUsuario');
                $contra     = $this->input->post('contra');
                $telefono   = $this->input->post('telefono');

                //Para establecer cada cuanto se cambia la contrasena
                $datetime = new \DateTime();
                $datetime->add(new DateInterval('P6M'));

                $arr_insert = array(
                    "telefono"      => $telefono,

                );

                if($contra != null){
                    $arr_insert['contra']   = md5($contra);
                    $arr_insert['fcContra'] = $datetime->format('Y-m-d H:i:s');
                }

                $this->load->model('usuarios_model');
                $is_data_insert = $this->usuarios_model->update_by_id($arr_insert, $idUsuario );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Usuario modificado correctamente",
                            )
                        );

                    }

                    /*Si no podemos editar y el modelo retorna una excepcion*/
                    else {
                         echo json_encode(
                            array(
                                "response_code" => 500,
                                "response_type" => 'error',
                                "message"       => $is_data_insert,
                            )
                        );
                    }
                }

                /*Si la validación de campos es incorrecta*/
                else {
                    $err = validation_errors();
                    echo json_encode(
                        array(
                            "response_code" => 403,
                            "response_type" => 'error',
                            "message"       => 'Bad Request '.$err,
                            "error"         => $err,
                        )
                    );
                }
        }
}

