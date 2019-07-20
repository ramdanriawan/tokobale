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

$idkategori = $_GET["id_kategori"];

if (hapuskategori($idkategori) > 0)
{
	echo "
		<script>
			alert ('Data Kategori Telah DiHapus!');
			document.location.href = 'kategori.php?halaman=kategori';
		</script>
	";
}
else
{
	echo mysqli_error($conn); die;
	echo "
		<script>
			alert ('Data Kategori Gagal DiHapus!');
			document.location.href = 'kategori.php?halaman=kategori';
		</script>
	";
}

?>