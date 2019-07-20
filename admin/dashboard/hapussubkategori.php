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

$kdsubkategori = $_GET["kd_subkategori"];


if (hapussubkategori($kdsubkategori) > 0) 
{
	echo "
		<script> 
			alert ('Data Subkategori Telah Dihapus!');
			document.location.href = 'kategori.php?halaman=kategori';
		</script>

	";
}else
{
	echo mysqli_error($conn); die;;
	echo "
		<script> 
			alert ('Data Subkategori Gagal Dihapus!');
			document.location.href = 'kategori.php?halaman=kategori';
		</script>

	";
}




?>