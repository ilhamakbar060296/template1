<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <img src="gambar/Logo_Unlam.png" style = "position: absolute; width: 140px; height: auto;">
  <table style="width: 100%">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
            <font size="16">    KARTU PESERTA </font>
            <font size="16"><br>SELEKSI PEMILIHAN TENAGA DOSEN</font>          
            <font size="16"><br>UNIVERSITAS LAMBUNG MANGKURAT</font>
            <font size="16"><br>BANJARMASIN</font>
        </span>
      </td>
    </tr>
  </table>
  <hr class="line-title">
      <table style="width: 110%">
          <tr>
            <td><font size="16">No Peserta </font></td>
            <td><font size="16">: <?php echo $no_peserta ?></font></td>
            <td align="right"><img src="<?php echo $path."/".$foto?>" style = "position: absolute; width: 100px; height: 140px;"></td>
          </tr>
          <tr>
            <td><font size="16">Nama </font></td>
            <td><font size="16">: <?php echo $nama_peserta ?></font></td>            
          </tr>          
          <tr>
            <td><font size="16">Jenis Kelamin </font></td>
            <td><font size="16">: <?php echo $kelamin ?></font></td>
          </tr>
          <tr>
            <td><font size="16">Tempat / Tanggal Lahir </font></td>
            <td><font size="16">: <?php echo $ttl ?></font></td>
          </tr>
          <tr>
            <td><font size="16">Universitas</font></td>
            <td><font size="16">: <?php echo $uni ?></font></td>
          </tr>
          <tr>
            <td><font size="16">Fakultas</font></td>
            <td><font size="16">: <?php echo $fakultas ?></font></td>
          </tr>                 
      </table>
</body>
</html>