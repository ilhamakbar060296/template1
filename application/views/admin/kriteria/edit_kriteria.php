<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<center><h2> Edit Kriteria </h2></center>	
	<div class="container" style="margin-top: 80px">
		<div class="col-mid-12">
			<?php echo form_open('admin/update_kriteria');?>								
			
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
						<td><input type="text" name="KODE" value="<?php echo $get->kode ?>" class="form_control" placeholder="Masukkan Kode">
						<td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>	
						</td>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Nama Kriteria :</label></td>
						<td><input type="text" name="NAMA" value="<?php echo $get->nama_kriteria ?>" class="form_control" placeholder="Masukkan Kriteria"></td>
						<td><input type="hidden" value="<?php echo $get->no ?>" name="NO"></td>
						</div>												
					</tr>
					<tr>
					<div class="form-group">
						<td><label for="text">Tipe Kriteria :</label></td>
						<td>
						<?php if($get->Tipe=="MIN"):?>
						<input type="radio" name="TIPE" value="MIN" checked/>MIN
						<input type="radio" name="TIPE" value="MAX"/>MAX
						<?php else: ?>
						<input type="radio" name="TIPE" value="MIN"/>MIN
						<input type="radio" name="TIPE" value="MAX" checked/>MAX
						<?php endif; ?>
						</td>
						</div>					
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Bobot :</label></td>
						<td><input type="text" name="BOBOT" value="<?php echo $get->bobot ?>" class="form_control" placeholder="Masukkan Bobot nilai"></td>
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