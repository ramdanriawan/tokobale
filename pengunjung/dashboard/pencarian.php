<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
}

require 'functions.php';
include_once('../_headerpenggunjung.php');


$jumlahData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as jumlah_data FROM produk where nama_produk like '%$_GET[keyword]%'"))['jumlah_data'];
$jumlahdataperhalaman = 5;

$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);
$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


?>

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
				<h3>Hasil Pencarian Untuk "<?php echo $_GET['keyword'] ?? ""; ?>"</h3>
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
							<?php $ambil = mysqli_query($conn, "SELECT * FROM produk where nama_produk like '%$_GET[keyword]%'  ORDER BY tgl_masuk DESC LIMIT $awalData, $jumlahdataperhalaman"); ?>
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

						<!-- navigasi -->
						<div class="pull-right">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<?php if ($halamanAktif > 1) : ?>
										<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
									<?php endif; ?>
									<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
										<?php if ($i == $halamanAktif) : ?> 
											<li class="page-item"><a href="?keyword=<?php echo $_GET['keyword']; ?>&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
											<?php else : ?>
												<li class="page-item"><a class="page-link" href="?keyword=<?php echo $_GET['keyword']; ?>&page=<?php echo $i ?>"><?= $i; ?></a></li>
											<?php endif; ?>
										<?php endfor; ?>

										<?php if ($halamanAktif > 1) : ?>
											<li class="page-item"><a class="page-link" href="?keyword=<?php echo $_GET['keyword']; ?>&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
										<?php endif; ?>
									</ul>
								</nav>
							</div>

					</div>
				</div>

			</div>
		</div><br><br>
		<!--contentrilisbaru-->

  	</body>
  	</html>

  	<?php include_once('../_footer.php'); ?>