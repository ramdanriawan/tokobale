<?php include_once('../_header.php'); ?>



<?php 

require 'functions.php';
$kdbank = $_GET['kode_bank'];
$result = mysqli_query($conn, "SELECT * FROM bank WHERE kode_bank = $kdbank");
$rows = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) 
{
	if (ubahbank($_POST) > 0) 
	{
		echo "
		<script> 
			alert ('Data Bank Telah Diubah!')
			document.location.href = 'bank.php?halaman=bank';
		</script>
		";
	}else
	{
		echo mysqli_error($conn); 
		echo "
		<script> 
			alert ('Data Bank Tidak Diubah!')
			document.location.href = 'bank.php?halaman=bank';
		</script>
		";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Kategori</title>
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

		<input type="hidden" name="kode_bank" value="<?php echo $rows['kode_bank']; ?>">

		<div class="form-group">
			<label>No Rekening</label>
			<input type="text" name="norek" class="form-control" id="norek" value="<?php echo $rows['norek']; ?>">
		</div>

		<div class="form-group">
			<label>Nama Bank</label>
			<input type="text" name="namabank" class="form-control" id="namabank"  value="<?php echo $rows['namabank']; ?>">
		</div>

		<div class="form-group">
			<label>Atas Nama</label>
			<input type="text" name="atasnama" class="form-control" id="atasnama" value="<?php echo $rows['atasnama']; ?>">
		</div>

		<button class="btn btn-primary btn-block" name="submit">Ubah</button>
	</form>

</body>
<script type="text/javascript">
function validate(form) 
{
	if (document.myForm.norek.value== "") {
		alert ('No Rekening tidak boleh kosong');
		document.myForm.norek.focus();
		return false;
	}
	if (document.myForm.namabank.value== "") {
		alert ('Nama Bank tidak boleh kosong');
		document.myForm.namabank.focus();
		return false;
	}
	if (document.myForm.atasnama.value== "") {
		alert ('Atas Nama tidak boleh kosong');
		document.myForm.atasnama.focus();
		return false;	
	}
	norek= /^[0-9_.+-]+$/;
	if (!norek.test(form.norek.value)){
		alert ('No Rekening hanya boleh Angka !');
		form.norek.focus();
		return false;
	}
	return ( true );
}

</script>
</html>

<?php include_once('../_footer.php'); ?>