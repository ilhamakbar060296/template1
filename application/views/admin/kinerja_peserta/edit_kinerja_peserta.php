<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <center><h2> Edit Penilaian Kinerja </h2></center>
  <hr>
  <div class="container" style="margin-top: 80px">
    <?php echo $this->session->flashdata('notif') ?> 
    <?php echo form_open('admin/update_kinerja_peserta');?>   
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered table-hover">
        <tbody>        
        <tr>
			<div class="form-group">
            <td><label for="text">Nama</label></td>
            <td><label for="text"><?php echo $peserta ?></label></td>
            <td><input type="hidden" value="<?php echo $no_peserta ?>" name="NO"></td>
			</div>												
		</tr>
            <?php
			$no = 1; 						
				foreach ($kinerja as $hasil2){?>
				<tr>
				    <div class="form-group">
				        <td><label for="text"><?php echo $kinerja[$no] ?></label></td>
						<td><input type="text" name="<?php echo $no ?>" value="<?php echo $score[$no]?>" class="form_control" placeholder="Masukkan nilai 0-100">
                        <td><input type="hidden" value="<?php echo $kinerja[$no] ?>" name="<?php echo 'K'.$no ?>"></td>
						</td>
					</div>												
				</tr>
			<?php $no++;} ?>
        </tbody>        
      </table>
      <tr>
      <td><button type="submit" class="btn btn-md btn-success">Ubah</button></td>
      <td><button type="reset" class="btn btn-md btn-warning"> Reset</button></td>						
    </tr>
    <form>
  		<input type="button" value="Go back!" onclick="history.back()">
	</form>
	<?php echo form_close()?>
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