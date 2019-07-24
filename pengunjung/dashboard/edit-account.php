
<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<?php 

$kodepelanggan = $_COOKIE["id"];
$sqlPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE  kodepelanggan=$kodepelanggan");
$pelanggan = mysqli_fetch_assoc($sqlPelanggan);

$sqlKotaPelanggan = mysqli_query($conn, "SELECT * FROM kota where id_kota='$pelanggan[id_kota]'");
$kotaPelanggan = mysqli_fetch_assoc($sqlKotaPelanggan);

if (isset($_POST["submit"])) 
{
  // print_r($_POST); die();
  unset($_POST['submit'], $_POST['kodepelanggan']);
  update('pelanggan', $_POST, "kodepelanggan='$kodepelanggan'");
  // die(mysqli_error($conn));

  // echo "<script>alert('Data Pelanggan Telah diubah!');</script>";
  // echo "<script>location='setting.php';</script>";


}




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
        <input type="hidden" name="kodepelanggan" value="<?php echo $pelanggan['kodepelanggan']; ?>">

    <div class="form-group">
      <label>Nama Pelanggan</label>
      <input type="text" name="namapelanggan" class="form-control" id="namapelanggan" required value="<?php echo $pelanggan['namapelanggan']; ?>">
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $pelanggan['alamat']; ?>">
    </div>

    <!-- select kota -->
    <label>Kota</label>
    <select name="id_kota" id="kota" class="form-control"  data-namakota-default='<?php echo $kotaPelanggan["nama_kota"] ?>'>
      <option value="">--Pilih Kota--</option>
      <?php 


      $sqlKotas = mysqli_query($conn, "SELECT * FROM kota");
      ?>



      <?php while ($kotas = mysqli_fetch_assoc($sqlKotas))
      {
        $selected = $kotas['id_kota'] == $kotaPelanggan['id_kota'] ? "selected": "";

        echo "<option value='$kotas[id_kota]' $selected class='form-control input-sm' data-namakota-default='$kotas[nama_kota]'>$kotas[nama_kota] </option>";
      } ?>
    </select><br>

    <div class="form-group">
      <label>No Hp</label>
      <input type="text" name="nohp" class="form-control" id="nohp" value="<?php echo $pelanggan['nohp']; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" id="email" value="<?php echo $pelanggan['email']; ?>">
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