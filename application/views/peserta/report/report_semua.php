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
  <center><h2> Laporan Evaluasi Kinerja Dosen Fakultas Ekonomi</h2></center>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> A. IDENTITAS</label></td>                
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <?php  
      $no = 1;
      foreach($id as $hasil){ ?>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NAMA</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->nama_peserta?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NO PESERTA</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->no_peserta?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NIK</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->nik?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">NIDN</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->nidn?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">JENIS KELAMIN</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->jenis_kelamin?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">TEMPAT / TANGGAL LAHIR</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->ttl?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">PANGKAT</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->pangkat?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">JABATAN</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->jabatan?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">PENDIDIKAN TERAKHIR</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->ijazah?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">FAKULTAS</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->fakultas?></td>
        </tr>
        <tr>
            <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
            <td style="width: 15%"><label for="text">DEPARTEMEN</label></td>
            <td style="width: 1%"><label for="text">:</label></td>
            <td><?php echo $hasil->departemen?></td>
        </tr>
        <?php } ?>
      </table>
      <br>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> B. PENDIDIKAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO IJAZAH</th>
            <th style="width: 30%; text-align:center">SARJANA</th>
            <th style="width: 20%; text-align:center">UNIVERSITAS</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "ijazah"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->sarjana?></td>                
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <br>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> C. PENGAJARAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">KEGIATAN</th>
            <th style="width: 10%; text-align:center">SKS</th>
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "sk"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 10%; text-align:center"><?php echo $hasil->jumlah_sks?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <br>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> D. PENELITIAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">JUDUL PENELITIAN</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "penelitian"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <br>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> E. PENGABDIAN</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">JUDUL PENGABDIAN</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "pengabdian"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <br>
      <table style="width: 100%">
        <tbody>
            <tr>
                <td><label for="text"> F. PENUNJANG LAINNYA</label></td>
            </tr>
        </tbody>        
      </table>
      <table border="1" style="width: 100%">
      <thead>
        <tr>
            <th style="width: 5%; text-align:center">NO</th>
            <th style="width: 20%; text-align:center">NO SK</th>
            <th style="width: 30%; text-align:center">NAMA BERKAS</th>            
            <th style="width: 20%; text-align:center">TEMPAT</th>
            <th style="width: 15%; text-align:center">TANGGAL</th>
        </tr>
      </thead>
        <?php  
        $no = 1;
        foreach($berkas as $hasil){
            if($hasil->jenis_berkas == "sertifikat"){?>
            <tr>
                <td style="width: 5%; text-align:center"><?php echo $no++ ?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->no_berkas?></td>
                <td style="width: 30%; text-align:center"><?php echo $hasil->kegiatan?></td>
                <td style="width: 20%; text-align:center"><?php echo $hasil->tempat_berkas?></td>
                <td style="width: 15%; text-align:center"><?php echo $hasil->tanggal_berkas?></td>
            </tr>
        <?php } 
        }?>
      </table>
      <br>
      <br>
      <?php      
      $day = "%d";
      $month = "%m";
      $year = "%Y";
      $monthly = array(
        '01' => "Januari",
        '02' => "Februari",
        '03' => "Maret",
        '04' => "April",
        '05' => "Mei",
        '06' => "Juni",
        '07' => "Juli",
        '08' => "Agustus",
        '09' => "September",
        '10' => "Oktober",
        '11' => "November",
        '12' => "Desember",
      );  
      ?>
      <table align="right" style="width: 30%">
        <tr>
          <td><?php echo "Banjarmasin,  ".mdate($day)." ".$monthly[mdate($month)]." ".mdate($year) ?></td>
        </tr>
        <?php for($a = 1; $a <25; $a++){ ?>
        <tr><td></td></tr>
        <?php } ?>              
        <tr>
          <td><u><?php echo "Dr. H. Sutarto Hadi, M.Si., M.Sc." ?></u></td>
        </tr>        
        <tr>
          <td><?php echo "NIP : 19660331 199102 1 001" ?></td>
        </tr>
      </table>      
      <?php  ?>
</body>
</html>