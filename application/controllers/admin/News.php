<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("news_model");
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["news"] = $this->news_model->getAll();
        $this->load->view("admin/news/list_news", $data);

   
    }

    public function add()
    {
        $news = $this->news_model;

        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $news->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            $this->send_email();        
        }

        $this->load->view("admin/news/new_form_news");        
    }
    public function test(){
        //untuk test function saja
        $result = $this->news_model->getEmail();
        foreach ($result as $key ) {
            echo $key->email;
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/news');
       
        $news = $this->news_model;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $this->news_model->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["news"] = $news->getById($id);
        if (!$data["news"]) show_404();
        
        $this->load->view("admin/news/edit_form_news", $data);

    }
    public function view($id = null)
    {
        if (!isset($id)) redirect('admin/news');
       
        $news = $this->news_model;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $this->news_model->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["news"] = $news->getById($id);
        if (!$data["news"]) show_404();
        
        $this->load->view("admin/news/view_form_news", $data);

    }    

    public function send_email()
    {
        $result = $this->news_model->getEmail();

      // Konfigurasi email
        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'itissunter@gmail.com',  // Email gmail
        //     'smtp_pass'   => 'webisitadmin',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ];
    foreach ($result as $key ) {
        $this->email->from('no-reply@portalis.com', 'Portal IS Ing Silver');

        $this->email->to($key->email); // Ganti dengan email tujuan
        $this->email->attach('http://192.168.1.52:8080/e-cuti/upload/cuti/5e33b1c02b50a.png');
        $this->email->subject('Pengumuman Baru '.$_POST["judulNews"].' | Portal IS');               
        $this->email->message("Hai ".$key->full_name.", ada pengumuman baru di Portal IS, silahkan login untuk melihat.<br><br> Klik <strong><a href='http://192.168.1.52:8080/e-cuti/admin' target='_blank' rel='noopener'>disini</a></strong> untuk masuk ke Portal IS.");
        $this->email->send();

        }
    }
}
