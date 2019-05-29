<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ruangan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["ruangan"] = $this->ruangan_model->getAll();
        $this->load->view("admin/ruangan/list", $data);
    }


    public function add()
    {
        $ruangan = $this->ruangan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ruangan->rules());

        if ($validation->run()) {
            $ruangan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/ruangan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/ruangan');
       
        $ruangan = $this->ruangan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ruangan->rules());

        if ($validation->run()) {
            $ruangan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["ruangan"] = $ruangan->getById($id);
        if (!$data["ruangan"]) show_404();
        
        $this->load->view("admin/ruangan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ruangan_model->delete($id)) {
            redirect(site_url('admin/ruangan'));
        }
    }
}
