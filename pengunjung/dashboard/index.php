<?php
session_start();

if (isset($_GET['halaman'])) 
{
	if($_GET['halaman'] == "deskripsi")
	{
		include 'deskripsi.php';
	}else if($_GET['halaman'] == "caraorder")
	{
		include 'caraorder.php';
	}else if($_GET['halaman'] == "profiltoko")
	{
		include 'profiltoko.php';
	}else if($_GET['halaman'] == "contactus")
	{
		include 'contactus.php';
	}else if($_GET['halaman'] == "produk")
	{
		include 'produk.php';
	}else if($_GET['halaman'] == "subkategori")
	{
		include 'subkategori.php';
	}else if($_GET['halaman'] == "diskonproduk")
	{
		include 'diskonproduk.php';
	}else if($_GET['halaman'] == "registrasi")
	{
		include 'registrasi.php';
	}else if($_GET['halaman'] == "login")
	{
		include 'login.php';
	}else if($_GET['halaman'] == "logout")
	{
		include 'logout.php';
	}else if($_GET['halaman'] == "pembelian")
	{
		include 'pembelian.php';
	}else if($_GET['halaman'] == "konfirmasi")
	{
		include 'konfirmasi.php';
	}else if($_GET['halaman'] == "setting")
	{
		include 'setting.php';
	}
	
	
	
}
else
{
	include 'homepengunjung.php';
}
?>