<!DOCTYPE html>
<html lang="vi">
    
<?php
require("header.php");
?>
<body>

<style>

p,tr,h2,a, h4, h3, li {
        font-family: roboto;
     
    }

</style>
<div class="f1-effect">
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
	<div class="f1-effect-flower">
	</div>
	
</div>

<style>
.f1-effect {
    position: relative;
    z-index: 99999999; }
.f1-effect .f1-effect-flower {
    opacity: 1;
    border-radius: 100%;
    background: url(https://file.hstatic.net/200000259653/file/pages_17a8568517e94dcd9c8aec5587_570924d1fa4b4da1aa011044c9d7cc1c.png);
    position: fixed;
    top: -10%;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    -webkit-animation-name: snowflakes-fall, snowflakes-shake;
    -webkit-animation-duration: 10s, 3s;
    -webkit-animation-timing-function: linear, ease-in-out;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-play-state: running, running;
    animation-name: snowflakes-fall, snowflakes-shake;
    animation-duration: 10s, 3s;
    animation-timing-function: linear, ease-in-out;
    animation-iteration-count: infinite, infinite;
    animation-play-state: running, running; 
}
@media (max-width: 767px) {
    .f1-effect .f1-effect-flower:nth-of-type(2n) {
        display: none; 
    } 
}
.f1-effect .f1-effect-flower:nth-of-type(0) {
    left: 5%;
    -webkit-animation-delay: 1s, 1s;
    animation-delay: 1s, 1s;
    width: 16px;
    height: 16px;
    background-position: 0 -23px; }
.f1-effect .f1-effect-flower:nth-of-type(1) {
    left: 10%;
    -webkit-animation-delay: 6s, 0.5s;
    animation-delay: 6s, 0.5s;
    width: 13px;
    height: 13px;
    background-position: 0 -50px; }
.f1-effect .f1-effect-flower:nth-of-type(2) {
    left: 20%;
    -webkit-animation-delay: 4s, 2s;
    animation-delay: 4s, 2s;
    width: 15px;
    height: 15px;
    background-position: -49px -35px; }
.f1-effect .f1-effect-flower:nth-of-type(3) {
    left: 30%;
    -webkit-animation-delay: 2s, 2s;
    animation-delay: 2s, 2s;
    width: 14px;
    height: 14px;
    background-position: -31px 0; }
.f1-effect .f1-effect-flower:nth-of-type(4) {
    left: 40%;
    -webkit-animation-delay: 8s, 3s;
    animation-delay: 8s, 3s;
    width: 16px;
    height: 16px;
    background-position: 0 -23px; }
.f1-effect .f1-effect-flower:nth-of-type(5) {
    left: 50%;
    -webkit-animation-delay: 6s, 2s;
    animation-delay: 6s, 2s;
    width: 13px;
    height: 13px;
    background-position: 0 -50px; }
.f1-effect .f1-effect-flower:nth-of-type(6) {
    left: 60%;
    -webkit-animation-delay: 2.5s, 1s;
    animation-delay: 2.5s, 1s;
    width: 15px;
    height: 15px;
    background-position: -49px -35px; }
.f1-effect .f1-effect-flower:nth-of-type(7) {
    left: 70%;
    -webkit-animation-delay: 1s, 0s;
    animation-delay: 1s, 0s;
    width: 14px;
    height: 14px;
    background-position: -31px 0; }
.f1-effect .f1-effect-flower:nth-of-type(8) {
    left: 80%;
    -webkit-animation-delay: 2s, 2s;
    animation-delay: 2s, 2s;
    width: 14px;
    height: 14px;
    background-position: -31px 0; }
.f1-effect .f1-effect-flower:nth-of-type(9) {
    left: 90%;
    -webkit-animation-delay: 8s, 3s;
    animation-delay: 8s, 3s;
    width: 16px;
    height: 16px;
    background-position: 0 -23px; }
.f1-effect .f1-effect-flower:nth-of-type(10) {
    left: 95%;
    -webkit-animation-delay: 6s, 2s;
    animation-delay: 6s, 2s;
    width: 13px;
    height: 13px;
    background-position: 0 -50px; }

@-webkit-keyframes snowflakes-fall {
  0% {
    top: -10%; }
  100% {
    top: 100%; } }

@-webkit-keyframes snowflakes-shake {
  0% {
    -webkit-transform: translateX(0px);
    transform: translateX(0px); }
  50% {
    -webkit-transform: translateX(80px);
    transform: translateX(80px); }
  100% {
    -webkit-transform: translateX(0px);
    transform: translateX(0px); } }

@keyframes snowflakes-fall {
  0% {
    top: -10%; }
  100% {
    top: 100%; } }

@keyframes snowflakes-shake {
  0% {
    transform: translateX(0px); }
  50% {
    transform: translateX(80px); }
  100% {
    transform: translateX(0px); } 
}

/* Slideshow container */
.banner {
    display: flex;
    align-items: center;
}
.slide-main-container {
    max-width: 1000px;
    position: relative;
    margin-left: 20px;
    float: left;
    padding-top: 25px;
}

.slide-sub-container {
    max-width: 500px;
    position: relative;
    margin-left: 20px;
    float: right;
}



/* The dots/bullets/indicators */
.dot-list {
	bottom: 20px;
    position: static;
    left: auto;
    right: auto;
    width: 100%;
    display: inline-block;
    text-align: center;
    position: relative;
    top: -50px;
    z-index: 10;
}
.dot {
    background: #fff;
    margin: 0 5px;
    width: 30px;
    height: 6px;
    padding: 0;
    transition: all 0.3s ease 0s;
    border-radius: 3px;
    float: none;
    display: inline-block;
}


/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 4s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.popular {
    margin: 0 20px;
}

.slider-term {
    margin: 0 20px;
}
.contentslider {
    position: relative;
    display: flex;
    align-items: center;

    transition: all 1.6s ease 0s;
    width: 5200px;
}

.item {
    max-width: 250px;
    padding: 20px;
}

.item a img{
    transform-style: preserve-3d;
}

</style>      
        <!--body-->
        <main class="main">
            <div class="container banner" style="background-color: white">
                <div class="slide-main-container col-12">

                    <div class="slide-main fade">
                        <img src="assets/images/Banner/mot-thang-sau_banner.jpg" style="width:100%">
                    </div>

                    <div class="slide-main fade">
                        <img src="assets/images/Banner/omo_banner.jpg" style="width:100%">
                    </div>

                    <div class="slide-main fade">
                        <img src="assets/images/Banner/tiger_banner.jpg" style="width:100%">
                    </div>

                    <div class="dot-list">
                        <div class="dot"><span></span></div> 
                        <div class="dot"><span></span></div>
                        <div class="dot"><span></span></div>
                    </div>
                </div>

                <div class="slide-sub-container col-3">
                    <div class="slide-sub fade">
                        <img src="assets/images/Banner/mot-thang-sau_sub.jpg" style="width:120%">
                    </div>
                    <div class="slide-sub fade">
                        <img src="assets/images/Banner/omo_sub.jpg" style="width:120%">
                    </div>
                    <div class="slide-sub fade">
                        <img src="assets/images/Banner/tiger_sub.jpg" style="width:120%">
                    </div>
                </div>
            </div><!-- End banner -->

            <div class="container popular">
                <div class="slider-terms">
                    <h3 class="modtitle"><span> Nhóm hàng thường mua</h3>
                    <div class="contentslider">
                        <?php $sql = "SELECT * FROM danhmuc"  ;
                            $dulieu = mysqli_query($conn, $sql);
                        
                            while ($row = mysqli_fetch_array($dulieu))
                            {?>
                                <div class="item">
                                    <a href="./category.php?id=<?php echo $row["danhmucid"];?>">
                                        <img class="img-rounded" src="assets/<?php echo $row["hinhanhdm"]; ?>">
                                        <p class="text-center"> <?php echo $row["tendanhmuc"] ;?> </p>
                                    </a>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="container trending">
                <div class="heading heading-flex mb-3" style="  margin: 30px ">
                    <div class="heading-left">
                        <h3 class="" ><strong>Top sản phẩm bán chạy</strong></h3><!-- End .title -->
                    </div><!-- End .heading-left -->                  
                </div><!-- End .heading -->
            </div>
            <div id="1" class="row product__filter">
                <?php                                     
                    $sql = "SELECT * FROM sanpham a  join danhmuc b on a.danhmucid=b.danhmucid
                    ORDER BY rand() limit 8 ";
                    $dulieu = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($dulieu)) 
                    {
                ;?>

                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
                    <div class="product product-7 text-center" >             
                        <figure class="product-media">                 
                            <a href="product.php?id=<?php echo $row["sanphamid"];?>">
                                <img src="assets/<?php echo $row["hinhanh"];?>" >                                           
                        
                            <div class="product-action-vertical">
                                <a style="font-family:roboto" href="addtowishlist.php?id=<?php echo $row['sanphamid']?>" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm mục yêu thích</span></a>
                            </div><!-- End .product-action-vertical -->
                            <div class="product-action">
                                <a style="font-family:roboto"  href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></a>
                                <a style="font-family:roboto" href="popup/quickView.php?id=<?php echo $row["sanphamid"];?> && danhmucid=<?php echo $row["danhmucid"];?>" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat" style="font-family:roboto" >
                                <a style="font-family:roboto" href="category.php?id=<?php echo $row['danhmucid'];?>"><?php echo $row["tendanhmuc"];?></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a style="font-family:roboto"  href="product.php?id=<?php echo $row["sanphamid"];?>"><?php echo $row["tensanpham"];?></a></h3><!-- End .product-title -->
                            <br>
                            <div style="font-family:roboto" class="product-price">
                                <?php if (number_format($row["giakhuyenmai"])>0) echo number_format($row["giakhuyenmai"]).'₫'; else echo number_format($row["giaban"]).'₫';?> 
                                    <del style="color:gray"  class="mx-2 font-weight-light"> <?php if (number_format($row["giakhuyenmai"])>0) echo   number_format($row["giaban"]).'₫'?></del>
                            </div><!-- End .product-price -->
                                
                        </div><!-- End .product-body -->
                    </div>
                </div>
                <?php 
                }; ?>
            </div>


            <div class="container trending">
                <div class="heading heading-flex mb-3" style="  margin: 30px ">
                    <div class="heading-left">
                        <h3 class="" ><b>Trải nghiệm sản phẩm mới</b></h3><!-- End .title -->
                    </div><!-- End .heading-left -->                  
                </div><!-- End .heading -->
                </div>
                <div id="1" class="row product__filter">
                    <?php                                     
                        $sql = "SELECT * FROM sanpham a join danhmuc b on a.danhmucid=b.danhmucid
                        ORDER BY rand() limit 8 ";
                        $dulieu = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($dulieu)) 
                        {
                        ;?>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
                        <div class="product product-7 text-center" >             
                            <figure class="product-media">                 
                                <a href="product.php?id=<?php echo $row["sanphamid"];?>">
                                    <img src="assets/<?php echo $row["hinhanh"];?>" >                                           
                                </a>
                                            
                                <div class="product-action-vertical">
                                    <a style="font-family:roboto" href="addtowishlist.php?id=<?php echo $row['sanphamid']?>" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm mục yêu thích</span></a>
                                </div><!-- End .product-action-vertical -->
                                            
                                <div class="product-action">
                                    <a style="font-family:roboto"  href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></a>
                                    <a style="font-family:roboto" href="popup/quickView.php?id=<?php echo $row["sanphamid"];?> && danhmucid=<?php echo $row["danhmucid"];?>" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
                                            
                            <div class="product-body">
                                <div class="product-cat" style="font-family:roboto" >
                                    <a style="font-family:roboto" href="category.php?id=<?php echo $row['danhmucid'];?>"><?php echo $row["tendanhmuc"];?></a>
                                </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a style="font-family:roboto"  href="product.php?id=<?php echo $row["sanphamid"];?>"><?php echo $row["tensanpham"];?></a></h3><!-- End .product-title -->
                                    <br>
                                <div style="font-family:roboto" class="product-price">
                                    <?php if (number_format($row["giakhuyenmai"])>0) echo number_format($row["giakhuyenmai"]).'₫'; else echo number_format($row["giaban"]).'₫';?> 
                                    <del style="color:gray"  class="mx-2 font-weight-light"> <?php if (number_format($row["giakhuyenmai"])>0) echo   number_format($row["giaban"]).'₫'?></del>
                                </div><!-- End .product-price -->       
                            </div><!-- End .product-body -->
                        </div>
                    </div>
                    <?php 
                    }; ?>
                </div>
            </div><!-- End .container -->

            <div class="container featured">
                <div class="heading heading-center mb-3" style ="margin: 30px">
                    <h2 class="title">Thương hiệu chính hãng</h2><!-- End .title -->
                    <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab" role="tab" aria-controls="products-featured-tab" aria-selected="true">Unilever</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab" aria-controls="products-sale-tab" aria-selected="false">Nhãn hàng Coop</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                        <div id="1" class="row product__filter">
                            <?php                                     
                                $sql = "SELECT * FROM sanpham a join danhmuc b on a.danhmucid=b.danhmucid join nhacungcap c on a.nccid=a.nccid where a.nccid=45
                                ORDER BY rand() limit 4";
                                $dulieu = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($dulieu)) 
                                {
                                ;?>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
                                        <div class="product product-7 text-center" >             
                                            <figure class="product-media">                 
                                                <a href="product.php?id=<?php echo $row["sanphamid"];?>">
                                                    <img src="assets/<?php echo $row["hinhanh"];?>" >                                           
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a style="font-family:roboto" href="addtowishlist.php?id=<?php echo $row['sanphamid']?>" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm mục yêu thích</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a style="font-family:roboto"  href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></a>
                                                    <a style="font-family:roboto" href="popup/quickView.php?id=<?php echo $row["sanphamid"];?> && danhmucid=<?php echo $row["danhmucid"];?>" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat" style="font-family:roboto" >
                                                    <a style="font-family:roboto" href="category.php?id=<?php echo $row["danhmucid"];?>"><?php echo $row["tendanhmuc"];?></a>
                                                </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a style="font-family:roboto"  href="product.php?id=<?php echo $row["sanphamid"];?>"><?php echo $row["tensanpham"];?></a></h3><!-- End .product-title -->
                                                    <br>
                                            
                                                <div style="font-family:roboto" class="product-price">
                                                    <?php echo number_format($row["giaban"]).'₫';?> 
                                                        
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->

                                        </div>

                                    </div>
                            <?php 
                            }; ?>
                        <div style="text-align: right">
                            <a href="category.php?id=<?php echo $row["danhmucid"];?>" class="btn btn-outline-dark-3"><span>Xem thêm </span><i class="icon-long-arrow-right" ></i></a>
                        </div>

                        </div>
                

                    </div>

                
                    <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">         
                        <div id="1" class="row product__filter">
                
                        <?php                                     
                            $sql = "SELECT * FROM sanpham a join danhmuc b on a.danhmucid=b.danhmucid join nhacungcap c on a.nccid=a.nccid where a.nccid=11
                            ORDER BY rand() limit 4 ";
                            $dulieu = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($dulieu)) 
                            {
                            ;?>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
                                <div class="product product-7 text-center" >             
                                    <figure class="product-media">                 
                                        <a href="product.php?id=<?php echo $row["sanphamid"];?>">
                                            <img src="assets/<?php echo $row["hinhanh"];?>" >                                           
                                        </a>

                                        <div class="product-action-vertical">
                                            <a style="font-family:roboto" href="addtowishlist.php?id=<?php echo $row['sanphamid']?>" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm mục yêu thích</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a style="font-family:roboto"  href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></a>
                                            <a style="font-family:roboto" href="popup/quickView.php?id=<?php echo $row["sanphamid"];?> && danhmucid=<?php echo $row["danhmucid"];?>" class="btn-product btn-quickview" title="Quick view"><span>Xem nhanh</span></a>

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat" style="font-family:roboto" >
                                            <a style="font-family:roboto" href="category.php?id=<?php echo $row['danhmucid'];?>"><?php echo $row["tendanhmuc"];?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a style="font-family:roboto"  href="product.php?id=<?php echo $row["sanphamid"];?>"><?php echo $row["tensanpham"];?></a></h3><!-- End .product-title -->
                                        <br>                                     
                                        <div style="font-family:roboto" class="product-price">
                                            <?php echo number_format($row["giaban"]).'₫';?>                         
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            <?php 
                                }; ?>
                            <div style="text-align: right">
                            <a href="category.php?id=<?php echo $row["danhmucid"];?>" class="btn btn-outline-dark-3"><span style="text-align: right">Xem thêm </span><i class="icon-long-arrow-right" ></i></a>
                        </div>
                    </div>

                </div>



            </div><!-- .End .tab-pane -->
            </div><!-- End container -->
        </main>

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
    <script src="assets/js/demos/demo-7.js"></script>
</body>

<script>
    function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    }
</script>

<!-- Slider banner -->
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slideMains = document.getElementsByClassName("slide-main");
        let slideSubs = document.getElementsByClassName("slide-sub");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slideMains.length; i++) {
            slideMains[i].style.display = "none";  
            slideSubs[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slideMains.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" activeBanner", "");
        }
        slideMains[slideIndex-1].style.display = "block";  
        slideSubs[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " activeBanner";
        setTimeout(showSlides, 4000); // Change image every 4 seconds
    }
</script>

<!-- Slider danh muc san pham -->
<script>
    let index = 0;
    let directX = 1;
    sliding();
    function sliding(){
        let slider = document.getElementsByClassName("contentslider");
        slider[0].style = "transform: translate3d("+ (-230 * index - 20) +"px, 0px, 0px)";
        if (index == 4){
            directX = -1;
        }

        if (index == 0){
            directX = 1;
        }
        index += directX;
        setTimeout(sliding, 4500);
    }
</script>

<!-- molla/index-3.html  22 Nov 2019 09:55:58 GMT -->
</html>
<?php
     require("footer.php");
?>