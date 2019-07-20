<?php include_once('../_header.php'); ?>


<?php 

include 'functions.php';

if (isset($_POST["submit"])) {
	if (tambahadmin($_POST) > 0) {
		echo "
		<script>
		alert ('Data Admin Telah Tersimpan!');
		document.location.href = 'admin.php?halaman=admin';
		</script>
		";
	}
	else{
		echo mysqli_error($conn); die;
		echo "
		<script>
		alert ('Data Admin Gagal Tersimpan!');
		document.location.href = 'admin.php?halaman=admin';
		</script>
		";
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Admin</title>

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
	<h1 class="title_tambah">Tambah Admin</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" id="username" required>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" id="password">
		</div>

		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" name="namalengkap" class="form-control" id="namalengkap">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" id="email">
		</div>

		<div class="form-group">
			<label>No Telepon</label>
			<input type="text" name="notelpon" class="form-control" id="notelpon">
		</div>

		<div class="form-group">
			<label>Level</label><br>
		<select name="level" class="form-control">
			<option value="" selected>--Pilih--</option>
			<option value="pegawai">Pegawai</option>
		</select>
	</div>

		<button class="btn btn-primary btn-block" name="submit"> Simpan </button>
	</form>	

</body>
<script type="text/javascript">
	function validate(form)
	{
		namalengkap= /^[a-zA-Z- ]+$/;
		notelpon= /^[0-9]+$/;
		email= /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

		if ( document.myForm.username.value== "") {
			alert("Username Harus Diiisi");
			document.myForm.username.focus();
			return false;
		}
		if (document.myForm.password.value== "") {
			alert("Password Harus Diisi");
			document.myForm.password.focus();
			return false;
		}
		if ( document.myForm.namalengkap.value== "") {
			alert("Nama Lengkap Harus Diiisi");
			document.myForm.namalengkap.focus();
			return false;
		}
		if (document.myForm.email.value== "") {
			alert("Email Harus Diisi");
			document.myForm.email.focus();
			return false;
		}
		if (document.myForm.notelpon.value== "") {
			alert("No Telepon Harus Diisi");
			document.myForm.notelpon.focus();
			return false;
		}
		if (!email.test(form.email.value)){
			alert ('Penulisan Email tidak benar');
			form.email.focus();
			return false;	
		}
		if (!notelpon.test(form.notelpon.value)){
			alert ('No Telepon hanya boleh Angka !');
			form.notelpon.focus();
			return false;
		}	
		if (!namalengkap.test(form.namalengkap.value)){
			alert ('Nama hanya boleh Huruf !');
			form.namalengkap.focus();
			return false;
		}
		return( true );
	}
</script>

</html>
<?php include_once('../_footer.php'); ?>