<?php
include 'functions.php';

	mysqli_query($conn, "DELETE FROM orders_temp WHERE id_order_temp = '$_GET[id]'");

	header("Location: $_SERVER[HTTP_REFERER]");

 ?>