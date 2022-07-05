<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends PidePassword {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->model('usuarios_model');
        $registros = array();
        $registros = $this->usuarios_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;      
        $data['_APP']['title'] = "Madch System | Usuarios";
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Agregar Usuario';
        $data['_APP']['button_text'] = true;
        $data['_APP']['page_title'] = 'Usuarios';
        $data['_APP']['header'] = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/modulos/usuarios_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/usuarios';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function tabla(){
        $this->load->model('usuarios_model');
        $registros = array();
        $registros = $this->usuarios_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;

        $html = $this->load->view('public/modulos/usuarios_f', $data, TRUE);

        echo $html;         
    }
    
    public function delete()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|max_length[7]|required'); 
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $id        = $this->input->post('id');
 
                $this->load->model('usuarios_model');
                $is_data_deleted = $this->usuarios_model->logic_delete($id);
                    if ($is_data_deleted) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "El registro fue inhabilitado",
                            )
                        );

                    }

                    /*Si no podemos editar y el modelo retorna una excepcion*/
                    else {
                         echo json_encode(
                            array(
                                "response_code" => 500,
                                "response_type" => 'error',
                                "message"       => $is_data_deleted,
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

    public function user()
    { 
        $this->load->model('usuarios_model');

        $id = $this->input->get('id');

        $data = array();       

        $data['editable']           = false;
        
        if($id != null ){
            $data['id']             = $id;
            //consultar usuario
            $is_user = $this->usuarios_model->get_by_id($id);
            if($is_user != null && $is_user!= false){
 
 
            $data['idUsuario']      = $is_user->idUsuario;
            $data['nombre']         = $is_user->nombre;
            $data['apellidos']      = $is_user->apellidos;
            $data['email']          = $is_user->email;
            $data['telefono']       = $is_user->telefono;
            $data['tipo']           = $is_user->tipo;
            $data['status']         = $is_user->status;

            $data['editable']       = true;   

            }

               
        }  
         
        $data['_APP']['title']      = "Madch System | Usuarios";
        $data['_APP']['stylesheets']= $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Registro de usuarios';
        $data['_APP']['button_text']= false;
        $data['_APP']['page_title'] = 'Usuarios';
        $data['_APP']['header']     = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment']   = $this->load->view('public/modulos/usuarios_form_f', $data, TRUE);
        $data['_APP']['footer']     = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/usuarios_form';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function add()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('email', 'email', 'trim|valid_email|max_length[250]|required');
            $this->form_validation->set_rules('contra', 'contra', 'trim|max_length[250]|alpha_dash|required');
            $this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|exact_length[10]|required');
            $this->form_validation->set_rules('tipo', 'tipo', 'trim|alpha_dash|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                //$id_usuario        = $this->input->post('id_usuario');
                $nombre     = $this->input->post('nombre');
                $apellidos  = $this->input->post('apellidos'); 
                $email      = $this->input->post('email');
                $contra     = $this->input->post('contra');
                $telefono   = $this->input->post('telefono');
                $tipo       = $this->input->post('tipo'); 
                $status     = $this->input->post('status'); 

                //Para establecer cada cuanto se cambia la contrasena
                $datetime = new \DateTime();
                $datetime->add(new DateInterval('P6M'));
 
                $arr_insert = array(
                    "nombre"        => $nombre,
                    "apellidos"     => $apellidos,
                    "email"         => $email,
                    "contra"        => md5($contra),      
                    "telefono"      => $telefono,
                    "fcContra"      => $datetime->format('Y-m-d H:i:s'),
                    "tipo"          => $tipo,
                    "status"        => $status,  

                );

                $this->load->model('usuarios_model');
                $is_data_insert = $this->usuarios_model->create($arr_insert, true );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Usuario registrado correctamente",
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

    public function edit()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/
            $this->form_validation->set_rules('idUsuario', 'idUsuario', 'trim|integer|required');
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('email', 'email', 'trim|valid_email|max_length[250]|required');
            $this->form_validation->set_rules('contra', 'contra', 'trim|max_length[250]|alpha_dash');
            $this->form_validation->set_rules('telefono', 'telefono', 'trim|numeric|exact_length[10]|required');
            $this->form_validation->set_rules('tipo', 'tipo', 'trim|alpha_dash|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $idUsuario  = $this->input->post('idUsuario');
                $nombre     = $this->input->post('nombre');
                $apellidos  = $this->input->post('apellidos'); 
                $email      = $this->input->post('email');
                $contra     = $this->input->post('contra');
                $telefono   = $this->input->post('telefono');
                $tipo       = $this->input->post('tipo'); 
                $status     = $this->input->post('status'); 

                //Para establecer cada cuanto se cambia la contrasena
                $datetime = new \DateTime();
                $datetime->add(new DateInterval('P6M'));

                $arr_insert = array(
                    "nombre"        => $nombre,
                    "apellidos"     => $apellidos,
                    "email"         => $email,
                    "telefono"      => $telefono,
                    "tipo"          => $tipo,
                    "status"        => $status,  

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

