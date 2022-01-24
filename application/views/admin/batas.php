<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Set Batas Kelulusan</h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?>
    <?php echo form_open('admin/simpan_batas');?>    
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered table-hover">        
            <tr>
                <td><label for="text"> UNIVERSITAS</label> </td>
                <td><label for="text"> : LAMBUNG MANGKURAT</label> </td>
            </tr>
            <tr>
                <td><label for="text"> FAKULTAS</label> </td>
                <td><label for="text"> : EKONOMI</label> </td>
            </tr>            
            <tr>
                <td><label for="text"> JUMLAH PESERTA MENDAFTAR</label> </td>
                <td><label for="text"> : <?php echo $max_peserta ?></label> </td>
                <td><input type="hidden" value="<?php echo $max_peserta ?>" name="JLH"></td>
            </tr>
            <tr>
                <td><label for="text"> JUMLAH DOSEN YANG DIBUTUHKAN</label> </td>                
                <td><input type="text" name="MAX" class="form_control" placeholder="Masukkan Batas Dosen"></td>
            </tr>
                        
        </table>                        
        <tr>
            <td><button type="submit" class="btn btn-md btn-success">Simpan</button></td>
			<td><button type="reset" class="btn btn-md btn-warning"> Reset</button></td>
            <td><a href="<?php echo base_url().'admin/riwayat/'?>" class="btn btn-md btn-success"> riwayat </a></td>
        </tr>
    </div>    
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- script diatas akan menampilkan jumlah entries yang ditampilkan, fungsi search, pengurutan tabel, dan halaman-->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $('#table').DataTable( {
      autoFill: true
  } );
  </script>
</body>
</html>