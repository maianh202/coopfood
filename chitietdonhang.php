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
	
            <?php
            if(isset($_GET['id'])){
            	$id_khachhang = $_GET['id'];
            }else{
            	$id_khachhang = '';
            }
            ?>

			<div class="example" style=" font-family: roboto">
				<p style=" font-family: roboto; color: black; font-size: 20px">
					<?php
					if(isset($_SESSION['dangnhap_home'])){
						echo 'Xin chào khách hàng : '.$_SESSION['dangnhap_home'];
					} 
					?>
				</p><br>
				<div class="container" style=" font-family: roboto, color: black">		
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12"style="font-size: 18px" >
                            <?php
                            include("config/dbconfig.php");
                            $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                            mysqli_set_charset($conn, 'UTF8');
                            $id=$_GET['id'];
                            $order = mysqli_query($conn, "SELECT * from donhang a join trangthai b on a.trangthaiid=b.trangthaiid join chitietdonhang c on a.donhangid=c.donhangid join khachhang d on a.khachhangid=d.khachhangid WHERE a.donhangid = ".$id);
                            $order = mysqli_fetch_all($order, MYSQLI_ASSOC);
                            $sql_select = mysqli_query($conn,"SELECT a.donhangid,a.sanphamid,a.gia,a.soluong,a.thanhtien,b.tensanpham  from chitietdonhang a  join sanpham b on a.sanphamid=b.sanphamid  where a.donhangid=".$id);         
                            ?>
                            <div>
                             <label style="font-size: 18px ; color: black"><strong >Mã đơn hàng: </strong><span> <?= $order[0]['donhangid'] ?></span></label>
                            </div>

                            <div>
                             <label style="font-size: 18px ; color: black"><strong >Thời gian đặt hàng: </strong><span> <?= $order[0]['ngaydat'] ?></span></label>
                            </div>

                            <div>
                            <?php
                            if( $order[0]['tentrangthai']== 3 ||  $order[0]['tentrangthai']== 4) 
                            {
                            ?>
                                <label style="font-size: 18px ; color: black"><strong>Thời gian hoàn thành: </strong><span> <?= $order[0]['ngaynhan'] ?></span></label>
                            </div>
 
                            <?php 
                            }?>
                            <div>
                              <label style="font-size: 18px ; color: black"><strong>Tổng tiền: </strong><span> <?= $order[0]['tongtien'] ?> đồng</span></label>
                            </div>
                            <div>
                                <label style="font-size: 18px ; color: black"><strong>Trạng thái: </strong><span> <?= $order[0]['tentrangthai'] ?></span></label>
                            </div>
                        </div>

                        <table class="table table-bordered ">
                        <tr>
                            <th style="color:black; font-family: roboto; text-align: center">Thứ tự</th>
                            <th style="color:black; font-family: roboto; text-align: center">Mã giao dịch</th>													
                            <th style="color:black; font-family: roboto; text-align: center">Tên sản phẩm</th>
                            <th style="color:black; font-family: roboto; text-align: center">Số lượng</th>
                            <th style="color:black; font-family: roboto; text-align: center">Giá tiền</th>
                        </tr>
                        <?php
                        $i = 0;
                        while($row_donhang = mysqli_fetch_array($sql_select)){ 
                            $i++;
                        ?> 
                        <tr>
                            <td style=" font-family: roboto; text-align: center"><?php echo $i; ?></td>
                            <td style=" font-family: roboto; text-align: center"><?php echo "$id"?></td>
                            <td style=" font-family: roboto; text-align: center"><a href="product.php?id=<?php echo $row_donhang["sanphamid"];?>" style="font-family: roboto"><?php echo $row_donhang['tensanpham']; ?></a></td>									
                            <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['soluong'] ?></td>
                            <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['gia'] ?> đồng</td>											
                        </tr>
                        <?php
                        } 
                        ?> 

                        </table>
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