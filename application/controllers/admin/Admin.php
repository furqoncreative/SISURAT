<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["admin"] = $this->admin_model->getAll();
        $this->load->view("admin/admin/list", $data);
    }

    public function add()
    {
        $admin = $this->admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());

        if ($validation->run()) {
            $admin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } 

        $this->load->view("admin/admin/new_form");
    }

    public function edit($id_user = null)
    {
        if (!isset($id_user)) redirect('admin/admin');
       
        $admin = $this->admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());

        if ($validation->run()) {
            $admin->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["admin"] = $admin->getById($id_user);
        if (!$data["admin"]) show_404();
        
        $this->load->view("admin/admin/edit_form", $data);
    }

    public function delete($id_user=null)
    {
        if (!isset($id_user)) show_404();
        
        if ($this->admin_model->delete($id_user)) {
            redirect(site_url('admin/admin'));
        }
    }
}
