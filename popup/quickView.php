<?php 
        //******* Chỗ này dùng cho webhost ***********
            // $servername="localhost";
            // $username="id20134519_maianh";
            // $password="M&~SHAnIRF97!y~V";
            // $dbname="id20134519_sunphone";

        //******* Chỗ này dùng cho xampp ***********
            $host = "localhost";
            $dbname = "coopfood";
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
                WHERE sanphamid = ".$id  ;
           
            $dulieu = mysqli_query($ketnoi, $sql);
          //  $product = mysqli_fetch_assoc($dulieu);
            $row = mysqli_fetch_array($dulieu);
        ;?>

<div class="container quickView-container">
	<div class="quickView-content">
		<div class="row">
			<div class="col-lg-7 col-md-6">

							<div class="product-cat" data-hash="one">
                            <img style="height: 500px; width: auto;" src="assets/<?php echo $row["hinhanh"];?>" >	                   
                               
		                    </div><!-- End .intro-slide -->

		            
                    </div>
					
			<div class="col-lg-5 col-md-6">
            <form action="addtocart.php" method="GET">
			<span style="font-family:roboto" ><?php echo $row["tensanpham"] ?> </span>
       <div> <a> Nhà cung cấp: </a>
        <?php
                                    
                                    
                                            $sql = "SELECT * FROM sanpham a JOIN nhacungcap b ON a.nccid=b.nccid WHERE a.sanphamid=".$id;
                                        
                                            $dulieu = mysqli_query($ketnoi, $sql);
                                            while ($rowcc = mysqli_fetch_array($dulieu)) 
                                            {
                                            ;?>
                                            
                                   <a href="index.php" style="font-family:roboto"><?php echo $rowcc['tenncc'];?> </a>
                                     <del class="mx-2 font-weight-light" style="color:#99a2aa; font-size:20px"> </del>

                                <?php };?> 
                            </div>         
           

				<h3 style="font-family:roboto" class="product-price"><?php echo number_format($row["giaban"]) ?><sup>đ</sup></h3>

               
               
                <div class="details-filter-row details-row-size">
                    <label for="qty" >Số lượng:</label>
                    <div class="product-details-quantity">
                    <input type="number" class="form-control" value="1" name="slg">
                    <input type="hidden" name="id" value="<?php echo $row["sanphamid"]?>">
                    </div><!-- End .product-details-quantity -->
                </div><!-- End .details-filter-row -->


                <?php 
if($row["soluong"]>0)
{
    ;?>
<style type="text/css">
    #tat
    {
        display: none;
    }
    #bat
    {
        display: block;
    }
</style>
<?php 
}
 else {;?>
 <style type="text/css">
    #tat
    {
        display: block
    }
    #bat
    {
        display: none;
    }
</style>
<?php 
} ;?>



                                                    <div id="tat">
                                                    <button class="btn-product btn-cart" disabled="disabled"><span >Thêm vào giỏ hàng</span></button></div>
                                                    <div id="bat">
                                                    <button style="background:black;" type="submit" href="addtocart.php?id=<?php echo $row['sanphamid']?>" class="btn-product btn-cart"><span >Thêm vào giỏ hàng</span></button></div>

                                                </div><!-- End .details-action-col -->

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