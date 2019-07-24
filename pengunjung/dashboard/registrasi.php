<?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

?>




<?php 

include_once('../_headerpenggunjung.php');


if (isset($_POST["submit"]) ) 
{
	if (registrasi($_POST) > 0) 
	{
		echo "
		<script>
		alert('Anda Telah Melakukan Registrasi!');
		document.location.href = 'login.php?halaman=login';
		</script>
		";

	}
	else
	{

		echo mysqli_error($conn); 
		echo "
		<script>
		alert('Anda Gagal Melakukan Registrasi!');
		document.location.href = 'registrasi.php?halaman=registrasi';
		</script>
		";

	}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

	<style>
		.button:hover{
			background: #50a665;
			border-color: #50a665;
		}
	</style>
</head>
<body>

	<!-- Registrasi -->

	<div class="login">
		<div class="main-agileits">
			<div class="form-w3agile form1">
				<h3>Register</h3>
				<form action="#" method="post">
					<div class="form-group">
						<i class='fa fa-user' style="font-size:15px"></i>
						<label>Nama Pelanggan</label>
						<input type="text" name="namapelanggan" class="form-control" id="namapelanggan" required>
					</div>

					<div class="form-group">
						<i class="fa fa-genderless" style="font-size:18px"></i>
						<label>Jenis Kelamin</label><br>
						<select name="jeniskelamin" class="form-control">
							<option value="" selected>- Pilih -</option>
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</div>

					<div class="form-group">
						<i class='fas fa-map-marker' style='font-size:15px'></i>
						<label>Tempat Lahir</label>
						<input type="text" name="tempatlahir" class="form-control" id="tempatlahir">
					</div>

					<div class="form-group">
						<i class="material-icons"  style="font-size:18px">cake</i>
						<label>Tanggal Lahir</label>
						<input type="date" name="tgllahir" class="form-control" id="tgllahir">
					</div>

					<div class="form-group">
						<i class="material-icons" style="font-size:18px">place</i>
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" id="alamat">
					</div>


					<div class="form-group">
						<i class="material-icons" style="font-size:18px">location_city</i>
						<label>Kota</label><br>
						<select name="id_kota" class="form-control">
							<option value="">- Pilih -</option>
							<?php 
							$result = mysqli_query($conn, "SELECT * FROM kota");
							while ($rows = mysqli_fetch_assoc($result)) {
								echo '<option value="'.$rows['id_kota'].'">'.$rows['nama_kota'].'</option>';
							} ?>
						</select>
					</div>


					<div class="form-group">
						<i class="material-icons" style="font-size:18px">phone_in_talk</i>
						<label>No Hp</label>
						<input type="text" name="nohp" class="form-control" id="nohp">
					</div>

					<div class="form-group">
						<i class="fa fa-envelope"></i>
						<label>Email</label>
						<input type="text" name="email" class="form-control" id="email">
					</div>

					<div class="form-group">
						<i class='fa fa-user' style="font-size:15px"></i>
						<label>Username</label>
						<input type="text" name="username" class="form-control" id="username">
					</div>

					<div class="form-group">
						<i class="fa fa-lock"></i>
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>

					<div class="form-group">
						<i class="fa fa-lock"></i>
						<label>Konfirmasi Password</label>
						<input type="password" name="password1" class="form-control" id="password1">
					</div>


					<div class="form-group">
						<i class='fas fa-calendar-alt' style='font-size:15px'></i>
						<label>Tanggal Daftar</label>
						<input type="date" name="tanggaldaftar" class="form-control" id="tanggaldaftar">
					</div>

					<button class="button btn btn-warning btn-block" name="submit"> Submit </button>
				</form>
			</div>

		</div>
	</div>
</body>
</html>

<?php include_once('../_footer.php'); ?>