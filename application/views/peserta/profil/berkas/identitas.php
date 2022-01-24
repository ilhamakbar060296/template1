<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Upload Identitas </h2></center>  
  <div class="container" style="margin-top: 80px">
    <div class="col-mid-12">
      <?php echo form_open_multipart('peserta/simpan_identitas');?>               
      <?php echo $this->session->flashdata('notif') ?>
      <table id="table" class="table table-striped table-bordered table-hover">
      <form>
        <tbody>          
          <?php
          $no = 1;
          foreach ($profile as $hasil) {
          ?>          
          <tr>
            <td><label for="text">NO PESERTA</label></td>
            <td><?php echo $hasil->no_peserta ?></td>          
          </tr>
          <tr>
            <td><label for="text">NAMA</label></td>
            <td><?php echo $hasil->nama_peserta ?></td>            
          </tr>
          <tr>
            <td><label for="text">NIK</label></td>
            <td><input type="text" name="NIK" class="form_control" placeholder="Masukkan NIK">
          </tr>
          <tr>
            <td><label for="text">NIDN</label></td>
            <td><input type="text" name="NIDN" class="form_control" placeholder="Masukkan NIDN">
          </tr>
          <tr>
            <td><label for="text">JENIS_KELAMIN</label></td>
            <td><?php echo $hasil->jenis_kelamin ?></td>            
          </tr>
          <tr>
            <td><label for="text">TEMPAT / TANGGAL LAHIR</label></td>
            <td><?php echo $hasil->tempat_lahir." / ".$hasil->tanggal_lahir ?></td>            
          </tr>
          <tr>
            <td><label for="text">PANGKAT / GOLONGAN</label></td>
            <td><?php echo $hasil->keterangan ?></td>            
          </tr>
          <?php } ?>          
          <tr>
            <td><label for="text">JABATAN</label></td>
            <td><input type="text" name="JABATAN" class="form_control" placeholder="Masukkan Jabatan ">
          </tr>
          <tr>
            <td><label for="text">PENDIDIKAN TERAKHIR</label></td>
            <td><input type="text" name="PT" class="form_control" placeholder="Masukkan S1, S2, S3 ">
          </tr>
          <tr>
            <td><label for="text">FAKULTAS</label></td>
            <td><input type="text" name="FAKUL" class="form_control" placeholder="Masukkan Fakultas ">
          </tr>
          <tr>
            <td><label for="text">DEPARTEMEN</label></td>
            <td><input type="text" name="MK" class="form_control" placeholder="Masukkan Departemen ">
          </tr>
          <tr>
            <td><label for="text">UPLOAD IDENTITAS*</label></td>
            <td><input type="file" name="ID" id="id" accept="application/pdf" required>
          </tr>
          <tr>
            <td><label for="text" style="color:red;">* Contoh nama file : Identitas_Rangga_Pratama_2021.pdf</label></td>
          </tr>  
          <tr>
            <td><button type="submit" class="btn btn-md btn-success">Simpan</button></td>
          </tr>
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
