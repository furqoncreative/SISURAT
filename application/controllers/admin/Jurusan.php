<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jurusan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jurusan"] = $this->jurusan_model->getAll();
        $this->load->view("admin/jurusan/list", $data);
    }


    public function add()
    {
        $jurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurusan->rules());

        if ($validation->run()) {
            $jurusan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/jurusan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jurusan');
       
        $jurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurusan->rules());

        if ($validation->run()) {
            $jurusan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jurusan"] = $jurusan->getById($id);
        if (!$data["jurusan"]) show_404();
        
        $this->load->view("admin/jurusan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jurusan_model->delete($id)) {
            redirect(site_url('admin/jurusan'));
        }
    }
}
