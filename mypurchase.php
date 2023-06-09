<!DOCTYPE html>
<html lang="vi">
<meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .example{
            margin: 20px;
			color: black;
        }
		div.col-md-12{
			padding: 0px
		}
    </style>
<?php
require("header.php");

?>


<body>

    <div class="page-wrapper">

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
        		<div class="container">
        			<h1 class="page-title" style="font-family: roboto;">Lịch sử mua hàng<span>Coop Food</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" ><a href="index.php" style="font-family: roboto">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style=" font-family: roboto">Lịch sử mua</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="ads-grid py-sm-5 py-4">
				<div class="container py-xl-4 py-lg-2">
					<div class="row">
						<!-- product left -->
						<div class="agileinfo-ads-display col-lg-9">
							<div class="wrapper">
								<!-- first section -->
								<?php
								if(isset($_GET['id'])){
									$id_khachhang = $_GET['id'];
								}else{
									$id_khachhang = '';
								}
								//$sql_select = mysqli_query($conn,"SELECT donhang.donhangid, hinhanh, donhang.ngaydat, tensanpham, chitietdonhang.soluong, tongtien, gia FROM donhang join chitietdonhang on donhang.donhangid = chitietdonhang.donhangid join sanpham on chitietdonhang.sanphamid = sanpham.sanphamid" ); 
								; 

								?>
								    <div class="example" style=" font-family: roboto">
										<p style=" font-family: roboto; color: black; font-size: 20px">
											<?php
											if(isset($_SESSION['dangnhap_home'])){
												echo 'Khách hàng : '.$_SESSION['dangnhap_home'];
											} 
											?>
										</p><br>

										<div class="container" style=" font-family: roboto, color: black">
																						
												<table class="table table-bordered ">
													<tr>
														<th style="color:black; text-align: center">Thứ tự</th>
														<th style="color:black; text-align: center">Mã giao dịch</th>
														<th style="color:black; text-align: center">Ngày đặt</th>
														<th style="color:black; text-align: center">Tổng tiền</th>
														<th style="color:black; text-align: center">Trạng thái đơn hàng</th>
														<th style="color:black; text-align: center">Chi tiết</th>
														<th style="color:black; text-align: center">Thực hiện</th>
													</tr>

													<?php
													$sql1= mysqli_query($conn,"SELECT * FROM yeucaudoitra");
													$row1 = mysqli_fetch_array($sql1);
													$sql_select = mysqli_query($conn,"SELECT * FROM chitietdonhang join donhang  on chitietdonhang.donhangid= donhang.donhangid join trangthai on trangthai.trangthaiid=donhang.trangthaiid WHERE donhang.khachhangid='$id_khachhang' GROUP BY chitietdonhang.donhangid");
													$i=0;
													while($row_donhang = mysqli_fetch_array($sql_select))

													{ 
														$i++;
													?> 
													<tr>
														<td style=" font-family: roboto; text-align: center"><?php echo $i; ?></td>

														<td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['donhangid']; ?></td>


														<td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['ngaydat']; ;?>	
														
														</td>
							
														


														<td rowspan="" style=" font-family: roboto; text-align: center"><?php echo number_format($row_donhang['tongtien'])?></td>
														<td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['tentrangthai'] ?></td>
														<td style="text-align: center" ><a style=" font-family: roboto" href="chitietdonhang.php?id=<?php echo $row_donhang['donhangid']?>">Xem chi tiết</a></td>

														<td>

														<?php
															$today = date('Y-m-d'); 
															$first_date = strtotime($today);
															
															$second_date = strtotime($row_donhang['ngaynhan']);
															
															$datediff = abs($first_date - $second_date);
				
															$songay= floor($datediff/(60*60*24));

															if($songay<='7' and $row_donhang['trangthaiid']==3 and $row1["donhangid"]<>$row_donhang['donhangid'])
															{
    ;?>
    
<a href="./yeucau.php?id=<?php echo $row_donhang['donhangid'];?>"><button href="./yeucau.php?id=<?php echo $row_donhang['donhangid'];?>" class="btn btn-primary" style="background-color: #017ee9; border-top-right-radius: 3px; border-bottom-right-radius: 3px;"><span>Yêu cầu đổi/trả</span></button></a>

<?php 
}
 else if ($row_donhang['trangthaiid']<3) {;?>
 	<button class="btn btn-primary" style="background-color: #017ee9; border-top-right-radius: 3px; border-bottom-right-radius: 3px;" disabled="disabled"><span>Yêu cầu đổi/trả</span></button>

 
<?php 
}
else if ($row1["donhangid"]==$row_donhang['donhangid']) {
	;?>
 	<button class="btn btn-primary" style="background-color: white; border-top-right-radius: 3px; border-bottom-right-radius: 3px;" disabled="disabled"><span style="color: red;">Đơn hàng đổi/trả</span></button>

<?php 
}
else {;?>
 	<button class="btn btn-primary" style="background-color: white; border-top-right-radius: 3px; border-bottom-right-radius: 3px;" disabled="disabled"><span style="color: red;">Hoàn thành đơn hàng</span></button>

<?php 
} 

;?>
															
													</td>
													
													</tr>
													<?php
													} 
													?> 
												</table>
											</div>
										</div>
        							</div>
									</div>
									</div>
								<!-- //first section -->
							</div>
						</div>
						<!-- //product left -->
						<!-- product right -->	
					</div>
				</div>
			</div>
		</main><!-- End .main -->
    </div>

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