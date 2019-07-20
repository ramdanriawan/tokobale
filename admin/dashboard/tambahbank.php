<?php include_once('../_header.php'); ?>


<?php

require 'functions.php'; 

if (isset($_POST['submit'])) 
{
	if (tambahbank($_POST) > 0) 
	{
		echo "
			<script> 
				alert ('Data Bank Telah Tersimpan');
				document.location.href = 'bank.php?halaman=bank';
			</script>
		";
	}else
	{
		echo mysqli_error($conn); 
		echo "
			<script> 
				alert ('Data Bank Tidak Tersimpan');
				document.location.href = 'bank.php?halaman=bank';
			</script>
		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Bank</title>
	
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
	<h1 class="title_tambah">Tambah Bank</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>No Rekening</label>
			<input type="text" name="norek" class="form-control" id="norek" required>
		</div>
		
		<div class="form-group">
			<label>Nama Bank</label>
			<input type="text" name="namabank" class="form-control" id="namabank">
		</div>

		<div class="form-group">
			<label>Atas Nama</label>
			<input type="text" name="atasnama" class="form-control" id="atasnama">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</form>

</body>

<script type="text/javascript">
function validate(form)
{
	if (document.myForm.norek.value=="") {
		alert ('No Rekening Tidak Boleh Kosong');
		document.myForm.norek.focus();
		return false;
	}
	if (document.myForm.namabank.value=="") {
		alert ('Nama Bank Tidak Boleh Kosong');
		document.myForm.namabank.focus();
		return false;
	}
	if (document.myForm.atasnama.value=="") {
		alert ('Atas Nama Tidak Boleh Kosong');
		document.myForm.atasnama,focus();
		return false
	}
	norek= /^[0-9_.+-]+$/;
	if (!norek.test(form.norek.value)){
		alert ('No Rekening hanya boleh Angka !');
		form.norek.focus();
		return false;
	}
	return (true);
}

</script>
</html>

<?php include_once('../_footer.php'); ?>