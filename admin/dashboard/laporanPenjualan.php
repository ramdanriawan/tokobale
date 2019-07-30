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

if (isset($_GET['start_date']) && isset($_GET['end_date']))
{
	$start_date = $_GET['start_date'];
	$end_date = date('Y-m-d', strtotime($_GET['end_date']));
	$orders = selectWhere("id_order", "orders", "tgl_order between '$start_date' and '$end_date' ");

	foreach ( $orders as $order_detail )
	{
		$orders_detail[] = getWhere("order_detail", "id_order='$order_detail[id_order]'");
	}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Laporan Penjualan</h1>
	</div>
	<div style="  margin-top: 20px;
	margin-bottom:  20px;
	border-top: 1px solid black;"></div>

	<div style="margin: 5px; padding:5px 10px 5px 10px; border: 1px solid black; background-color: white;">
		<form action="" method="get">
			<div style=" float: left; display: block; margin-top: 5px;">
				<input type="date" name="start_date" value="<?php echo $_GET['start_date'] ?? date("Y-m-d"); ?>"> Sampai ke: 
				<input type="date" name="end_date" value="<?php echo $_GET['end_date'] ?? date("Y-m-d"); ?>">
				<input type="hidden" name="halaman" value="<?php echo $_GET['halaman']; ?>">
				<button type="submit" class="btn btn-info" name="cari" >
					<span class="glyphicon glyphicon-search" ></span>
				</button>
			</div>
		</form>
		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a> <a class="btn btn-secondary" style="margin-left: 10px;margin-top: 5px;" onclick="window.open(location.href.replace('laporanPenjualan.php', 'printPenjualan.php'), '_blank')"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>

				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">

								<th>No. </th>
								<th>Nama Produk</th>
								<th>Size</th>
								<th>Jumlah</th>
								<th>Harga Satuan</th>
								<th>Diskon</th>
								<th>Total - Diskon</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$jumlah = 0;
							$totalHargaSemua = 0;
							$i = 1;
							foreach ($orders_detail as $order_detail)
							{
								foreach ($order_detail as $order_detail2)
								{
									$produk = selectWhere("nama_produk, diskon", "produk", "kodeproduk='{$order_detail2['kodeproduk']}'");

									$jumlah += $order_detail2['jumlah'];
									$totalHarga = $order_detail2['total'] - ($order_detail2['total'] * ($produk[0]['diskon'] / 100));
									$totalHargaSemua += $totalHarga;

echo "
									<tr>
										<td>{$i}</td>
										<td>{$produk[0]['nama_produk']}</td>
										<td>{$order_detail2['size']}</td>
										<td>{$order_detail2['jumlah']}</td>
										<td>" . toRupiah($order_detail2['harga_satuan']) . "</td>
										<td>{$produk[0]['diskon']}%</td>
										<td>" . toRupiah($totalHarga) . "</td>
									</tr>
";	
$i++;
								}

							}

							?>	
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><?php echo $jumlah; ?></td>
									<td></td>
									<td></td>
									<td><?php echo toRupiah($totalHargaSemua); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>


				</body>
				</html>
<?php include_once('../_footer.php'); ?>