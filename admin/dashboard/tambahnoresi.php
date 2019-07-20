<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

$idorder = $_GET['id_order'];

if (isset($_POST['submit'])) 
{
	$idorder =$_GET["id_order"];
    $resi = $_POST["resi"];

	$query = "INSERT INTO resi VALUES ('','$idorder','$resi')";

	mysqli_query($conn, $query);


	mysqli_query($conn, "UPDATE orders SET resi= '$resi'
		WHERE id_order=$idorder");

	if (mysqli_affected_rows($conn) > 0) 
	{
		echo "
			<script> 
				alert ('No Resi Telah Tersimpan');
				document.location.href = 'orders.php?halaman=orders';
			</script>
		";
	}else
	{
		echo mysqli_error($conn); die;
		echo "
			<script> 
				alert ('No Resi Tidak Tersimpan');
				document.location.href = 'orders.php?halaman=orders';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah No Resi</title>

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

	<h1 class="title_ubah">Tambah No Resi</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

	<input type="hidden" name="resi_id">
	<input type="hidden" name="id_order">

	<div class="form-group">
			<label>No Resi</label>
			<input type="text" name="resi" class="form-control" id="resi">
	</div>
		
	<button name="submit" class="btn btn-primary btn-block">Simpan</button>
	</form>

</body>
</html>

<?php include_once('../_footer.php'); ?>