<?php 
require "functions.php";


echo $_GET['id_order'];

//update
mysqli_query($conn, "UPDATE orders SET 
	status_konfirmasi='Disetujui'
	WHERE id_order= $_GET[id_order]");

//arahkan balik ke halaman konfirmasi
header("Location: ./konfirmasipembayaran.php?halaman=konfirmasipembayaran");

 ?>