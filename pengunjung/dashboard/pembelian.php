<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembelian</title>
</head>
<body>

	<!--Pembelian-->
	<div class="container">
		<div  class="about">
			<div class="spec ">
				<h3>Pembelian</h3>
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
								<th>ID</th>
								<th>Tanggal Order</th>
								<th>Alamat Pengiriman</th>
								<th>Status Order</th>
								<th>Status Konfirmasi</th>
								<th>Status Diterima</th>
								<th>Kurir</th>
								<th>No Resi</th>
								<th>Aksi</th>
							</tr>
						</thead>

							<tr class="baris">

								<?php 

								$sqlOrders = mysqli_query($conn, "SELECT * FROM orders where kodepelanggan='$_COOKIE[id]' order by id_order desc");

								?>

								<?php 
									while($orders = mysqli_fetch_assoc($sqlOrders))
									{
										$sqlKurir = mysqli_query($conn, "SELECT * FROM kurirs where kurir_id='$orders[kurir_id]'");
										$kurir = mysqli_fetch_assoc($sqlKurir);

										if ($orders['status_terima'] == 'Sudah Diterima')
										{
											$htmlButton = "
													<button class='btn-success btn disabled'>
														<span class='glyphicon glyphicon-check'> Sudah Diterima</span>
													</button>

												<a href='hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$orders[id_order]' class='btn-danger btn' onclick='return confirm('Yakin akan hapus order ini?');'>
													<span class='glyphicon glyphicon-trash'>Hapus</span></a>";
										}
										elseif ($orders['status_konfirmasi'] == "Disetujui")
										{
											$htmlButton = "
													<a href='ubahStatusDiterima.php?id_order=$orders[id_order]' class='btn-success btn' onclick=\"return confirm('Yakin barang sudah diterima?');\">
														<span class='glyphicon glyphicon-pencil'>Terima Barang</span>
													</a>

												<a href='hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$orders[id_order]' class='btn-danger btn' onclick='return confirm('Yakin akan hapus order ini?');'>
													<span class='glyphicon glyphicon-trash'>Hapus</span></a>";
										}elseif($orders['status_konfirmasi'] == "Menunggu Persetujuan")
										{
											$htmlButton = "
													<button class='btn-warning btn disabled'>
														<span class='glyphicon glyphicon-pencil'> Konfirmasi</span>
													</button>

												<a href='hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$orders[id_order]' class='btn-danger btn' onclick='return confirm('Yakin akan hapus order ini?');'>
													<span class='glyphicon glyphicon-trash'>Hapus</span></a>";
										}

										elseif($orders['status_konfirmasi'] == "Menunggu Konfirmasi")
										{
											$htmlButton = "<a href='konfirmasi.php?halaman=konfirmasi&id_order=
												$orders[id_order]' class='btn-warning btn' value>
													<span class='glyphicon glyphicon-pencil'>Konfirmasi</span></a>

												<a href='hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$orders[id_order]' class='btn-danger btn' onclick='return confirm('Yakin akan hapus order ini?');'>
													<span class='glyphicon glyphicon-trash'>Hapus</span></a>";
										}

										else
										{
											$htmlButton = "
													<a href='ubahStatusDiterima.php?id_order=$orders[id_order]' class='btn-success btn' onclick=\"return confirm('Yakin barang sudah diterima?');\">
														<span class='glyphicon glyphicon-pencil'>Terima Barang</span>
													</a>

												<a href='hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$orders[id_order]' class='btn-danger btn' onclick='return confirm('Yakin akan hapus order ini?');'>
													<span class='glyphicon glyphicon-trash'>Hapus</span></a>";
										}

echo <<<EOD
										<tr>
											<td>$orders[id_order]</td>
											<td>$orders[tgl_order]</td>
											<td>$orders[alamat_pengirim]</td>
											<td>$orders[status_order]</td>
											<td>$orders[status_konfirmasi]</td>
											<td>$orders[status_terima]</td>
											<td>$kurir[kurir]</td>
											<td>$orders[resi]</td>
											<td>

												$htmlButton
											
												
										
											</td>
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