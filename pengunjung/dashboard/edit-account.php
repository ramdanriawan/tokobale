
<?php include 'cekLogin.php'; ?>

<?php include_once("../_headerpenggunjung.php"); ?>

<?php 

$kodepelanggan = $_COOKIE["id"];
$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE  kodepelanggan=$kodepelanggan");
$ambil = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, "SELECT * FROM kota where id_kota='$ambil[id_kota]'");
$ambil2 = mysqli_fetch_assoc($result2);

if (isset($_POST["submit"])) 
{
  $kodepelanggan = $_COOKIE["id"];
  $nmpelanggan = $_POST["namapelanggan"];
  $alamat = $_POST["alamat"];
  $kota = $_POST["kota"];
  $nohp = $_POST["nohp"];
  $email = $_POST["email"];
  mysqli_query($conn, "UPDATE pelanggan SET 
    namapelanggan = '$nmpelanggan',
    alamat = '$alamat',
    kota= '$kota',
    nohp = '$nohp',
    email = '$email'
    WHERE kodepelanggan=$kodepelanggan");
  


  echo "<script>alert('Data Pelanggan Telah diubah!');</script>";
  echo "<script>location='setting.php';</script>";


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
        <input type="hidden" name="kodepelanggan" value="<?php echo $ambil['kodepelanggan']; ?>">

    <div class="form-group">
      <label>Nama Pelanggan</label>
      <input type="text" name="namapelanggan" class="form-control" id="namapelanggan" required value="<?php echo $ambil['namapelanggan']; ?>">
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $ambil['alamat']; ?>">
    </div>

    <!-- select kota -->
    <label>Kota</label>
    <select name="kota" id="kota" class="form-control"  data-namakota-default='<?php echo $ambil2["nama_kota"] ?>'>
      <option value="">--Pilih Kota--</option>
      <?php 


      $result3 = mysqli_query($conn, "SELECT * FROM kota");
      ?>



      <?php while ($ambil3 = mysqli_fetch_assoc($result3))
      {
        $selected = $ambil3['id_kota'] == $ambil2['id_kota'] ? "selected": "";

        echo "<option value='$ambil3[id_kota]' $selected class='form-control input-sm' data-namakota-default='$ambil3[nama_kota]'>$ambil3[nama_kota] </option>";
      } ?>
    </select><br>

    <div class="form-group">
      <label>No Hp</label>
      <input type="text" name="nohp" class="form-control" id="nohp" value="<?php echo $ambil['nohp']; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" id="email" value="<?php echo $ambil['email']; ?>">
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