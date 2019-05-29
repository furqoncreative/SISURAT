<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
    private $_table = "jurusan";
 
    public $kode_jurusan;
    public $nama;

    public function rules()
    {
        return [
            ['field' => 'kode_jurusan',
            'label' => 'Kode Jurusan',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama Jurusan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_jurusan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_jurusan = $post["kode_jurusan"];
        $this->nama = $post["nama"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_jurusan = $post["kode_jurusan"];
        $this->nama = $post["nama"];
	
        $this->db->update($this->_table, $this, array('kode_jurusan' => $post['kode_jurusan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_jurusan" => $id));
	}
	
}
