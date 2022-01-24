<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Edit Profile </h2></center>  
  <div class="container" style="margin-top: 80px">
    <div class="col-mid-12">
      <?php echo form_open('peserta/update_profil');?>               
      
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>
          <tr>
            <div class="form-group">
            <td><label for="text">NO PESERTA :</label></td>
            <td><label for="text"><?php echo $get->no_peserta ?></label>
            <td><img src="<?php echo base_url().$get->path."/".$get->foto?>" style = "position: absolute; width: 100px; height: 140px;"></td>            
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">NAMA:</label></td>
            <td><label for="text"><?php echo $get->nama_peserta ?></label>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">JENIS KELAMIN :</label></td>
            <td><label for="text"><?php echo $get->jenis_kelamin ?></label>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">TEMPAT / TANGGAL LAHIR :</label></td>
            <td><label for="text"><?php echo $get->tempat_lahir.", ".$get->tanggal_lahir ?></label>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">AGAMA :</label></td>
            <td><input type="text" name="AGAMA" value="<?php echo $get->agama ?>" class="form_control"></td>
            <td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">ALAMAT :</label></td>
            <td><input type="text" name="ALAMAT" value="<?php echo $get->alamat ?>" class="form_control"></td>
            <td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">TELP :</label></td>
            <td><input type="text" name="TELP" value="<?php echo $get->telp ?>" class="form_control" ></td>
            <td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">EMAIL :</label></td>
            <td><input type="text" name="EMAIL" value="<?php echo $get->email ?>" class="form_control" placeholder="Masukkan crips"></td>
            <td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
            </div>                        
          </tr>
          <tr>
            <div class="form-group">
            <td><label for="text">NEW PASSWORD :</label></td>
            <td><input type="text" name="PASS" class="form_control" placeholder=""></td>
            <td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
            </div>                        
          </tr>         
          <tr>
            <td><button type="submit" class="btn btn-md btn-success">Simpan</button></td>
            <td><button type="reset" class="btn btn-md btn-warning"> Reset</button></td>
          </tr>
        </tbody>
      </table>
      <form>
        <input type="button" value="Go back!" onclick="history.back()">
      </form>
      <?php echo form_close()?>
    </div>    
  </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
