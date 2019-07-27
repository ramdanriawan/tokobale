<?php include_once('../_header.php'); include_once "./functions.php"; ?>

<?php 
//pagination
$jumlahdataperhalaman = 1;
$jumlahData = count(subkategori("SELECT * FROM sub_kategori JOIN kategori ON 
	sub_kategori.id_kategori=kategori.id_kategori
	WHERE kategori.id_kategori = '$_GET[id_kategori]'"));

$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;

$subkategori = subkategori("SELECT * FROM sub_kategori JOIN kategori ON 
	sub_kategori.id_kategori=kategori.id_kategori
	WHERE kategori.id_kategori = '$_GET[id_kategori]' LIMIT $awalData, $jumlahdataperhalaman");


	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Data Subkategori</title>
		<style >
		.baris:nth-child(odd){
			background-color:  grey;

		</style>
	</head>
	<body>

		<div style="margin-top: 8px;">
			<h1> Data Subkategori </h1>
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
				<a href="tambahsubkategori.php?halaman=tambahsubkategori&id_kategori" class="btn btn-primary"> 
					<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
				</div><br><br>

				<div>
					<div class="table-responsive" style="padding-top: 5px">
						<table class="table table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr style="background-color: #ccc">
									<th>No</th>
									<th>Nama Kategori</th>
									<th>Nama Subkategori</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<?php $i = 1; ?>
							<?php foreach ($subkategori as $sbktgr ): ?>
								<tr class="baris">
									<td style="color: black"><?= $i; ?></td>
									<td style="color: black"><?= $sbktgr['namakategori']; ?></td>
									<td style="color: black"><?= $sbktgr['nama_subkategori']; ?></td>
									<td style="color: black">
										<a href="index.php?halaman=hapussubkategori&kd_subkategori=<?php echo $sbktgr['kd_subkategori'] ?>" class="btn-danger btn" onclick= "return confirm('apakah data subkategori no= <?php echo $sbktgr['kd_subkategori']; ?> ingin dihapus?')">
											<span class="glyphicon glyphicon-trash">Hapus</span></a>
											<a href="ubahsubkategori.php?halaman=ubahsubkategori&kd_subkategori=<?php echo $sbktgr['kd_subkategori'] ?>" class="btn btn-warning" onclick= "return confirm('apakah data subkategori no= <?php echo $sbktgr['kd_subkategori']; ?> ingin diubah?')">
												<span class="glyphicon glyphicon-pencil">Ubah</span></a>
											</td>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</table>
						</div>
					</div>			
					<!-- navigasi -->
								<div class="pull-right">
									<nav aria-label="Page navigation example">
										<ul class="pagination">
											<?php if ($halamanAktif > 1) : ?>
												<li class="page-item"><a class="page-link" href="?halaman=subkategori&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
											<?php endif; ?>
											<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
												<?php if ($i == $halamanAktif) : ?> 
													<li class="page-item"><a href="?halaman=subkategori&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
													<?php else : ?>
														<li class="page-item"><a class="page-link" href="?halaman=subkategori&page=<?php echo $i ?>"><?= $i; ?></a></li>
													<?php endif; ?>
												<?php endfor; ?>

												<?php if ($halamanAktif > 1) : ?>
													<li class="page-item"><a class="page-link" href="?halaman=subkategori&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
												<?php endif; ?>
											</ul>
										</nav>
									</div>

									<!--jumlah data-->
									<div>
										<?php 
										$jml = count(subkategori("SELECT * FROM sub_kategori JOIN kategori ON 
											sub_kategori.id_kategori=kategori.id_kategori
											WHERE kategori.id_kategori = '$_GET[id_kategori]'"));
											echo "Jumlah Data: <b>". $jml . "</b>" ; ?>
										</div> 

										<!--jumlah halaman-->
										<div>
											<?php 
											echo "Jumlah Halaman: <b>". $jumlahHalaman . "</b>" ; ?>
										</div> <br><br>
									</body>
									</html>
<?php include_once('../_footer.php'); ?>