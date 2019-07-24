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


<?php 
require 'functions.php';
?>
<?php include_once('../_header.php'); ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<div style="margin: 5px; padding: 60px; border: 1px solid black">
		<h1> Selamat Datang </h1><br>
		<p> Selamat datang di halaman Administrator. Silahkan klik menu pilihan yang berada di sebelah kiri
		untuk mengelola konten website</p>
	</div><br>

	<!-- //market-->
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<a href="../dashboard/pelanggan.php?halaman=pelanggan">Produk</a>
					<h3><?php echo count(produk("SELECT * FROM produk")); ?></h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<a href="../dashboard/pelanggan.php?halaman=pelanggan">Pelanggan</a>
					<h3><?php echo count(pelanggan("SELECT * FROM pelanggan")); ?></h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<a href="../dashboard/admin.php?halaman=admin">Admin</a>
					<h3><?php echo count(admin("SELECT * FROM admin")); ?></h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="col-md-3 market-update-gd">
			<div class="market-update-block clr-block-1">
				<div class="col-md-4 market-update-right">
					<i class="fa fa-users" ></i>
				</div>
				<div class="col-md-8 market-update-left">
					<a href="../dashboard/kota.php?halaman=kota">Kota</a>
					<h3><?php echo count(kota("SELECT * FROM kota")); ?></h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
				<a href="../dashboard/kategori.php?halaman=kategori">Bank</a>
				<h3><?php echo count(kategori("SELECT * FROM kategori")); ?></h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
				<a href="../dashboard/bank.php?halaman=bank">Bank</a>
				<h3><?php echo count(bank("SELECT * FROM bank")); ?></h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
				<a href="../dashboard/kurir.php?halaman=kurir">Kurir</a>
				<h3><?php echo count(kurir("SELECT * FROM kurirs")); ?></h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
				<a href="../dashboard/orders.php?halaman=orders">Orders</a>
				<h3><?php echo count(orders("SELECT * FROM orders")); ?></h3>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>

<div class="col-md-3 market-update-gd">
	<div class="market-update-block clr-block-1">
		<div class="col-md-4 market-update-right">
			<i class="fa fa-users" ></i>
		</div>
		<div class="col-md-8 market-update-left">
			<a href="../dashboard/konfirmasipembayaran.php?halaman=konfirmasipembayaran">Konfirmasi Pembayaran</a>
			<h3><?php echo count(konfirmasi("SELECT * FROM konfirmasi")); ?></h3>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- </div> -->




<div class="clearfix"> </div>
</div>      
<div class="clearfix"> </div>
</div>
</section><br><br><br><br><br>

<!-- footer -->
<div class="footer">
	<div class="wthree-copyright">
		<p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
</div>

<!-- / footer -->
</body>
</html>
<?php include_once('../_footer.php'); ?>