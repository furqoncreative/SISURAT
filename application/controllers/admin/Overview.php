<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		 $this->load->model("login_model");
		 $this->load->model("dosen_model");
		 $this->load->model("surat_model");
}

	public function index()
	{
		if($this->login_model->logged_id())
		{
			$data["dosen"] = $this->dosen_model->getAll();
			$data["surat"] = $this->surat_model->jumlahSurat();	
			$this->load->view("admin/overview",$data);		
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("admin/login");
		}
	}

	public function print()
    {
        $surat = $this->surat_model;
				$surat->print();
        $data["cetak_jadwal"] = $surat->cetakJadwal($kode_dosen);
        $data["surat"] = $surat->cetakSurat($kode_dosen);
        if (!$data["surat"]) show_404();
        $this->load->view("admin/surat/cetak_surat/".$kode_dosen, $data);
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
