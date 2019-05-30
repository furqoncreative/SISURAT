<?php
Class CetakSurat extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    

    function index(){

        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetMargins(10, 10 , 10, 10);
        $pdf->SetFont('Times','B',14);
        
        $pdf->Image('assets\image\logo_uin.png',8,8,34);
        $pdf->Cell(220,6,'KEMENTRIAN AGAMA REPUBLIK INDONESIA',0,1,'C');
        $pdf->Cell(220,6,'UNIVERSITAS ISLAM NEGERI (UIN)',0,1,'C');
        $pdf->SetFont('Times','B',15);
        $pdf->Cell(220,6,'SUNAN GUNUNG DJATI BANDUNG',0,1,'C');
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(220,6,'FAKULTAS SAINS DAN TEKNOLOGI',0,1,'C');
        $pdf->SetFont('Times','B',8.5);
        $pdf->Cell(220,6,'Jalan A.H Nasution No 105 Cibiru - Bandung 40614 Telp. 022-7800525 Fax. 022-7803936 website:http://fst.uinsgd.ac.id',0,1,'C');
        
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 40, 210-10, 40);
        $pdf->SetLineWidth(0);
        $pdf->ln(2);

        $pdf->SetFont('Times','',12);
        $pdf->Cell(20,5,'Nomor',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(50,5,'Nomor Surat',0,0);

        $pdf->ln();
        $pdf->Cell(20,5,'Lampiran',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(50,5,' - ',0,0);

        $pdf->ln();
        $pdf->Cell(20,5,'Perihal',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(57,5,'Tugas Memberi Kuliah Semester',0,0);
        $pdf->Cell(50,5,'Ganjil',0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(31,5,'Tahun Akademik',0,0);
        $pdf->Cell(20,5,'2018/2019',0,0);

        $pdf->ln(7);
        $pdf->setX(32);
        $pdf->Cell(31,5,'Kepada Yth.',0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(31,5,'Bapak/Ibu',0,0);

        $pdf->SetFont('Times','B',12);
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(31,5,'Anggita Rahmi Hafsari, M.Si',0,0);

        $pdf->SetFont('Times','',12);
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(31,5,'Dosen Fakultas Sains dan Teknologi',0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(31,5,'UIN Sunan Gunung Djati Bandung',0,0);

        $pdf->ln(7);
        $pdf->setX(32);
        $pdf->Cell(31,5,"Assalamu'alaikum Wr. Wb",0,0);

        $pdf->ln(7);
        $pdf->setX(37);
        $pdf->Cell(123,5,"Dengan ini kami sampaikan tugas/jadwal memberi kuliah pada semester",0,0);
        $pdf->Cell(11,5,"genap",0,0);
        $pdf->Cell(10,5,"tahun akademik",0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"2018/2019",0,0);
        $pdf->Cell(48,5,"yang berlaku mulai tanggal",0,0);
        $pdf->Cell(19,5,"4 Februari",0,0);
        $pdf->Cell(14,5,"Sampai",0,0);
        $pdf->Cell(24,5,"25 Mei 2019,",0,0);
        $pdf->Cell(10,5,"adapun ketentuan",0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"pelaksanaannya sebagai berikut :",0,0);
        
        $pdf->ln(7);
        $pdf->setX(33);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(7,5,'No',1,0,'C');
        $pdf->Cell(55,5,'Mata Kuliah',1,0,'C');
        $pdf->Cell(13,5,'SKS',1,0,'C');
        $pdf->Cell(30,5,'Jum/Sem/Kls',1,0,'C');
        $pdf->Cell(20,5,'Hari',1,0,'C');
        $pdf->Cell(20,5,'Pukul',1,0,'C');
        $pdf->Cell(20,5,'Ruang',1,1,'C');

        $pdf->setX(33);
        $pdf->SetFont('Times','',12);
        $dosen = $this->db->get('dosen')->result();
        foreach ($dosen as $row){
        $pdf->Cell(7,5,'No',1,0,'C');
        $pdf->Cell(55,5,'Mata Kuliah',1,0,'C');
        $pdf->Cell(13,5,'SKS',1,0,'C');
        $pdf->Cell(30,5,'Jum/Sem/Kls',1,0,'C');
        $pdf->Cell(20,5,'Hari',1,0,'C');
        $pdf->Cell(20,5,'Pukul',1,0,'C');
        $pdf->Cell(20,5,'Ruang',1,1,'C');
        }

        $pdf->ln(7);
        $pdf->setX(37);
        $pdf->Cell(123,5,"Untuk ketertiban perkuliahan, Bapak/ibu dimohon memperhatikan hal-hal berikut :",0,0);
      
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"1. Dosen/Asisten berkewajiban menyelenggarakan tatap muka terjadwal sekurang-",0,0);
        
        $pdf->ln();
        $pdf->setX(36);
        $pdf->Cell(20,5,"kurangnya 14 kali",0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(100,5,"2. Menyiapkan dan menyampaikan SAP kepada jurusan selambat-lambatnya tanggal",0,0);

        $pdf->ln();
        $pdf->setX(36);
        $pdf->Cell(20,5,"11 Februari 2019",0,0);
      
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"3. Sebelum memulai agar mengecek daftar Mahasiswa yang berhak mengikuti kuliah",0,0);
      
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"4. Pada akhir perkuliahan agar mengecek daftar Mahasiswa yang berhak mengikuti ujian dan",0,0);

        $pdf->ln();
        $pdf->setX(36);
        $pdf->Cell(20,5,"menyerahkan dokumen kepada ketua jurusan",0,0);

        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"5. Bagi Dosen 1/Dosen 2 yang belum berhak melaksanakan kuliah mandiri, agar koordinasi",0,0);
        
        $pdf->ln();
        $pdf->setX(36);
        $pdf->Cell(20,5,"dengan dosen Pembina Mata Kuliah/Ketua Jurusan",0,0);

        $pdf->ln(7);
        $pdf->setX(35);
        $pdf->Cell(20,5,"Demikian tugas ini kami sampaikan, untuk dilaksanakan sebagaimana mestinya.",0,0);
        
        $pdf->ln();
        $pdf->setX(32);
        $pdf->Cell(20,5,"Wasalamu'alaikum Wr. Wb.",0,0);
        
        $pdf->ln();
        $pdf->setY(215);
        $pdf->setX(142);
        $pdf->Cell(20,5,"Bandung,",0,0,'L');
        $pdf->Cell(20,5,"21 Januari 2019",0,0,'L');

        $pdf->ln();
        $pdf->setY(220);
        $pdf->setX(135);
        $pdf->Cell(20,5,"a.n Dekan",0,0,'L');

        $pdf->ln();
        $pdf->setY(225);
        $pdf->setX(160);
        $pdf->Cell(20,5,"Wakil Dekan Bidang Akademik",0,0,'C');

        $pdf->ln();
        $pdf->SetFont('Times','B',12);
        $pdf->setY(250);
        $pdf->setX(160);
        $pdf->Cell(20,5,"Dr. H. Cecep Hidayat, Ir.Mp",0,0,'C');

        $pdf->SetFont('Times','',12);
        $pdf->ln();
        $pdf->setY(255);
        $pdf->setX(160);
        $pdf->Cell(20,5,"NIP. 196209181988031001",0,0,'C');

        $pdf->ln();
        $pdf->setY(260);
        $pdf->setX(20);
        $pdf->Cell(20,5,"Tembusan disampaikan Kepada Yth:",0,0,'L');

        $pdf->ln();
        $pdf->setY(265);
        $pdf->setX(23);
        $pdf->Cell(20,5,"1. Dekan Fakultas Sains dan Teknologi",0,0,'L');

        $pdf->ln();
        $pdf->setY(271);
        $pdf->setX(23);
        $pdf->Cell(20,5,"2. Ketua Jurusan dilingkungan Fakultas Sains dan Teknologi",0,0,'L');




        $pdf->Output();
    }
}