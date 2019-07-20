<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';




if (isset($_POST['submit'])) 
{
	if (tambahsubkategori($_POST) > 0) 
	{
		echo "
		<script> 
		alert ('Data Subkategori Telah Tersimpan');
		document.location.href = 'kategori.php?halaman=kategori';
		</script>
		";
	}
	else
	{
		echo mysqli_error($conn); die;
		echo "
		<script> 
		alert ('Data Subkategori Tidak Tersimpan');
		document.location.href = 'kategori.php?halaman=kategori';
		</script>
		";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Subkategori</title>

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

	<h1 class="title_tambah">Tambah Subkategori</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<div class="form-group">
			<label>Nama Kategori</label><br>
			<select name="namakategori" class="form-control">
				<option value="">- Pilih -</option>
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM kategori");
				while ($rows = mysqli_fetch_assoc($result)) {
					echo '<option value="'.$rows['id_kategori'].'">'.$rows['namakategori'].'</option>';
				} ?>
			</select>
		</div>
		
		<div class="form-group">
			<label>Nama Subkategori</label>
			<input type="text" name="nama_subkategori" class="form-control" id="nama_subkategori">
		</div>

		<button name="submit" class="btn btn-primary btn-block">Simpan </button>
	</form>
</body>
</html>

<?php include_once('../_footer.php'); ?>