<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <img src="gambar/Logo_Unlam.png" style = "position: absolute; width: 170px; height: auto;">
  <table style="width: 100%">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          <font size="16"><br>UNIVERSITAS LAMBUNG MANGKURAT</font>          
          <font size="16"><br>BANJARMASIN</font>
          <font size="12"><br>Jl. Brigjend H. Hasan Basri Telp/Fax (0511)3306664 Kayutangi 70123</font>
          <font size="12"><br>Laman : http://localhost/Template1/</font>
        </span>
      </td>
    </tr>
  </table>
  <hr class="line-title">
  <center><h2> Daftar Lulus Seleksi Calon Tenaga Dosen Fakultas Ekonomi</h2></center>
      <table border="1" style="width: 100%">
        <thead>
          <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center">NO PESERTA</th>
            <th style="text-align:center">NAMA</th>
            <th style="text-align:center">JENIS KELAMIN</th>
            <th style="text-align:center">KETERANGAN</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $no = 1;
          foreach ($lulus as $hasil) {
          ?>          
          <tr>
            <td style="text-align:center"><?php echo $no++ ?></td>          
            <td style="text-align:center"><?php echo $hasil->no_peserta ?></td>
            <td style="text-align:center"><?php echo $hasil->nama_peserta ?></td>
            <td style="text-align:center"><?php echo $hasil->jenis_kelamin ?></td>
            <td style="text-align:center"><?php echo $hasil->keterangan ?></td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
</body>
</html>