<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

$kdsubkategori = $_GET["kd_subkategori"];
$result = mysqli_query($conn, "SELECT * FROM sub_kategori WHERE kd_subkategori = $kdsubkategori");
$rows = mysqli_fetch_assoc($result);


if (isset($_POST["submit"])) 
{
	if (ubahsubkategori($_POST) > 0) 
	{
		echo "
			<script> 
				alert('Data Subkategori Telah Diubah!');
				document.location.href= 'kategori.php?halaman=kategori';
			</script>

		";
	}
	else
	{
		echo mysqli_error($conn); die;
		echo "
			<script> 
				alert('Data Subkategori Gagal Diubah!');
				document.location.href= 'kategori.php?halaman=kategori';
			</script>

		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Subkategori</title>

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

		<input type="hidden" name="kd_subkategori" value="<?php echo $rows['kd_subkategori']; ?>">
		<input type="hidden" name="id_kategori" value="<?php echo $rows['id_kategori']; ?>">
		
		<div class="form-group">
			<label>Nama Subkategori</label>
			<input type="text" name="nama_subkategori" class="form-control" id="nama_subkategori" value="<?php echo $rows['nama_subkategori']; ?>" required>
		</div>

		<button name="submit" class="btn btn-primary btn-block">Ubah</button>


	</form>
</body>
</html>