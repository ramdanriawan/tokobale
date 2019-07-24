<?php 
	include_once("./functions.php");
 ?>
 
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
	<title>Big store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Vide" />
	<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //for-mobile-apps -->
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<!-- js -->
	<script src="../js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="../js/move-top.js"></script>
	<script type="text/javascript" src="../js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<link href="../css/font-awesome.css" rel="stylesheet"> 
	<link href='..//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='..//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
	<!--- start-rate---->
	<script src="../js/jstarbox.js"></script>
	<link rel="stylesheet" href="../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />

	<script type="text/javascript">
		jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
				starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
						var val = Math.random();
						starbox.next().text(' '+val);
						return val;
					} 
				})
			});
		});
	</script>
	<!---//End-rate---->
</head>
<body>
	<div class="header">

		<div class="container">
			
			<!-- gambarlogo -->
			<div class="logo">
				<h1 ><a href="../dashboard/index.php"><img src="../../images/logobale.jpeg" width="200px"></a></h1>
			</div>

			<!-- gambar login -->
			<div class="head-t">
				<ul class="card">
					<!-- jika ada sudah login maka ada session pelanggan -->
							<?php if (isset($_COOKIE['namapelanggan'])):  ?>
								<li><a href="../dashboard/login.php" ><i class="fa fa-user" aria-hidden="true" style="font-size: 25px"></i><?php echo $_COOKIE["namapelanggan"]; ?></a>
								</li>
								<!-- jika belum login tidak session pelanggan -->
							<?php else: ?>
					<li><a href="../dashboard/login.php" ><i class="fa fa-user" aria-hidden="true" style="font-size: 25px"></i>Login</a></li>
					<?php endif ?>
				</ul>	
			</div>

			<!-- navbar -->
			<div class="nav-top">
				<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">

							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'index.php') > 1 ? "active": ""; ?>"><a href="../dashboard/index.php" class="hyper "><span>Home</span></a></li>

							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'contactus.php') > 1 ? "active": ""; ?>"><a href="../dashboard/contactus.php" class="hyper"><span>Contact Us</span></a></li>

							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'produk.php') > 1 ? "active": ""; ?>"><a href="../dashboard/produk.php" class="hyper"> <span>Produk</span></a></li>

							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'caraorder.php') > 1 ? "active": ""; ?>"><a href="../dashboard/caraorder.php" class="hyper"> <span>Cara Order</span></a></li>

							<!-- jika ada sudah login maka ada session pelanggan -->
							<?php if (isset($_COOKIE['namapelanggan'])):  ?>
								<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'pembelian.php') > 1 ? "active": ""; ?>"><a href="../dashboard/pembelian.php" class="hyper"> <span>Pembelian</span></a></li>
							<!-- jika belum login tidak session pelanggan -->
							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'setting.php') > 1 ? "active": ""; ?>"><a href="../dashboard/setting.php" class="hyper"><span>Setting</span></a></li>

							<li class="<?php echo strpos($_SERVER['REQUEST_URI'], 'logout.php') > 1 ? "active": ""; ?>"><a href="../dashboard/logout.php" class="hyper"><span>Logout</span></a></li>
							<?php else: ?>
						<?php endif ?>
							
							

						</ul>
					</div>
				</nav>
			</div>

			<!-- pencarian -->
			<div>
				<form action="pencarian.php" method="get">
					<div style=" float: left; display: block; margin-top: 5px; float: right; ">
						<input type="text" name="keyword" size="30" placeholder="Pencarian" value="<?php echo $_GET['keyword'] ?? "" ?>">
						<button type="button" class="btn btn-warning" name="cari" >
							<span class="glyphicon glyphicon-search" ></span>
						</button>
					</div>
				</form>
			</div>
			<!-- end -->

			<?php if (isset($_COOKIE['namapelanggan'])):  ?>
			<div class="cart" style="float: right;" >
				<a href="./cart.php">
				<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge">
					
					<?php 

									$conn = mysqli_connect("localhost", "root", "", "db_tokobale");

                                    $cartSql = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders_temp where kodepelanggan=$_COOKIE[id]");
                                    $cartQuery = mysqli_fetch_assoc($cartSql);

                                    echo $cartQuery['total'];

					 ?>

				</span></span>
				</a>
			</div>
			<?php else: ?>
		<?php endif ?>
			<div class="clearfix"></div>
		</div>

	</div>			
</div>
<!---->

  <!-- Carousel
  	================================================== -->
  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Indicators -->
  		<ol class="carousel-indicators">
  			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  			<li data-target="#myCarousel" data-slide-to="1"></li>
  			<li data-target="#myCarousel" data-slide-to="2"></li>
  		</ol>
  		<div class="carousel-inner" role="listbox">
  			<div class="item active">
  				<img class="first-slide" src="../../images/2.jpeg" alt="First slide" width="1350px"></a>

  			</div>
  			<div class="item">
  				<img class="second-slide " src="../../images/5.jpeg" alt="Second slide" width="1350px"></a>

  			</div>
  			<div class="item">
  				<img class="third-slide " src="../../images/6.jpeg" alt="Third slide" width="1350px"></a>

  			</div>
  		</div>

  	</div><!-- /.carousel -->


  	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
  	<script src="../js/jquery.vide.min.js"></script>

  </body>
