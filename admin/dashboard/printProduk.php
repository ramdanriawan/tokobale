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

	$produks = getWhere("produk", "tgl_masuk between '$start_date' and '$end_date'");

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
		<strong>Laporan Produk</strong> <br>
		<strong>Periode <?php echo $start_date . " S/d " . $end_date; ?></strong>
	</div>
</div>

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
										<td style='text-align: center;'>{$i}</td>
										<td>{$produk['kodeproduk']}</td>
										<td>{$produk['nama_produk']}</td>
										<td>{$produk['deskripsi']}</td>
										<td> " . toRupiah($produk['harga_produk']) . "</td>
										<td>{$produk['stok']}</td>
										<td>{$produk['berat']} KG</td>
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


				</body>
				</html>

<script type="text/javascript" src="../../admin/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
		window.close();
	});
</script>