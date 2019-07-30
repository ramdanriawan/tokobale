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

<?php 

require 'functions.php';

if (isset($_GET['start_date']) && isset($_GET['end_date']))
{
	$start_date = $_GET['start_date'];
	$end_date = date('Y-m-d', strtotime($_GET['end_date']));

	$pelanggans = getWhere("pelanggan", "tanggaldaftar between '$start_date' and '$end_date'");

}

?>


<style type="text/css">
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

td.no_border {
    border: 1px solid white;
    border-top: none;
}
</style>

<div style="border: 2px dotted black; border-radius: 5px;">
	<div style="text-align: center;">
		<strong>Toko Bale</strong> <br>
		<strong>Laporan Pelanggan</strong> <br>
		<strong>Periode <?php echo $start_date . " S/d " . $end_date; ?></strong>
	</div>
</div>

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
										<td style='text-align: center;'>{$i}</td>
										<td>{$pelanggan['kodepelanggan']}</td>
										<td>{$pelanggan['namapelanggan']}</td>
										<td>{$pelanggan['jeniskelamin']}</td>
										<td> " . toRupiah($pelanggan['tempatlahir']) . "</td>
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

							<tfoot style="border: none;">
								<tr style="padding-top: 50px;">
									<td class="no_border">
										<span style="margin-bottom: -120px; display: inline-block;">Jambi, <?php echo date('d-m-Y'); ?></span><br>
										<img src="../../images/tanda_tangan.png" with="100" height="100" style="margin-left: -50px; margin-bottom: -20px;"><br>
										<span style="margin-top: -5px; display: inline-block;">Febby Febriana</span>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

<script type="text/javascript" src="../../admin/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
		window.close();
	});
</script>