<?php include_once('../_header.php'); ?>




<?php 

require 'functions.php';

if (isset($_POST['submit'])) 
{
	if (tambahkota($_POST) > 0) 
	{
		echo "
		<script> 
			alert ('Data Kota Telah DiSimpan!');
			document.location.href = 'kota.php?halaman=kota';
		</script>
		";
	}else
	{
		echo mysqli_error($conn); 
		echo "
		<script> 
			alert ('Data Kota Gagal DiSimpan!');
			document.location.href = 'kota.php?halaman=kota';
		</script>
		";
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kota</title>

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

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		
		<div class="form-group">
			<label>Nama Kota</label>
			<input type="text" name="nama_kota" class="form-control" id="nama_kota" required>
		</div>

		<div class="form-group">
			<label>Ongkir</label>
			<input type="text" name="ongkir" class="form-control" id="ongkir">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</div>
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