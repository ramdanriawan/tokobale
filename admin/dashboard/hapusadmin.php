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

$idadm = $_GET["id_admin"];

if (hapusadmin ($idadm) > 0) 
{
	echo "
		<script> 
			alert ('Data Admin Berhasil Di hapus');
			document.location.href = 'admin.php?halaman=admin';
		</script>
	";
}else
{
	echo mysqli_error($conn); die;
	echo "
		<script> 
			alert ('Data Admin Gagal Di hapus');
			document.location.href = 'admin.php?halaman=admin';
		</script>
	";
}


?>