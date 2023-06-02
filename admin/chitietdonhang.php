








<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo1.png"/>

    <title>Coop Food| Trang quản trị đơn hàng đang giao</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" style="background-color:#212529;">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include("top.php");?>

            <!-- page content -->
            <div class="right_col" role="main">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h1>QUẢN TRỊ ĐƠN HÀNG ĐANG GIAO</h1>
                  <div>
                  <?php

                  include("../config/dbconfig.php");
                  $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                  mysqli_set_charset($conn, 'UTF8');
                  $id=$_GET['id'];
                  $order = mysqli_query($conn, "SELECT * from donhang a join trangthai b on a.trangthaiid=b.trangthaiid join chitietdonhang c on a.donhangid=c.donhangid join khachhang d on a.khachhangid=d.khachhangid  WHERE a.donhangid = ".$id);
                  $order = mysqli_fetch_all($order, MYSQLI_ASSOC);
                  $sql_select = mysqli_query($conn,"SELECT * from chitietdonhang a join sanpham b on a.sanphamid=b.sanphamid  where a.donhangid=".$id);


                  ?>
        <div class="row">
            <label><strong>Người nhận: </strong> <span> <?= $order[0]['tenkhach'] ?></span> </label>
        </div>

        <div>
            <label><strong>Điện thoại: </strong><span> <?= $order[0]['sdt'] ?></span></label>
        </div>

        <div>
            <label><strong>Địa chỉ: </strong><span> <?= $order[0]['diachi'] ?></span></label>
        </div>

        <div>
            <label><strong>Trạng thái: </strong><span> <?= $order[0]['tentrangthai'] ?></span></label>
        </div>




<table class="table table-bordered ">
<tr>
    <th style="color:black; font-family: roboto; text-align: center">Thứ tự</th>
    <th style="color:black; font-family: roboto; text-align: center">Mã giao dịch</th>													
    <th style="color:black; font-family: roboto; text-align: center">Tên sản phẩm</th>
    <th style="color:black; font-family: roboto; text-align: center">Số lượng</th>
    <th style="color:black; font-family: roboto; text-align: center">Giá</th>
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
    <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['gia'] ?></td>											
</tr>
<?php
} 
?> 
</table>
<a type="submit" href ="capnhattrangthaidanggiaothuchien.php?id=<?php echo $id;?>">Cập nhât trạng thái
</a>

       
            <!-- /page content -->

            <?php include("bottom.php");?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>