<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Upload Kinerja Penunjang lainnya </h2></center>  
  <div class="container" style="margin-top: 80px">
    <div class="col-mid-12">
      <?php echo form_open_multipart('peserta/simpan_sertifikat');?>               
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
          <?php } ?>
          <tr>
            <td><label for="text">NO. SERTIFIKAT</label></td>
            <td><input type="text" name="SERTIFIKAT" class="form_control" placeholder="Masukkan No sertifikat">
          </tr>
          <tr>
            <td><label for="text">NAMA SERTIFIKAT</label></td>
            <td><input type="text" name="KEGIATAN" class="form_control" placeholder="Masukkan Nama Sertifikat">
          </tr>
          <tr>
            <td><label for="text">TANGGAL SERTIFIKAT</label></td>
            <td><input type="date" name="TANGGAL" class="form_control" placeholder="Masukkan Tanggal ">
          </tr>
          <tr>
            <td><label for="text">TEMPAT SERTIFIKAT</label></td>
            <td><input type="text" name="TEMPAT" class="form_control" placeholder="Lokasi sertifikat">
          </tr>
          <tr>
            <td><label for="text">UPLOAD SERTIFIKAT*</label></td>
            <td><input type="file" name="UPLOAD" id="upload" accept="application/pdf" required>
          </tr>
          <tr>
            <td><label for="text" style="color:red;">* Contoh nama file : Sertifikat_Rangga_Pratama_2021.pdf</label></td>
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
