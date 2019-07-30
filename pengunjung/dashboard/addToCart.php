

<?php 
if(!isset($_COOKIE['namapelanggan']))
{
	setcookie('konfirmasiLogin', '0', time() + 5000);

	echo "<script> window.location = '$_SERVER[HTTP_REFERER]'; </script>";
}

require 'functions.php';

// ini digunakan jika sewaktu kita membeli produknya(shopping chart)

$kodeproduk = $_POST['kodeproduk'];
$tggl_order = date('Y-m-d');
$jumlah = $_POST['jumlah'];
$size = $_POST['size'];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk=$kodeproduk");
$ambil = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, "SELECT * FROM orders_temp WHERE kodeproduk=$kodeproduk AND kodepelanggan=$_COOKIE[id] AND size='$size'");
$ambil2 = mysqli_fetch_assoc($result2);

if (count($ambil2) > 0)
{
	mysqli_query($conn, "UPDATE orders_temp SET
		kodeproduk = $kodeproduk,
		jumlah = '$jumlah',
		tgl_order = '$tggl_order',
		stok = '0'

		WHERE kodeproduk = $kodeproduk AND kodepelanggan=$_COOKIE[id] AND size='$size'");

		if(true)
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
}else {

		mysqli_query($conn, "INSERT INTO orders_temp (id_order_temp, kodeproduk, kodepelanggan, jumlah, size, tgl_order, stok)
		VALUES 
		('', '$kodeproduk', $_COOKIE[id], '$jumlah', '$size', '$tggl_order', '')");

		if(mysqli_affected_rows($conn))
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
}
?>