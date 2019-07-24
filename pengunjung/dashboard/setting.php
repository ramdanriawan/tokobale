<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Setting Account</title>
    <style >
      .list {list-style-type:none;}
    </style>
</head>
<body>

	<!--Pembelian-->
  <div class="container">
    <div  class="about">
      <div class="spec ">
        <h3>Akun Saya</h3>
        <div class="ser-t">
          <b></b>
          <span><i></i></span>
          <b class="line"></b>
        </div>
      </div>

      <div class="col-sm-4">
      <li class="list">
        <a href="./edit-account.php">
        <i class="fa fa-edit" style="font-size: 50px; width: 50px; height: 50px; margin-left: 90px"></i>
        <b><span style="display: block; font-size: 20px">ubah Informasi Akun Saya</span></b>
        </a>
      </li>
      </div>

        <div class="col-sm-8">
      <li class="list">
        <a href="./change-password.php">
        <i class="fa fa-lock" style="font-size: 50px; width: 50px; height: 50px; margin-left: 90px"></i>
        <b><span style="display: block; font-size: 20px">ubah Password Akun Saya</span></b>
        </a>
      </li>
      </div>
  
	
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//konfirmasi-->

</body>
</html>
<?php include_once('../_footer.php'); ?>