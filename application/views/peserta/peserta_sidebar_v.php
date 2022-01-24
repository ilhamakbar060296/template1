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
    <a class="nav-link" href="<?= site_url('peserta'); ?>">
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
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Peserta</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
          <?php foreach ($profile as $hasil) {
          ?>
        <a class="collapse-item" href="<?= site_url('peserta/profil'); ?>">Profil</a>
        <a class="collapse-item" href="<?= site_url('peserta/Kartu'); ?>">Print Kartu Peserta</a>
        <a class="collapse-item" href="<?= site_url('peserta/nilai/'.$hasil->no_peserta); ?>">Nilai</a>
        <?php if($hasil->status_berkas == "valid"){ ?>
        <a class="collapse-item" href="<?= site_url('peserta/semua/'.$hasil->no_peserta); ?>">Kinerja Keseluruhan</a>
        <?php } ?>
        <?php } ?>
      </div>
    </div>
  </li>
  <!-- Nav Item - Pengumuman -->
  <li class="nav-item">
        <?php foreach ($profile as $hasil) {
        ?>
        <a class="nav-link collapsed" href="<?= site_url('peserta/hasil/'.$hasil->no_peserta); ?>" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
        <?php } ?>
      <!--<i class="fas fa-fw fa-cog"></i>-->
      <span>Pengumuman</span>
    </a>
  </li>

  <!-- Nav Item - Keluar -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= site_url('peserta/logout');?>" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
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
