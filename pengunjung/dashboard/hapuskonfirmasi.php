<?php 

require 'functions.php';

$idorder = $_GET["id_order"];

if (hapuskonfirmasi($idorder) > 0) 
{
	echo "
		<script> 
			alert ('Konfirmasi Telah DiHapus');
			document.location.href='pembelian.php?halaman=pembelian';
		</script>
	";
}
else
{
	echo mysqli_error($conn); die();
	echo "
		<script> 
			alert ('Konfirmasi Gagal DiHapus');
			document.location.href='pembelian.php?halaman=pembelian';
		</script>
	";
}


?>