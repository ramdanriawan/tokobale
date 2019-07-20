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
$jumlahdataperhalaman = 3;
$jumlahData = count(admin("SELECT * FROM admin"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


$admin = admin("SELECT * FROM admin LIMIT $awalData, $jumlahdataperhalaman");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Admin</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;
	}
</style>
</head>
<body>
	<div style="margin-top: 8px;">
	<h1> Data Admin </h1>
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
		<a href="tambahadmin.php?halaman=tambahadmin" class="btn btn-primary"> 
			<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
		</div><br><br>

		<div >
			<div class="table-responsive" style="padding-top: 5px">
				<table class="table table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr style="background-color: #ccc">
							<th> No </th>
							<th> Username </th>
							<th> Password </th>
							<th> Nama Lengkap </th>
							<th> Email </th>
							<th> No Telpon </th>
							<th> Level </th>
							<th> Aksi </th>
						</tr>
					</thead>

					<?php $i = 1; ?>
					<?php foreach ($admin as $adm) : ?>

						<!-- <?php 

							// if ( $loginscookie == 'pegawai' && $adm['level'] === 'pegawai' ) continue;
						 ?> -->

						<tr class="baris">
							<td style="color: black"><?php echo $i + $awalData; ?></td>
							<td style="color: black"><?php echo $adm['username']; ?></td>
							<td style="color: black"><?php echo $adm['password']; ?></td>
							<td style="color: black"><?php echo $adm['namalengkap']; ?></td>
							<td style="color: black"><?php echo $adm['email']; ?></td>
							<td style="color: black"><?php echo $adm['notelpon']; ?></td>
							<td style="color: black"><?php echo $adm['level']; ?></td>
							<td style="color: black">
								<?php if ($adm['username'] != 'admin'): ?> 
								<a href="index.php?halaman=hapusadmin&id_admin=<?php echo $adm['id_admin']; ?>" class="btn-danger btn" onclick= "return confirm('apakah data admin no= <?php echo $adm['id_admin']; ?> ingin dihapus?')">
									<span class="glyphicon glyphicon-trash">Hapus</span></a><br><br>
								<?php endif; ?>
								<a href="ubahadmin.php?halaman=ubahadmin&id_admin=<?php echo $adm['id_admin']; ?>" class="btn btn-warning" onclick= "return confirm('apakah data admin no= <?php echo $adm['id_admin']; ?> ingin diubah?')">
									<span class="glyphicon glyphicon-pencil">Ubah</span></a>
							</td>
						</tr>
						<?php $i++ ?>
					<?php endforeach; ?>
				</table>
			</div>
		</div>

		<!-- navigasi -->
				<div class="pull-right">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php if ($halamanAktif > 1) : ?>
								<li class="page-item"><a class="page-link" href="?halaman=admin&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
							<?php endif; ?>
							<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
								<?php if ($i == $halamanAktif) : ?> 
									<li class="page-item"><a href="?halaman=admin&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
									<?php else : ?>
										<li class="page-item"><a class="page-link" href="?halaman=admin&page=<?php echo $i ?>"><?= $i; ?></a></li>
									<?php endif; ?>
								<?php endfor; ?>

								<?php if ($halamanAktif > 1) : ?>
									<li class="page-item"><a class="page-link" href="?halaman=admin&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>

					<!--jumlah data-->
					<div>
						<?php 
						$jml = count(admin("SELECT * FROM admin"));
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