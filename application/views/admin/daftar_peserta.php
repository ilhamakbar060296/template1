<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Daftar Calon Tenaga Dosen Universitas Lambung Mangkurat </h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>NO PESERTA</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>ALAMAT</th>
            <th>TELP</th>
            <th>EMAIL</th>
            <th>BERKAS</th>
            <th>STATUS BERKAS</th>
            <th>SCORE</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $no = 1;
          foreach ($daftar as $hasil) {
          ?>          
          <tr>
            <td><?php echo $no++ ?></td>          
            <td><?php echo $hasil->no_peserta ?></td>
            <td><?php echo $hasil->nama_peserta ?></td>
            <td><?php echo $hasil->jenis_kelamin ?></td>
            <td><?php echo $hasil->agama ?></td>
            <td><?php echo $hasil->alamat ?></td>
            <td><?php echo $hasil->telp ?></td>
            <td><?php echo $hasil->email ?></td>
            <td>
            <a href="<?php echo base_url().'admin/berkas/'?><?php echo $hasil->no_peserta?>"> Show My Pdf </a>
            </td>
            <td><?php echo $hasil->status_berkas ?></td>
            <td><?php echo $hasil->score ?></td>
            <td>
            <a href="<?php echo base_url().'admin/hapus_peserta/'?><?php echo $hasil->no?>" class="btn btn-sm btn-danger"> Hapus </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
      <tr>
      <td><a href="<?php echo base_url().'admin/report_peserta/'?>" class="btn btn-md btn-success"> Print </a></td>
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