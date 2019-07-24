<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
}

?>

<?php require 'functions.php';?>

<?php include_once('../_headerpenggunjung.php'); ?>




<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<!--contentrilisbaru-->
	<br><br>
	<div class="content-top ">
		<div class="container ">
			<div class="spec ">
				<h3>Hasil Pencarian Untuk <?php echo $_GET['keyword']; ?></h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<div class="tab-head ">
				<div class=" tab-content tab-content-t ">
					<div class="tab-pane active text-style" id="tab1">
						
						<div class=" con-w3l">
							<?php $ambil = mysqli_query($conn, "SELECT * FROM produk where nama_produk like '%$_GET[keyword]%'  ORDER BY tgl_masuk DESC LIMIT 50"); ?>
							<?php while ($perproduk =  mysqli_fetch_assoc($ambil)) { ?>
								<div class="col-md-3 m-wthree">
									<div class="col-m">
										<a href="#" data-toggle="modal" data-target="#myModal16" class="offer-img">
											<img src="../../images/<?php echo $perproduk["foto1"]; ?>" class="img-responsive" alt="">
										</a>
										<div class="mid-1">
											<div class="women">
												<h6 style="text-align: center;"><a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>"><?php echo $perproduk["nama_produk"] ?></a><p><?php echo $perproduk["berat"]; ?>kg</p>	</h6>						
											</div>
											<div class="mid-2">
												<h6 style="text-align: center; color: grey"><?php echo $perproduk["harga_produk"]; ?></h6>
												<div class="block"></div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>" class="btn btn-info"><span class="">View More</span></a>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div><br><br>
		<!--contentrilisbaru-->

  	</body>
  	</html>

  	<?php include_once('../_footer.php'); ?>