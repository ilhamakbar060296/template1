<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <img src="gambar/Logo_Unlam.png" style = "position: absolute; width: 120px; height: auto;">
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
  <?php         
  foreach ($hasil1 as $hasil) {
  ?> 
  <center><font size="14">    Yang Terhomat, Peserta Seleksi pemilihan tenaga dosen atas nama :</font></center>
  <br>
  <table align="center" style="width: 70%">
  <tr>
    <td><font size="16">Nama </font></td>
    <td><font size="16">: <?php echo $hasil->nama_peserta ?></font></td>
  </tr>
  <tr>
    <td><font size="16">No Peserta </font></td>
    <td><font size="16">: <?php echo $hasil->no_peserta ?></font></td>
  </tr>
  <tr>
    <td><font size="16">Jenis Kelamin </font></td>
    <td><font size="16">: <?php echo $hasil->jenis_kelamin ?></font></td>
  </tr>
  <?php         
  foreach ($profile as $hasil2) {
  ?> 
  <tr>
    <td><font size="16">Tempat / Tanggal Lahir </font></td>
    <td><font size="16">: <?php echo $hasil2->tempat_lahir.", ".$hasil2->tanggal_lahir ?></font></td>
  </tr>
  <?php } ?>
  <tr>
    <td><font size="16">Universitas</font></td>
    <td><font size="16">: Lambung Mangkurat</font></td>
  </tr>
  <tr>
    <td><font size="16">Fakultas</font></td>
    <td><font size="16">: Ekonomi</font></td>
  </tr>
  </table>
  <br>
  <center><font size="14">     Menyatakan bahwa peserta dengan nama yang disebutkan</font></center>
  <br>
  <center><h1><?php echo strtoupper($hasil->keterangan)." SELEKSI" ?></h1></center>
  <br>
  <?php foreach ($profile as $hasil2) { ?>
    <center><font size="14">     Dan berhak menjadi dosen Fakultas Ekonomi tingkat <strong><?php echo $hasil2->keterangan?></strong></font></center>
  <?php } ?>  
  <br>
  <center><font size="14">     Dari Panitia pelaksana</font></center>
  <?php } ?>
</body>
</html>