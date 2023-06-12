<!DOCTYPE html>
<html lang="en">
<?php
require("header.php");
if(isset($_POST['mua'])){
	$khachhang_id = $_SESSION['khachhangid'];
	$note=$_POST['note'];
	$phone=$_POST['phone'];
	$address = $_POST['address'];
	$tien = $_SESSION['thanhtoan'];
	$thanhpho=$_POST['thanhpho'];
	$quan=$_POST['quan'];
	$phuong=$_POST['phuong'];

	$query = mysqli_query($conn,"INSERT INTO `donhang` (`donhangid`, `khachhangid`,  `ngaydat`, `ngaynhan`, `tongtien`, `ghichu`, `trangthaiid`, `sdt`, `thanhpho`, `quan`, `phuong`, `chitietdiachi`) VALUES (NULL, '".$khachhang_id."', current_timestamp(), NULL, '".$tien."', '".$note."', '1', '".$phone."', '".$thanhpho."' ,'".$quan."','".$phuong."', '".$address."');"); //lần lượt insert vào bảng đơn hàng
	if($query){
		$magd = mysqli_insert_id($conn); // mã giao dịch là mã đơn hàng
		foreach ($cart  as $value){
			mysqli_query($conn, "INSERT INTO `chitietdonhang` (`donhangid`, `sanphamid`, `gia`, `soluong`, `thanhtien`) VALUES ('$magd', '$value[id]', '$value[gia]', '$value[slg]','$value[gia]'* '$value[slg]'); ");
			mysqli_query($conn, "UPDATE `sanpham` SET `soluong` = `soluong`-'$value[slg]' WHERE `sanpham`.`sanphamid` = '$value[id]'; ");
		}
	unset($_SESSION['cart']);
	echo "<script type='text/javascript'>  window.location='index.php'; alert('Đặt hàng thành công. Vui lòng kiểm tra email');</script>";
	//echo "<script> alert('Đặt hàng thành công. Vui lòng kiểm tra email') </script>";
	}
	require('./mail/sendMail.php');
	$tieude = "Bạn đã đặt hàng thành công!!!";
	$noidung = "<h2>Cảm ơn quý khách đã đặt hàng.</h2> <p> Quý khách chọn thanh toán bằng ATM vui lòng chuyển khoản qua số tài khoản sau: 686868686868 - MBbank - CoopFood</p>
	<p>Kiểm tra thông tin đơn hàng trên website CoopFoode/p>

	<p>Chúc bạn một ngày vui vẻ</p>";

	$maildathang=$_SESSION['email'];
	$mail =new mailer();
	$mail->dathangmail($tieude, $noidung, $maildathang);

}

?>


<body>

    <div class="page-wrapper">

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
        		<div class="container">
        			<h1 class="page-title">Thanh toán<span>COOP FOOD</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" style=" font-family: roboto"><a href="index.php" >Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style=" font-family: roboto">Thanh toán</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
			<?php if(isset($_SESSION['dangnhap_home'])){?>
			<form action="" method="POST">
            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="" method ="">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title" style=" font-family: roboto">Chi tiết hóa đơn</h2><!-- End .checkout-title -->
									<label style=" font-family: roboto">Họ tên *</label>
	            						<input style=" font-family: roboto" type="text" name="name" class="form-control"  value="<?php echo $_SESSION['dangnhap_home']?>">

										<label style=" font-family: roboto">Email *</label>
	        							<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']?>">

										<label style=" font-family: roboto">Thành phố</label>
	            						<input style=" font-family: roboto" type="text" class="form-control" name="thanhpho" placeholder="Thành phố.... " required>

										<label style=" font-family: roboto">Quận/Huyện</label>
	            						<input style=" font-family: roboto" type="text" class="form-control" name="quan" placeholder="Quận.... " required>
										
										<label style=" font-family: roboto">Phường/Xã</label>
	            						<input style=" font-family: roboto" type="text" class="form-control" name="phuong" placeholder="Phường.... " required>

	            						<label style=" font-family: roboto">Địa chỉ cụ thể *</label>
	            						<input style=" font-family: roboto" type="text" class="form-control" name="address" placeholder="Số nhà, xóm, phường.... " required>

	                					<label style=" font-family: roboto">Số điện thoại *</label>
	        							<input type="text" name="phone" class="form-control" required>

	                					<label style=" font-family: roboto">Ghi chú: </label>
	        							<textarea style=" font-family: roboto" class="form-control" cols="30" rows="4" name = "note" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: vấn đề giao hàng...."></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title" style=" font-family: roboto">Đơn hàng của bạn</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th style=" font-family: roboto">Sản phẩm</th>
		                							<th style=" font-family: roboto">Tổng</th>
		                						</tr>
		                					</thead>

		                					<tbody>
											<?php foreach ($cart as $key => $value) :?>

		                						<tr>
		                							<td><a href="product.php?id=<?php echo $value["id"];?>"><?php echo $value["name"];?></a></td>
		                							<td><?php echo number_format($value["gia"]*$value["slg"])?><sup>đ</sup></td>
		                						</tr>
											<?php endforeach ?>
		                						</tr>
												<tr class="summary-shipping-row" style=" font-family: roboto">
												<tr class="summary-total" style=" font-family: roboto">
                                                <td>Thanh toán:</td>
                                                <td><?php echo number_format($_SESSION['thanhtoan']) ?></td>
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1" style=" font-family: roboto">
										                    Thanh toán chuyển khoản
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment" >
										            <div class="card-body">
													Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến khi chúng tôi nhận được tiền. Số tài khoản sẽ được gửi vào mail khi bạn click thanh toán.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" style=" font-family: roboto">
										                    Thanh toán khi nhận được hàng
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">Vui lòng thanh toán cho shipper sau khi bạn nhận và kiểm tra hàng. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" name="mua">
		                					<span class="btn-text" style=" font-family: roboto">Đặt hàng</span>
		                					<span class="btn-hover-text" style=" font-family: roboto">Tiến hành thanh toán</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
			</form>
			<?php }else{ ?>
			<div class = "alert alert-danger">
				<button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Vui lòng đăng nhập để mua hàng</strong><a href="index.php?action=checkout">  Đăng nhập</a>
			</div>
			<?php } ?>
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


<!-- molla/checkout.html  22 Nov 2019 09:55:06 GMT -->
</html>