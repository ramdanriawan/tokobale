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

$kdbank = $_GET['kode_bank'];

if (hapusbank($kdbank) > 0) 
{
	echo "
	<script> 
			alert ('Data Bank Telah Dihapus!');
			document.location.href = 'bank.php?halaman=bank';
	</script>";
}
else
{
	echo mysqli_error($conn); die;
	echo "
	<script> 
			alert ('Data Bank Gagal Dihapus!');
			document.location.href = 'bank.php?halaman=bank';
	</script>";
}



?>