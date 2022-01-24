<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <img src="gambar/Logo_Unlam.png" style = "position: absolute; width: 170px; height: auto;">
  <table style="width: 100%; table-layout: fixed">
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
          <?php
          $no2 = 1;?>
            <center><h2> Riwayat Perubahan Batas Kelulusan Fakultas Ekonomi</h2></center>            
            <table Align="center" border="1" style="width: 100%; table-layout: fixed">
            <thead>
              <tr>
                <th style="width: 5%;  text-align:center"> NO </th>
                <th style="width: 15%; text-align:center"> KODE ADMIN </th>
                <th style="width: 20%; text-align:center">NAMA ADMIN</th>
                <th style="width: 20%; text-align:center">JUMLAH PESERTA</th>
                <th style="width: 20%; text-align:center">TANGGAL PERUBAHAN</th>
                <th style="width: 20%; text-align:center">BATAS KELULUSAN</th>
              </tr>
            </thead>
            <tbody>  
            <?php foreach($batas as $hasil2){ ?>              
                <tr>
                    <td style="width: 5%;  text-align:center"><?php echo $no2++ ?></td>
                    <td style="width: 15%; text-align:center"><?php echo $hasil2->kode_admin?></td>
                    <td style="width: 20%; text-align:center"><?php echo $hasil2->nama_admin?></td>
                    <td style="width: 20%; text-align:center"><?php echo $hasil2->jumlah_peserta?></td>
                    <td style="width: 20%; text-align:center"><?php echo $hasil2->tanggal_upload?></td>
                    <td style="width: 20%; text-align:center"><?php echo $hasil2->batas?></td>
                </tr>                
            <?php } ?>
              </tbody>
            </table>     
</body>
</html>