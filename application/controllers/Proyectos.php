<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends PidePassword {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->model('proyectos_model');
        $registros = array();
        $registros = $this->proyectos_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;      
        $data['_APP']['title'] = "Madch System | Proyectos";
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Agregar Proyecto';
        $data['_APP']['button_text'] = true;
        $data['_APP']['page_title'] = 'Proyectos';
        $data['_APP']['header'] = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/modulos/proyectos_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/proyectos';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function tabla(){
        $this->load->model('proyectos_model');
        $registros = array();
        $registros = $this->proyectos_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;

        $html = $this->load->view('public/modulos/proyectos_f', $data, TRUE);

        echo $html;         
    }
    
    public function delete()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|max_length[7]|required'); 
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $id        = $this->input->post('id');
 
                $this->load->model('proyectos_model');
                $is_data_deleted = $this->proyectos_model->logic_delete($id);
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

    public function project()
    { 
        $this->load->model('proyectos_model');

        $id = $this->input->get('id');

        $data = array();       

        $data['editable']           = false;
        
        if($id != null ){
            $data['id']             = $id;
            //consultar usuario
            $is_user = $this->proyectos_model->get_by_id($id);
            if($is_user != null && $is_user!= false){
 
 
            $data['idProyecto']     = $is_user->idProyecto;
            $data['nombreProyecto'] = $is_user->nombreProyecto;
            $data['descripcion']    = $is_user->descripcion;
            $data['status']         = $is_user->status;

            $data['editable']       = true;   

            }

               
        }  
         
        $data['_APP']['title']      = "Madch System | Proyectos";
        $data['_APP']['stylesheets']= $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Registro de proyectos';
        $data['_APP']['button_text']= false;
        $data['_APP']['page_title'] = 'Proyectos';
        $data['_APP']['header']     = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment']   = $this->load->view('public/modulos/proyectos_form_f', $data, TRUE);
        $data['_APP']['footer']     = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/proyectos_form';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function add()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/
            $this->form_validation->set_rules('nombreProyecto', 'nombreProyecto', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $nombreProyecto     = $this->input->post('nombreProyecto');
                $descripcion  = $this->input->post('descripcion'); 
                $status     = $this->input->post('status'); 

                $arr_insert = array(
                    "nombreProyecto"    => $nombreProyecto,
                    "descripcion"       => $descripcion,
                    "status"            => $status,  

                );

                $this->load->model('proyectos_model');
                $is_data_insert = $this->proyectos_model->create($arr_insert, true );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Proyecto registrado correctamente",
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
            $this->form_validation->set_rules('idProyecto', 'idProyecto', 'trim|integer|required');
            $this->form_validation->set_rules('nombreProyecto', 'nombreProyecto', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $idProyecto     = $this->input->post('idProyecto');
                $nombreProyecto = $this->input->post('nombreProyecto');
                $descripcion    = $this->input->post('descripcion'); 
                $status     = $this->input->post('status'); 

                $arr_insert = array(
                    "nombreProyecto"    => $nombreProyecto,
                    "descripcion"       => $descripcion,
                    "status"            => $status,  

                ); 

                $this->load->model('proyectos_model');
                $is_data_insert = $this->proyectos_model->update_by_id($arr_insert, $idProyecto );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Proyecto modificado correctamente",
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

