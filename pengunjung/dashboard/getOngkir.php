<?php 

$sql = mysqli_query($conn, "SELECT * FROM kota where id_kota=$_GET[id_kota]");
$kota = mysqli_fetch_assoc($sql);

echo json_encode($kota);
 ?>