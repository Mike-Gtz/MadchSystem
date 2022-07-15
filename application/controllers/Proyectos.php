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


    public function deleteservicio()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|max_length[7]|required'); 
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $id        = $this->input->post('id');
 
                $this->load->model('proyectos_servicios_model');
                $is_data_deleted = $this->proyectos_servicios_model->delete_by_id($id);
                    if ($is_data_deleted) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "El registro fue eliminado",
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

    public function deleteusuario()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|max_length[7]|required'); 
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $id        = $this->input->post('id');
 
                $this->load->model('proyectos_usuarios_model');
                $is_data_deleted = $this->proyectos_usuarios_model->delete_by_id($id);
                    if ($is_data_deleted) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "El registro fue eliminado",
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

        $this->load->model('servicios_model');
        $servicios = array();
        $servicios = $this->servicios_model->get_all_status(1);
        $data['servicios_disponibles']          = $servicios; 

        $this->load->model('usuarios_model');
        $usuarios = array();
        $usuarios = $this->usuarios_model->get_all_status(1);
        $data['usuarios_disponibles']          = $usuarios; 


        if($id != null ){
            $data['id']             = $id;
            //consultar usuario
            $is_user = $this->proyectos_model->get_by_id($id);
            if($is_user != null && $is_user!= false){

            $this->load->model('proyectos_servicios_model');
            $servicios_proyecto = array();
            $servicios_proyecto = $this->proyectos_servicios_model->get_all_proyecto($is_user->idProyecto);
            $data['servicios_proyecto']          = $servicios_proyecto;  

            $this->load->model('proyectos_usuarios_model');
            $usuarios_proyecto = array();
            $usuarios_proyecto = $this->proyectos_usuarios_model->get_all_proyecto($is_user->idProyecto);
            $data['usuarios_proyecto']          = $usuarios_proyecto;  

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
 
                $nombreProyecto = $this->input->post('nombreProyecto');
                $descripcion    = $this->input->post('descripcion'); 
                $status         = $this->input->post('status'); 

                $array_servicios    = array_filter(explode(", ", $this->input->post('servicios')));           
                $array_usuarios     = array_filter(explode(", ", $this->input->post('usuarios')));  

                $arr_insert = array(
                    "nombreProyecto"    => $nombreProyecto,
                    "descripcion"       => $descripcion,
                    "status"            => $status,  

                );

                $this->load->model('proyectos_model');
                $is_data_insert = $this->proyectos_model->create($arr_insert, true );
                    if ($is_data_insert) {



                        if(!empty($array_servicios)){
                            /*Si se inserta el registro del proyecto se agregan los servicio  y usuarios*/
                            foreach ($array_servicios as $row) {
                                //Generar el array del servicio
                                $proyectos_servicios = 
                                    array(
                                        "idProyecto" => $is_data_insert,
                                        "idServ" => $row,
                                        "status" => 1,
                                    );

                                //validar que no exista
                                $this->load->model('proyectos_servicios_model');    
                                if(!$this->proyectos_servicios_model->get($proyectos_servicios)){
                                    //si no existe es falso, entonces se registra
                                    $this->proyectos_servicios_model->create($proyectos_servicios, $is_data_insert);    
                                } 

                            }                            
                        }

                        //Inserta usuarios
                        if(!empty($array_usuarios)){
                            /*Si se inserta el registro del proyecto se agregan los servicio  y usuarios*/
                            foreach ($array_usuarios as $row) {
                                //Generar el array del servicio
                                $proyectos_usuarios = 
                                    array(
                                        "idProyecto" => $is_data_insert,
                                        "idUsuario" => $row,
                                        "status" => 1,
                                    );

                                //validar que no exista
                                $this->load->model('proyectos_usuarios_model');    
                                if(!$this->proyectos_usuarios_model->get($proyectos_usuarios)){
                                    //si no existe es falso, entonces se registra
                                    $this->proyectos_usuarios_model->create($proyectos_usuarios, $is_data_insert);    
                                }   
                                
                            }                            
                        }


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
                $status         = $this->input->post('status'); 
                $array_servicios    = array_filter(explode(", ", $this->input->post('servicios')));           
                $array_usuarios     = array_filter(explode(", ", $this->input->post('usuarios')));  

                $arr_insert = array(
                    "nombreProyecto"    => $nombreProyecto,
                    "descripcion"       => $descripcion,
                    "status"            => $status,  

                ); 

                $this->load->model('proyectos_model');
                $is_data_insert = $this->proyectos_model->update_by_id($arr_insert, $idProyecto );
                    if ($is_data_insert) {
                        
                        if(!empty($array_servicios)){
                            /*Si se inserta el registro del proyecto se agregan los servicio  y usuarios*/
                            foreach ($array_servicios as $row) {
                                //Generar el array del servicio
                                $proyectos_servicios = 
                                    array(
                                        "idProyecto" => $idProyecto,
                                        "idServ" => $row,
                                        "status" => 1,
                                    );

                                //validar que no exista
                                $this->load->model('proyectos_servicios_model');    
                                if(!$this->proyectos_servicios_model->get($proyectos_servicios)){
                                    //si no existe es falso, entonces se registra
                                    $this->proyectos_servicios_model->create($proyectos_servicios, $idProyecto);    
                                } 

                            }                            
                        }

                        //Inserta usuarios
                        if(!empty($array_usuarios)){
                            /*Si se inserta el registro del proyecto se agregan los servicio  y usuarios*/
                            foreach ($array_usuarios as $row) {
                                //Generar el array del servicio
                                $proyectos_usuarios = 
                                    array(
                                        "idProyecto" => $idProyecto,
                                        "idUsuario" => $row,
                                        "status" => 1,
                                    );

                                //validar que no exista
                                $this->load->model('proyectos_usuarios_model');    
                                if(!$this->proyectos_usuarios_model->get($proyectos_usuarios)){
                                    //si no existe es falso, entonces se registra
                                    $this->proyectos_usuarios_model->create($proyectos_usuarios, $idProyecto);    
                                }   
                                
                            }                            
                        }

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

