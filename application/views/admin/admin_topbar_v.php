<style>
  h1 {
  font-size: 13px;
  }
</style>
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
       <h1>SISTEM PEREKRUTAN TENAGA DOSEN BERDASARKAN KINERJA PADA PROGRAM STUDI MAGISTER MANAJAMEN FAKULTAS EKONOMI UNIVERSITAS LAMBUNG MANGKURAT BANJARMASIN</h1>
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">         
           <?php foreach ($profile as $hasil) {
          ?>
          <p class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $hasil->nama ?></p>
          <?php } ?>  <br>
          <!--<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $profile ?></span>-->
          <!--<h1>ID : <?php echo $hasil->id?></h1>-->
        <p class="mr-2 d-none d-lg-inline text-gray-600 small">ID : <?php echo $hasil->id?></p>
        <!-- Dropdown - User Information -->

      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->
