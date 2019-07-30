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

	$pelanggans = getWhere("pelanggan", "tanggaldaftar between '$start_date' and '$end_date'");

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pelanggan</title>

	<style >
	.baris:nth-child(odd){
		background-color:  grey;

	</style>
</head>
<body>
	<div style="margin-top: 8px;">
		<h1> Laporan Pelanggan</h1>
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
		 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a> <a class="btn btn-secondary" style="margin-left: 10px;margin-top: 5px;" onclick="window.open(location.href.replace('laporanPelanggan.php', 'printPelanggan.php'), '_blank')"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>

				<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">

								<th>No. </th>
								<th>Kode</th>
								<th>Nama Pelanggan</th>
								<th>J. Kelamin</th>
								<th>Tmpat Lahir</th>
								<th>Tgl Lahir</th>
								<th>Alamat</th>
								<th>Kota</th>
								<th>No Hp</th>
								<th>Email</th>
								<th>Username</th>
								<th>Tgl Daftar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach ($pelanggans as $pelanggan)
							{
								$kota = getWhere('kota', "id_kota='$pelanggan[id_kota]'")[0]['nama_kota'];
echo "
									<tr>
										<td>{$i}</td>
										<td>{$pelanggan['kodepelanggan']}</td>
										<td>{$pelanggan['namapelanggan']}</td>
										<td>{$pelanggan['jeniskelamin']}</td>
										<td> {$pelanggan['tempatlahir']}</td>
										<td>{$pelanggan['tgllahir']}</td>
										<td>{$pelanggan['alamat']}</td>
										<td>{$kota}</td>
										<td>{$pelanggan['nohp']}</td>
										<td>{$pelanggan['email']}</td>
										<td>{$pelanggan['username']}</td>
										<td>{$pelanggan['tanggaldaftar']}</td>
									</tr>
";	
$i++;
							}

							?>	
							</tbody>
						</table>
					</div>
				</div>


				</body>
				</html>
<?php include_once('../_footer.php'); ?>