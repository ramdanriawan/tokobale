<?php 
	if(isset($_COOKIE['konfirmasiLogin']))
	{
		echo "<script>alert('Kamu harus login untuk melakukan pembelian barang'); </script>";

		setcookie('konfirmasiLogin', '0', time() - 1);
	}
 ?>

<?php include_once('../_headerpenggunjung.php'); ?>

<?php 

$kodeproduk = $_GET['kodeproduk'];

$result = mysqli_query($conn, "SELECT * FROM produk WHERE kodeproduk=$kodeproduk");
$ambil = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>eCommerce Product Detail</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="..//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="..//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="..//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link href="../css/styledeskripsi.css" rel='stylesheet' type='text/css' />

	<!------ Include the above in your HEAD tag ---------->
	
</head>
<body>

	<div class="container"><br><br><br><br>
		<div class="spec ">
			<h3>Detail Product</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class="card1">

			<div class="container-fliud">
				<div class="wrapper1 row">
					<div class="preview col-md-5">
						
						<div class="preview-pic tab-content">
							<div class="tab-pane active" id="pic-1" ><img src="../../images/<?php echo $ambil["foto1"]; ?>" /></div>
							<div class="tab-pane" id="pic-2"><img src="h../../images/<?php echo $ambil["foto2"]; ?>" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
							<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../../images/<?php echo $ambil["foto1"]; ?>" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../../images/<?php echo $ambil["foto2"]; ?>" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-7">
						<div class="single-right">
							<h1 class="product-title1"><?php echo $ambil["nama_produk"]; ?></h1><br>
							<div style="border: 1px solid black"></div><br>
							<p class="product-description1"><h3 style="letter-spacing: 2px">DESKRIPSI :</h3><br><?php echo $ambil["deskripsi"]; ?></p><br>
							<h3 class="price" style="letter-spacing: 2px">current price: <span>Rp.<?php echo $ambil["harga_produk"] ?></span></h3>
							<h3 class="price" style="letter-spacing: 2px">Sizes: <span><?php echo $ambil["ukuran"]; ?></span></h3>
							<h3 class="price" style="letter-spacing: 2px">Stok: <span><?php echo $ambil["stok"]; ?>
						</span></h3><br>

						<form method="post" action="./addToCart.php">
							<div style="border: 1px solid black"></div><br>
							<input type="hidden" name="kodeproduk" value="<?php echo $ambil['kodeproduk'] ?>">

							<span>
								<?php
									echo '<select name="size" required>';

									$sizes = explode(',', $ambil['ukuran']);
										echo "<option value=''>--Pilih Size--</option>";

									foreach ($sizes as $size) 
									{
										echo "<option value='{$size}'>$size</option>";
									}

									echo "</select>";

								?>
								
								<!-- <input type="text" name="size" value="Masukan Size disini!" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Size disini';}"> -->
							</span>

							<span>
								<select name="jumlah" required>
									<option value="" selected>--Jumlah--</option>
									<?php for ($i=1; $i <= $ambil['stok']; $i++)
										{ 
											echo "<option value='$i'>$i</option>";
										}
									?>
								</select>
							</span><br><br>
							<div class="action">
								<button class="btn btn-warning btn-block" type="submit">
									<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
								</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><br>

</body>
</html><br><br>


<?php include_once('../_footer.php'); ?>