<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("matakuliah_model");
        $this->load->model("jurusan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["matakuliah"] = $this->matakuliah_model->getAll();
        $jurusan["jurusan"] = $this->jurusan_model->getAll();
        $this->load->view("admin/matakuliah/list", $data);
    }

    public function add()
    {
        $matakuliah = $this->matakuliah_model;
        $validation = $this->form_validation;
        $data["jurusan"] = $this->jurusan_model->getAll();
        $validation->set_rules($matakuliah->rules());

        if ($validation->run()) {
            $matakuliah->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        
        $this->load->view("admin/matakuliah/new_form",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/matakuliah');
       
        $matakuliah = $this->matakuliah_model;
        $data["jurusan"] = $this->jurusan_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($matakuliah->rules());

        if ($validation->run()) {
            $matakuliah->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["matakuliah"] = $matakuliah->getById($id);
        if (!$data["matakuliah"]) show_404();
        
        $this->load->view("admin/matakuliah/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->matakuliah_model->delete($id)) {
            redirect(site_url('admin/matakuliah'));
        }
    }

    public function namaJurusan($kode_jurusan)
    {
        $jurusan = $this->jurusan_model;
        $data["jurusan"] = $jurusan->namaJurusan($kode_jurusan);
        $this->load->view("admin/matakuliah/list", $data);
    }
}
