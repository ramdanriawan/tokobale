<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

//ambil data
$pelanggan = pelanggan("SELECT kodepelanggan, namapelanggan, alamat,id_kota, nohp, email FROM pelanggan");

if (isset($_POST["submit"]) ) 
{
	if (tambahpelanggan($_POST) > 0) 
	{
		echo "
		<script>
		alert('Data Pelanggan Telah Tersimpan!');
		document.location.href = 'pelanggan.php?halaman=pelanggan';
		</script>
		";

	}
	else
	{

		echo mysqli_error($conn); 
		echo "
		<script>
		alert('Data Pelanggan gagal Tersimpan!');
		document.location.href = 'tambahpelanggan.php?halaman=tambahpelanggan';
		</script>
		";

	}


}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pelanggan</title>

	<style >
	.title_tambah{
		margin: 2px;
		padding: 5px;
		border: 1px solid black;
		background-color: grey;
		text-align: center;	
		border-radius: 3px;
	}
</style>
</head>
<body>

	<h1 class="title_tambah"> Tambah Pelangan</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>Nama Pelanggan</label>
			<input type="text" name="namapelanggan" class="form-control" id="namapelanggan" required>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label><br>
			<select name="jeniskelamin" class="form-control">
				<option value="" selected>- Pilih -</option>
				<option value="laki-laki">Laki-Laki</option>
				<option value="perempuan">Perempuan</option>
			</select>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempatlahir" class="form-control" id="tempatlahir">
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgllahir" class="form-control" id="tgllahir">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" id="alamat">
		</div>


		<div class="form-group">
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
			<label>No Hp</label>
			<input type="text" name="nohp" class="form-control" id="nohp">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" id="email">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" id="username">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" id="password">
		</div>

		<div class="form-group">
			<label>Konfirmasi Password</label>
			<input type="password" name="password1" class="form-control" id="password1">
		</div>


		<div class="form-group">
			<label>Tanggal Daftar</label>
			<input type="date" name="tanggaldaftar" class="form-control" id="tanggaldaftar">
		</div>

		<button class="btn btn-primary btn-block" name="submit"> Simpan </button>

	</form>
</body>

<script type="text/javascript">
	function validate(form)
	{
		namapelanggan= /^[a-zA-Z- ]+$/;
		nohp= /^[0-9]+$/;
		email= /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

		if ( document.myForm.namapelanggan.value== "") {
			alert("Nama Pelanggan Harus Diiisi");
			document.myForm.namapelanggan.focus();
			return false;
		}
		if ( document.myForm.jeniskelamin.value== "") {
			alert("Jenis Kelamin Harus Diiisi");
			document.myForm.jeniskelamin.focus();
			return false;
		}
		if (document.myForm.tempatlahir.value== "") {
			alert("Tempat Lahir Harus Diisi");
			document.myForm.tempatlahir.focus();
			return false;
		}
		if (document.myForm.tgllahir.value== "" ) {
			alert("Tanggal Lahir Harus Diisi");
			document.myForm.tgllahir.focus();
			return false;
		}
		if (document.myForm.alamat.value== "") {
			alert("Alamat Harus Diisi");
			document.myForm.alamat.focus();
			return false;
		}
		if (document.myForm.nohp.value== "") {
			alert("No Hp Harus Diisi");
			document.myForm.nohp.focus();
			return false;
		}
		if (document.myForm.email.value== "") {
			alert("Email Harus Diisi");
			document.myForm.email.focus();
			return false;
		}
		if (document.myForm.password.value== "") {
			alert("Password Harus Diisi");
			document.myForm.password.focus();
			return false;
		}
		if (document.myForm.password1.value== "") {
			alert("Password Harus Diisi");
			document.myForm.password1.focus();
			return false;
		}
		if (document.myForm.tanggaldaftar.value== "") {
			alert("Tanggal Daftar Harus Diisi");
			document.myForm.tanggaldaftar.focus();
			return false;
		}
		if (!email.test(form.email.value)){
			alert ('Penulisan Email tidak benar');
			form.email.focus();
			return false;	
		}
		if (!nohp.test(form.nohp.value)){
			alert ('No Hp hanya boleh Angka !');
			form.nohp.focus();
			return false;
		}	
		if (!namapelanggan.test(form.namapelanggan.value)){
			alert ('Nama hanya boleh Huruf !');
			form.namapelanggan.focus();
			return false;
		}
		return( true );
	}
</script>

</html>

<?php include_once('../_footer.php'); ?>