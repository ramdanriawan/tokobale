<link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<?php include_once('../_headerpenggunjung.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Profil Toko </title>

	<style>
	* {
		box-sizing: border-box;
	}

	.img-container {
		float: left;
		width: 33.33%;
		padding: 5px;
	}

	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}
</style>
</head>
<body>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	
			<div class="col-md-5 contact-right">	
				<img src="../../images/AB3.jpg" class="img-responsive" alt="">
				<img src="../../images/AB2.jpg" class="img-responsive" alt="">
			</div>
			<div class="col-md-7 contact-left">
				<h4>Contact Information</h4>
				<p style="color: black"> Toko Bale Anak Jambi adalah toko yang menjual berbagai macam perlengkapan bayi dan pakaian anak, seperti baju bayi, celana bayi, makanan bayi, stroller, baju anak, celana anak dan perlengkapan lainnya. Toko Bale Anak Jambi ini berada di Jl. Ir. H. Juanda No.9, Simpang III Sipin, Kota Baru, Kota Jambi, Jambi.
				</p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Jl. Ir. H Juanda No.9, Simpang III Sipin, Kota Baru, Kota Jambi, Jambi.</li><br><br>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>+62 813-7466-6003</li>
				</ul>
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
							<li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i></li>
						</ul>
						<div class="resp-tabs-container hor_1">
							<div>
								<form action="#" method="post">
									<input type="text" value="Name" name="namapelanggan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
									
									<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" required="">

									<input type="text" value="Subject" name="nama_produk" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subjaect';}" required="">
									
									
									<textarea name="Message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
									
									<input type="submit" value="Submit" >
								</form>
							</div>
							<div>
								<div class="map-grid">
								<h5>Our Location</h5>
									<ul>
										<li><i class="fa fa-arrow-right" aria-hidden="true"></i> Jl. Ir. H Juanda No.9, Simpang III Sipin, Kota Baru, Kota Jambi, Jambi.</li>
									</ul>
								</div>
							</div>
							<div>
								<div class="map-grid">
									<h5>Contact Us</h5>
									<ul>
										<li>Mobile No : +62 813-7466-6003</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Plug-in Initialisation-->
				<script type="text/javascript">
				$(document).ready(function() {
					//Horizontal Tab
					$('#parentHorizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});

					// Child Tab
					$('#ChildVerticalTab_1').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true,
						tabidentify: 'ver_1', // The tab groups identifier
						activetab_bg: '#fff', // background color for active tabs in this group
						inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
						active_border_color: '#c1c1c1', // border color for active tabs heads in this group
						active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
					});

					//Vertical Tab
					$('#parentVerticalTab').easyResponsiveTabs({
						type: 'vertical', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						closed: 'accordion', // Start closed if in accordion view
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo2');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});
				});
			</script>
				
			</div>
			
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<!-- //contact -->
<!-- tabs -->
<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
			});
		});				
	</script>
<!-- //tabs -->

<?php include_once('../_footer.php'); ?>

