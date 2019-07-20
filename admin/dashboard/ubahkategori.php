<?php include_once('../_header.php'); ?>



<?php 

require 'functions.php';
$idkategori = $_GET['id_kategori'];

$result = mysqli_query ($conn, "SELECT * FROM kategori WHERE id_kategori = $idkategori");
$rows = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) 
{
	if (ubahkategori($_POST) > 0) 
	{
		echo "
		<script> 
			alert ('Data Kategori Telah Diubah!')
			document.location.href = 'kategori.php?halaman=kategori';
		</script>
		";
	}else
	{
		
		echo mysqli_error($conn); 
		echo "
		<script> 
			alert ('Data Kategori Tidak Diubah!')
			document.location.href = 'kategori.php?halaman=kategori';
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

		<input type="hidden" name="id_kategori" value="<?php echo $rows['id_kategori']; ?>">

		<div class="form-group">
			<label>Nama Kategori</label>
			<input type="text" name="namakategori" class="form-control" id="namakategori" value="<?php echo $rows['namakategori']; ?> ">
		</div>

		<button class="btn btn-primary btn-block" name="submit">Ubah</button>
	</form>

</body>
<script type="text/javascript">
	function validate(form)
	{
		if ( document.myForm.namakategori.value== "") {
			alert("Nama Kategori Harus Diiisi");
			document.myForm.namakategori.focus();
			return false;
		}
		return ( true );
	}
</script>
</html>