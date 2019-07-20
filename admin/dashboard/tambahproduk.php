<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

if (isset($_POST['submit'])) 
{
	if (tambahproduk($_POST) > 0) 
	{
		echo "
		<script> 
			alert ('Data Produk Telah DiSimpan!');
			document.location.href = 'produk.php?halaman=produk';
		</script>
		";
	}else
	{
		echo mysqli_error($conn);
		echo "
		<script> 
			alert ('Data Produk Gagal DiSimpan!');
			document.location.href = 'produk.php?halaman=produk';
		</script>
		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Produk</title>

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

	<h1 class="title_ubah"> Tambah Kategori</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))" enctype="multipart/form-data">
		
		<div class="form-group">
			<label>Nama Subkategori</label><br>
			<select name="nama_subkategori" class="form-control" required>
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM sub_kategori");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['kd_subkategori'].'">'.$rows['nama_subkategori'].'</option>';
				} ?>
			</select>
		</div>

		<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="nama_produk" class="form-control" required>
		</div>

		<div class="form-group">
			<label>Deskripsi</label>
			<textarea class="form-control" name="deskripsi" rows="10" ></textarea>
		</div>

		<div class="form-group">
			<label>Harga Produk</label>
			<input type="number" name="harga_produk" class="form-control" id="harga_produk">
		</div>

		<div class="form-group">
			<label>Stok Produk</label>
			<input type="number" name="stok" class="form-control" id="stok">
		</div>

		<div class="form-group">
			<label>Berat (Kg)</label>
			<input type="text" name="berat" class="form-control" id="berat">
		</div>

		<div class="form-group">
			<label>Foto Depan:</label><br>
			<input type="file" name="foto1" class="form-control"  ><br>
			<label>Foto Belakang:</label><br>
			<input type="file" name="foto2" class="form-control" >
		</div>


		<div class="form-group">
			<label>Ukuran</label>
			<input type="text" name="ukuran" class="form-control" id="ukuran">
		</div>

		<div class="form-group">
			<label>Diskon (%)</label>
			<input type="text" name="diskon" class="form-control" id="diskon">
		</div>

		<div class="form-group">
			<label>Tanggal Masuk</label>
			<input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan</button>

	</form>

</body>

<?php include_once('../_footer.php'); ?>
