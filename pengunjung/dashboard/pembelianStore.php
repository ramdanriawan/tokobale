
<?php include 'cekLogin.php'; ?>
<?php 
include 'functions.php';
// print_r($_POST); die();
if ($orderInsertId = insert('orders', $_POST['orders']) )
{
	foreach ($_POST['produks'] as $key => $value)
	{
		$_POST['produks'][$key]['id_order'] = $orderInsertId;
	}

	if ( insert('order_detail', $_POST['produks']) )
	{
		delete('orders_temp', "kodepelanggan=" . $_POST['orders']['kodepelanggan']);

		header("Location: ./pembelian.php");
	}
}

 ?>