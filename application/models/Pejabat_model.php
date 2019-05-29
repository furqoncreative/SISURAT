<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat_model extends CI_Model
{
    private $_table = "pejabat";
 
    public $kode_pejabat;
    public $nip;
    public $nama;
    public $jabatan;

    public function rules()
    {
        return [
            ['field' => 'kode_pejabat',
            'label' => 'Kode Pejabat',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'NIP',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama pejabat',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_pejabat" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
	
        $this->db->update($this->_table, $this, array('kode_pejabat' => $post['kode_pejabat']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_pejabat" => $id));
	}
	
}
