<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Berkas <?php echo $nama ?> </h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">IDENTITAS</label></td>
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($id as $kinerja){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_id/'?><?php echo $kinerja->no_peserta?>" target="_blank"><?php echo $no++.". ".$kinerja->berkas?> </td>
              <td><a href="<?php echo base_url().'admin/id_valid/'.$kinerja->no_peserta?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/id_tidak_valid/'.$kinerja->no_peserta?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_id/'?><?php echo $kinerja->no_peserta?>" target="_blank"><?php echo $no++.". ".$kinerja->berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan2/'.$kinerja->no_peserta?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_id/'?><?php echo $kinerja->no_peserta?>" target="_blank"><?php echo $no++.". ".$kinerja->berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  }               
          }?>                    
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">KINERJA BIDANG PENDIDIKAN</label></td>            
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "ijazah"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'admin/berkas_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/berkas_tidak_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">PENGAJARAN</label></td>        
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "sk"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'admin/berkas_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/berkas_tidak_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">KINERJA BIDANG PENELITIAN</label></td>            
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "penelitian"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'admin/berkas_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/berkas_tidak_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">KINERJA PENGABDIAN KEPADA MASYARAKAT</label></td>                        
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "pengabdian"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'admin/berkas_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/berkas_tidak_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td colspan="3"><label for="text">KINERJA PENUNJANG LAINNYA</label></td>                                    
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "sertifikat"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'admin/berkas_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-success"> Valid </a></td>
              <td><a href="<?php echo base_url().'admin/berkas_tidak_valid/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Tidak Valid </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'admin/perbaikan/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Send Notification </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><a href="<?php echo base_url().'admin/lihat_berkas/'?><?php echo $kinerja->no_peserta."/".$kinerja->no_berkas?>" target="_blank"><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td> Berkas Sudah Valid</td>
                </tr>
              <?php  } 
              }
          }?>          
          </form>
        </tbody>        
      </table>
    <tr>
      <?php 
      $check = 0;
      foreach($id as $kinerja){ 
        if($kinerja->keterangan == "benar"){
          $check = 1;
        }else{
          $check = 0;
          break;
        }          
      }
      foreach($berkas as $kinerja){ 
        if($kinerja->keterangan == "benar"){
          $check = 1;
        }else{
          $check = 0;
          break;
        }          
      }
      if($check == 1){?>
        <td><a href="<?php echo base_url().'admin/berkas_validation/'?><?php echo $kinerja->no_peserta?>" class="btn btn-md btn-success"> Validation </a></td>
      <?php }
      ?>
    </tr>
    </div>    
  </div>
  <form>
  	<input type="button" value="Go back!" onclick="history.back()">
	</form>
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