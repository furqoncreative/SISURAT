<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jadwal_model");
        $this->load->model("dosen_model");
        $this->load->model("matakuliah_model");
        $this->load->model("ruangan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jadwal"] = $this->jadwal_model->getAll();
        $data["dosen"] = $this->dosen_model->getAll();
        $data["matakuliah"] = $this->matakuliah_model->getAll();
        $data["ruangan"] = $this->ruangan_model->getAll();
        $this->load->view("admin/jadwal/list", $data);
    }

    public function add()
    {
        $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $data["dosen"] = $this->dosen_model->getAll();
        $data["matakuliah"] = $this->matakuliah_model->getAll();
        $data["ruangan"] = $this->ruangan_model->getAll();
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        
        $this->load->view("admin/jadwal/new_form",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jadwal');
       
        $jadwal = $this->jadwal_model;
        $data["dosen"] = $this->dosen_model->getAll();
        $data["matakuliah"] = $this->matakuliah_model->getAll();
        $data["ruangan"] = $this->ruangan_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jadwal"] = $jadwal->getById($id);
        if (!$data["jadwal"]) show_404();
        
        $this->load->view("admin/jadwal/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal_model->delete($id)) {
            redirect(site_url('admin/jadwal'));
        }
    }

    public function namaJurusan($kode_jurusan)
    {
        $jurusan = $this->jurusan_model;
        $data["jurusan"] = $jurusan->namaJurusan($kode_jurusan);
        $this->load->view("admin/jadwal/list", $data);
    }
}
