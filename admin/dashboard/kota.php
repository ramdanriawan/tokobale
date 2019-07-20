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

<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';


//pagination
$jumlahdataperhalaman = 2;
$jumlahData = count(kota("SELECT * FROM kota"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


$kota = kota("SELECT * FROM kota LIMIT $awalData, $jumlahdataperhalaman");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Kota</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Data Kota </h1>
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
			<a href="tambahkota.php?halaman=tambahkota" class="btn btn-primary"> 
				<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
			</div><br><br>

			<div>
				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">
								<th>No</th>
								<th>Nama Kota</th>
								<th>Ongkir</th>
								<th>Aksi</th>
							</tr>
						</thead>

						
						<?php $i = 1; ?>
						<?php foreach ($kota as $kt): ?>
							<tr class="baris">
								<td style="color: black"><?php echo $i + $awalData; ?></td>
								<td style="color: black"><?php echo $kt['nama_kota']; ?></td>
								<td style="color: black"><?php echo $kt['ongkir']; ?></td>
								<td style="color: black">
									<a href="index.php?halaman=hapuskota&id_kota=<?php echo $kt['id_kota']; ?>" class="btn-danger btn" onclick="return confirm('apakah data kota no= <?php echo $kt['id_kota']
									?> ingin dihapus?')">
									<span class="glyphicon glyphicon-trash">Hapus</span></a>

									<a href="ubahkota.php?halaman=ubahkota&id_kota=<?php echo $kt['id_kota']; ?>" class="btn btn-warning" onclick="return confirm('apakah data kota no= <?php echo $kt['id_kota']; ?> ingin diubah?')">
										<span class="glyphicon glyphicon-pencil">Ubah</span></a>
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
								<li class="page-item"><a class="page-link" href="?halaman=kota&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
							<?php endif; ?>
							<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
								<?php if ($i == $halamanAktif) : ?> 
									<li class="page-item"><a href="?halaman=kota&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
									<?php else : ?>
										<li class="page-item"><a class="page-link" href="?halaman=kota&page=<?php echo $i ?>"><?= $i; ?></a></li>
									<?php endif; ?>
								<?php endfor; ?>

								<?php if ($halamanAktif > 1) : ?>
									<li class="page-item"><a class="page-link" href="?halaman=kota&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>

					<!--jumlah data-->
					<div>
						<?php 
						$jml = count(kota("SELECT * FROM kota"));
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