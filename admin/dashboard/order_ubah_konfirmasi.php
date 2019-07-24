<?php 
require "functions.php";


echo $_GET['id_order'];

//update
update('orders', ['status_konfirmasi' => 'Disetujui', 'status_order' => 'Sudah Dibayar'], "id_order='$_GET[id_order]'");

//arahkan balik ke halaman konfirmasi
header("Location: ./konfirmasipembayaran.php?halaman=konfirmasipembayaran");

 ?>