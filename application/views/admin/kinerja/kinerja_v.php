<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Daftar Kinerja </h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>NAMA KINERJA</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $no = 1;
          foreach ($kinerja as $hasil) {
          ?>          
          <tr>
            <td><?php echo $no++ ?></td>            
            <td><?php echo $hasil->nama_kinerja ?></td>          
            <td> 
              <a href="<?php echo base_url().'admin/edit_kinerja/'?><?php echo $hasil->no?>" class="btn btn-sm btn-success"> Edit </a>              
              <a href="<?php echo base_url().'admin/hapus_kinerja/'?><?php echo $hasil->no?>" class="btn btn-sm btn-danger"> Hapus </a>             
            </td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
      <tr>
      <td><a href="<?php echo base_url().'admin/tambah_kinerja/'?>" class="btn btn-md btn-success"> Tambah kinerja </a></td>
      <td><a href="<?php echo base_url().'admin/hapus_semua_kinerja'?>" class="btn btn-md btn-success">Hapus Semua</a></td>      
      <td><a href="<?php echo base_url().'admin/report_kinerja/'?>" class="btn btn-md btn-success"> Print </a></td>
    </tr>
    </div>    
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- script diatas akan menampilkan jumlah entries yang ditampilkan, fungsi search, pengurutan tabel, dan halaman-->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $('#table').DataTable( {
      autoFill: true
  } );
  </script>
</body>
</html>