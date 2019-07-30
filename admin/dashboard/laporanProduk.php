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

	$produks = getWhere("produk", "tgl_masuk between '$start_date' and '$end_date'");

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Laporan Produk</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Laporan Produk</h1>
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
		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a> <a class="btn btn-secondary" style="margin-left: 10px;margin-top: 5px;" onclick="window.open(location.href.replace('laporanProduk.php', 'printProduk.php'), '_blank')"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>

				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">

								<th>No. </th>
								<th>Kode</th>
								<th>Nama Produk</th>
								<th>Deskripsi</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Berat</th>
								<th>Foto 1</th>
								<th>Foto 2</th>
								<th>Ukuran</th>
								<th>Diskon</th>
								<th>Tgl Masuk</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$stok = 0;
							$i = 1;
							foreach ($produks as $produk)
							{
echo "
									<tr>
										<td>{$i}</td>
										<td>{$produk['kodeproduk']}</td>
										<td>{$produk['nama_produk']}</td>
										<td>{$produk['deskripsi']}</td>
										<td> " . toRupiah($produk['harga_produk']) . "</td>
										<td>{$produk['stok']}</td>
										<td>{$produk['berat']}</td>
										<td>
											<img src='../../images/{$produk['foto1']}' width='120' height='170' />
										</td>
										<td>
											<img src='../../images/{$produk['foto2']}' width='120' height='170' />
										</td>
										<td>{$produk['ukuran']}</td>
										<td>{$produk['diskon']}%</td>
										<td>{$produk['tgl_masuk']}</td>
									</tr>
";	
$i++;
$stok += $produk['stok'];
							}

							?>	
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><?php echo $stok; ?></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>


				</body>
				</html>
<?php include_once('../_footer.php'); ?>