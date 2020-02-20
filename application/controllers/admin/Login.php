<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');

    }

    public function index($id = null)
    {
        
        // jika form login disubmit
        if($this->input->post()){
            if($this->user_model->doLogin()){
                
                $this->tambahSisaCuti();
                redirect(site_url('admin'));
         }
        }
        // tampilkan halaman login
        $this->load->view("admin/login_page.php");
    }

    public function tambahSisaCuti($id = null)
    {        
        $users = $this->user_model;
        $um = $_SESSION['session_var_user']->updated_month;
        $div = $_SESSION['session_var_user']->divisi;
        $this->user_model->tambahCuti($um);


    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}