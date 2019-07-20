<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

if (isset($_POST["submit"])) 
{
	
	if (tambahorder($_POST) > 0) 
	{
		echo "
 		<script>
 				alert('Data Order Telah disimpan!');
 				document.location.href = 'orders.php?halaman=orders';
 		</script>
 	";

 	}
 	else
	{

		echo mysqli_error($conn);  die;
	echo "
 		<script>
 				alert('Data Order Tidak tersimpan!');
 				document.location.href = 'orders.php?halaman=orders';
 		</script>
 	";
 	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Tambah Order</title>

	<style>
	.title_tambah{
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

	<h1 class="title_tambah">Tambah Order</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>Nama Pelanggan</label><br>
			<select name="namapelanggan" class="form-control">
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM pelanggan");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['kodepelanggan'].'">'.$rows['namapelanggan'].'</option>';
				} ?>
			</select>
		</div>
		
		<div class="form-group">
			<label>Tanggal Order</label>
			<input type="date" name="tgl_order" class="form-control" id="namabank">
		</div>

		<div class="form-group">
			<label>Alamat Pengiriman</label>
			<textarea class="form-control" name="alamat_pengirim" rows="10" ></textarea>
		</div>

		<div class="form-group">
			<label>Kota</label><br>
			<select name="nama_kota" class="form-control">
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM kota");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['id_kota'].'">'.$rows['nama_kota'].'</option>';
				} ?>
			</select>
		</div>

		<div class="form-group">
			<label>Status Order</label><br>
			<select class="form-control" name="status_order">
				<option value="Belum Dibayar">Belum Dibayar</option>
				<option value="Sudah Dibayar">Sudah Dibayar</option>
			</select>
		</div>

		<div class="form-group">
			<label>Status Konfirmasi</label><br>
			<select class="form-control" name="status_konfirmasi">
				<option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
				<option value="Menunggu Persetujuan">Ditolak</option>
				<option value="Disetujui">Disetujui</option>
			</select>
		</div>

		<div class="form-group">
			<label>Status Terima</label><br>
			<select class="form-control" name="status_terima">
				<option value="Diterima">Belum Diterima</option>
				<option value="Dikirim">DiTerima</option>
			</select>
		</div>

		<div class="form-group">
			<label>Kurir</label><br>
			<select name="kurir" class="form-control">
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM kurirs");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['kurir_id'].'">'.$rows['kurir'].'</option>';
				} ?>
			</select>
		</div>

		<div class="form-group">
			<label>Resi</label>
			<input type="text" name="resi" class="form-control" id="resi">
		</div>
		<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</form>

</body>
</html>
<?php include_once('../_footer.php'); ?>