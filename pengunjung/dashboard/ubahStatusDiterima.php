<?php 
include 'functions.php';

//kurangkan semua stok barang yang telah berhasil diterima oleh pengguna
foreach (select('*', "order_detail") as $order_detail) {
	decrement('produk', 'stok', $order_detail["jumlah"], "kodeproduk=$order_detail[kodeproduk]");
}

update('orders', ['status_terima' => 'Sudah Diterima'], "id_order='$_GET[id_order]'");

header("Location: $_SERVER[HTTP_REFERER]");

 ?>