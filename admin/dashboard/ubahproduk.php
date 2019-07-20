<?php include_once('../_header.php'); ?>

<?php

require 'functions.php';

$kdproduk = $_GET['kodeproduk'];

//ambil query berdasarkan id produk
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk = $kdproduk");
$rows = mysqli_fetch_assoc($result);

//cek apakah tombol submit udah ditekan atau belum
if (isset($_POST["submit"]) ) 
{
 	//cek apakah data berhasi diubah
	if (ubahproduk($_POST) > 0) 
	{
		echo "
		<script>
		alert('Data Produk Berhasil diubah!');
		document.location.href = 'produk.php?halaman=produk ';
		</script>
		";

	}
	else
	{

		echo mysqli_error($conn);
		echo "
		<script>
		alert('Data Produk Tidak diubah!');
		document.location.href = 'produk.php?halaman=produk';
		</script>
		";
	}

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Produk</title>

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

	<h1 class="title_ubah">Ubah Produk</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))" enctype="multipart/form-data">

		<input type="hidden" name="kodeproduk" value="<?php echo $rows['kodeproduk']; ?>">
		<input type="hidden" name="kd_subkategori" value="<?php echo $rows['kd_subkategori']; ?>">
		<input type="hidden" name="fotolama1" value="<?php echo $rows['foto1']; ?>" >
		<input type="hidden" name="fotolama2" value="<?php echo $rows['foto2']; ?>" >
		
	<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="nama_produk" class="form-control" id="nama_produk" required value="<?php echo $rows['nama_produk']; ?>">
	</div>

	<div class="form-group">
			<label>Deskripsi</label>
			<textarea class="form-control" name="deskripsi" rows="10" ><?php echo $rows['deskripsi']; ?>
		</textarea>
	</div>

	<div class="form-group">
		<label>Harga Produk</label>
		<input type="number" name="harga_produk" class="form-control" id="harga_produk" value="<?php echo $rows['harga_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control" id="stok" value="<?php echo $rows['stok']; ?>">
	</div>

	<div class="form-group">
		<label>Berat</label>
		<input type="text" name="berat" class="form-control" id="berat" value="<?php echo $rows['berat']; ?>">
	</div>

	<div class="form-group">
		<label>Foto</label> <br><br>
		<img src="../../images/<?php echo $rows['foto1']; ?>" width="100">
		<img src="../../images/<?php echo $rows['foto2']; ?>" width="100"><br><br>
		<label>Foto Depan:</label><br>
		<input type="file" name="foto1" id="foto[]" class="form-control"  >
		<label>Foto Belakang:</label><br>
		<input type="file" name="foto2" id="foto[]" class="form-control" >
	</div>


	<div class="form-group">
		<label>Ukuran</label>
		<input type="text" name="ukuran" class="form-control" id="ukuran" value="<?php echo $rows['ukuran']; ?>">
	</div>

	<div class="form-group">
		<label>Diskon</label>
		<input type="number" name="diskon" class="form-control" id="diskon" value="<?php echo $rows['diskon']; ?>">
	</div>

	<div class="form-group">
		<label>Tanggal Masuk</label>
		<input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" value="<?php echo $rows['tgl_masuk']; ?>">
	</div>

	<button class="btn btn-primary btn-block" name="submit"> Ubah </button>

</form>
</body>
</html>