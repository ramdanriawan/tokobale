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

								$sqlPembelian = mysqli_query($conn, "SELECT * FROM orders where kodepelanggan='$_COOKIE[id]' order by id_order desc");

                                

								?>

								<?php 
									while($pembelian = mysqli_fetch_assoc($sqlPembelian))
									{
										$sqlKurir = mysqli_query($conn, "SELECT * FROM kurirs where kurir_id='$pembelian[kurir_id]'");
										$kurir = mysqli_fetch_assoc($sqlKurir);

echo <<<EOD
										<tr>
											<td>$pembelian[id_order]</td>
											<td>$pembelian[tgl_order]</td>
											<td>$pembelian[alamat_pengirim]</td>
											<td>$pembelian[status_order]</td>
											<td>$pembelian[status_konfirmasi]</td>
											<td>$pembelian[status_terima]</td>
											<td>$kurir[kurir]</td>
											<td>$pembelian[resi]</td>
											<td>
											
												<a href="konfirmasi.php?halaman=konfirmasi&id_order=
												$pembelian[id_order]" class="btn-warning btn" value>
													<span class="glyphicon glyphicon-pencil">Konfirmasi</span></a>

												<a href="hapuskonfirmasi.php?halaman=hapuskonfirmasi&id_order=
												$pembelian[id_order]" class="btn-danger btn" onclick='return confirm("Yakin akan hapus order ini?");'>
													<span class="glyphicon glyphicon-trash">Hapus</span></a>
										
											</td>
											endif;
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