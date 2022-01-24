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
  <center><h2> Daftar Kinerja Peserta Fakultas Ekonomi</h2></center>
      <table border="1" style="width: 100%; table-layout: fixed" >
        <thead>
          <tr>
            <th style="width: 25%">No.</th>  
            <th style="width: 75%">NO PESERTA</th>          
            <th style="width: 75%">NAMA PESERTA</th>            
            <th style="width: 75%">JENIS KELAMIN</th>
            <?php foreach($kinerja as $hasil4){?>
            <th style="width: 90%"><?php echo $hasil4->nama_kinerja?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          $previous1 = null;
          $current = null;
          foreach ($nilai as $hasil) {
            if($previous1 == null) {?>
              <tr>
              <td style="width: 25%"><?php echo $no++ ?></td><?php
              $previous1 = $hasil->nama_peserta;?>
              <td style="width: 75%"><?php echo $hasil->no_peserta ?></td>
              <td style="width: 75%"><?php echo $hasil->nama_peserta ?></td>              
              <td style="width: 76%"><?php echo $hasil->jenis_kelamin ?></td>
              <?php foreach ($nilai as $hasil2) {?>
                <?php if($previous1 == $hasil2->nama_peserta) {?>
                  <td style="width: 90%; word-break:break-all; word-wrap:break-word;"><?php echo $hasil2->score?></td><?php  
                }else{
                continue;
                }
              }?> 
              </tr><?php
            }elseif($previous1 == $hasil->nama_peserta){
              continue;
            }
            else{
              $current = $hasil->nama_peserta;?>
              <tr>
              <td style="width: 25%"><?php echo $no++ ?></td>
              <td style="width: 75%"><?php echo $hasil->no_peserta ?></td>
              <td style="width: 75%"><?php echo $hasil->nama_peserta ?></td>              
              <td style="width: 76%"><?php echo $hasil->jenis_kelamin ?></td>              
              <?php foreach ($nilai as $hasil3) {?>
                <?php if($current == $hasil3->nama_peserta) {?>
                  <td style="width: 90%; word-break:break-all; word-wrap:break-word;"><?php echo $hasil3->score?></td><?php
                }
              $previous1 = $current; 
              }?>
              </tr><?php
            }
          }?>
        </tbody>         
      </table>
</body>
</html>