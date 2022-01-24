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
  <center><h2> Daftar Calon Tenaga Dosen Fakultas Ekonomi</h2></center>
      <table border="1">
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
            <th style="text-align:center">SCORE</th>
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
            <td style="text-align:center"><?php echo $hasil->score ?></td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
</script>
</body>
</html>