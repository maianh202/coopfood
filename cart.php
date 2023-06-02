<!DOCTYPE html>
<html lang="vi">
 
<?php
require("header.php");

//echo"<pre>";
//print_r($cart);
?> 
<body>
 
        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
                <div class="container">
                    <h1 class="page-title">Giỏ hàng</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" style=" font-family: roboto">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style=" font-family: roboto">Giỏ hàng</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
 
            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <?php
                                $sql_laygiohang=mysqli_query($conn, "SELECT * FROM giohang ORDER BY giohangid DESC");
                                ?>
                                <table class="table table-cart table-mobile" style=" font-family: roboto">
                                    <thead>
                                        <tr>
                                            <th style="color:black">Sản phẩm</th>
                                            <th style="color:black">Giá</th>
                                            <th style="color:black">Số lượng</th>
                                            <th style="color:black">Thành tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
 
                                    <tbody>
                                        <?php $tongtien = 0; ?>
                                        <?php foreach ($cart as $key => $value) :?>
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="product.php?id=<?php echo $value['id'];?>">
                                                            <img src="assets/<?php echo $value['img'];?>" alt=" image">
                                                        </a>
                                                    </figure>
 
                                                    <h3 class="product-title">
                                                        <a href="product.php?id=<?php echo $value["id"];?>" style=" font-family: roboto"><?php echo $value["name"];?></a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col" text-align="right" style=" font-family: roboto" value="<?php echo number_format($value["gia"]);?>"><?php echo number_format($value["gia"]);?><sup>đ</sup></td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <form action="addtocart.php">
                                                        <input type="hidden" name="action" value="update">
                                                        <input type="hidden" name="id" value ="<?php echo $value['id'];?>">
                                                        <div class="input-group input-spinner">
                                                            <div class="input-group-prepend"><button name="action" value="decrease" style="min-width: 26px" class="btn btn-decrement btn-spinner" type="submit"><i class="icon-minus"></i></button></div>
                                                            <input id="soluong" type="" name="slg" style=" font-family: roboto; text-align: center" class="form-control" value="<?php echo $value['slg'];?>">
                                                            <div class="input-group-append"><button name="action" value="increase" style="min-width: 26px" class="btn btn-increment btn-spinner" type="submit"><i class="icon-plus"></i></button><div></div>
                                                        </div>
                                                    </form>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col" style=" font-family: roboto" color="black"><?php echo number_format($value['gia']* $value['slg'])?><sup>đ</sup></td>
                                            <?php $tongtien += $value['gia'] * $value['slg']?>
                                            <td class="remove-col"><button class="btn-remove" ><a href="addtocart.php?id=<?php echo $value['id']?>&action=delete" class="icon-close"></a></button></td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php $_SESSION['tongtien']=$tongtien; ?>


                                    </tbody>
                                </table><!-- End .table table-wishlist -->
 
                                <div class="cart-bottom">
                                    <div class="cart-discount">
                                        <form action="#" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name ="giamgia" required placeholder="mã giảm giá">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                                </div><!-- .End .input-group-append -->
                                            </div><!-- End .input-group -->
                                        </form>
                                    </div><!-- End .cart-discount -->
                                    
                                </div><!-- End .cart-bottom -->
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title" style=" font-family: roboto">Tổng thanh toán</h3><!-- End .summary-title -->
 
                                    <table class="table table-summary" style=" font-family: roboto">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Tổng tiền:</td>
                                                <td><?php echo number_format($_SESSION['tongtien']) ?></td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr class="summary-shipping">
                                                <td>&nbsp;</td>
                                            </tr>
 
                                            <tr class="summary-shipping-row" style=" font-family: roboto">
                                                <td>
                                                        <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">Phí ship:</label>
                                                </td>
                                                <td>20,000</td>

                                            </tr><!-- End .summary-shipping-row -->
                                            <tr class="summary-shipping-row" style=" font-family: roboto">
                                            <?php $thanhtoan=0;
                                            if(isset($_POST["giamgia"]))
                                            {
                                            if($_POST["giamgia"]=="LIXI2023sun")
                                            {
                                                ?>
                                                <td>
                                                        <input type="radio" id="ma" name="ma" class="custom-control-input">
                                                        <label class="custom-control-label" for="ma">Mã giảm giá:</label>
                                                </td>
                                                <td>500,000</td>

                                            </tr>
                                            <tr class="summary-total" style=" font-family: roboto">
                                                <td>Tổng:</td>
                                                <td><?php echo number_format($thanhtoan=$_SESSION['tongtien'] +20000-500000) ?></td>
                                            </tr><!-- End .summary-total -->
                                            <?php $_SESSION['thanhtoan']=$thanhtoan;?>

                                            <?php
                                            }
                                            elseif($_POST["giamgia"]!="LIXI2023sun") {
                                                ?>
                                                <td>
                                                        <input type="radio" id="ma" name="ma" class="custom-control-input">
                                                        <label class="custom-control-label" for="ma">Mã giảm giá:</label>
                                                </td>
                                                <td>0</td>

                                            </tr>
                                            <tr class="summary-total" style=" font-family: roboto">
                                                <td>Tổng:</td>
                                                <td><?php echo number_format($thanhtoan=$_SESSION['tongtien'] +20000) ?></td>
                                            </tr><!-- End .summary-total --> 
                                            <?php $_SESSION['thanhtoan']=$thanhtoan;?>
                                            <?php
                                            }
                                            
                                        }
                                        else{?>
                                            <tr class="summary-total" style=" font-family: roboto">
                                            <td>Tổng:</td>
                                            <td><?php echo number_format($thanhtoan=$_SESSION['tongtien'] +20000) ?></td>
                                            </tr><!-- End .summary-total --> 
                                            <?php $_SESSION['thanhtoan']=$thanhtoan;?>

                                        <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table><!-- End .table table-summary -->
 
                                    <a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block" style=" font-family: roboto">Tiến hành thanh toán</a>
                                </div><!-- End .summary -->
 
                                <a href="listsanpham.php" class="btn btn-outline-dark-2 btn-block mb-3" style=" font-family: roboto"><span>Tiếp tục mua sắm</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
 
<script>
    function Increase(){        
        document.getElementById("soluong").value++;
    }

    function Decrease(){
        document.getElementById("soluong").value > 1 ? document.getElementById("soluong").value-- : document.getElementById("soluong").value = 1;
    }
</script>
 
<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
</html>

