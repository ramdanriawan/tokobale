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

$idkota = $_GET["id_kota"];

if (hapuskota($idkota) > 0) 
{
	echo "
		<script> 
			alert ('Data Kota Telah DiHapus');
			document.location.href='kota.php?halaman=kota';
		</script>
	";
}
else
{
	echo mysqli_error($conn); 
	echo "
		<script> 
			alert ('Data Kota Gagal DiHapus');
			document.location.href='kota.php?halaman=kota';
		</script>
	";
}


?>