<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("settings_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {

   
    }

    public function change_pwd($id = null)
    {
        if (!isset($id)) redirect('admin/settings');
       
        $settings = $this->settings_model;
        $validation = $this->form_validation;
        $validation->set_rules($settings->rules());

        if ($validation->run()) {
            $this->settings_model->update($id);
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["users"] = $settings->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/settings/view_form_change_pwd", $data);

    }  
    public function update_profile($id = null)
    {
        if (!isset($id)) redirect('admin/settings');
       
        $settings = $this->settings_model;
        $this->form_validation->set_rules('fullName', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|max_length[15]|numeric');
 
        if ($this->form_validation->run()) {
            $settings->updateProfile($id);
        }

        $data["users"] = $settings->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/settings/edit_form_profile", $data);
    }  

    public function view_profile($id = null)
    {
        if (!isset($id)) redirect('admin/settings');
       
        $settings = $this->settings_model;
        $data["users"] = $settings->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/settings/view_form_profile", $data);
    }         

}
