<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';


//pagination
$jumlahdataperhalaman = 5;

$jumlahData = count(orders("SELECT pelanggan.namapelanggan, orders.tgl_order, orders.alamat_pengirim,
	kota.nama_kota, orders.status_order, orders.status_konfirmasi, orders.status_terima 
	FROM orders JOIN pelanggan ON orders.kodepelanggan=pelanggan.kodepelanggan
	JOIN kota ON orders.id_kota=kota.id_kota JOIN kurirs ON orders.kurir_id=kurirs.kurir_id "));


$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


$orders = orders("SELECT * FROM orders JOIN pelanggan ON 
	orders.kodepelanggan=pelanggan.kodepelanggan JOIN kota ON
	orders.id_kota=kota.id_kota JOIN kurirs ON orders.kurir_id=kurirs.kurir_id LIMIT $awalData, $jumlahdataperhalaman" );




	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Data Orders</title>

		<style >
		.baris:nth-child(odd){
			background-color:  grey;

		</style>
	</head>
	<body>
		<div style="margin-top: 8px;">
			<h1> Data Orders </h1>
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

			<!-- <div style=" float: right; display: block;padding-top: 5px">
				<a href="tambahorder.php?halaman=tambahorder" class="btn btn-primary"> 
					<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
				</div> -->

			 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

				<div>
					<div class="table-responsive" style="padding-top: 5px">
						<table class="table table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr style="background-color: #ccc">
									<th>NO</th>
									<th>Order ID</th>
									<th>Nama Pelanggan</th>
									<th>Tanggal Order</th>
									<th>Alamat Pengiriman</th>
									<th>Kota</th>
									<th>Status Order</th>
									<th>Status Konfirmasi</th>
									<th>Status Terima</th>
									<th>Kurir</th>
									<th>Resi</th>
									<th>Aksi</th>
								</tr>
							</thead>

							
							<?php $i = 1; ?>
							<?php foreach ($orders as $ords): ?>
								<tr class="baris">
									<td style="color: black"><?php echo $i; ?></td>
									<td style="color: black"><?php echo $ords['id_order']; ?></td>
									<td style="color: black"><?php echo $ords['namapelanggan']; ?></td>
									<td style="color: black"><?php echo $ords['tgl_order']; ?></td>
									<td style="color: black"><?php echo $ords['alamat_pengirim']; ?></td>
									<td style="color: black"><?php echo $ords['nama_kota']; ?></td>
									<td style="color: black"><?php echo $ords['status_order']; ?></td>
									<td style="color: black"><?php echo $ords['status_konfirmasi']; ?></td>
									<td style="color: black"><?php echo $ords['status_terima']; ?></td>
									<td style="color: black"><?php echo $ords['kurir']; ?></td>
									<td style="color: black"><?php echo $ords['resi']; ?></td>
									<td style="color: black">
											<!-- <a href="index.php?halaman=hapusorder&id_order=<?php echo $ords['id_order'] ?>" class="btn-danger btn" onclick= "return confirm('apakah data order no= <?php echo $ords['id_order']; ?> ingin dihapus?')">
											<span class="glyphicon glyphicon-trash">Hapus</span></a><br><br> -->
											<!-- <a href="ubahorder.php?halaman=ubahorder&id_order=<?php echo $ords['id_order'] ?>" class="btn btn-warning">
												<span class="glyphicon glyphicon-pencil">Ubah</span></a><br><br> -->
												<a href="orders_detail.php?halaman=orders_detail&id=<?php echo $ords['id_order']; ?>">
													<span class="btn btn-info">Detail</span></a><br><br>
												<a href="tambahnoresi.php?halaman=tambahnoresi&id_order=<?php echo $ords['id_order']; ?>">
													<span class="btn btn-info">Input Resi</span></a>				
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
											<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
										<?php endif; ?>
										<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
											<?php if ($i == $halamanAktif) : ?> 
												<li class="page-item"><a href="?halaman=orders&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
												<?php else : ?>
													<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $i ?>"><?= $i; ?></a></li>
												<?php endif; ?>
											<?php endfor; ?>

											<?php if ($halamanAktif > 1) : ?>
												<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
											<?php endif; ?>
										</ul>
									</nav>
								</div>

								<!--jumlah data-->
								<div>
									<?php 
									$jml =  count(orders("SELECT * FROM orders JOIN pelanggan ON 
										orders.kodepelanggan=pelanggan.kodepelanggan JOIN kota ON
										orders.id_kota=kota.id_kota"));
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