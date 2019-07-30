<?php include_once('../_headerlogin.php'); ?>

<?php 
session_start();
require 'functions.php';

if(isset($_COOKIE['konfirmasiLogin']))
{
	echo "<script> alert('Kamu harus login terlebih dahulu!'); </script>";
}

if (isset($_POST["login"])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");

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
				setcookie('id', $row['id_admin'], time() + 3000);

				setcookie('username', $row['username'], time() + 3000);

				setcookie('key', hash('sha256', $row['email']), time() + 3000);

				setcookie('level', $row['level'], time() + 3000);
			

   //      //cek remember me
			// if (isset($_POST['remember'])) 
			// {
   //        //buat atau set cookie
			// 	setcookie('id', $row['id_admin'], time() + 3000);

			// 	setcookie('username', $row['username'], time() + 3000);

			// 	setcookie('key', hash('sha256', $row['email']), time() + 3000);
			// }
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}
  



?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Sign In Now</h2>
			<?php if (isset($error)): ?> 
				<p style="color: red; font-style: italic;"> Email / Password salah</p>
			<?php endif ?>
			<form action="" method="post">
				<input type="email" class="ggg" name="email" placeholder="EMAIL" required="">
				<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
		<!-- 		<span><label><input type="checkbox" name="remember" />Remember Me</span></label> -->
				<div class="clearfix"></div>
				<input type="submit" value="login" name="login">
			</form>
		</div>
	</div>
	<?php include_once('../_footerlogin.php'); ?>
</body>
</html>