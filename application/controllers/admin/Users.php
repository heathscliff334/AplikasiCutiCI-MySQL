<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin'));
    }

    public function index()
    {
        $data["users"] = $this->users_model->getAll();
        $this->load->view("admin/users/list_users", $data);
    }

    public function add()
    {
        $users = $this->users_model;

        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->save();
        }

        $this->load->view("admin/users/new_form_users");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/users');
       
        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $this->users_model->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["users"] = $users->getById($id);
        if (!$data["users"]) show_404();
        $this->load->view("admin/users/edit_form_users", $data);
    }
    public function view($id = null)
    {
        if (!isset($id)) redirect('admin/users');
       
        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $this->users_model->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["users"] = $users->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/users/view_form_users", $data);

    } 
    public function activate($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->users_model->activate($id)) {
            redirect(site_url('admin/users'));
        }
        redirect('admin/users');
    }
    public function disable($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->users_model->disable($id)) {
            redirect(site_url('admin/users'));
        }
        redirect('admin/users');
    }
}
