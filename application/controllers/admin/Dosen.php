<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["dosen"] = $this->dosen_model->getAll();
        $this->load->view("admin/dosen/list", $data);
    }

    public function add()
    {
        $dosen = $this->dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/dosen/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/dosen');
       
        $dosen = $this->dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["dosen"] = $dosen->getById($id);
        if (!$data["dosen"]) show_404();
        
        $this->load->view("admin/dosen/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->dosen_model->delete($id)) {
            redirect(site_url('admin/dosen'));
        }
    }
}
