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
$jumlahdataperhalaman = 5;
$jumlahData = count(pelanggan("SELECT * FROM pelanggan"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;

//ambil data
$pelanggan = pelanggan("SELECT kodepelanggan, namapelanggan, alamat, nama_kota, nohp, email FROM pelanggan JOIN kota ON pelanggan.id_kota=kota.id_kota LIMIT $awalData, $jumlahdataperhalaman");

//tombol cari ditekan
if (isset($_POST["cari"])) {
	$pelanggan = caripelanggan($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pelanggan</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;
	}
</style>
</head>
<body>
	
	<div style="margin-top: 8px;">
		<h1> Data Pelanggan </h1>
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
		<a href="tambahpelanggan.php?halaman=tambahpelanggan" class="btn btn-primary"> 
			<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
		</div>

	 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

		<div >
			<div class="table-responsive" style="padding-top: 5px">
				<table class="table table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr style="background-color: #ccc">
							<th> No </th>
							<th> Nama Pelanggan </th>
							<th> Alamat </th>
							<th> Kota </th>
							<th> No Hp </th>
							<th> Email </th>
							<th> Aksi </th>
						</tr>
					</thead>


					<?php $i = 1; ?>
					<?php foreach ($pelanggan as $plgn) : ?>
						<tr class="baris">
							<td style="color: black"><?php echo $i + $awalData ?></td>
							<td style="color: black"><?php echo $plgn['namapelanggan'] ; ?></td>
							<td style="color: black"><?php echo $plgn['alamat'] ; ?></td>
							<td style="color: black"><?php echo $plgn['nama_kota'] ; ?></td>
							<td style="color: black"><?php echo $plgn['nohp'] ; ?></td>
							<td style="color: black"><?php echo $plgn['email'] ; ?></td>
							<td>
								<a href="index.php?halaman=hapuspelanggan&kodepelanggan=<?php echo $plgn['kodepelanggan']; ?>" class="btn-danger btn" onclick= "return confirm('apakah data pelanggan no= <?php echo $plgn['kodepelanggan']; ?> ingin dihapus?')">
									<span class="glyphicon glyphicon-trash"></span> hapus</a>
									<a href="ubahpelanggan.php?halaman=ubahpelanggan&kodepelanggan=<?php echo $plgn['kodepelanggan']; ?>" class="btn btn-warning" onclick= "return confirm('apakah data pelanggan no= <?php echo $plgn['kodepelanggan']; ?> ingin diubah?')">
										<span class="glyphicon glyphicon-pencil"></span> ubah </a>
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
								<li class="page-item"><a class="page-link" href="?halaman=pelanggan&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
							<?php endif; ?>
							<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
								<?php if ($i == $halamanAktif) : ?> 
									<li class="page-item"><a href="?halaman=pelanggan&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
									<?php else : ?>
										<li class="page-item"><a class="page-link" href="?halaman=pelanggan&page=<?php echo $i ?>"><?= $i; ?></a></li>
									<?php endif; ?>
								<?php endfor; ?>

								<?php if ($halamanAktif > 1) : ?>
									<li class="page-item"><a class="page-link" href="?halaman=pelanggan&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>

					<!--jumlah data-->
					<div>
						<?php 
						$jml = count(pelanggan("SELECT * FROM pelanggan"));
						echo "Jumlah Data: <b>". $jml . "</b>" ; ?>
					</div> 

					<!--jumlah halaman-->
					<div>
						<?php 
						echo "Jumlah Halaman: <b>". $jumlahHalaman . "</b>" ; ?>
					</div> <br><br>
				</div>
			</body>
			</html>

			<?php include_once('../_footer.php'); ?>