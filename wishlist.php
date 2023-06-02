<!DOCTYPE html>
<html lang="vi">


<!-- molla/wishlist.html  22 Nov 2019 09:55:05 GMT -->
<?php
require("header.php");
?>
<style>
    p,tr,h2,a, li {
        font-family: roboto;
     
    }
	
 </style>
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
        		<div class="container">
        			<h1 class="page-title">Sản phẩm yêu thích</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mục yêu thích</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th style="color:black">Sản phẩm</th>
								<th style="color:black">Giá</th>
								<th style="color:black">Trạng thái</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
						<?php foreach ($wishlist as $key => $value) :?>

							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="product.php?id=<?php echo $value["id"];?>">
												<img src="assets/<?php echo $value["img"];?>" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="product.php?id=<?php echo $value["id"];?>"><?php echo $value["name"];?></a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col" text-align="right" style=" font-family: roboto; color:#fcb941"><?php echo number_format($value["gia"])?><sup>đ</sup></td>
							   <?php
							   $sluong = $value['sl'];
							   if($sluong>1)
							   {
								?>
								<td class="stock-col"><span class="in-stock">Còn hàng</span></td>
								<?php
							   }
							   else {
								?>
								<td class="stock-col"><span class="in-stock">Hết hàng</span></td>
								<?php
							   }
							   ?>

								<td class="action-col">
								<a href="addtocart.php?id=<?php echo $value['id']?>" class="btn btn-block btn-outline-primary-2" title="Add to cart"><i class="icon-cart-plus"></i>Thêm vào giỏ</a>
								</td>
								<td class="remove-col"><button class="btn-remove" ><a href="addtowishlist.php?id=<?php echo $value['id']?>&action=delete" class="icon-close"></a></button></td>
							</tr>
						</tbody>
						<?php endforeach ?>

					</table><!-- End .table table-wishlist -->
	            	<div class="wishlist-share">
	            		<div class="social-icons social-icons-sm mb-2">
	            			<label class="social-label">Share on:</label>
	    					<a href="https://www.facebook.com/" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	    					<a href="https://twitter.com/home?lang=vi" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	    					<a href="https://www.instagram.com/" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	    					<a href="https://www.youtube.com/" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	    					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	    				</div><!-- End .soial-icons -->
	            	</div><!-- End .wishlist-share -->
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
  <?php
     require("footer.php");
?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/wishlist.html  22 Nov 2019 09:55:06 GMT -->
</html>