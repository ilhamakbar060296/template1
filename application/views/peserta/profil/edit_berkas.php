<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Edit Berkas </h2></center>  
  <div class="container" style="margin-top: 80px">
    <div class="col-mid-12">
      <?php echo form_open_multipart('peserta/update_berkas');?>               
      <?php echo $this->session->flashdata('notif') ?>
      <table id="table" class="table table-striped table-bordered table-hover">
      <form>
        <tbody>
          <tr>
            <div class="form-group">
            <td><label for="text">IDENTITAS</label></td>
            <td><a href="<?php echo base_url().'peserta/identitas/'?>" class="btn btn-md btn-success"> Upload </a></td>
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($id as $kinerja){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_identitas/'.$kinerja->no_peserta?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
            <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_identitas/'.$kinerja->no_peserta?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_id/'.$kinerja->no_peserta?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
            }
          ?>                    
          <tr>
            <div class="form-group">
            <td><label for="text">KINERJA BIDANG PENDIDIKAN</label></td>
            <td><a href="<?php echo base_url().'peserta/pendidikan/'?>" class="btn btn-md btn-success"> Upload </a></td>
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "ijazah"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_pendidikan/'.$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_pendidikan/'.$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_berkas/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td><label for="text">PENGAJARAN</label></td>                        
            <td><a href="<?php echo base_url().'peserta/pengajaran/'?>" class="btn btn-md btn-success"> Upload </a></td>                        
            </div>                        
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "sk"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_pengajaran/'.$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_pengajaran/'.$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_berkas/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td><label for="text">KINERJA BIDANG PENELITIAN</label></td>            
            <td><a href="<?php echo base_url().'peserta/penelitian/'?>" class="btn btn-md btn-success"> Upload </a></td>            
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "penelitian"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_penelitian/'.$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_penelitian/'.$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_berkas/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td><label for="text">KINERJA PENGABDIAN KEPADA MASYARAKAT</label></td>            
            <td><a href="<?php echo base_url().'peserta/pengabdian/'?>" class="btn btn-md btn-success"> Upload </a></td>            
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "pengabdian"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_pengabdian/'.$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_pengabdian/'.$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_berkas/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
              }
          }?>
          <tr>
            <div class="form-group">
            <td><label for="text">KINERJA PENUNJANG LAINNYA</label></td>                        
            <td><a href="<?php echo base_url().'peserta/sertifikat/'?>" class="btn btn-md btn-success"> Upload </a></td>            
            </div>
          </tr>
          <?php
            $no = 1;
            foreach($berkas as $kinerja){
              if($kinerja->jenis_berkas == "sertifikat"){
                if($kinerja->keterangan == "belum"){?>
            <tr>
              <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
              <td><a href="<?php echo base_url().'peserta/edit_sertifikat/'.$kinerja->no_berkas?>" class="btn btn-md btn-warning"> Ubah </a></td>
            </tr>
          <?php }
              elseif($kinerja->keterangan == "salah"){ ?>
              <tr>
                <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                <td><a href="<?php echo base_url().'peserta/edit_sertifikat/'.$kinerja->no_berkas?>" class="btn btn-md btn-danger"> Re-Upload </a></td>
              </tr>
              <?php }
                elseif($kinerja->keterangan == "benar") { ?>
                <tr>
                  <td><?php echo $no++.". ".$kinerja->nama_berkas?> </td>
                  <td><a href="<?php echo base_url().'peserta/lihat_berkas/'.$kinerja->no_peserta."/".$kinerja->no_berkas?>" class="btn btn-md btn-primary"> Cetak </a></td>
                </tr>
              <?php  } 
              }
          }?>          
          </form>
        </tbody>        
      </table>      
        <input type="button" value="Go back!" onclick="history.back()">
      </form>
      <?php echo form_close()?>
    </div>    
  </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
