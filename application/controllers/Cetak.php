<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->Model('Surat_model');
        }


        public function index()
	{
                $kode = $this->input->post('kode_dosen');
                $data['surat'] = $this->Surat_model->cetakS($kode);
                $data['cetak_jadwal'] = $this->Surat_model->cetakJadwal($kode);
                $this->load->view('admin/surat/cs',$data);
        }
}
