<?php include 'cekLogin.php'; ?>
<?php include_once('../_headerpelanggan.php'); ?>

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

?>


<?php include_once('../_footer.php'); ?>