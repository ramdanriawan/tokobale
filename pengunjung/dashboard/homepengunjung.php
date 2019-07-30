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
				<h3>Rilis Baru</h3>
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
							<?php $ambil = mysqli_query($conn, "SELECT * FROM produk ORDER BY tgl_masuk DESC LIMIT 4"); ?>
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
												<h6 style="text-align: center; color: grey"><?php echo toRupiah($perproduk["harga_produk"]); ?></h6>
												<div class="block"></div>
												<div class="clearfix"></div>
											</div>
											<div class="add">
												<form method="post" action="./addToCart.php">
                            <input type="hidden" name="kodeproduk" value="<?php echo $perproduk['kodeproduk'] ?>">

                              
                              <input type="hidden" name="jumlah" value="1">
                              <div class="btn btn-group">
                                <a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>" class="btn btn-info">
                                  <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <?php
                                  if( $perproduk['stok'] < 1 )
                                  {
                                    echo '
                                    <button class="btn btn-secondary" type="button">
                                      Stok Kosong
                                    </button>';
                                  }
                                  else
                                  {
                                    echo '<button class="btn btn-warning" type="submit">
                                      <span class="glyphicon glyphicon-shopping-cart"></span>
                                    </button>';

                                    echo '<select name="size" class="btn" required style="display: block;">';

                                    $sizes = explode(',', $perproduk['ukuran']);
                                    foreach ($sizes as $key => $size) 
                                    {
                                      echo "<option value='{$size}'>$size</option>";
                                    }

                                    echo "</select>";

                                  }
                                 ?>
                                
                              </div>

                        </form>
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

  <!-- Carousel
  	================================================== -->
  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Indicators -->
  		<ol class="carousel-indicators">
  			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  			<li data-target="#myCarousel" data-slide-to="1"></li>
  		</ol>
  		<div class="carousel-inner" role="listbox">
  			<div class="item active">
  				<img class="first-slide" src="../../images/5.jpeg" alt="First slide" width="1350px"></a>

  			</div>
  			<div class="item">
  				<img class="second-slide " src="../../images/6.jpeg" alt="Second slide" width="1350px"></a>

  			</div>

  		</div>

  	</div>
  	<!-- /.carousel -->

  	<!--contentsemuaproduk-->
  	<div class="product">
  		<div class="container">
  			<div class="spec ">
  				<h3>Some Product</h3>
  				<div class="ser-t">
  					<b></b>
  					<span><i></i></span>
  					<b class="line"></b>
  				</div>
  			</div>
  			
  			<div class=" con-w3l">
  				<?php $ambil = mysqli_query($conn, "SELECT * FROM produk ORDER BY tgl_masuk DESC LIMIT 8"); ?>
  				<?php while ($perproduk =  mysqli_fetch_assoc($ambil)) { ?>
  					<div class="col-md-3 pro-1">
  						<div class="col-m">
  							<a href="#" data-toggle="modal" data-target="#myModal24" class="offer-img">
  								<img src="../../images/<?php echo $perproduk["foto1"]; ?>" class="img-responsive" alt="">
  							</a>
  							<div class="mid-1">
  								<div class="women">
  									<h6 style="text-align: center;"><a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>"><?php echo $perproduk["nama_produk"] ?></a><p><?php echo $perproduk["berat"]; ?>kg</p>	</h6>						
  								</div>
  								<div class="mid-2">
  									<h6 style="text-align: center; color: grey"><?php echo toRupiah($perproduk["harga_produk"]); ?></h6>
  									<div class="block"></div>
  									<div class="clearfix"></div>
  								</div>
  								<div class="add">
  									<form method="post" action="./addToCart.php">
                            <input type="hidden" name="kodeproduk" value="<?php echo $perproduk['kodeproduk'] ?>">

                              
                              <input type="hidden" name="jumlah" value="1">
                              <div class="btn btn-group">
                                <a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>" class="btn btn-info">
                                  <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <?php
                                  if( $perproduk['stok'] < 1 )
                                  {
                                    echo '
                                    <button class="btn btn-secondary" type="button">
                                      Stok Kosong
                                    </button>';
                                  }
                                  else
                                  {
                                    echo '<button class="btn btn-warning" type="submit">
                                      <span class="glyphicon glyphicon-shopping-cart"></span>
                                    </button>';

                                    echo '<select name="size" class="btn" required style="display: block;">';

                                    $sizes = explode(',', $perproduk['ukuran']);
                                    foreach ($sizes as $key => $size) 
                                    {
                                      echo "<option value='{$size}'>$size</option>";
                                    }

                                    echo "</select>";

                                  }
                                 ?>
                                
                              </div>

                        </form>
  								</div>
  							</div>
  						</div>
  					</div>
  					<?php } ?>
  					<div class="clearfix"></div>
  				</div>
  			</div>
  		</div>
  		<!-- endcontectsemuaproduk -->
  	</body>
  	</html>

  	<?php include_once('../_footer.php'); ?>