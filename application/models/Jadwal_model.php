<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $_table = "jadwal";
 
    public $kode_dosen;
    public $kode_mk;
    public $kode_ruangan;
    public $hari;
    public $jam_mulai;
    public $jam_selesai;
    public $periode;
    public $kelas;

    public function rules()
    {
        return [
            
            ['field' => 'kode_dosen',
            'label' => 'Dosen',
            'rules' => 'required'],
            
            ['field' => 'kode_mk',
            'label' => 'Mata Kuliah',
            'rules' => 'required'],

            ['field' => 'kode_ruangan',
            'label' => 'Ruangan',
            'rules' => 'required'],

            ['field' => 'hari',
            'label' => 'Hari',
            'rules' => 'required'],

            ['field' => 'jam_mulai',
            'label' => 'Jam Mulai',
            'rules' => 'required'],
            
            ['field' => 'jam_selesai',
            'label' => 'Jam Selesai',
            'rules' => 'required'],

            ['field' => 'kelas',
            'label' => 'Kelas',
            'rules' => 'required'],

             ['field' => 'periode',
            'label' => 'Periode',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('jadwal.*,dosen.nama as nama_dosen, matakuliah.nama_mk, ruangan.nama as nama_ruangan');
            $this->db->from('jadwal');
            $this->db->join('dosen', 'dosen.kode_dosen = jadwal.kode_dosen');
            $this->db->join('matakuliah', 'matakuliah.kode_mk = jadwal.kode_mk');
            $this->db->join('ruangan', 'ruangan.kode_ruangan = jadwal.kode_ruangan');

            $query = $this->db->get();
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jadwal" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_dosen = $post["kode_dosen"];
        $this->kode_mk = $post["kode_mk"];
        $this->kode_ruangan = $post["kode_ruangan"];
        $this->hari = $post["hari"];
        $this->jam_mulai = $post["jam_mulai"];
        $this->jam_selesai = $post["jam_selesai"];
        $this->periode = $post["periode"];
        $this->kelas = $post["kelas"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jadwal = $post["id_jadwal"];
        $this->kode_dosen = $post["kode_dosen"];
        $this->kode_mk = $post["kode_mk"];
        $this->kode_ruangan = $post["kode_ruangan"];
        $this->hari = $post["hari"];
        $this->jam_mulai = $post["jam_mulai"];
        $this->jam_selesai = $post["jam_selesai"];
        $this->periode = $post["periode"];
        $this->kelas = $post["kelas"];
	
        $this->db->update($this->_table, $this, array('id_jadwal' => $post['id_jadwal']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jadwal" => $id));
	}
	
}
