<?php 
include 'functions.php';

update('orders', ['status_terima' => 'Sudah Diterima'], "id_order='$_GET[id_order]'");
header("Location: $_SERVER[HTTP_REFERER]");

 ?>