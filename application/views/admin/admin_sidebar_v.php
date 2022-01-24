<style>
img {    
  max-width: 80%; 
  }
</style>
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->  
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">
       <li class="nav-item active">
    <a class="nav-link" href="<?= site_url('admin'); ?>">
      <img src="<?php echo base_url().'gambar/Logo_Unlam.png'?>">
  </li>      
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>

  <!-- Nav Item - Pages Collapse Peserta -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Peserta</span>
    </a>
    <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="<?= site_url('admin/peserta'); ?>">Daftar Peserta</a>
        <a class="collapse-item" href="<?= site_url('admin/set_batas'); ?>">Set Jumlah Lulus</a>        
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Peserta -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Kinerja</span>
    </a>
    <div id="collapsesix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="<?= site_url('admin/kinerja'); ?>">Buat Kinerja</a>        
        <a class="collapse-item" href="<?= site_url('admin/kinerja_peserta'); ?>">Kinerja Peserta</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Kriteria -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Kriteria</span>
    </a>
    <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="<?= site_url('admin/kriteria'); ?>">Buat Kriteria Baru</a>
        <a class="collapse-item" href="<?= site_url('admin/crips'); ?>">Crips Kriteria</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Perhitungan -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseUtilities">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Perhitungan</span>
    </a>
     <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="<?= site_url('admin/perhitungan/'); ?>">Masukkan Nilai Peserta</a>
        <a class="collapse-item" href="<?= site_url('admin/nilai'); ?>">Hitung Nilai</a>
      </div>
  </li>

  <!-- Nav Item - Pengumuman -->
  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Pengumuman</span>
    </a>
    <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="<?= site_url('admin/lulus'); ?>">Daftar Peserta Lulus</a>
        <a class="collapse-item" href="<?= site_url('admin/gagal'); ?>">Daftar Peserta Gagal</a>
        <a class="collapse-item" href="<?= site_url('admin/hasil_ujian'); ?>">Daftar Semua Peserta Lulus/Gagal</a>
        <a class="collapse-item" href="<?= site_url('admin/hitung_pangkat'); ?>">Laporan Pangkat</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Keluar -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= site_url('admin/logout'); ?>" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Keluar</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
