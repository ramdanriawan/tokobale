
<?php 

 session_start();

 if (!isset($_SESSION["login"]) )
 {
     header("Location: login.php" );
     exit;
 }
 
?> 
 
<?php 
if (isset($_GET['halaman'])) 
{
	if($_GET['halaman'] == "pelanggan")
	{
		include 'pelanggan.php';
	}
	elseif ($_GET['halaman'] == 'hapuspelanggan') 
	{
		include 'hapuspelanggan.php';
	}
	elseif ($_GET['halaman'] == 'ubahpelanggan') 
	{
		include 'ubahpelanggan.php';
	}
	elseif ($_GET['halaman'] == 'tambahpelanggan') 
	{
		include 'tambahpelanggan.php';
	}elseif ($_GET['halaman'] == 'admin')
	{
		include 'admin.php';
	}elseif ($_GET['halaman'] == 'hapusadmin')
	{
		include 'hapusadmin.php';
	}elseif ($_GET['halaman'] == 'ubahadmin')
	{
		include 'ubahadmin.php';
	}elseif ($_GET['halaman'] == 'tambahadmin') 
	{
		include 'tambahadmin.php';
	}else if ($_GET['halaman'] == 'kategori')
	{
		include 'kategori.php';
	}else if ($_GET['halaman'] == 'hapuskategori') 
	{
		include 'hapuskategori.php';
	}else if ($_GET['halaman'] == 'ubahkategori')
	{
		include 'ubahkategori.php';
	}else if($_GET['halaman'] == 'tambahkategori')
	{
		include 'tambahkategori.php';
	}else if($_GET ['halaman'] == 'bank')
	{
		include 'bank.php';
	}else if($_GET['halaman'] == 'hapusbank')
	{
		include 'hapusbank.php';
	}else if($_GET['halaman'] == 'ubahbank')
	{
		include 'ubahbank.php';
	}else if($_GET['halaman'] == 'tambahbank')
	{
		include 'tambahbank.php';
	}else if($_GET['halaman'] == 'kota')
	{
		include 'kota.php';
	}else if($_GET['halaman'] == 'hapuskota')
	{
		include 'hapuskota.php';
	}else if ($_GET['halaman'] == 'ubahkota') 
	{
		include 'ubahkota.php';
	}else if($_GET['halaman'] == 'tambahkota')
	{
		include 'tambahkota.php';
	}else if ($_GET['halaman'] == 'subkategori') 
	{
		include 'subkategori.php';
	}else if ($_GET['halaman'] == 'hapussubkategori')
	{
		include 'hapussubkategori.php';
	}else if ($_GET['halaman'] == 'ubahsubkategori.php') 
	{
		include 'ubahsubkategori.php';
	}else if ($_GET['halaman'] == 'tambahsubkategori') 
	{
		include 'tambahsubkategori.php';
	}else if ($_GET['halaman'] == 'produk')
	{
		include 'produk.php';
	}else if ($_GET['halaman'] == 'hapusproduk') 
	{
		include 'hapusproduk.php';
	}else if($_GET['halaman'] == 'ubahproduk')
	{
		include 'ubahproduk.php';
	}else if($_GET['halaman'] == 'tambahproduk')
	{
		include 'tambahproduk.php';
	}elseif($_GET['halaman'] == 'orders')
	{
		include 'orders.php';
	}elseif($_GET['halaman'] == 'tambahorder')
	{
		include 'tambahorder.php';
	}elseif($_GET['halaman'] == 'orders_detail')
	{
		include 'orders_detail.php';
	}elseif($_GET['halaman'] == 'hapusorder')
	{
		include 'hapusorder.php';
	}elseif($_GET['halaman'] == 'ubahorder')
	{
		include 'ubahorder.php';
	}elseif($_GET['halaman'] == 'tambahnoresi')
	{
		include 'tambahnoresi.php';
	}elseif($_GET['halaman'] == 'kurir')
	{
		include 'kurir.php';
	}elseif($_GET['halaman'] == 'hapuskurir')
	{
		include 'hapuskurir.php';
	}elseif($_GET['halaman'] == 'tambahkurir')
	{
		include 'tambahkurir.php';
	}elseif($_GET['halaman'] == 'konfirmasipembayaran')
	{
		include 'konfirmasipembayaran.php';
	}elseif($_GET['halaman'] == 'logout')
	{
		include 'logout.php';
	}
}
else
{
	include '../dashboard/home.php';
}

?>





