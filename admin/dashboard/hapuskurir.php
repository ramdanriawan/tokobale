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

$kuririd = $_GET['kurir_id'];

if (hapuskurir($kuririd) > 0) 
{
	echo "
	<script> 
			alert ('Data Kurir Telah Dihapus!');
			document.location.href = 'kurir.php?halaman=kurir';
	</script>";
}
else
{
	echo mysqli_error($conn); die;
	echo "
	<script> 
			alert ('Data Kurir Gagal Dihapus!');
			document.location.href = 'kurir.php?halaman=kurir';
	</script>";
}



?>