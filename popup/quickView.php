<?php 
        //******* Chỗ này dùng cho webhost ***********
            // $servername="localhost";
            // $username="id20134519_maianh";
            // $password="M&~SHAnIRF97!y~V";
            // $dbname="id20134519_sunphone";

        //******* Chỗ này dùng cho xampp ***********
            $host = "localhost";
            $dbname = "sunphone";
            $dbusername = "root";
            $dbpassword = "";
            $ketnoi = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
            /*mysqli_set_charset($ketnoi, 'UTF8');*/
            
            // Bước 2: Lấy dữ liệu từ trên đường đẫn
            $id=$_GET["id"];

            //Bước 3: Hiển thị các dữ liệu trong bảng tbl_sanpham ra đây
            $sql = "
                SELECT * 
                FROM sanpham 
                WHERE sanpham_id = ".$id  ;
           
            $dulieu = mysqli_query($ketnoi, $sql);
          //  $product = mysqli_fetch_assoc($dulieu);
            $row = mysqli_fetch_array($dulieu);
        ;?>

<div class="container quickView-container">
	<div class="quickView-content">
		<div class="row">
			<div class="col-lg-7 col-md-6">

							<div class="product-cat" data-hash="one">
                            <img style="height: 500px; width: auto;" src="assets/<?php echo $row["hinh_anh"];?>" >	                   
                               
		                    </div><!-- End .intro-slide -->

		            
                    </div>
					
			<div class="col-lg-5 col-md-6">
            <form action="addtocart.php" method="GET">
			<span style="font-family:roboto" ><?php echo $row["ten_sp"] ?></span>
				<h3 style="font-family:roboto" class="product-price"><?php echo number_format($row["giaban"]) ?><sup>đ</sup></h3>

                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width:<?php echo $row["rate"];?> ;"></div><!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                </div><!-- End .rating-container -->
                <div>
                <h6 style="font-family:roboto; font-color:#fcb941" >Khuyễn mãi</h6>
                <ul style="list-style-type:disc">
                             <li><a style="font-family:roboto" class="product-txt">Lì xì ngay 360.000đ áp dụng đến 31/01</a></li>
                             <li><a style="font-family:roboto" class="product-txt"></a>Giảm thêm tới 300.000đ khi thanh toán qua VNPAY</li>
                             <li><a style="font-family:roboto" class="product-txt">Tặng hộp may mắn - số lượng có hạn</a></li>

                </ul>
                </div>
                <div class="details-filter-row product-nav product-nav-thumbs">
                <label for="size">color:</label>
                    <a><?php echo $row["color"];?></a>
                </div><!-- End .product-nav -->

                <div class="details-filter-row details-row-size">
	                <label for="size" >Size:</label>
                    <a><?php echo $row["ram"];?></a>

	            </div>
                <div class="details-filter-row details-row-size">
                    <label for="qty">Qty:</label>
                    <div class="product-details-quantity">
                    <input type="number" class="form-control" value="1" name="slg">
                    <input type="hidden" name="id" value="<?php echo $row["sanpham_id"]?>">
                    </div><!-- End .product-details-quantity -->
                </div><!-- End .details-filter-row -->

                <div class="product-details-action">
                <button type="submit "style="font-family:roboto" href="addtocart.php?id=<?php echo $row['sanpham_id']?>" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ</span></button>

                </div>

                <div class="product-details-footer">
                   

                    <div class="social-icons social-icons-sm">
                        <span style="font-family:roboto" class="social-label">Chia sẻ:</span>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
			</div>
            </form>
		</div>
	</div>
</div>