<?php include_once("../_header.php"); ?>




<?php

require 'functions.php';
if (isset($_POST['submit'])) 
{
	if (tambahkategori($_POST) > 0) 
	{
		echo "
			<script>
				alert ('Data Kategori Telah Tersimpan');
				document.location.href = 'kategori.php?halaman=kategori';
			</script>
		";
	}else{
		echo "
			<script>
				alert ('Data Kategori Tidak Tersimpan');
				document.location.href = 'kategori.php?halaman=kategori';
			</script>
		";
	}

}




 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kategori</title>

	<style >
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
	<h1 class="title_tambah">Tambah Kategori</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>Nama Kategori</label>
			<input type="text" name="namakategori" class="form-control" id="namakategori">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</form>
</body>

<script type="text/javascript">
function validate(form)
{
	if (document.myForm.namakategori.value== "") {
		alert('Nama Kategori Tidak Boleh Kosong');
		document.myForm.namakategori.focus();
		return false;
	}
	return (true);

}

</script>
</html>
<?php include_once('../_footer.php'); ?>