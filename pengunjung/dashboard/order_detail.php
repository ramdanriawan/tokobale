<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Detail</title>
</head>
<body>

	<!--Pembelian-->
	<div class="container">
		<div  class="about">
			<div class="spec ">
				<h3>Order Detail Untuk Order ID <?php echo $_GET['id_order']; ?></h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>


			<div>
				<div class="table-responsive" style="padding-top: 5px;" >
					<table class="table table-bordered table-hover" id="dataTables-example" >
						<thead >
							<tr style="font-size: 15px;">
								<th>Nama Produk</th>
								<th>Size</th>
								<th>Jumlah</th>
								<th>Harga Satuan</th>
								<th>Diskon</th>
								<th>Total - Diskon</th>
							</tr>
						</thead>

							<tr class="baris">

								<?php 

									$sqlOrderDetail = mysqli_query($conn, "SELECT * FROM order_detail where id_order='$_GET[id_order]' order by id_order_detail desc");

								?>

								<?php 
									while($orderDetail = mysqli_fetch_assoc($sqlOrderDetail))
									{
										$sqlProduk = mysqli_query($conn, "SELECT * FROM produk where kodeproduk='$orderDetail[kodeproduk]'");
										$produk = mysqli_fetch_assoc($sqlProduk);
										
										$orderDetail['total'] = toRupiah($orderDetail['harga_satuan'] * $orderDetail['jumlah'] - ($orderDetail['harga_satuan'] * $orderDetail['jumlah'] * ($produk['diskon'] / 100)));

										$orderDetail['harga_satuan'] = toRupiah($orderDetail['harga_satuan']);
echo <<<EOD
										<tr>
											<td>$produk[nama_produk]</td>
											<td>$orderDetail[size]</td>
											<td>$orderDetail[jumlah]</td>
											<td>$orderDetail[harga_satuan]</td>
											<td>$produk[diskon] %</td>
											<td>$orderDetail[total]</td>
										</tr>
EOD;
									}
								?>
							</tr>
						</table>
					</div>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//pembelian-->

</body>
</html>
<?php include_once('../_footer.php'); ?>