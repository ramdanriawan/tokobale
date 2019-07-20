<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';

$kdplgn = $_GET["kodepelanggan"];

$ambil = mysqli_query($conn, "SELECT kodepelanggan, namapelanggan, alamat,id_kota, nohp, email FROM pelanggan WHERE kodepelanggan= $kdplgn");
$pecah = mysqli_fetch_assoc($ambil);

pelanggan("SELECT kodepelanggan, namapelanggan, alamat,nama_kota, nohp, email FROM pelanggan");

$ambil2 = mysqli_query($conn, "SELECT * FROM kota where id_kota='$pecah[id_kota]'");
$pecah2 = mysqli_fetch_assoc($ambil2);

if (isset($_POST["submit"])) 
{
	
	if (ubahpelanggan($_POST) > 0) 
	{
		echo "
		<script>
		alert('Data Pelanggan Telah diubah!');
		document.location.href = 'pelanggan.php?halaman=pelanggan';
		</script>
		";

	}
	else
	{

		echo mysqli_error($conn); die;  
		echo "
		<script>
		alert('Data Pelanggan Tidak diubah!');
		document.location.href = 'pelanggan.php?halaman=pelanggan';
		</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Pelanggan</title>
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


	<h1 class="title_ubah"> Ubah Pelanggan</h1><br>

	<form action="" method="post" name="myForm" onsubmit="return(validate(this))">

		<input type="hidden" name="kodepelanggan" value="<?php echo $pecah['kodepelanggan']; ?>">

		<div class="form-group">
			<label>Nama Pelanggan</label>
			<input type="text" name="namapelanggan" class="form-control" id="namapelanggan" required value="<?php echo $pecah['namapelanggan']; ?>">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $pecah['alamat']; ?>">
		</div>

		<!-- select kota -->
		<label>Kota</label>
		<select name="kota" id="kota" class="form-control"  data-namakota-default='<?php echo $pecah2["nama_kota"] ?>'>
			<option value="">--Pilih Kota--</option>
			<?php 


			$ambil3 = mysqli_query($conn, "SELECT * FROM kota");
			?>



			<?php while ($pecah3 = mysqli_fetch_assoc($ambil3))
			{
				$selected = $pecah3['id_kota'] == $pecah2['id_kota'] ? "selected": "";

				echo "<option value='$pecah3[id_kota]' $selected class='form-control input-sm' data-namakota-default='$pecah3[nama_kota]'>$pecah3[nama_kota] </option>";
			} ?>
		</select>

		<div class="form-group">
			<label>No Hp</label>
			<input type="text" name="nohp" class="form-control" id="nohp" value="<?php echo $pecah['nohp']; ?>">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $pecah['email']; ?>">
		</div>

		<button class="btn btn-primary btn-block" name="submit"> Ubah </button>

	</form>
</body>

<script type="text/javascript">
	function validate(form)
	{

		if ( document.myForm.namapelanggan.value== "") {
			alert("Nama Pelanggan Harus Diiisi");
			document.myForm.namapelanggan.focus();
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
		email= /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if (!email.test(form.email.value)){
			alert ('Penulisan Email tidak benar');
			form.email.focus();
			return false;	
		}
		nohp= /^[0-9]+$/;
		if (!nohp.test(form.nohp.value)){
			alert ('No Hp hanya boleh Angka !');
			form.nohp.focus();
			return false;
		}
		namapelanggan= /^[a-zA-Z-' ]+$/;	
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