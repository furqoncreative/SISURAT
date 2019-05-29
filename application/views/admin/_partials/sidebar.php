<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'surat' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-envelope-open"></i>
            <span>Surat Tugas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/surat/add') ?>">Surat Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/surat') ?>">List Surat</a>
        </div>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jadwal' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa fa-list-alt"></i>
            <span>Jadwal</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/jadwal/add') ?>">Jadwal Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jadwal') ?>">List Jadwal</a>
        </div>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'dosen' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Dosen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/dosen/add') ?>">Dosen Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/dosen') ?>">List Dosen</a>
        </div>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'mataKuliah' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Mata kuliah</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/matakuliah/add') ?>">Mata Kuliah Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/matakuliah') ?>">List Mata Kuliah</a>
        </div>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'pejabat' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Pejabat</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/pejabat/add') ?>">Pejabat Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/pejabat') ?>">List Pejabat</a>
        </div>
    </li>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'ruangan' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-door-closed"></i>
            <span>Ruangan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/ruangan/add') ?>">Ruangan Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/ruangan') ?>">List Ruangan</a>
        </div>
    </li>
    </li>
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jurusan' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Jurusan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/jurusan/add') ?>">Jurusan Baru</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jurusan') ?>">List Jurusan</a>
        </div>
    </li>
    
    
</ul>
