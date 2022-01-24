<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h1> Daftar Nilai Calon Tenaga Dosen Universitas Lambung Mangkurat </h1></center>
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
            <?php foreach($kriteria as $hasil4){?>
            <th><?php echo $hasil4->nama_kriteria?></th>
            <?php }?>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          $previous1 = null;
          $current = null;
          foreach ($nilai as $hasil) {
            if($previous1 == null) {?>
              <tr>
              <td><?php echo $no++ ?></td><?php
              $previous1 = $hasil->peserta;?>       
              <td><?php echo $hasil->no_peserta ?></td>     
              <td><?php echo $hasil->peserta ?></td>              
              <td><?php echo $hasil->jenis_kelamin ?></td>             
              <?php foreach ($nilai as $hasil2) {?>
                <?php if($previous1 == $hasil2->peserta) {?>
                  <td><?php echo $hasil2->nama_crips?></td><?php
                }else{
                continue;
                }
              }?>
              <td>
              <a href="<?php echo base_url().'admin/hapus_nilai/'?><?php echo $hasil->no_peserta?>" class="btn btn-sm btn-danger"> Hapus </a>
              </td> 
              </tr><?php
            }elseif($previous1 == $hasil->peserta){
              continue;
            }
            else{
              $current = $hasil->peserta;?>
              <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $hasil->no_peserta ?></td>
              <td><?php echo $hasil->peserta ?></td>              
              <td><?php echo $hasil->jenis_kelamin ?></td>
              <?php foreach ($nilai as $hasil3) {?>
                <?php if($current == $hasil3->peserta) {?>                
                  <td><?php echo $hasil3->nama_crips?></td><?php
                }
              $previous1 = $current; 
              }?>
              <td>
              <a href="<?php echo base_url().'admin/hapus_nilai/'?><?php echo $hasil->no_peserta?>" class="btn btn-sm btn-danger"> Hapus </a>
              </td>
              </tr><?php
            }
          }?>
        </tbody>        
      </table>
      <tr>
      <td><a href="<?php echo base_url().'admin/hitung'?>" class="btn btn-md btn-success">Hitung</a></td>
      <td><a href="<?php echo base_url().'admin/hapus_semua_nilai'?>" class="btn btn-md btn-success">Hapus Semua</a></td>
      <td><a href="<?php echo base_url().'admin/report_nilai/'?>" class="btn btn-md btn-success"> Print </a></td>
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