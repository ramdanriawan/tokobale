
<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<?php 

$kodepelanggan = $_COOKIE["id"];
$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE  kodepelanggan=$kodepelanggan");
$ambil = mysqli_fetch_assoc($result);





?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Account</title>
    <style >
      .list {list-style-type:none;}
    </style>
</head>
<body>

	<!--Pembelian-->
  <div class="container">
    <div  class="about">
      <div class="spec ">
        <h3>Informasi Akun Saya</h3>
        <div class="ser-t">
          <b></b>
          <span><i></i></span>
          <b class="line"></b>
        </div>
      </div>

      <form action="" method="post">
        <input type="hidden" name="kodepelanggan" value="<?php echo $ambil['kodepelanggan']; ?>">

    <div class="form-group">
            <i class="fa fa-lock"></i>
            <label>Password Lama</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>


    <div class="form-group">
            <i class="fa fa-lock"></i>
            <label>Password Baru</label>
            <input type="password" name="password1" class="form-control" id="password1">
          </div>

          <div class="form-group">
            <i class="fa fa-lock"></i>
            <label>Konfirmasi Password</label>
            <input type="password" name="password2" class="form-control" id="password2">
          </div>

    <button class="btn btn-warning btn-block" name="submit"> Ubah </button><br>
        
      </form>

      <div style="float: right;">
       <a href="./setting.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>
     </div>
  
	
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//konfirmasi-->

</body>
</html>
<?php include_once('../_footer.php'); ?>