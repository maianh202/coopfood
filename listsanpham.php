<!DOCTYPE html>
<html lang="en">



<?php require("header.php");
$ketnoi = mysqli_connect($servername, $username, $password, $dbname);

?>
<body>
    <div class="page-wrapper">
        <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
                <div class="container">
                    <h1 style="font-family: roboto" class="page-title">Sản phẩm</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" style="font-family:roboto">Trang chủ</a></li>
                    <li class="breadcrumb-item" style="font-family:roboto">sản phẩm</li>

                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <?php 
                $param = "";
                $sortParam = "";
                $orderConditon = "";

                $ketnoi = mysqli_connect($servername, $username, $password, $dbname) or die("Sorry, can't connect to the mysql."); 
                

                $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                if(!empty($orderField) && !empty($orderSort))
                {
                    $param .= "field=".$orderField."&sort=".$orderSort."&";
                    $orderConditon = "ORDER BY ".$orderField." ".$orderSort;
                }
              

                $sql = "SELECT * FROM sanpham a join danhmuc b on a.danhmuc_id=b.danhmuc_id ".$orderConditon;

                $sql_total= "SELECT * FROM sanpham a join danhmuc b on a.danhmuc_id=b.danhmuc_id  "; 

                $totalRecords = mysqli_query($ketnoi,$sql_total );
                $Records = mysqli_num_rows($totalRecords);
                $query=mysqli_query($ketnoi,$sql);
                $num2 = mysqli_num_rows($query);

   ?>

                <div class="page-content">
                    <div class="container">
                			<div class="toolbox">
                				
                                
                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label style="font-family: roboto" for="sortby">Sắp xếp theo:</label>
                                        <!--sắp xếp lọc theo cái-->
                						<div class="select-custom" style="font-family:roboto">
                                            <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" >
												<option value="{{Request: :url()}}?sort_by=none" >--Lọc--</option>
												<option <?php if(isset($_GET['field']) && $_GET['field'] == "giaban" && isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=giaban&sort=desc">giá giảm dần</option>
                                                <option <?php if(isset($_GET['field']) && $_GET['field'] == "giaban" && isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=giaban&sort=asc">giá tăng dần</option>
                                                <option value="{{Request: :url()}}?sort_by=none" >--Lọc--</option>

											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->                           
                            <div class="products mb-3">
                                
                                <div class="row justify-content-center">

                                <div class="container">
                                <hr class="mt-3 mb-6">
                            </div><!-- End .container -->
                            <div class="container trending">
                                <div class="heading heading-flex mb-3">
                                    <div class="heading-left">
                                    </div><!-- End .heading-left -->                  
                                </div><!-- End .heading -->
                                </div>
                                <div id="1" class="row product__filter">

 <!-- List sản phẩm -->  

       <?php 
                while($row=mysqli_fetch_array($query))
                {
                ;?>
                           <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
             <div class="product product-2">
             <figure class="product-media">
                <a href="product.php?id=<?php echo $row["sanpham_id"];?>">
                 <img src="assets/<?php echo $row["hinh_anh"];?>" >                                           
                    </a>

                    <div class="product-action-vertical">
                        <a style="font-family:roboto" href="addtowishlist.php?id=<?php echo $row['sanpham_id']?>" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm mục yêu thích</span></a>
                    </div><!-- End .product-action -->

                    <div class="product-action product-action-dark">
                        <a style="font-family:roboto"  href="addtocart.php?id=<?php echo $row['sanpham_id']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></a>
                        <a style="font-family:roboto" href="popup/quickView.php?id=<?php echo $row["sanpham_id"];?> && danhmuc_id=<?php echo $row["danhmuc_id"];?>" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                                    <div class="product-cat" style="font-family:roboto" >
                                        <a style="font-family:roboto" href="#"><?php echo $row["tendanhmuc"];?></a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a style="font-family:roboto"  href="product.php?id=<?php echo $row["sanpham_id"];?>"><?php echo $row["ten_sp"];?></a></h3><!-- End .product-title -->
                                    <br>
                                    
                                    <div style="font-family:roboto" class="product-price">
                                    <?php if (number_format($row["khuyenmai"])>0) echo number_format($row["khuyenmai"]).'₫'; else echo number_format($row["giaban"]).'₫';?> 
                                                <del style="color:gray" class="mx-2 font-weight-light"> <?php if (number_format($row["khuyenmai"])>0) echo   number_format($row["giaban"]).'₫'?></del>
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width:<?php echo $row["rate"];?> ;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                </div>
                </div>
                <?php 
            }; ?>

      
            </div>
        </div>
 <!-- end List sản phẩm -->  
        
            </div><!-- End .page-content -->
        </main><!-- End .main -->


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-3.js"></script>
</body>

<?php 
require("footer.php");
?>
<!-- molla/category.html  22 Nov 2019 10:02:52 GMT -->
</html>
