<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
	<center><h2> Masukkan Nilai Peserta </h2></center>	
	<div class="container" style="margin-top: 80px">
		<div class="col-mid-12">
			<?php echo form_open('admin/simpan_nilai');?>								
			<?php echo $this->session->flashdata('notif')?>
			<table id="table" class="table table-striped table-bordered table-hover">
				<thead>
					<script type="text/javascript"> 				
					</script>					
				</thead>
				<tbody>
					<tr>
						<div class="form-group">
						<td><label for="text">Nama Peserta :</label></td>
						<div class="controls">
						<td><select name="NO_PESERTA" class='form-control' id='no_peserta' onchange="return autofill();">
						<option value='0'>--pilih--</option>
						<?php
						foreach ($peserta as $hasil) {
							if($hasil->status_berkas == "valid"){
								echo "<option value='$hasil->no_peserta'>$hasil->nama_peserta</option>";
							}							
						}							
						?>
						</select></td>
						</div>
						</div>												
					</tr>	
						<?php
						$no = 1; 						
						foreach ($kriteria as $nama){
							if($nama->nama_kriteria == "Nilai Akhir"){ ?>
							<tr>
								<div class="form-group">
								<td><label for="text"><?php echo $nama->nama_kriteria?> :</label></td>
								<div class="controls">
								<td><select name="<?php echo $no ?>" class='form-control' id='c1'>
								<option value='0'>--pilih--</option>
								<?php 
								foreach ($kode as $hasil) {
									if($hasil->nama_kriteria == $nama->nama_kriteria){
									echo "<option value='$hasil->no'>$hasil->nama_crips </option>";
									}							
								}?>
							</select>
							</td>
							</div>
							</div>
							</tr>
							<?php } else{ ?>
						<tr>
							<div class="form-group">
							<td><label for="text"><?php echo $nama->nama_kriteria?> :</label></td>
							<td><input type="text" name="<?php echo $no ?>" value ="" class='form-control' id='<?php echo $no ?>' disabled							
						</tr>
						<?php $no++;} 
						}?>
					<tr>
						<td><button type="submit" class="btn btn-md btn-success">Simpan</button></td>
						<td><button type="reset" class="btn btn-md btn-warning"> Reset</button></td>
					</tr>
				</tbody>
			</table>
			<?php echo form_close()?>
		</div>		
	</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>    <!-- Load library/plugin jquery nya -->
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
<!--<script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
        $("#no_peserta").change(function(){ // Ketika user mengganti atau memilih data FAKULTAS
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("/admin/list_jurusan"); ?>", // Isi dengan url/path file php yang dituju
                data: {nama : $("#no_peserta").val()}, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ // Ketika proses pengiriman berhasil
                     // set isi dari combobox kota
                     // lalu munculkan kembali combobox kotanya
                     //$("#jurusan").html(response.list_jurusan).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>-->
<script>
    function autofill(){
        var no =document.getElementById('no_peserta').value;
        $.ajax({
                       url:"<?php echo base_url("/admin/kriteria_value");?>",
                       data:'&no='+no,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){				
            	document.getElementById('1').value=hasil.PT;
                document.getElementById('2').value=hasil.Prestasi;
				document.getElementById('3').value=hasil.Score;
                });
				
            }
                   });
                   
    }
</script>
</body>
</html>
