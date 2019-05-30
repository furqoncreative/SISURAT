<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    private $_table = "surat";
    private $_view = "cetak_jadwal";

    public $id_surat;
    public $tanggal_surat;
    public $no_surat;
    public $kode_dosen;
    public $periode;
    public $semester;
    public $tanggal_sap;
    public $kode_pejabat;
    public $tanggal_mulai;
    public $tanggal_selesai;


    public function rules()
    {
        return [
            
            ['field' => 'no_surat',
            'label' => 'Nomor Surat',
            'rules' => 'required'],

            ['field' => 'tanggal_surat',
            'label' => 'Tanggal Surat',
            'rules' => 'required'],

            ['field' => 'kode_dosen',
            'label' => 'Dosen',
            'rules' => 'required'],

            ['field' => 'periode',
            'label' => 'Periode',
            'rules' => 'required'],

            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required'],

            ['field' => 'kode_pejabat',
            'label' => 'Pejabat',
            'rules' => 'required'],

            ['field' => 'tanggal_sap',
            'label' => 'Tanggal SAP',
            'rules' => 'required'],

            ['field' => 'tanggal_mulai',
            'label' => 'Tanggal Mulai',
            'rules' => 'required'],
            
            ['field' => 'tanggal_selesai',
            'label' => 'Tanggal Selesai',
            'rules' => 'required']
        ];
    }

    public function jumlahSurat()
    {
            $this->db->select('count(id_surat) as id_surat');
            $this->db->from('surat');
               
            $query = $this->db->get();
            return $query->result();
    }

    public function getAll()
    {
            $this->db->select('surat.*,dosen.nama as nama_dosen');
            $this->db->from('surat');
            $this->db->join('dosen', 'dosen.kode_dosen = surat.kode_dosen');
        
            $query = $this->db->get();
            return $query->result();
    }

    public function cetakSurat($kode_dosen)
    {
        $this->db->select('surat.*,dosen.nama as nama_dosen, pejabat.nip as nip_pejabat, pejabat.nama as nama_pejabat, pejabat.jabatan ');
            $this->db->from('surat');
            $this->db->join('dosen', 'dosen.kode_dosen = surat.kode_dosen');
            $this->db->join('pejabat', 'pejabat.kode_pejabat = surat.kode_pejabat');
            $this->db->where('surat.kode_dosen='.$kode_dosen);
        
            return $query = $this->db->get()->row();
    }
    public function cetakS($kode_dosen)
    {
        $this->db->select('surat.*,dosen.nama as nama_dosen, pejabat.nip as nip_pejabat, pejabat.nama as nama_pejabat, pejabat.jabatan ');
            $this->db->from('surat');
            $this->db->join('dosen', 'dosen.kode_dosen = surat.kode_dosen');
            $this->db->join('pejabat', 'pejabat.kode_pejabat = surat.kode_pejabat');
            $this->db->where('surat.kode_dosen='.$kode_dosen);
        
            return $query = $this->db->get()->row_array();
    }


    public  function cetakJadwal($kode_dosen)
    {
             $this->db->select('cetak_jadwal.*');
            $this->db->from('cetak_jadwal');
            $this->db->where('kode_dosen='. $kode_dosen);
        
            $query = $this->db->get();
            return $query->result();
    }
    
    public function getById($id_surat)
    {
        return $this->db->get_where($this->_table, ["id_surat" => $id_surat])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_surat = $post["no_surat"];
        $this->kode_dosen = $post["kode_dosen"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->periode = $post["periode"];
        $this->semester = $post["semester"];
        $this->tanggal_sap = $post["tanggal_sap"];
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->db->insert($this->_table, $this);
    }

    public function print()
    {
       $post = $this->input->post('kode_dosen');
       echo $post;die();
        $this->kode_dosen = $post;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_surat = $post["id_surat"];
        $this->no_surat = $post["no_surat"];
        $this->kode_dosen = $post["kode_dosen"];
        $this->tanggal_surat = $post["tanggal_surat"];
        $this->periode = $post["periode"];
        $this->semester = $post["semester"];
        $this->tanggal_sap = $post["tanggal_sap"];
        $this->kode_pejabat = $post["kode_pejabat"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
		$this->tanggal_selesai = $post["tanggal_selesai"];
        $this->db->update($this->_table, $this, array('id_surat' => $post['id_surat']));
    }

    public function delete($id_surat)
    {
        return $this->db->delete($this->_table, array("id_surat" => $id_surat));
	}


}
