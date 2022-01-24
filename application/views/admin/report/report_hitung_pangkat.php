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
  <center><h2> Laporan Jumlah Pangkat Fakultas Ekonomi </h1></center>
  <hr>
      <table border="1" style="width: 100%">
        <thead>
          <tr>
            <th style="width: 5%; text-align:center">NO</th> 
            <th style="width: 15%; text-align:center">NO PESERTA</th>                       
            <th style="width: 15%; text-align:center">NAMA</th>
            <th style="width: 15%; text-align:center">JENIS KELAMIN</th>
            <th style="width: 15%; text-align:center">DEPARTEMEN</th>
            <th style="width: 15%; text-align:center">PANGKAT</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          $no = 1;
          $A3 = 0;
          $B3 = 0;
          $C3 = 0;
          foreach($lulus as $hasil){ ?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->no_peserta ?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->nama_peserta ?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->jenis_kelamin ?></td>
                <?php foreach($id as $hasil2){ 
                    if($hasil2->no_peserta == $hasil->no_peserta){?>
                        <td style="width: 15%; text-align:center"><?php echo $hasil2->departemen ?></td>
                <?php }
                    else{?>
                        <?php continue; ?>
                <?php } 
                } ?>
                <?php foreach($peserta as $hasil3){ 
                    if($hasil3->no_peserta == $hasil->no_peserta){?>
                        <td style="width: 15%; text-align:center"><?php echo $hasil3->keterangan ?></td>
                        <?php if($hasil3->keterangan == "3A"){
                            $A3 += 1;
                        }elseif($hasil3->keterangan == "3B"){
                            $B3 += 1;
                        }elseif($hasil3->keterangan == "3C"){
                            $C3 += 1;
                        }else{                            
                        } ?>
                <?php } 
                } ?>
            </tr>
          <?php }           
          ?>
        </tbody>        
      </table>
      <br>
      <br>
      <table border="1" style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3A</label></td>
                <td style="width: 5%; text-align:center"><?php echo $A3?></td>
            </tr>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3B</label></td>
                <td style="width: 5%; text-align:center"><?php echo $B3?></td>
            </tr>
            <tr>
                <td><label for="text">Jumlah Peserta Naik ke Pangkat 3C</label></td>
                <td style="width: 5%; text-align:center"><?php echo $C3?></td>
            </tr>
        </tbody>
      </table>
</body>
</html>