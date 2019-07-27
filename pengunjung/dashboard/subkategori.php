<?php include_once('../_headerpenggunjung.php'); ?>

<?php

$kdsubkategori = $_GET['kd_subkategori'];


$jumlahData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as jumlah_data FROM produk WHERE kd_subkategori=$kdsubkategori"))['jumlah_data'];
$jumlahdataperhalaman = 5;

$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);
$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


$result = mysqli_query($conn, "SELECT * FROM sub_kategori WHERE kd_subkategori=$kdsubkategori  ORDER BY kd_subkategori DESC LIMIT $awalData,$jumlahdataperhalaman");
$ambil = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Subkategori</title>

	<style>
		  .button {
         background-color: #e6b029;
         border: none;
         color: white;
         padding: 10px 24px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 20px;
         margin: 4px 2px;
         cursor: pointer;
         }
	</style>
</head>
<body>

<!-- semua produk -->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3><?php echo $ambil['nama_subkategori'] ?></h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>

			
			<!-- Side Bar< -->
			<div class="row">
				<div class="col-md-3">
					<span href="#" class="list-group-item active" style="background: #f2af44">
						SideBar
						<span class="pull-right" id="slide-submenu"></span>
					</span>
					<?php 
					$sql    ="SELECT * FROM produk";
					$query    =mysqli_query($conn, $sql);
					$count    =mysqli_num_rows($query);
					?>


					<a href="./produk.php" class="list-group-item">
					</i>Semua<span class="float-right badge badge-light round">
						<?php echo $count; ?></span> </a>
						<?php $ambil = mysqli_query($conn, "SELECT * FROM sub_kategori"); ?>

						<?php while ($persubkategori=  mysqli_fetch_assoc($ambil)) { ?>
							<?php 
							$sql1      = "SELECT * from produk where kd_subkategori=$persubkategori[kd_subkategori] ";
							$query1    = mysqli_query($conn, $sql1);
							$count1    = mysqli_num_rows($query1);

							?>
							<a href="subkategori.php?halaman=subkategori&kd_subkategori=<?php echo $persubkategori["kd_subkategori"] ?>" class="list-group-item">
							</i><?php echo $persubkategori["nama_subkategori"]; ?><span class="float-right badge badge-light round"><?php echo $count1; ?></span> </a>
							<?php } ?>

							
					</div>
						<!-- <endsidebar-->


						<div class="col-md-9">	
							<div class="row">		
								<?php $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE kd_subkategori=$kdsubkategori ORDER BY tgl_masuk DESC LIMIT $awalData,$jumlahdataperhalaman"); ?>
								<?php while ($perproduk =  mysqli_fetch_assoc($ambil)) { ?>
									<div class="col-md-4 pro-1">
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
													<a href="deskripsi.php?halaman=deskripsi&kodeproduk=<?php echo $perproduk["kodeproduk"]; ?>" class="btn btn-info"><span class="">View More</span></a>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									<div class="clearfix"></div>
								</div>			
							</div>

							<div class='row'>

						<!-- navigasi -->
						<div class="pull-right">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<?php if ($halamanAktif > 1) : ?>
										<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
									<?php endif; ?>
									<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
										<?php if ($i == $halamanAktif) : ?> 
											<li class="page-item"><a href="?kd_subkategori=<?php echo $_GET['kd_subkategori']; ?>&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
											<?php else : ?>
												<li class="page-item"><a class="page-link" href="?kd_subkategori=<?php echo $_GET['kd_subkategori']; ?>&page=<?php echo $i ?>"><?= $i; ?></a></li>
											<?php endif; ?>
										<?php endfor; ?>

										<?php if ($halamanAktif > 1) : ?>
											<li class="page-item"><a class="page-link" href="?kd_subkategori=<?php echo $_GET['kd_subkategori']; ?>&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
										<?php endif; ?>
									</ul>
								</nav>
							</div>
							</div>			
						</div>
					</div>
				</div>

				<!-- <endsemuaproduk -->
</body>
</html>


<?php include_once('../_footer.php'); ?>