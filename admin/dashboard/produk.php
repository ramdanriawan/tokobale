<?php include_once('../_header.php'); ?>


<?php 

require 'functions.php';

//pagination
$jumlahdataperhalaman = 10;
$jumlahData = count(produk("SELECT * FROM produk"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;

$produk = produk("SELECT * FROM produk JOIN sub_kategori ON 
	produk.kd_subkategori=sub_kategori.kd_subkategori LIMIT $awalData, $jumlahdataperhalaman");




	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Data Produk</title>

		<style >
		.baris:nth-child(odd){
			background-color:  grey;
		}
	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Data Produk </h1>
	</div>
	<div style="  margin-top: 20px;
	margin-bottom:  20px;
	border-top: 1px solid black;"></div>

	<div style="margin: 5px; padding:5px 10px 5px 10px; border: 1px solid black; background-color: white;">
		<form action="" method="post">
			<div style=" float: left; display: block; margin-top: 5px;">
				<input type="text" name="keyword" size="30" placeholder="Pencarian">
				<button type="button" class="btn btn-info" name="cari" >
					<span class="glyphicon glyphicon-search" ></span>
				</button>
			</div>
		</form>

		<div style=" float: right; display: block;padding-top: 5px">
			<a href="tambahproduk.php?halaman=tambahproduk" class="btn btn-primary"> 
				<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
			</div>

		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

			<div >
				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc;">
								<th> No </th>
								<th> Nama Subkategori </th>
								<th> Nama Produk </th>
								<th> Deskripsi </th>
								<th> Harga Produk </th>
								<th> Stok </th>
								<th> Berat (KG) </th>
								<th> Foto 1 </th>
								<th> Foto 2 </th>
								<th> Ukuran </th>
								<th> Diskon </th>
								<th> Tanggal Masuk </th>
								<th> Aksi </th>
							</tr>
						</thead>

						<?php $i = 1; ?>
						<?php foreach ($produk as $prdk ) : ?>	
							<tr class="baris">
								<td style="color: black"><?php echo $i; ?></td>
								<td style="color: black"><?php echo $prdk["nama_subkategori"]; ?></td>
								<td style="color: black"><?php echo $prdk["nama_produk"]; ?></td>
								<td style="color: black"><?php echo $prdk["deskripsi"]; ?></td>
								<td style="color: black"><?php echo $prdk["harga_produk"]; ?></td>
								<td style="color: black"><?php echo $prdk["stok"]; ?></td>
								<td style="color: black"><?php echo $prdk["berat"]; ?></td>
								<td style="color: black"><img src="../../images/<?= $prdk["foto1"] ; ?>" width="100"></td>
								<td style="color: black"><img src="../../images/<?= $prdk["foto2"] ; ?>" width="100"></td>
								<td style="color: black"><?php echo $prdk["ukuran"]; ?></td>
								<td style="color: black"><?php echo $prdk["diskon"]; ?></td>
								<td style="color: black"><?php echo $prdk["tgl_masuk"]; ?></td>
								<td style="color: black">		
									<a href="index.php?halaman=hapusproduk&kodeproduk=<?php echo $prdk['kodeproduk'] ?>" class="btn-danger btn" onclick= "return confirm('apakah data produk no= <?php echo $prdk['kodeproduk']; ?> ingin dihapus?')">
										<span class="glyphicon glyphicon-trash">Hapus</span></a><br><br>
										<a href="ubahproduk.php?halaman=ubahproduk&kodeproduk=<?php echo $prdk['kodeproduk'] ?>" class="btn btn-warning" onclick= "return confirm('apakah data produk no= <?php echo $prdk['kodeproduk']; ?> ingin diubah?')">
											<span class="glyphicon glyphicon-pencil">Ubah</span></a>
										</td>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div><br>	

				<!-- navigasi -->
				<div class="pull-right">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php if ($halamanAktif > 1) : ?>
								<li class="page-item"><a class="page-link" href="?halaman=produk&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
							<?php endif; ?>
							<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
								<?php if ($i == $halamanAktif) : ?> 
									<li class="page-item"><a href="?halaman=produk&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
									<?php else : ?>
										<li class="page-item"><a class="page-link" href="?halaman=produk&page=<?php echo $i ?>"><?= $i; ?></a></li>
									<?php endif; ?>
								<?php endfor; ?>

								<?php if ($halamanAktif > 1) : ?>
									<li class="page-item"><a class="page-link" href="?halaman=produk&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>

					<!--jumlah data-->
					<div>
						<?php 
						$jml = count(produk("SELECT * FROM produk JOIN sub_kategori ON 
							produk.kd_subkategori=sub_kategori.kd_subkategori"));
							echo "Jumlah Data: <b>". $jml . "</b>" ; ?>
							</div> 

							<!--jumlah halaman-->
							<div>
							<?php 
							echo "Jumlah Halaman: <b>". $jumlahHalaman . "</b>" ; ?>
							</div>
					</div>

							</body>
							</html>
<?php include_once('../_footer.php'); ?>