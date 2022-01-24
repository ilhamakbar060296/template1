<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<center><h2> Edit Kinerja </h2></center>	
	<div class="container" style="margin-top: 80px">
		<div class="col-mid-12">
			<?php echo form_open('admin/update_kinerja');?>								
			<?php echo $this->session->flashdata('notif') ?>
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>						
					</tr>
				</thead>
				<tbody>
					<tr>
						<div class="form-group">
						<td><label for="text">Nama kinerja :</label></td>
						<td><input type="text" name="NAMA" value="<?php echo $get->nama_kinerja ?>" class="form_control" placeholder="Masukkan Nama kinerja"></td>
						<td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
						</div>												
					</tr>
					<tr>						
						<td><button type="submit" class="btn btn-md btn-success">Simpan</button></td>
						<td><button type="reset" class="btn btn-md btn-warning"> Reset</button></td>
					</tr>
				</tbody>
			</table>
			<form>
  			<input type="button" value="Go back!" onclick="history.back()">
			</form>
			<?php echo form_close()?>
		</div>		
	</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>