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
$jumlahData = count(bank("SELECT * FROM bank"));
$jumlahhalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awaldata = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;

$bank = bank("SELECT * FROM bank LIMIT $awaldata, $jumlahdataperhalaman");






?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Bank</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>

	<div style="margin-top: 8px;">
		<h1> Data Bank </h1>
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
			<a href="tambahbank.php?halaman=tambahbank" class="btn btn-primary"> 
				<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
			</div>

		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

			<div>
				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>No Rekening</th>
								<th>Nama Bank</th>
								<th>Atas Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<?php $i = 1; ?>
						<?php foreach ($bank as $bk): ?>
							<tr class="baris">
								<td style="color: black"><?php echo $i + $awaldata; ?></td>
								<td style="color: black"><?php echo $bk['norek']; ?></td>
								<td style="color: black"><?php echo $bk['namabank']; ?></td>
								<td style="color: black"><?php echo $bk['atasnama']; ?></td>
								<td>
									<a href="index.php?halaman=hapusbank&kode_bank=<?php echo $bk['kode_bank'] ?>" class="btn-danger btn" onclick = "return confirm('apakah data bank no= <?php echo $bk['kode_bank']; ?> ingin dihapus')">
										<span class="glyphicon glyphicon-trash">Hapus</span></a>
										<a href="ubahbank.php?halaman=ubahbank&kode_bank=<?php echo $bk['kode_bank']; ?>" class="btn btn-warning" onclick = "return confirm('apakah data bank no= <?php echo $bk['kode_bank']; ?>ingin diubah?')">
											<span class="glyphicon glyphicon-pencil">Ubah</span></a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach ?>
							</table>
						</div>
					</div>

					<!--navigasi-->
					<div class="pull-right">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<?php if ($halamanAktif > 1) : ?>
									<li class="page-item"><a class="page-link" href="?halaman=bank&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
								<?php endif; ?>
								<?php for ($i= 1; $i <= $jumlahhalaman; $i++) : ?>
									<?php if ($i == $halamanAktif) : ?> 
										<li class="page-item"><a href="?halaman=Bank&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
										<?php else : ?>
											<li class="page-item"><a class="page-link" href="?halaman=bank&page=<?php echo $i ?>"><?= $i; ?></a></li>
										<?php endif; ?>
									<?php endfor; ?>

									<?php if ($halamanAktif > 1) : ?>
										<li class="page-item"><a class="page-link" href="?halaman=bank&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
									<?php endif; ?>
								</ul>
							</nav>
						</div>

						<!--jumlah data-->
						<div>
							<?php 
							$jml = count(bank("SELECT * FROM bank"));
							echo "Jumlah Data: <b>". $jml . "</b>" ; ?>
						</div> 

						<!--jumlah halaman-->
						<div>
							<?php 
							echo "Jumlah Halaman: <b>". $jumlahhalaman . "</b>" ; ?>
						</div> <br><br>




				</body>
				</html>
<?php include_once('../_footer.php'); ?>