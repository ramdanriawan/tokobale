<?php include_once('../_header.php'); ?>

<h1>Detail Order</h1>

<?php 

require 'functions.php';

// $result = mysqli_query($conn, "SELECT produk.nama_produk, order_detail.ukuran,
// order_detail.warna, order_detail.jumlah FROM order_detail JOIN produk ON order_detail.id_produk=produk.id_produk
// WHERE order_detail.id_order_detail=$_GET[id]");
$idorder = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM orders WHERE id_order=$idorder");
$detail = mysqli_fetch_assoc($ambil);

?>
<br>
<p><strong> Order Id:<?= $detail["id_order"]; ?></strong></p> <br>
<p>
	Alamat Pengirim: <?= $detail["alamat_pengirim"]; ?> <br>
	tanggal Order: <?= $detail["tgl_order"]; ?>
</p>


<div style="margin: 5px; padding:5px 10px 5px 10px; border: 1px solid black; background-color: white;">

	<div>
		<div class="table-responsive" style="padding-top: 5px">
			<table class="table table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr style="background-color: #ccc">
						<th>No</th>
						<th>Nama Produk</th>
						<th>Size</th>
						<th>Jumlah</th>
						<th>Harga Satuan</th>
						<th>Total - Diskon</th>
					</tr>
				</thead>


				<tr>
					<?php $i = 1; ?>
					<?php $tab_detail = mysqli_query ($conn, "SELECT * FROM order_detail JOIN produk ON 
					order_detail.kodeproduk=produk.kodeproduk WHERE id_order=$idorder"); ?>
						<?php while($result = mysqli_fetch_assoc($tab_detail)) { ?>
							<td><?=  $i; ?></td>
							<td><?= $result['nama_produk'];?></td>
							<td><?= $result['size'];?></td>
							<td><?= $result['jumlah'];?></td>
							<td><?= toRupiah($result['harga_satuan']); ?> (Diskon: <?= $result['diskon']; ?>%)</td>
							<td>
								<?= toRupiah($result['harga_satuan'] * $result['jumlah'] - ($result['harga_satuan'] * $result['jumlah'] * ($result['diskon'] / 100))); ?>
							</td>

						</tr>
						<?php $i++; ?>
						<?php } ?>


						<?php include_once('../_footer.php'); ?>