<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('kodepelanggan', '', time() - 1);
setcookie('key', '', time() - 1);
setcookie('id', '', time() - 1);
setcookie('namapelanggan', '', time() - 1);

header("Location: login.php");
exit;


?>