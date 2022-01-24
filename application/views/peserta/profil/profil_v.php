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
        <tbody>
          <?php 

          $no = 1;
          foreach ($profile as $hasil) {
          ?>          
          <tr>
            <td><label for="text">NO PESERTA :</label></td>
            <td><?php echo $hasil->no_peserta ?></td>
            <td><img src="<?php echo base_url().$hasil->path."/".$hasil->foto?>" style = "position: absolute; width: 100px; height: 140px;"></td>                        
            
          </tr>
          <tr>
            <td><label for="text">NAMA :</label></td>
            <td><?php echo $hasil->nama_peserta ?></td>
          </tr>
          <tr>
            <td><label for="text">JENIS KELAMIN :</label></td>
            <td><?php echo $hasil->jenis_kelamin ?></td>
          </tr>
          <tr>
            <td><label for="text">TEMPAT / TANGGAL LAHIR :</label></td>
            <td><?php echo $hasil->tempat_lahir.", ".$hasil->tanggal_lahir ?></td>
          </tr>
          <tr>
            <td><label for="text">AGAMA :</label></td>
            <td><?php echo $hasil->agama ?></td>
          </tr>
          <tr>
            <td><label for="text">ALAMAT :</label></td>
            <td><?php echo $hasil->alamat ?></td>
          </tr>
          <tr>
            <td><label for="text">TELP :</label></td>
            <td><?php echo $hasil->telp ?></td>
          </tr>
          <tr>
            <td><label for="text">EMAIL :</label></td>
            <td><?php echo $hasil->email ?></td>
          </tr>         
          <?php } ?>
        </tbody>        
      </table>
      <tr>      
      <td><a href="<?php echo base_url().'peserta/edit_profil/'?><?php echo $hasil->no_peserta?>"  class="btn btn-md btn-success"> Edit profil</a></td>
      <td><a href="<?php echo base_url().'peserta/edit_berkas/'?><?php echo $hasil->no_peserta?>"  class="btn btn-md btn-success"> Upload Berkas </a></td>
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