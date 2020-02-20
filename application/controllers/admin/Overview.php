<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
        // load view admin/overview.php
        if($_SESSION['session_var_user']->role == "admin"){
        	$this->load->view("admin/overview");
		}else {
			$this->load->view("admin/tutorial");
		}
	}
}
