<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Profile peserta </h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $no = 1;
          foreach ($profile as $hasil) {
          ?>          
          <tr>
            <td>NO PESERTA : </td>
            <td><?php echo $hasil->no_peserta ?></td>
          </tr>
          <tr>
            <td>NAMA : </td>
            <td><?php echo $hasil->nama_peserta ?></td>
          </tr>
          <tr>
            <td>JENIS KELAMIN : </td>
            <td><?php echo $hasil->jenis_kelamin ?></td>
          </tr>
          <tr>
            <td>AGAMA : </td>
            <td><?php echo $hasil->agama ?></td>
          </tr>
          <tr>
            <td>ALAMAT : </td>
            <td><?php echo $hasil->alamat ?></td>
          </tr>
          <tr>
            <td>TELP : </td>
            <td><?php echo $hasil->telp ?></td>
          </tr>
          <tr>
            <td>EMAIL : </td>
            <td><?php echo $hasil->email ?></td>
          </tr>         
          <tr>
            <!--<td><a href="<?=base_url($hasil->berkas.'.pdf')?>" target="_blank">Show My Pdf</a></td>-->
            <td>
              <!--<a href="<?php echo base_url().'admin/hapus_peserta/'?><?php echo $hasil->id_peserta?>" class="btn btn-sm btn-danger"> Hapus </a>-->
            </td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
      <tr>
      <!--<td><a href="<?php echo base_url().'index.php/staff_control/tambah/'?>" class="btn btn-md btn-success"> Tambah Peserta </a></td>-->
      <td><a href="<?php echo base_url().'admin/edit_profil/'?><?php echo $hasil->no?>"  class="btn btn-md btn-success"> Edit </a></td>
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