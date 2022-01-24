<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{

    public function __construct()
    {
        parent :: __construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("Auth"));
        }        
        //$this->load->library('form_validation');
        $this->load->model('admin_crud');
    }


    public function index(){
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}