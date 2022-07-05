<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends PidePassword {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->model('servicios_model');
        $registros = array();
        $registros = $this->servicios_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;      
        $data['_APP']['title'] = "Madch System | Servicios";
        $data['_APP']['stylesheets'] = $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Agregar Servicio';
        $data['_APP']['button_text'] = true;
        $data['_APP']['page_title'] = 'Servicios';
        $data['_APP']['header'] = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/modulos/servicios_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/servicios';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function tabla(){
        $this->load->model('servicios_model');
        $registros = array();
        $registros = $this->servicios_model->get_all();
        
        $data = array();
        $data['registros']          = $registros;

        $html = $this->load->view('public/modulos/servicios_f', $data, TRUE);

        echo $html;         
    }
    
    public function delete()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|max_length[7]|required'); 
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $id        = $this->input->post('id');
 
                $this->load->model('servicios_model');
                $is_data_deleted = $this->servicios_model->logic_delete($id);
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

    public function service()
    { 
        $this->load->model('servicios_model');

        $id = $this->input->get('id');

        $data = array();       

        $data['editable']           = false;
        
        if($id != null ){
            $data['id']             = $id;
            //consultar usuario
            $is_user = $this->servicios_model->get_by_id($id);
            if($is_user != null && $is_user!= false){
 
 
            $data['idServ']         = $is_user->idServ;
            $data['nombreServ']     = $is_user->nombreServ;
            $data['status']         = $is_user->status;

            $data['editable']       = true;   

            }

               
        }  
         
        $data['_APP']['title']      = "Madch System | Servicios";
        $data['_APP']['stylesheets']= $this->load->view('public/componentes/admin_css', $data , TRUE);
        $data['_APP']['breadcrumb'] = 'Registro de servicios';
        $data['_APP']['button_text']= false;
        $data['_APP']['page_title'] = 'Servicios';
        $data['_APP']['header']     = $this->load->view('public/componentes/admin_header_f', $data , TRUE);
        $data['_APP']['fragment']   = $this->load->view('public/modulos/servicios_form_f', $data, TRUE);
        $data['_APP']['footer']     = $this->load->view('public/componentes/admin_footer_f', $data, TRUE);
        $data['scripts'][]          = 'app/private/modules/servicios_form';
        $data['scripts'][]          = 'app/private/modules/general';

        $this->load->view('public/landing_v', $data, FALSE);
        //die(var_dump_format($data['registros'] ));
    }

    public function add()
    { 
        json_header();
        /*if (!is_null($this->permiso_id)) {*/
            $this->form_validation->set_rules('nombreServ', 'nombreServ', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $nombreServ     = $this->input->post('nombreServ');
                $status     = $this->input->post('status'); 

                $arr_insert = array(
                    "nombreServ"    => $nombreServ,
                    "status"            => $status,  

                );

                $this->load->model('servicios_model');
                $is_data_insert = $this->servicios_model->create($arr_insert, true );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Servicio registrado correctamente",
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
            $this->form_validation->set_rules('idServ', 'idServ', 'trim|integer|required');
            $this->form_validation->set_rules('nombreServ', 'nombreServ', 'trim|alpha_numeric_spaces|max_length[250]|required');
            $this->form_validation->set_rules('status', 'status', 'trim|integer|required');
 
            if ($this->form_validation->run() &&  $this->input->is_ajax_request()) {
 
                $idServ     = $this->input->post('idServ');
                $nombreServ = $this->input->post('nombreServ');
                $status     = $this->input->post('status'); 

                $arr_insert = array(
                    "idServ"        => $idServ,
                    "nombreServ"    => $nombreServ,
                    "status"        => $status,  

                ); 

                $this->load->model('servicios_model');
                $is_data_insert = $this->servicios_model->update_by_id($arr_insert, $idServ );
                    if ($is_data_insert) {
                        echo json_encode(
                            array(
                                "response_code" => 200,
                                "response_type" => 'success',
                                "message"       => "Servicio modificado correctamente",
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

