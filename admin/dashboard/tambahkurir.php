<?php include_once('../_header.php'); ?>


<?php

require 'functions.php';


//cek apakah tombol submit udah ditekan atau belum
if (isset($_POST['submit'])) 
{
	//cek apakah data kota udah diubah atau belum
	if (tambahkurir($_POST) > 0) 
	{
		echo "
		<script> 
		alert ('Data Kurir Telah DiSimpan!');
		document.location.href = 'kurir.php?halaman=kurir';
		</script>
		";
	}else
	{
		echo mysqli_error($conn);
		echo "
		<script> 
		alert ('Data Kurir Tidak DiSimpan!');
		document.location.href = 'kurir.php?halaman=kurir';
		</script>
		";
	}

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kurir</title>

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

	<h1 class="title_ubah"> Tambah Kurir</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<input type="hidden" name="kurir_id" value="<?php echo $rows['kurir_id']; ?>">
		<div class="form-group">
			<label>Kurir</label>
			<input type="text" name="kurir" class="form-control" id="kurir" required>
		</div>

		<button name="submit" class="btn btn-primary btn-block">Ubah</button>
	</form>
</body>
</html>

<?php include_once('../_footer.php'); ?>