<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_model extends CI_Model
{
    private $_table = "ruangan";
 
    public $kode_ruangan;
    public $nama;

    public function rules()
    {
        return [
            ['field' => 'kode_ruangan',
            'label' => 'Kode ruangan',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama ruangan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_ruangan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_ruangan = $post["kode_ruangan"];
        $this->nama = $post["nama"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_ruangan = $post["kode_ruangan"];
        $this->nama = $post["nama"];;
	
        $this->db->update($this->_table, $this, array('kode_ruangan' => $post['kode_ruangan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_ruangan" => $id));
	}
	
}
