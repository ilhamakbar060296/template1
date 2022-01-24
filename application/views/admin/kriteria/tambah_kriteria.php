<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<center><h2> Tambah Kriteria </h2></center>	
	<div class="container" style="margin-top: 80px">
		<div class="col-mid-12">
			<?php echo form_open('admin/simpan_kriteria');?>								
			
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
						<td><label for="text">Kode Kriteria :</label></td>
						<td><input type="text" name="KODE" class="form_control" placeholder="Masukkan Kode">
						</td>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Nama Kriteria :</label></td>
						<td><input type="text" name="NAMA" class="form_control" placeholder="Masukkan Kriteria"></td>
						</div>												
					</tr>
					<tr>
					<div class="form-group">
						<td><label for="text">Tipe Kriteria :</label></td>
						<td>
						<input type="radio" name="TIPE" value="MIN"/>MIN
						<input type="radio" name="TIPE" value="MAX"/>MAX
						</td>
						</div>					
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Bobot :</label></td>
						<td><input type="text" name="BOBOT" class="form_control" placeholder="Masukkan Bobot nilai"></td>
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
