<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cuti_model");
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["cuti"] = $this->cuti_model->getAll();
        $this->load->view("admin/cuti/list_cuti", $data);

   
    }
    public function my_cuti(){
        $data["cuti"] = $this->cuti_model->getMyCuti();
        $this->load->view("admin/cuti/list_cuti", $data);
    }
    public function add()
    {
        $cuti = $this->cuti_model;

        $validation = $this->form_validation;
        $validation->set_rules($cuti->rules());

        if ($validation->run()) {
            if($_POST["lama_cuti"] == 1)
            {
                $jumlahJam = $this->getHourCount($_POST["mulaiCuti"],$_POST["sampaiCuti"]);
                $cuti->save(0,$jumlahJam); 
            } else if($_POST["lama_hari"] == 1)
            {
                $jumlahHari = $this->getWeekDaysCount($_POST["mulaiCuti"],$_POST["sampaiCuti"]); 
                $cuti->save($jumlahHari,0);   
                                   }
            $this->send_email();   
        }

        $this->load->view("admin/cuti/new_form_cuti");
    }
    public function cetak($id = null)
    {
        if (!isset($id)) redirect('admin/cuti');
       
        $cuti = $this->cuti_model;
        $validation = $this->form_validation;
        $validation->set_rules($cuti->rules());

        if ($validation->run()) {
            $this->cuti_model->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["cuti"] = $cuti->getById($id);
        if (!$data["cuti"]) show_404();
        
        $this->load->view("admin/cuti/cetak_form_cuti", $data);

    }
    public function edit($id = null)
    {

        if (!isset($id)) show_404();
        
        if ($this->cuti_model->updateTerima($id)) {
            redirect(site_url('admin/cuti'));
        }
        redirect('admin/cuti');        

    }
    public function test(){
        //untuk test function saja
        $cuti = $this->cuti_model;
        $dt["cuti"] = $cuti->getById('5e378b54513c7');
        $userId = $dt["cuti"]->user_id;
        $updateStatus = 1;

        if ($updateStatus == 3) {
            $result = $this->cuti_model->getEmailTolak($userId);
        } else if($updateStatus == 1){
            $result = $this->cuti_model->getEmailTerima($userId);  
        }
        foreach ($result as $key ) {
            echo $key->email;
        }

    }
    public function terima($id = null)
    {   
        $cuti = $this->cuti_model;
        $dt["cuti"] = $cuti->getById($id);
        $userId = $dt["cuti"]->user_id;
        $updateStatus = 1;
        if (!isset($id)) show_404();
        
        if ($this->cuti_model->updateTerima($id,$userId)) {
            // redirect(site_url('admin/cuti'));
            // $this->session->set_flashdata('success', 'Berhasil di Terima! ');

        } else {
            // $this->update_email($updateStatus,$userId);

            $this->update_email($updateStatus,$userId);
        }
        // echo "Test";
        // redirect(site_url('admin/cuti'));
        $data["cuti"] = $cuti->getById($id);
        if (!$data["cuti"]) show_404();
        
        $this->load->view("admin/cuti/edit_form_cuti", $data);

    }
    public function tolak($id = null)
    {
        $cuti = $this->cuti_model;
        $dt["cuti"] = $cuti->getById($id);
        if (!isset($id)) show_404();
        $jCuti = $dt["cuti"]->jenis_cuti;
        $jHari = $dt["cuti"]->lama_hari;
        $userId = $dt["cuti"]->user_id;
        $this->form_validation->set_rules('komen_cuti', 'Comment', 'trim|required');

        // if ($this->cuti_model->updateTolak($id,$jCuti,$jHari,$userId)) {
        //     // redirect(site_url('admin/cuti'));
        //     // $this->cuti_model->tolakEmail($id);
        // }
        if ($this->form_validation->run()) {
            echo "string";
        }
        $data["cuti"] = $cuti->getById($id);
        if (!$data["cuti"]) show_404();
        
        $this->load->view("admin/cuti/edit_form_cuti", $data);
    }
    public function getHourCount($fromTimestamp = null, $toTimestamp)
    {
        $sampai =strtotime($toTimestamp);
        $mulai =strtotime($fromTimestamp);
        $diff = ($sampai - $mulai)/(60*60);      
        return $diff;

    }
    public function getWeekDaysCount($fromDateTimestamp = null, $toDateTimestamp=null) 
    {
        $startDateString   = date('Y-m-d', strtotime($fromDateTimestamp));
        $timestampTomorrow = strtotime('+1 day', strtotime($toDateTimestamp));
        $endDateString     = date("Y-m-d", $timestampTomorrow);
        $objStartDate      = new \DateTime($startDateString);    //intialize start date
        $objEndDate        = new \DateTime($endDateString);    //initialize end date
        $interval          = new \DateInterval('P1D');    // set the interval as 1 day
        $dateRange         = new \DatePeriod($objStartDate, $interval, $objEndDate);

        $count = 0;

        foreach ($dateRange as $eachDate) {
            if (    $eachDate->format("w") != 7
                &&  $eachDate->format("w") != 0 
            ) {
                ++$count;
            }
        }
        return $count;
    }
    public function view($id=null)
    {      
        if (!isset($id)) redirect('admin/cuti');
       
        $cuti = $this->cuti_model;
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $dt["cuti"] = $cuti->getById($id);
        $jCuti = $dt["cuti"]->jenis_cuti;
        $jHari = $dt["cuti"]->lama_hari;
        $userId = $dt["cuti"]->user_id;
        $updateStatus = 3;
        if ($this->form_validation->run()) {
            $this->cuti_model->updateTolak($id,$jCuti,$jHari,$userId);
            $this->update_email($updateStatus,$userId);
        }
        $data["cuti"] = $cuti->getById($id);
        if (!$data["cuti"]) show_404();
        
        $this->load->view("admin/cuti/edit_form_cuti", $data);
    }
    public function update_email($updateStatus,$userId)
    {
        $updateStat = $updateStatus;
        if ($updateStat == 3) {
            $result = $this->cuti_model->getEmailTolak($userId);
        } else if($updateStat == 1){
            $result = $this->cuti_model->getEmailTerima($userId);  
        }
                  
        foreach ($result as $key) {
            $this->email->from('no-reply@portalis.com', 'Portal IS Ing Silver');
            $this->email->to($key->email);
            $this->email->attach('http://192.168.1.52:8080/e-cuti/upload/cuti/5e33b1c02b50a.png');
            $this->email->subject('Pengajuan Cuti / Permisi Baru | Portal IS');                
            $this->email->message("Hai, ".$key->full_name.". ada update baru perihal pengajuan cuti atau permisi diajukan di Portal IS, silahkan login untuk melihat.<br><br> Klik <strong><a href='http://192.168.1.52:8080/e-cuti/admin' target='_blank' rel='noopener'>disini</a></strong> untuk masuk ke Portal IS.");
            $this->email->send();
        }
    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->cuti_model->delete($id)) {
            $message = "Data berhasil dihapus!";
      echo "<script type='text/javascript'>alert('$message');</script>";
            redirect(site_url('admin/cuti'));

        }
        $message = "Data berhasil dihapus!";
      echo "<script type='text/javascript'>alert('$message');</script>";
        redirect('admin/cuti');
    }
    public function send_email()
    {
        $result = $this->cuti_model->getEmail();
        $this->email->from('no-reply@portalis.com', 'Portal IS Ing Silver');
        $this->email->attach('http://192.168.1.52:8080/e-cuti/upload/cuti/5e33b1c02b50a.png');
        $this->email->subject('Pengajuan Cuti / Permisi Baru | Portal IS');
        $this->email->message("Hai, ".$result->full_name.". ada pengajuan cuti atau permisi baru dari ".$_SESSION['session_var_user']->full_name." di Portal IS, silahkan login untuk melihat.<br><br> Klik <strong><a href='http://192.168.1.52:8080/e-cuti/admin' target='_blank' rel='noopener'>disini</a></strong> untuk masuk ke Portal IS.");
        $this->email->send();
    }

}
