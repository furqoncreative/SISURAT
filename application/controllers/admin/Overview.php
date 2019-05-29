<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		 $this->load->model("login_model");
		 $this->load->model("dosen_model");
}

	public function index()
	{
		if($this->login_model->logged_id())
		{
			$data["dosen"] = $this->dosen_model->getAll();	
			$this->load->view("admin/overview",$data);		
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("admin/login");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
