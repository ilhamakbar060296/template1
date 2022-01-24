<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Laporan Jumlah Pangkat Fakultas Ekonomi </h1></center>
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
            <th>DEPARTEMEN</th>
            <th>PANGKAT</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          $no = 1;
          $A3 = 0;
          $B3 = 0;
          $C3 = 0;
          foreach($lulus as $hasil){ ?>
            <tr>
                <td style="text-align:center"><?php echo $no++ ?></td>
                <td ><?php echo $hasil->no_peserta ?></td>
                <td><?php echo $hasil->nama_peserta ?></td>
                <td><?php echo $hasil->jenis_kelamin ?></td>
                <?php foreach($id as $hasil2){ 
                    if($hasil2->no_peserta == $hasil->no_peserta){?>
                        <td><?php echo $hasil2->departemen ?></td>
                <?php }
                    else{?>
                        <?php continue; ?>
                <?php } 
                } ?>
                <?php foreach($peserta as $hasil3){ 
                    if($hasil3->no_peserta == $hasil->no_peserta){?>
                        <td><?php echo $hasil3->keterangan ?></td>
                        <?php if($hasil3->keterangan == "3A"){
                            $A3 += 1;
                        }elseif($hasil3->keterangan == "3B"){
                            $B3 += 1;
                        }elseif($hasil3->keterangan == "3C"){
                            $C3 += 1;
                        }else{                            
                        } ?>
                <?php } 
                } ?>
            </tr>
          <?php }           
          ?>
        </tbody>        
      </table>
      <br>
      <br>
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3A</label></td>
                <td style="text-align:center"><?php echo $A3?></td>
            </tr>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3B</label></td>
                <td style="text-align:center"><?php echo $B3?></td>
            </tr>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3C</label></td>
                <td style="text-align:center"><?php echo $C3?></td>
            </tr>
        </tbody>
      </table>
      <tr>      
      <td><a href="<?php echo base_url().'admin/report_hitung_pangkat/'?>" class="btn btn-md btn-success"> Print </a></td>
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