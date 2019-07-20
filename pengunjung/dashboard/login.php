
<?php 
session_start();

//koneksi kedatabase
$conn = mysqli_connect("localhost", "root", "", "db_tokobale");

if (isset($_POST["login"])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email = '$email'");


  //cek apakah email ada didatabase
	if(mysqli_num_rows($result) === 1)
	{
      //cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"])) 
		{
        //set session
			$_SESSION["login"] = true;

	          //buat atau set cookie
				setcookie('id', $row['kodepelanggan'], time() + 3000);
				setcookie('namapelanggan', $row['namapelanggan'], time() + 3000);
				setcookie('key', hash('sha256', $row['email']), time() + 3000);

			// if (isset($_POST['remember'])) 
			// {
	  //         //buat atau set cookie
			// 	setcookie('id', $row['kodepelanggan'], time() + 3000);
			// 	setcookie('namapelanggan', $row['namapelanggan'], time() + 3000);
			// 	setcookie('key', hash('sha256', $row['email']), time() + 3000);
			// }

			header("Location: homepengunjung.php");

			// echo "<script>location.href = './homepelanggan.php'</script>";
			exit;
		}
	}
	$error = true;



}





?>

<?php include_once('../_headerpenggunjung.php'); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


	<!--login-->


	<div class="login">

		<div class="main-agileits">
			<div class="form-w3agile">
				<h3>Login</h3>
				<?php if (isset($error)): ?> 
					<p style="color: red; font-style: italic;"> Email / Password salah</p>
				<?php endif ?>

				<form action="#" method="post">
					<div class="form-group">
						<i class="fa fa-envelope"></i>
						<label>Email</label>
						<input type="text" name="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<!-- <span><label><input type="checkbox" name="remember" />Remember Me</span></label><br><br> -->
					<input type="submit" value="Login" name="login">
				</form>
			</div><br>
			<div class="forg">
				<a href="#" class="forg-left">Forgot Password</a>
				<a href="../dashboard/registrasi.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</body>
</html>

<?php include_once('../_footer.php'); ?>