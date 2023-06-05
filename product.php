<?php
require("header.php");
?>

    
    <style>
    .main,a,span {
        font-family: roboto;
        color: black;
        
    }
    .table {
        /* color: #666; */
        margin: 0px;
     
    } 

    .table td{
        padding: 6px ;
    }

table{
    border-collapse:collapse;
}
</style>


<?php 
    $ketnoi = mysqli_connect($servername, $username, $password, $dbname);
    /*mysqli_set_charset($ketnoi, 'UTF8');*/
    
    // Bước 2: Lấy dữ liệu từ trên đường đẫn
    $id=$_GET["id"];

    //Bước 3: Hiển thị các dữ liệu trong bảng tbl_sanpham ra đây
   $sql = "SELECT *
FROM sanpham
WHERE sanphamid = ".$id;
    $dulieu = mysqli_query($ketnoi, $sql);
          //  $product = mysqli_fetch_assoc($dulieu);
    $row = mysqli_fetch_array($dulieu);


;?>
<html>
<body>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item">Chi tiết sản phẩm</li>
                    <li class="breadcrumb-item"><?php echo $row["tensanpham"] ?></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        <figure class="product-main-image">
                                            <img src="assets/<?php echo $row["hinhanh"];?>" alt="product image" data-zoom-image="assets/<?php echo $row["hinhanhzoom"];?>" id="product-zoom">     
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6" >
                                    <div class="product-details product-details-sidebar" style="font-size:20px">
                                        <h1 class="product-title"><?php echo $row["tensanpham"] ?></h1><!-- End .product-title -->
                                           
<div> <a> Nhà cung cấp: </a>
    <?php
                                    
                                    
                                            $sql = "SELECT * FROM sanpham a JOIN nhacungcap b ON a.nccid=b.nccid WHERE a.sanphamid= ".$id;
                                        
                                            $dulieu = mysqli_query($ketnoi, $sql);
                                            while ($rowcc = mysqli_fetch_array($dulieu)) 
                                            {
                                            ;?>
                                            
                                   <a href="index.php" style="font-family:roboto"> <?php echo $rowcc['tenncc'];?> </a>
                                     <del class="mx-2 font-weight-light" style="color:#99a2aa; font-size:20px"> </del>

                                <?php };?> 
                            </div>

                                        
                                            <!-- End .rating-container -->
                                        <p class="mb-3">
                                            <span class="product-price" >
                                                <?php if (number_format($row["giakhuyenmai"])>0) echo number_format($row["giakhuyenmai"]).'₫'; else echo number_format($row["giaban"]).'₫';?> 
                                                <del class="mx-2 font-weight-light" style="color:#99a2aa; font-size:20px"> <?php if (number_format($row["giakhuyenmai"])>0) echo   number_format($row["giaban"]).'₫'?></del>
                                                 
                                            </span>

                                        </p>
                                    
                                                      
                                       

                                            <form action="addtocart.php" method="GET">

                                            <div class="product-details-action">
                                                <div class="details-action-col">
                                                    <label for="qty" style="color:#000">Số lượng</label>
                                                    <div class="product-details-quantity">
                                                        <input type="number"  class="form-control" value="1" name="slg">
                                                        <input type="hidden" name="id" value="<?php echo $row["sanphamid"]?>">
                                                    </div><!-- End .product-details-quantity -->
 <button type="submit" href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></button>

                                                </div><!-- End .details-action-col -->

                                                <div class="details-action-wrapper">
                                                    <a href="addtowishlist.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-wishlist" title="Wishlist"><span>Thêm vào mục yêu thích</span></a>
                            
                                                </div><!-- End .details-action-wrapper -->
                                            </div><!-- End .product-details-action -->   
                                            </form>
     
                                        </div><!-- End .product-details -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product-details-top -->
                            <div class="product-details-tab">
                                <ul class="nav nav-pills justify-content-center" role="tablist" >
                                    <li class="nav-item" >
                                        <a class="nav-link" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true" style="font-size: 20px;font-family:roboto">MÔ TẢ SẢN PHẨM</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link" style="text-align: left; font-size: 16px">
                                        <div class="product-desc-content" >
                                        <?php echo $row["mota"];?>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div style="text-align: left; font-size: 16px; font-color:#666" class="tab-pane fade table" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link" >
                                        

                                    </div><!-- .End .tab-pane -->                                                           
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-details-tab -->

                          
                        </div><!-- End .col-lg-9 -->
                    

                        <aside class="col-lg-3">
                            <div class="sidebar sidebar-product">
                                <div class="widget widget-products">
                                    <h4 class="widget-title" style="color: #fcb941; font-weight: bold">Sản phẩm liên quan</h4><!-- End .widget-title -->
                                    <?php
                                    
                                    $dm= $row["danhmucid"];
                                            $sql = "SELECT DISTINCT * FROM sanpham a JOIN danhmuc b ON a.danhmucid=b.danhmucid WHERE a.danhmucid='$dm'
                                            AND sanphamid NOT LIKE '$id'
                                             ORDER BY  RAND() LIMIT 4";
                                            $dulieu = mysqli_query($ketnoi, $sql);
                                            while ($rowlq = mysqli_fetch_array($dulieu)) 
                                            {
                                            ;?>
                                    <div  class="products" style="margin: 0px; background-color:#f3f3f3; padding: 6px">

                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="product.php?id=<?php echo $rowlq["sanphamid"];?>">
                                                <img src="assets/<?php echo $rowlq["hinhanh"];?>" alt="product image" >
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="product.php?id=<?php echo $rowlq["sanphamid"];?>"><?php echo $rowlq["tensanpham"]?></a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    <?php if (number_format($rowlq["giakhuyenmai"])>0) echo number_format($rowlq["giakhuyenmai"]).'₫'; else echo number_format($rowlq["giaban"]).'₫';?> 
                                                    <del class="mx-2 font-weight-light" style="color:#99a2aa; font-size:small"> <?php if (number_format($rowlq["giakhuyenmai"])>0) echo   number_format($rowlq["giaban"]).'₫'?></del>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->
                                      
                                    </div><!-- End .products -->
                                    <?php };
                                           ?>
                                    <a href="category.php?id=<?php echo $row["danhmucid"];?>" class="btn btn-outline-dark-3"><span>View More Products</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .widget widget-products -->
                                     <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">SunPhone</div>
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/uploads/images/tin-tuc/142048/Originals/%E1%BA%A3nh_Viber_2021-12-31_18-53-01-599.jpg" alt="banner">
                                        </a>
                                    </div>  
                                </div> 

                            </div><!-- End .sidebar sidebar-product -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div>
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
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product-sidebar.html  22 Nov 2019 10:03:37 GMT -->
</html>