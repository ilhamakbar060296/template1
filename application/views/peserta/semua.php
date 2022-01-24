<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Laporan Evaluasi Kinerja Dosen Fakultas Ekonomi Universitas Lambung Mangkurat</h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> A. IDENTITAS</label></td>                
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <?php  
      $no = 1;
      foreach($id as $hasil){ ?>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">Nama</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->nama_peserta?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">No Peserta</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->no_peserta?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NIK</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->nik?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NIDN</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->nidn?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">JENIS KELAMIN</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->jenis_kelamin?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">TEMPAT / TANGGAL LAHIR</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->ttl?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">PANGKAT</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->pangkat?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">JABATAN</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->jabatan?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">PENDIDIKAN TERAKHIR</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->ijazah?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">FAKULTAS</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->fakultas?></td>
        </tr>
        <tr>
            <td style="width: 5%"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">DEPARTEMEN</label></td>
            <td style="width: 5%"><label for="text">:</label></td>
            <td><?php echo $hasil->departemen?></td>
        </tr>
        <?php } ?>
      </table>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> B. PENDIDIKAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO IJAZAH</th>
            <th style="width: 30%; text-align:center">SARJANA</th>
            <th style="width: 20%; text-align:center">UNIVERSITAS</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "ijazah"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->sarjana?></td>                
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> C. PENGAJARAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">KEGIATAN</th>
            <th style="width: 10%; text-align:center">SKS</th>
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "sk"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 10%; text-align:center"><?php echo $hasil->jumlah_sks?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> D. PENELITIAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">JUDUL PENELITIAN</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "penelitian"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> E. PENGABDIAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">JUDUL PENGABDIAN</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "pengabdian"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text"> F. PENUNJANG LAINNYA</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">NAMA BERKAS</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "sertifikat"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <?php foreach($profile as $hasil){ ?>
      <table>
        <tbody>
            <tr>
                <td><a href="<?php echo base_url().'peserta/report_semua/'.$hasil->no_peserta?>" class="btn btn-md btn-success"> Print </a></td>
            </tr>
        </tbody>
      </table>
      <?php } ?>
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