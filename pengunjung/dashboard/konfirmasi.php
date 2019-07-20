<?php include_once("../_headerpenggunjung.php"); ?>
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

			<form action="" method="post">
				<div>
					<!-- select kurir -->
					<label>Bank Tujuan</label>
					<select name="kurir_id" class="form-control">
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
					<input type="text" name="nama_pengirim" class="form-control" id="nama_pengirim">
				</div>

				<div class="form-group">
					<label>Rekeking Pengirim</label>
					<input type="text" name="ek_pengirim" class="form-control" id="rek_pengirim">
				</div>

				<div class="form-group">
					<label>Bukti Transfer:</label><br>
					<input type="file" name="foto1" class="form-control"  ><br>
				</div>

				<button name="submit" class="button btn btn-warning btn-block">Kirim</button>
			</form>

			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//konfirmasi-->

</body>
</html>
<?php include_once('../_footer.php'); ?>
