<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<center><h2> Kartu Peserta </h2></center>	
	<div class="container" style="margin-top: 80px">
		<div class="col-mid-12">
		<?php echo form_open('peserta/print_kartu');?>								
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
				</thead>
				<tbody>					
					<tr>
						<div class="form-group">
						<td><label for="text">No Peserta</label></td>
						<?php foreach($profile as $hasil){?>
						<td><input type="text" name="NO_PESERTA" value="<?php echo $hasil->no_peserta ?>" class="form_control" placeholder="Masukkan No Peserta"></td>
						<input type="hidden" value="<?php echo $hasil->no ?>" name="NO">
						<?php } ?>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Nama</label></td>
						<?php foreach($profile as $hasil){?>
						<td><input type="text" name="NAMA" value="<?php echo $hasil->nama_peserta ?>" class="form_control" placeholder="Masukkan nama"></td>
						<input type="hidden" value="<?php echo $hasil->no ?>" name="NO">
						<?php } ?>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Jenis Kelamin</label></td>
						<?php foreach($profile as $hasil){?>
						<td><input type="text" name="KELAMIN" value="<?php echo $hasil->jenis_kelamin ?>" class="form_control" placeholder="Masukkan Jenis Kelamin Anda"></td>
						<input type="hidden" value="<?php echo $hasil->no ?>" name="NO">
						<?php } ?>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Tempat, Tanggal Lahir</label></td>
						<?php foreach($profile as $hasil){?>
						<td><input type="text" name="TTL" value="<?php echo $hasil->tempat_lahir.", ".$hasil->tanggal_lahir ?>" class="form_control" placeholder="Masukkan Jenis Kelamin Anda"></td>
						<input type="hidden" value="<?php echo $hasil->no ?>" name="NO">
						<?php } ?>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Universitas</label></td>
						<td><input type="text" name="UNI" value="Lambung Mangkurat" class="form_control" placeholder="Masukkan Universitas Anda"></td>
						</div>												
					</tr>
					<tr>
						<div class="form-group">
						<td><label for="text">Fakultas</label></td>
						<td><input type="text" name="FAKUL" value="Ekonomi" class="form_control" placeholder="Masukkan Fakultas Anda"></td>						
						</div>												
					</tr>					
					<tr>						
						<td><button type="submit" class="btn btn-md btn-success">Print</button></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<?php echo form_close()?>
		</div>		
	</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>    <!-- Load library/plugin jquery nya -->
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
<script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();
        $("#fakultas").change(function(){ // Ketika user mengganti atau memilih data FAKULTAS
            $("#jurusan").hide(); // Sembunyikan dulu combobox jurusan nya
            $("#loading").show(); // Tampilkan loadingnya
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("/peserta/list_jurusan"); ?>", // Isi dengan url/path file php yang dituju
                data: {id_fakul : $("#fakultas").val()}, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya
                     // set isi dari combobox kota
                     // lalu munculkan kembali combobox kotanya
                     $("#jurusan").html(response.list_jurusan).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>

</body>
</html>
