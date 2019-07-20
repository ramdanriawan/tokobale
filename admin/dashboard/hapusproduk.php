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

$kdproduk = $_GET["kodeproduk"];

if (hapusproduk($kdproduk) > 0) 
{
	

	echo "
		<script>
			alert ('Data Produk Telah Terhapus');
			document.location.href ='produk.php?halaman= produk';
		</script>
	";
}
else
{
	echo mysqli_error($conn);
	echo "
		<script>
			alert ('Data Produk Tidak Terhapus');
			document.location.href ='produk.php?halaman= produk';
		</script>
	";
}





 ?>