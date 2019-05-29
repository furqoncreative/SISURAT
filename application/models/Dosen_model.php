<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";
 
    public $kode_dosen;
    public $nip;
    public $nidn;
    public $nama;
    public function rules()
    {
        return [
            ['field' => 'kode_dosen',
            'label' => 'Kode Dosen',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'NIP',
            'rules' => 'required'],

            ['field' => 'nidn',
            'label' => 'NIDN',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama Dosen',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_dosen" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_dosen = $post["kode_dosen"];
        $this->nip = $post["nip"];
        $this->nidn = $post["nidn"];
        $this->nama = $post["nama"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_dosen = $post["kode_dosen"];
        $this->nip = $post["nip"];
        $this->nidn = $post["nidn"];
        $this->nama = $post["nama"];;
	
        $this->db->update($this->_table, $this, array('kode_dosen' => $post['kode_dosen']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_dosen" => $id));
	}
	
}
