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

$kdplgn = $_GET["kodepelanggan"];

if (hapuspelanggan ($kdplgn) > 0)
{
	echo "
		<script> 
				alert ('Data Pelanggan Berhasil dihapus');
				document.location.href = 'pelanggan.php?halaman=pelanggan';
		</script>
	";
}else
{
		echo "
		<script> 
				alert ('Data Pelanggan Gagal dihapus');
				document.location.href = 'pelanggan.php?halaman=pelanggan';
		</script>
	";
}

?>