<?php include_once('../_header.php'); ?>


<?php

require 'functions.php';

$idkota = $_GET['id_kota'];

$result = mysqli_query($conn, "SELECT * FROM kota WHERE id_kota = $idkota");
$rows = mysqli_fetch_assoc($result);

//cek apakah tombol submit udah ditekan atau belum
if (isset($_POST['submit'])) 
{
	//cek apakah data kota udah diubah atau belum
	if (ubahkota($_POST) > 0) 
	{
		echo "
		<script> 
		alert ('Data Kota Telah Diubah!');
		document.location.href = 'kota.php?halaman=kota';
		</script>
		";
	}else
	{
		echo mysqli_error($conn);
		echo "
		<script> 
		alert ('Data Kota Tidak Diubah!');
		document.location.href = 'kota.php?halaman=kota';
		</script>
		";
	}

}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Ubah Kota</title>

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

	<h1 class="title_ubah"> Ubah Kategori</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<input type="hidden" name="id_kota" value="<?php echo $rows['id_kota']; ?>">
		<div class="form-group">
			<label>Nama Kota</label>
			<input type="text" name="nama_kota" class="form-control" id="nama_kota" value="<?php echo $rows['nama_kota']; ?>" required>
		</div>

		<div class="form-group">
			<label>Ongkir</label>
			<input type="text" name="ongkir" class="form-control" id="ongkir" value="<?php echo $rows['ongkir']; ?>">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Ubah</button>
	</form>
</body>
<script type="text/javascript">
	
	function validate(form)
	{
		if(document.myForm.nama_kota.value == "")
		{
			alert('Nama Kota Tidak Boleh Kosong');
			document.myForm.nama_kota.focus();
			return false;
		}
		if(document.myForm.ongkir.value == "")
		{
			alert('Ongkir Tidak Boleh Kosong');
			document.myForm.ongkir.focus();
			return false;
		}
		ongkir= /^[0-9.]+$/;
		if (!ongkir.test(form.ongkir.value)){
			alert ('Ongkir hanya boleh Angka !');
			form.ongkir.focus();
			return false;
		}
		return (true);
	}

</script>
</html>

<?php include_once('../_footer.php'); ?>