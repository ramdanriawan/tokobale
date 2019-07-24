<?php 
error_reporting();


//htmlspecialchars = untuk menonaktifkan tag html 
//strtolower = agar huruf pertama tetap kecil
//stripcslashes = untuk menghindari \ (slash) masuk kedalam database
/*mysqli_real_escape_string = untuk mencegah sql injection seperti (dalam kasus yang pernah saya alami ketika saya membuat sebuah form yang akan saya input datanya kedalam database, lalu saya menginput kata “jum’at” didalam inputannya)*/


//koneksi kedatabase
$conn = mysqli_connect("localhost", "root", "", "db_tokobale");

function registrasi($dtplgn)
{
	global $conn;
	$nama = mysqli_real_escape_string($conn, htmlspecialchars($dtplgn["namapelanggan"]));
	$jk = htmlspecialchars($dtplgn["jeniskelamin"]);
	$tmplahir = htmlspecialchars($dtplgn["tempatlahir"]);
	$tgllahir = htmlspecialchars($dtplgn["tgllahir"]);
	$alamat = htmlspecialchars($dtplgn["alamat"]);
	$idkota = htmlspecialchars($dtplgn["id_kota"]);
	$nohp= htmlspecialchars($dtplgn["nohp"]);
	$email = htmlspecialchars(strtolower(stripcslashes($dtplgn["email"])));
	$username = htmlspecialchars(strtolower(stripcslashes($dtplgn["username"])));
	$password = htmlspecialchars($dtplgn["password"]);
	$password1 = htmlspecialchars($dtplgn["password1"]);
	$tgldaftar = htmlspecialchars($dtplgn["tanggaldaftar"]);

	//cek konfirmasi password
	if($password !== $password1) {
		echo "
			<script> 
					alert('konfirmasi password tidak sesuai!');
			</script>
		";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO pelanggan
		VALUES 
		('', '$nama', '$jk', '$tmplahir', '$tgllahir', '$alamat', '$idkota','$nohp', '$email', '$username', '$password', '$tgldaftar')");

	return mysqli_affected_rows($conn);
}
function hapuskonfirmasi($idorder)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM orders WHERE id_order = $idorder");

	return mysqli_affected_rows($conn);
}

####################
//edited by ramdan
function toRupiah($number)
{
	if ( is_numeric($number) )
	{

		return "Rp" . number_format($number, 0, ',', '.');
	}
}

function fromRupiah($rupiah)
{
	return (int) str_replace('Rp', '', str_replace('.', '', $rupiah));
}

function makeQuotes($value)
{
	return "'$value'";
}

function makeMultiValues($request)
{

	//cek ika array multidimensi
	if (isset($request[0]))
	{
		foreach ($request as $key => $value)
		{
			$value = array_map('makeQuotes', $value);

			$data[] = "(" . implode($value, ',') . ")";		
		}

		return implode($data, ',');
	}

	$request = array_map('makeQuotes', $request);

	return "(" . implode($request, ',') . ")";	
}

function getKeys($request)
{
	//cek jika array multidimensi
	if (isset($request[0]))
	{
		return "(" . implode(array_keys($request[0]), ',') . ")";
	}

	return "(" . implode(array_keys($request), ',') . ")";
}

function getQueryInsert($table, $request)
{
	return "INSERT INTO $table " . getKeys($request) . " VALUES " . makeMultiValues($request);
}

function insert($table, $request) 
{
	global $conn;
	
	mysqli_query($conn, getQueryInsert($table, $request));

	return mysqli_insert_id($conn);
}

function getQueryUpdate($table, $request, $where)
{
	$string = "";
	foreach ($request as $key => $value)
	{
		$string .= " $key='$value', ";
	}

	$string = substr($string, 0, strlen($string) - 2);
	
	return "UPDATE $table set $string where $where";
}

function update($table, $request, $where)
{
	global $conn;
	
	mysqli_query($conn, getQueryUpdate($table, $request, $where));

	return mysqli_affected_rows($conn);
}

function delete($table, $where)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM $table WHERE $where");

	return mysqli_affected_rows($conn);	
}
####################
?>