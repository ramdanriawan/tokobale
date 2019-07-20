<?php include_once('../_header.php'); ?>


<?php 


require 'functions.php';

$idadm = $_GET['id_admin'];

$result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $idadm");
$rows = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) 
{
	
	if(ubahadmin($_POST) > 0)
	{
		echo "
		<script> 
		alert('Data Admin Telah diubah!');
		document.location.href = 'admin.php?halaman=admin';
		</script>
		";
	}
	else
	{
		echo mysqli_error($conn);    
		echo "
		<script>
		alert('Data Admin Tidak diubah!');
		document.location.href = 'admin.php?halaman=admin';
		</script>
		";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Admin</title>
	<style >
		.title_ubah{
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

	<div>
		<h1 class="title_ubah"> Ubah Admin </h1><br>
	</div>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<input type="hidden" name="id_admin" value="<?php echo $rows['id_admin']; ?>">
		<div class="form-group">
			<label> Username </label>
			<input type="text" name="username" class="form-control" id="username" required value="<?php echo $rows['username']; ?>">	
		</div>

		<div class="form-group">
			<label> Password </label>
			<input type="password" name="password" class="form-control" id="password" value="<?php echo $rows['password']; ?>">	
		</div>

		<div class="form-group">
			<label> Nama Lengkap</label>
			<input type="text" name="namalengkap" class="form-control" id="namalengkap" value="<?php echo $rows['namalengkap']; ?>">	
		</div>

		<div class="form-group">
			<label> Email </label>
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>">	 
		</div>

		<div class="form-group">
			<label> No Telpon</label>
			<input type="text" name="notelpon" class="form-control" id="notelpon" value="<?php echo $rows['notelpon']; ?>">	
		</div>

		<div class="form-group">
			<label>Level</label><br>
		<select name="level" class="form-control" disabled>
			<option value="" selected>--Pilih--</option>
			<option value="admin">Admin</option>
			<option value="pegawai">Pegawai</option>
		</select>
	</div>

		<button class="btn btn-primary btn-block" name="submit"> Ubah </button>
	</form>

</body>

<script type="text/javascript">
	function validate(form)
	{
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
		if (document.myForm.namalengkap.value== "") {
			alert("Nama Lengkap Harus Diisi");
			document.myForm.namalengkap.focus();
			return false;
		}
		if (document.myForm.email.value== "") {
			alert("Email Harus Diisi");
			document.myForm.email.focus();
			return false;
		}
		if (document.myForm.notelpon.value== "") {
			alert("No Telpon Harus Diisi");
			document.myForm.notelpon.focus();
			return false;
		}
		email= /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if (!email.test(form.email.value)){
			alert ('Penulisan Email tidak benar');
			form.email.focus();
			return false;	
		}
		notelpon= /^[0-9]+$/;
		if (!notelpon.test(form.notelpon.value)){
			alert ('No Telpon hanya boleh Angka !');
			form.notelpon.focus();
			return false;
		}
		namalengkap= /^[a-zA-Z- ]+$/;		
		if (!namalengkap.test(form.namalengkap.value)){
			alert ('Nama Lengkap hanya boleh Huruf !');
			form.namalengkap.focus();
			return false;
		}
		return ( true );
	}

</script>
</html>

<?php include_once('../_footer.php'); ?>