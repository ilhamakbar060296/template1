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
  <center><h2> Daftar Kinerja </h2></center>
      <table Align="center" border="1" style="width: 100%; table-layout: fixed">
        <thead>
          <tr>
            <th style="width: 5%; text-align:center">No.</th>            
            <th style="width: 20%; text-align:center">NAMA KINERJA</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $no = 1;
          foreach ($kinerja as $hasil) {
          ?>          
          <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>                  
            <td style="width: 20%; text-align:center"><?php echo $hasil->nama_kinerja ?></td>
          </tr>
          <?php } ?>
        </tbody>        
      </table>
</body>
</html>