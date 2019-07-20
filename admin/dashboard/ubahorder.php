<?php include_once('../_header.php'); ?>


<?php

require 'functions.php';

$idorder = $_GET['id_order'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE id_order = $idorder");
$rows = mysqli_fetch_assoc($result);

//cek apakah tombol submit udah ditekan atau belum
if (isset($_POST['submit'])) 
{
	//cek apakah data kota udah diubah atau belum
	if (ubahorder($_POST) > 0) 
	{
		echo "
		<script> 
		alert ('Data Order Telah Diubah!');
		document.location.href = 'orders.php?halaman=orders';
		</script>
		";
	}else
	{
		echo mysqli_error($conn);
		echo "
		<script> 
		alert ('Data Orders Tidak Diubah!');
		document.location.href = 'orders.php?halaman=orders';
		</script>
		";
	}

}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Ubah Order</title>

	<style >
	.title_ubah{
		margin: 2px;
		padding: 5px;
		border: 1px solid black;
		background-color: grey;
		text-align: center;	
		border-radius: 3px;
	}
</style>
</head>
<body>

	<h1 class="title_ubah"> Ubah Order</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<input type="hidden" name="id_order" value="<?php echo $rows['id_order']; ?>">
		<input type="hidden" name="kodepelanggan" value="<?php echo $rows['kodepelanggan']; ?>">
		<input type="hidden" name="tgl_order" value="<?php echo $rows['tgl_order']; ?>">
		<input type="hidden" name="alamat_pengirim" value="<?php echo $rows['alamat_pengirim']; ?>">
		<input type="hidden" name="id_kota" value="<?php echo $rows['id_kota']; ?>">
		<input type="hidden" name="kurir" value="<?php echo $rows['kurir']; ?>">

		<div class="form-group">
			<label>Status Order</label><br>
			<select class="form-control" name="status_order" value="<?php echo $rows['status_order']; ?>">
				<option value="Belum Dibayar">Belum Dibayar</option>
				<option value="Sudah Dibayar">Sudah Dibayar</option>
			</select>
		</div>

		<div class="form-group">
			<label>Status Konfirmasi</label><br>
			<select class="form-control" name="status_konfirmasi" value="<?php echo $rows['status_konfirmasi']; ?>">
				<option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
				<option value="Menunggu Persetujuan">Ditolak</option>
				<option value="Disetujui">Disetujui</option>
			</select>
		</div>

		<div class="form-group">
			<label>Status Terima</label><br>
			<select class="form-control" name="status_terima" value="<?php echo $rows['status_terima']; ?>">
				<option value="Belum DiTerima">Belum Diterima</option>
				<option value="DiTerima">DiTerima</option>
			</select>
		</div>

		<div class="form-group">
			<label>Resi</label>
			<input type="text" name="resi" class="form-control" id="resi" value="<?php echo $rows['resi']; ?>">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Ubah</button>
	</form>
</body>

<?php include_once('../_footer.php'); ?>