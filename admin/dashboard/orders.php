<?php include_once('../_header.php'); ?>

<?php 

require 'functions.php';


//pagination
$jumlahdataperhalaman = 5;

$jumlahData = count(orders("SELECT pelanggan.namapelanggan, orders.tgl_order, orders.alamat_pengirim,
	kota.nama_kota, orders.status_order, orders.status_konfirmasi, orders.status_terima 
	FROM orders JOIN pelanggan ON orders.kodepelanggan=pelanggan.kodepelanggan
	JOIN kota ON orders.id_kota=kota.id_kota JOIN kurirs ON orders.kurir_id=kurirs.kurir_id "));


$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

$halamanAktif =  ( isset($_GET["page"]) ) ? $_GET["page"] : 1;

$awalData = ($jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;


$orders = orders("SELECT * FROM orders JOIN pelanggan ON 
	orders.kodepelanggan=pelanggan.kodepelanggan JOIN kota ON
	orders.id_kota=kota.id_kota JOIN kurirs ON orders.kurir_id=kurirs.kurir_id LIMIT $awalData, $jumlahdataperhalaman");




	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Data Orders</title>

		<style >
		.baris:nth-child(odd){
			background-color:  grey;

		</style>
	</head>
	<body>
		<div style="margin-top: 8px;">
			<h1> Data Orders </h1>
		</div>
		<div style="  margin-top: 20px;
		margin-bottom:  20px;
		border-top: 1px solid black;"></div>

		<div style="margin: 5px; padding:5px 10px 5px 10px; border: 1px solid black; background-color: white;">
			<form action="" method="post">
				<div style=" float: left; display: block; margin-top: 5px;">
					<input type="text" name="keyword" size="30" placeholder="Pencarian">
					<button type="button" class="btn btn-info" name="cari" >
						<span class="glyphicon glyphicon-search" ></span>
					</button>
				</div>
			</form>

			<!-- <div style=" float: right; display: block;padding-top: 5px">
				<a href="tambahorder.php?halaman=tambahorder" class="btn btn-primary"> 
					<span class="glyphicon glyphicon-plus btn-end"></span> Tambah Data </a>
				</div> -->

			 <a href="./index.php" class="btn btn-success" style="margin-left: 10px;margin-top: 5px;"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Kembali</a>

				<div>
					<div class="table-responsive" style="padding-top: 5px">
						<table class="table table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr style="background-color: #ccc">
									<th>NO</th>
									<th>Order ID</th>
									<th>Nama Pelanggan</th>
									<th>Tanggal Order</th>
									<th>Alamat Pengiriman</th>
									<th>Kota</th>
									<th>Status Order</th>
									<th>Status Konfirmasi</th>
									<th>Status Terima</th>
									<th>Kurir</th>
									<th>Resi</th>
									<th>Ongkir</th>
									<th>Bank</th>
									<th>Pengirim</th>
									<th>Tgl Konfirmasi</th>
									<th>Rek Pengirim</th>
									<th>Bukti Transfer</th>
									<th>Aksi</th>
								</tr>
							</thead>

							
							<?php $i = 1; ?>
							<?php foreach (array_reverse($orders) as $ords): ?>
								<tr class="baris">
									<td style="color: black"><?php echo $i; ?></td>
									<td style="color: black"><?php echo $ords['id_order']; ?></td>
									<td style="color: black"><?php echo $ords['namapelanggan']; ?></td>
									<td style="color: black"><?php echo $ords['tgl_order']; ?></td>
									<td style="color: black"><?php echo $ords['alamat_pengirim']; ?></td>
									<td style="color: black"><?php echo $ords['nama_kota']; ?></td>
									<td style="color: black"><?php echo $ords['status_order']; ?></td>
									<td style="color: black"><?php echo $ords['status_konfirmasi']; ?></td>
									<td style="color: black"><?php echo $ords['status_terima']; ?></td>
									<td style="color: black"><?php echo $ords['kurir']; ?></td>
									<td style="color: black"><?php echo $ords['resi']; ?></td>
									<td style="color: black"><?php echo $ords['ongkir']; ?></td>
									<td style="color: black"><?php echo $ords['kode_bank']; ?></td>

									<td style="color: black"><?php echo $ords['nama_pengirim']; ?></td>
									<td style="color: black"><?php echo $ords['tgl_konfirmasi']; ?></td>
									<td style="color: black"><?php echo $ords['rek_pengirim']; ?></td>
									<td style="color: black">
										<img id="myImg_<?php echo $ords['id_order']; ?>" src="../../buktipembayaran/<?= $ords["bukti_transfer"] ; ?>" style="width:100%;max-width:300px;">

										<!-- The Modal -->
										<div id="myModal_<?php echo $ords['id_order']; ?>" class="modal">

										  <!-- Modal Caption (Image Text) -->
										  <span id="caption_<?php echo $ords['id_order']; ?>" style="margin-bottom: -70px;">
										  </span>

										  <!-- The Close Button -->
										  <span class="close">&times;</span>

										  <!-- Modal Content (The Image) -->
										  <img class="modal-content" id="img_<?php echo $ords['id_order']; ?>">

										  <style type="text/css">
										  	/* Style the Image Used to Trigger the Modal */
#myImg_<?php echo $ords['id_order']; ?> {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg_<?php echo $ords['id_order']; ?>:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption_<?php echo $ords['id_order']; ?> {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption_<?php echo $ords['id_order']; ?> { 
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

										  </style>

<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("myModal_<?php echo $ords['id_order']; ?>");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg_<?php echo $ords['id_order']; ?>");
var modalImg = document.getElementById("img_<?php echo $ords['id_order']; ?>");
var captionText = document.getElementById("caption_<?php echo $ords['id_order']; ?>");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = "Tekan ESC untuk menutup";
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[<?php echo $j = $i - 1; ?>];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

$(document).keyup(function(e) {
     if (e.key === "Escape") { // escape key maps to keycode `27`
        $("#myModal_<?php echo $ords['id_order']; ?>").hide();
    }
});
</script>
										</div>
									</td>

									<td style="color: black">
											<!-- <a href="index.php?halaman=hapusorder&id_order=<?php echo $ords['id_order'] ?>" class="btn-danger btn" onclick= "return confirm('apakah data order no= <?php echo $ords['id_order']; ?> ingin dihapus?')">
											<span class="glyphicon glyphicon-trash">Hapus</span></a><br><br> -->
											<!-- <a href="ubahorder.php?halaman=ubahorder&id_order=<?php echo $ords['id_order'] ?>" class="btn btn-warning">
												<span class="glyphicon glyphicon-pencil">Ubah</span></a><br><br> -->


													<?php if($ords['resi'] != "" && $ords['status_terima'] == "Belum Diterima"): ?>
														<a href="orders_detail.php?halaman=orders_detail&id=<?php echo $ords['id_order']; ?>">
														<span class="btn btn-info">Detail</span></a><br><br>
														<a href="ubahnoresi.php?id_order=<?php echo $ords['id_order']; ?>">
															<span class="btn btn-info">Ubah Resi</span>
														</a>


													<?php elseif($ords['status_konfirmasi'] == "Menunggu Persetujuan"): ?>
														<a href="./order_ubah_konfirmasi.php?id_order=<?= $ords['id_order']; ?>"class="btn btn-info" onclick="return confirm('setujui konfirmasi dari <?php echo $ords['id_order']; ?>')">
															<span class="glyphicon glyphicon-ok text-white" style="color:  white;">Setujui Konfirmasi</span>
														</a>
														
													<?php elseif($ords['status_konfirmasi'] == "Menunggu Konfirmasi"): ?>
														<button class="btn btn-warning">
															<span title="Belum Dikonfirmasi">Menunggu Konfirmasi</span>
														</button>	

													<?php elseif($ords['status_konfirmasi'] == "Disetujui"): ?>
														<a href="orders_detail.php?halaman=orders_detail&id=<?php echo $ords['id_order']; ?>">
														<span class="btn btn-info">Detail</span></a><br><br>
														<a href="tambahnoresi.php?halaman=tambahnoresi&id_order=<?php echo $ords['id_order']; ?>">
															<span class="btn btn-info">Input Resi</span>
														</a>
													<?php endif; ?>	
												</td>
											</tr>
											<?php $i++; ?>
										<?php endforeach; ?>	
									</table>
								</div>
							</div>

							<!-- navigasi -->
							<div class="pull-right">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<?php if ($halamanAktif > 1) : ?>
											<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif - 1 ?>">Previous</a></li>
										<?php endif; ?>
										<?php for ($i= 1; $i <= $jumlahHalaman ; $i++) : ?>
											<?php if ($i == $halamanAktif) : ?> 
												<li class="page-item"><a href="?halaman=orders&page=<?php echo $i ?>" style= "font-weight: bold; background-color:#ccc" class="page-link"><?= $i; ?></a></li>
												<?php else : ?>
													<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $i ?>"><?= $i; ?></a></li>
												<?php endif; ?>
											<?php endfor; ?>

											<?php if ($halamanAktif > 1) : ?>
												<li class="page-item"><a class="page-link" href="?halaman=orders&page=<?php echo $halamanAktif + 1 ?>">Next</a></li>
											<?php endif; ?>
										</ul>
									</nav>
								</div>

								<!--jumlah data-->
								<div>
									<?php 
									$jml =  count(orders("SELECT * FROM orders JOIN pelanggan ON 
										orders.kodepelanggan=pelanggan.kodepelanggan JOIN kota ON
										orders.id_kota=kota.id_kota"));
										echo "Jumlah Data: <b>". $jml . "</b>" ; ?>
									</div> 

									<!--jumlah halaman-->
									<div>
										<?php 
										echo "Jumlah Halaman: <b>". $jumlahHalaman . "</b>" ; ?>
									</div> <br><br>


								</body>
								</html>

								<?php include_once('../_footer.php'); ?>