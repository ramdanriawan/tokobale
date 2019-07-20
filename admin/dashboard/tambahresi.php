<?php include_once('../_header.php'); ?>


<?php

require 'functions.php'; 

if (isset($_POST['submit'])) 
{
	if (tambahresi($_POST) > 0) 
	{
		echo "
			<script> 
				alert ('Data Resi Telah Tersimpan');
				document.location.href = 'resi.php?halaman=resi';
			</script>
		";
	}else
	{
		echo mysqli_error($conn); die;
		echo "
			<script> 
				alert ('Data Resi Tidak Tersimpan');
				document.location.href = 'resi.php?halaman=resi';
			</script>
		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Resi</title>
	
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
	<h1 class="title_tambah">Tambah Resi</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>Order ID</label><br>
			<select name="nama_subkategori" class="form-control">
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM orders");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['id_order'].'">'.$rows['id_order'].'</option>';
				} ?>
			</select>
		</div>

		<div class="form-group">
			<label>Resi</label>
			<input type="text" name="resi" class="form-control">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</form>

</body>
</html>

<?php include_once('../_footer.php'); ?>