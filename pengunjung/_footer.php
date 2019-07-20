<!--footer-->
<div class="footer">

	<div class="container">
			<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="../dashboard/index.php"><img src="../../images/logobale.jpeg" width="300px"><br><span style="font-style: bold; font-size: 40px;">BALE ANAK</span></a></h2>
				<p class="fo-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>

				<ul class="social-fo">
					<li><a href="https://www.facebook.com/centralkids.mayang" target="_blank" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

					<li><a href="#" class=" dri"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
				
				<div class=" address">
					<div class="col-md-6 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i>Jl. Ir. H Juanda No.9, Simpang III Sipin, Kota Baru, Kota Jambi, Jambi</p>
					</div>

					<div class="col-md-6 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>+62 813-7466-6003</p>	
					</div>

					<div class="clearfix"></div>
				
					</div>
			</div>

		<div class="copy-right">
			<p> &copy; 2016 Big store. All Rights Reserved | <a href="../dashboard/profiltoko.php">Profile Toko</a> | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
		</div>
	</div>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="../js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="../js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    // $('.my-cart-btn').myCart({
    //   classCartIcon: 'my-cart-icon',
    //   classCartBadge: 'my-cart-badge',
    //   affixCartIcon: true,
    //   checkoutCart: function(products) {
    //     $.each(products, function(){
    //       console.log(this);
    //     });
    //   },
    //   clickOnAddToCart: function($addTocart){
    //     goToCartIcon($addTocart);
    //   },
    //   getDiscountPrice: function(products) {
    //     var total = 0;
    //     $.each(products, function(){
    //       total += this.quantity * this.price;
    //     });
    //     return total * 1;
    //   }
    // });

  });
  </script>