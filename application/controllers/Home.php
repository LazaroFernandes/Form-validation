<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Formulario_model');
        $this->load->model('Relacao_model');
        $this->load->model('Livro_model');
    }

    public function index() {
        $this->template->load('template', 'pages/home_view');
    }

    public function valid_period($type){
        $valid = $this->Formulario_model->valid_period();
        if(!$valid){
            if($type == 1){
                redirect('home/l2_out');
            }else{
                redirect('home/l1_out');
            }
        }
    }
    
    public function livro2() {
        $this->valid_period(1);
        $data['relacao'] = $this->Relacao_model->get_relacao();
        $data['livro'] = $this->Livro_model->get_livro()[1];
        $this->template->load('template', 'pages/livro2_view',$data);
    }

    public function l2_out(){
        $this->template->load('template', 'pages/livro2_out_view');  
    }

    public function livro1() {
        $this->valid_period(2);
        $data['relacao'] = $this->Relacao_model->get_relacao();
        $data['livro'] = $this->Livro_model->get_livro()[0];
        $this->template->load('template', 'pages/livro1_view', $data);    
    }
    public function l1_out(){
        $this->template->load('template', 'pages/livro1_out_view');  
    }

    public function save(){
        $data_form = file_get_contents('php://input');
        $register = $this->Formulario_model->store(json_decode($data_form));
        if($register['success']){
            $this->session->set_flashdata('data_resgister_success', $data_form);
            $this->session->set_flashdata('resgister_success', TRUE);
            $response = array('success'=>1,);
        
        }else{
            $response = array('success'=>0, 'message'=>$register['message']);;
        }    
        echo json_encode($response);
    }

    public function authentication(){
        $user = $this->input->post("user");
        $password = $this->input->post("password");
        if($user === 'teste' && $password ==='123'){
            $this->session->set_userdata('logged', TRUE);
            redirect(base_url('home/admin'));
        }
        else{
            redirect('home/index');
        }
    }

    public function admin(){
        $filter = $this->uri->segment(3);
		$data['registers'] = $this->Formulario_model->get_register($filter);
        $this->template->load('template','pages/admin_view', $data);   
    }
}
