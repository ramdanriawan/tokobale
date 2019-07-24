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
	$end_date = date('Y-m-d');
	$orders = selectWhere("id_order", "orders", "tgl_order between '$start_date' and '$end_date' ");

	foreach ( $orders as $order_detail )
	{
		$orders_detail[] = getWhere("order_detail", "id_order='$order_detail[id_order]'");
	}

}

?>

<div class="table-responsive" style="padding-top: 5px">
					<table class="table table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr style="background-color: #ccc">
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
										<td>{$produk[0]['nama_produk']}</td>
										<td>{$order_detail2['size']}</td>
										<td>{$order_detail2['jumlah']}</td>
										<td>" . toRupiah($order_detail2['harga_satuan']) . "</td>
										<td>{$produk[0]['diskon']}%</td>
										<td>" . toRupiah($totalHarga) . "</td>
									</tr>
";	
								}

							}

							?>	
								<tr>
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

					<script type="text/javascript">
						window.print();
						window.close();
					</script>