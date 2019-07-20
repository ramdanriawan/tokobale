<?php 

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

 if (!isset($_SESSION["login"]) )
 {
     header("Location: login.php" );
     exit;
 }

require 'functions.php';

$idorder = $_GET["id_order"];

if (hapusorder($idorder) > 0) 
{
	echo "
		<script> 
			alert ('Data Order Telah DiHapus');
			document.location.href='orders.php?halaman=orders';
		</script>
	";
}
else
{
	echo mysqli_error($conn); 
	echo "
		<script> 
			alert ('Data Order Gagal DiHapus');
			document.location.href='orders.php?halaman=orders';
		</script>
	";
}


?>