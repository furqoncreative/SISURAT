<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah_model extends CI_Model
{
    private $_table = "matakuliah";
    private $_table2 = "jurusan";
 
    public $kode_mk;
    public $kode_jurusan;
    public $nama_mk;
    public $jumlah_sks;
    public $kurikulum;
    public $semester;


    public function rules()
    {
        return [
            ['field' => 'kode_mk',
            'label' => 'Kode Matakuliah',
            'rules' => 'required'],

            ['field' => 'kode_jurusan',
            'label' => 'Kode Jurusan',
            'rules' => 'required'],

            ['field' => 'nama_mk',
            'label' => 'Nama Matakuliah',
            'rules' => 'required'],

            ['field' => 'jumlah_sks',
            'label' => 'Jumlah SKS',
            'rules' => 'required'],

            ['field' => 'kurikulum',
            'label' => 'Kurikulum',
            'rules' => 'required'],

            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
            $this->db->select('matakuliah.*,jurusan.nama');
            $this->db->from('matakuliah');
            $this->db->join('jurusan', 'jurusan.kode_jurusan = matakuliah.kode_jurusan');

            $query = $this->db->get();
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_mk" => $id])->row();
    }


    public function save()
    {
        $post = $this->input->post();
        $this->kode_mk = $post["kode_mk"];
        $this->kode_jurusan = $post["kode_jurusan"];
        $this->nama_mk = $post["nama_mk"];
        $this->jumlah_sks = $post["jumlah_sks"];
        $this->kurikulum = $post["kurikulum"];
        $this->semester = $post["semester"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_mk = $post["kode_mk"];
        $this->kode_jurusan = $post["kode_jurusan"];
        $this->nama_mk = $post["nama_mk"];
        $this->jumlah_sks = $post["jumlah_sks"];
        $this->kurikulum = $post["kurikulum"];
        $this->semester = $post["semester"];
	
        $this->db->update($this->_table, $this, array('kode_mk' => $post['kode_mk']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_mk" => $id));
	}
	
}
