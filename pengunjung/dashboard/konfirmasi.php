<?php include_once("../_headerpenggunjung.php"); ?>

<?php 

$idorder = $_GET["id_order"];
$ambil= mysqli_query($conn, "SELECT * FROM orders WHERE id_order='$idorder'");
$detord= mysqli_fetch_assoc($ambil);

//ambil id_order pelanggan
$idorderbeli = $detord["kodepelanggan"];

//ambil kodepelanggan dari url
$kodepelangganbeli = $_COOKIE["id"];

if ($kodepelangganbeli !== $idorderbeli) 
{
	echo "<script>alert('Jangan Nakal');</script>";
	echo "<script>location='pembelian.php';</script>";

	exit();
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi</title>

	<style>
		.button:hover{
			background: #50a665;
			border-color: #50a665;
		}
	</style>
</head>
<body>
	<!--Pembelian-->
	<div class="container">
		<div  class="about">
			<div class="spec ">
				<h3>Konfirmasi Pembayaran</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>

			<form action="" method="post"  enctype="multipart/form-data">
				<div>
					<!-- select kurir -->
					<label>Bank Tujuan</label>
					<select name="kode_bank" class="form-control">
						<option value="">- Pilih Bank -</option>
						<?php 
						$result = mysqli_query($conn, "SELECT * FROM bank");
						while ($rows = mysqli_fetch_assoc($result)) {
							echo '<option value="'.$rows['kode_bank'].'">'. $rows['namabank']. $rows['atasnama'].'</option>';
						} ?>
					</select>
				</div><br>

				<div class="form-group">
					<label>Nama Pengirim</label>
					<input type="text" name="nama_penggirim" class="form-control" id="nama_penggirim">
				</div>

				<div class="form-group">
					<label>Rekeking Pengirim</label>
					<input type="text" name="rek_pengirim" class="form-control" id="rek_pengirim">
				</div>

				<div class="form-group">
					<label>Bukti Transfer:</label><br>
					<input type="file" name="bukti_transfer" class="form-control"  ><br>
				</div>

				<button name="submit" class="button btn btn-warning btn-block">Kirim</button>
			</form>

			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//konfirmasi-->

<?php 
if (isset($_POST["submit"]) )
{
	$namafile = $_FILES["bukti_transfer"]["name"];
	$ukuranfile = $_FILES["bukti_transfer"]["size"];
	$error = $_FILES["bukti_transfer"]["error"];
	$tmpname = $_FILES["bukti_transfer"]["tmp_name"];

	//cek apakah tidak ada gambar yang diupload
	if( $error === 4){
		echo "<script>
		alert ('pilih gambar terlebih dahulu!!!');	
		</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg', 'png']; //variabel untuk ektensi file yang dibolehkan diupload
	$ekstensigambar = explode('.', $namafile); //variabel untuk mengambil ekstensi gambar1
	$ekstensigambar = strtolower(end($ekstensigambar));

	//mengecek apakah ekstensi gambar yang telah diambil ada didalam ekstensigambarvalid(tidak ada)
	if ( !in_array($ekstensigambar, $ekstensigambarvalid))
	{
		echo "<script>
		alert ('yang ada upload bukan gambar!!!');	
		</script>";
		return false;
	}

	//cek jika ukurannya terlalu besar
	if ($ukuranfile > 1000000)
	{
		echo "<script>
		alert ('ukuran gambar terlalu besar!!!');	
		</script>";
		return false;
	}

	//lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpname, "../../buktipembayaran/". $namafile);
	

	$kdbank= $_POST["kode_bank"];
	$nmpeng = $_POST["nama_penggirim"];
	$rekpengirim = $_POST["rek_pengirim"];
	$tanggal = date("Y-m-d");

	mysqli_query($conn, "INSERT INTO konfirmasi(id_konfirmasi, id_order, kodepelanggan, kode_bank, nama_penggirim, rek_pengirim, tgl_konfirmasi, bukti_transfer)
		VALUES ('', '$idorder', '$idorderbeli', '$kdbank', '$nmpeng', '$rekpengirim','$tanggal','$namafile')");

	mysqli_query($conn, "UPDATE orders SET 
	status_order='Sudah Dibayar'
	WHERE id_order= $idorder");

	echo "<script>alert ('Terima Kasih Anda telah Melakukan Konfirmasi');</script>";
	echo "<script>location='./pembelian.php';</script>";


}








?>

</body>
</html>
<?php include_once('../_footer.php'); ?>
