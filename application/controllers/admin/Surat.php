<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("surat_model");
        $this->load->model("dosen_model");
        $this->load->model("pejabat_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["surat"] = $this->surat_model->getAll();
        $data["dosen"] = $this->dosen_model->getAll();
        $data["pejabat"] = $this->pejabat_model->getAll();
        $this->load->view("admin/surat/list", $data);
    }

    public function add()
    {
        $surat = $this->surat_model;
        $validation = $this->form_validation;
        $data["dosen"] = $this->dosen_model->getAll();
        $data["pejabat"] = $this->pejabat_model->getAll();
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        
        $this->load->view("admin/surat/new_form",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/surat');
       
        $surat = $this->surat_model;
        $data["dosen"] = $this->dosen_model->getAll();
        $data["pejabat"] = $this->pejabat_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["surat"] = $surat->getById($id);
        if (!$data["surat"]) show_404();
        
        $this->load->view("admin/surat/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->surat_model->delete($id)) {
            redirect(site_url('admin/surat'));
        }
    }
}
