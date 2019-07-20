
<?php include 'cekLogin.php'; ?>
<?php 
include 'functions.php';
// print_r($_POST); die();
if ($orderInsertId = insert($_POST['orders'], 'orders') )
{
	foreach ($_POST['produks'] as $key => $value)
	{
		$_POST['produks'][$key]['id_order'] = $orderInsertId;
	}

	if ( insert($_POST['produks'], 'order_detail') )
	{
		delete("kodepelanggan=" . $_POST['orders']['kodepelanggan'], 'orders_temp');

		header("Location: ./pembelian.php");
	}
}

 ?>