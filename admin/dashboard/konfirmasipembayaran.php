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

$konfirmasi = konfirmasi("SELECT * FROM konfirmasi JOIN orders ON 
	konfirmasi.id_order=orders.id_order JOIN pelanggan ON
	konfirmasi.kodepelanggan=pelanggan.kodepelanggan JOIN bank ON konfirmasi.kode_bank=bank.kode_bank");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Pembayaran</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Data Konfirmasi Pembayaran</h1>
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
		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">
								<th>Id</th>
								<th>Order Id</th>
								<th>Nama Pelanggan</th>
								<th>Bank</th>
								<th>Pengirim</th>
								<th>Rekening</th>
								<th>Tanggal Konfirmasi</th>
								<th>Bukti Transfer</th>
								<th>Aksi</th>
							</tr>
						</thead>

						
						<?php $i = 1; ?>
						<?php foreach ($konfirmasi as $knfrms): ?>
							<tr class="baris">
								<td style="color: black"><?php echo $i;?></td>

								<!-- <?php 
								 
									// $ambil = mysqli_query($conn, "SELECT * FROM konfirmasi JOIN orders ON konfirmasi.id_order=orders.id_order");
									// $idorder = mysqli_fetch_assoc($ambil);
								?> -->
								<td style="color: black"><?php echo $knfrms['id_order']; ?></td>

								<!-- <?php 
									$ambil = mysqli_query($conn, "SELECT * FROM konfirmasi JOIN pelanggan ON konfirmasi.kodepelanggan=pelanggan.kodepelanggan");
									$plgn = mysqli_fetch_assoc($ambil);
								?> -->
								<td style="color: black"><?php echo $knfrms['namapelanggan']; ?></td>

								<!-- <?php 
									$ambil = mysqli_query($conn, "SELECT * FROM konfirmasi JOIN bank ON bank.kode_bank=bank.kode_bank");
									$bank = mysqli_fetch_assoc($ambil);
								?> -->
								<td style="color: black"><?php echo $knfrms['namabank']; ?></td>

								<td style="color: black"><?php echo $knfrms['nama_penggirim']; ?></td>
								<td style="color: black"><?php echo $knfrms['rek_pengirim']; ?></td>
								<td style="color: black"><?php echo $knfrms['tgl_konfirmasi']; ?></td>
								<td style="color: black"><img src="../../buktipembayaran/<?= $knfrms["bukti_transfer"] ; ?>" width="100"></td>
								<td style="color: black;">
									<?php if($knfrms["status_konfirmasi"] == "Menunggu Persetujuan"): ?>
									<a href="./order_ubah_konfirmasi.php?id_order=<?= $knfrms['id_order'] ?>"class="btn btn-info" onclick="return confirm('setujui konfirmasi dari <?php echo $knfrms['namapelanggan']; ?>')">
										<span class="glyphicon glyphicon-ok">Setujui</span>
									</a>
									<?php elseif($knfrms["status_konfirmasi"] == "Disetujui"): ?>
									<button class="btn btn-info disabled">
										<span class="glyphicon glyphicon-ok">Disetujui</span>
									</button>
									<?php endif; ?>	
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>	
						</table>
					</div>
				</div>


				</body>
				</html>
<?php include_once('../_footer.php'); ?>