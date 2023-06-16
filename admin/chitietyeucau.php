








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
                            <h1>QUẢN TRỊ YÊU CẦU ĐỔI - TRẢ</h1>
                            
                            <div>
                                <?php

                                include("../config/dbconfig.php");
                                $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                                mysqli_set_charset($conn, 'UTF8');
                                $id=$_GET['id'];
                                $order = mysqli_query($conn, "SELECT * from yeucaudoitra a join chitietyeucau b on a.yeucauid=b.yeucauid join tinhtrang c on a.tinhtrangid=c.tinhtrangid 
                                join khachhang d on a.khachhangid=d.khachhangid join  loaiyeucau f on a.loaiyeucauid = f.loaiyeucauid join donhang e on a.donhangid=e.donhangid WHERE a.yeucauid = ".$id);
                                $order = mysqli_fetch_all($order, MYSQLI_ASSOC);
                                $sql_select = mysqli_query($conn,"SELECT *  from chitietyeucau a  join sanpham b on a.sanphamid=b.sanphamid  where a.yeucauid=".$id); 

                                $sql3 = "
                                SELECT * 
                                FROM yeucaudoitra  a join nhanvien b on a.nhanvienid=b.nhanvienid WHERE a.yeucauid = ".$id ;
                                $dulieu3 = mysqli_query($ketnoi, $sql3);
                                $row3 = mysqli_fetch_array($dulieu3);?>

                                <div class="row">
                                    <?php
                                    if(  $order[0]['tinhtrangid'] ==1) 
                                    { ?>
                                    <form method="post" action="capnhatyeucau.php?id=<?php echo $id;?>" enctype="multipart/form-data">

                                        <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="margin-top: 10px">Nhân viên xử lý: <span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="txtnhanvien" style="margin-top: 10px">
                                            <?php  
                                            // Bước 1: Kết nối đến CSDL
                                            include("../config/dbconfig.php");
                                            $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                                             mysqli_set_charset($ketnoi, 'UTF8');               
                                            $sql = "
                                              SELECT * 
                                              FROM nhanvien";
                                            $dulieu = mysqli_query($ketnoi, $sql);
                                            while ($row = mysqli_fetch_array($dulieu)) {
                                            ;?>
                                                <option value="<?php echo $row["nhanvienid"];?>"><?php echo $row["tennhanvien"];?></option>
                                            <?php
                                            }
                                            ;?>
                                            </select>
                                        </div>
                                        </div>


                                        <div>
                                        <label><strong>Yêu cầu:</strong> <span> <?= $order[0]['tenyeucau'] ?></span> </label>
                                        </div>
                                        <div>
                                        <label><strong>Trạng thái:</strong> <span> <?= $order[0]['tentinhtrang'] ?></span> </label>
                                        </div>
                                        <div>
                                            <label><strong>Khách hàng: </strong> <span> <?= $order[0]['tenkhach'] ?></span> </label>
                                        </div>
                                        <div>
                                            <label><strong>Thời gian yêu cầu: </strong><span> <?= $order[0]['ngayyeucau'] ?></span></label>
                                        </div>
                                        <div>
                                         <label><strong>Thời gian hoàn thành: </strong><span> <?php echo 'Đang cập nhật' ?></span></label>                         
                                        </div>
                                        <div>
                                            <label><strong>Điện thoại: </strong><span> <?= $order[0]['sdt'] ?></span></label>
                                        </div>
                                        <div>
                                            <label><strong>Địa chỉ: </strong><span> <?= $order[0]['chitietdiachi'] ?></span></label>
                                        </div>
                                        <table class="table table-bordered ">
                                        <tr>
                                            <th style="color:black; font-family: roboto; text-align: center">Thứ tự</th>
                                            <th style="color:black; font-family: roboto; text-align: center">Mã sản phẩm</th>													
                                            <th style="color:black; font-family: roboto; text-align: center">Tên sản phẩm</th>
                                            <th style="color:black; font-family: roboto; text-align: center">Số lượng yêu cầu</th>
                                            <th style="color:black; font-family: roboto; text-align: center">Hình ảnh đính kèm</th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        $sql_select2 = mysqli_query($conn,"SELECT *  from chitietyeucau a  join sanpham b on a.sanphamid=b.sanphamid  where a.yeucauid=".$id);
                                        while($row_donhang = mysqli_fetch_array($sql_select)){ 
                                            $i++;
                                        ?> 
                                        <tr>
                                            <td style=" font-family: roboto; text-align: center"><?php echo $i; ?></td>
                                            <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang["sanphamid"]?></td>
                                            <td style=" font-family: roboto; text-align: center"><a href="product.php?id=<?php echo $row_donhang["sanphamid"];?>" style="font-family: roboto"><?php echo $row_donhang["tensanpham"]; ?></a></td>									
                                            <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang["soluongyc"] ?></td>
                                            <?php 
                                                
                                                $row_donhang2 = mysqli_fetch_assoc($sql_select2); 

                                                $base64Image = base64_encode($row_donhang2['hinhanhyeucau']);
                                                $imgSrc = 'data:' . $row_donhang2['hinhanhContent'] . ';base64,' . $base64Image ?>
                                            <td><img src="<?php echo $imgSrc; ?>" alt="" style = "width: 300px;   display: block; margin-left: auto; margin-right: auto;"></td>								
                                        </tr>
                                        <?php
                                        } 
                                        ?> 
                                        </table>
                                    
                                    
                                        <button type="submit" value="" name ="pheduyet">Phê duyệt</button>
                                    
                                        <button type="submit"   value="" name="tuchoi">Từ chối</button>

                                    </form> 

                                            <?php }

                                            else  { ?>
 
 
                                    <form method="post" action="capnhatyeucau.php?id=<?php echo $id;?>" enctype="multipart/form-data">

                                    
                                    
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><strong>Nhân viên xử lý: </strong> <span> <?php echo $row3["tennhanvien"] ?></span> </label>       
                                        </div> 
                                     
 
                                            <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><strong>Loại yêu cầu: </strong> <span> <?php echo $order[0]["tenyeucau"] ?></span> </label>

                                            </div>
                                            
                                            <div>
                                                <label><strong>Trạng thái:</strong> <span> <?= $order[0]['tentinhtrang'] ?></span> </label>
                                            </div>

                                            <div>
                                                <label><strong>Khách hàng: </strong> <span> <?= $order[0]['tenkhach'] ?></span> </label>
                                            </div>

                                            <div>
                                                <label><strong>Thời gian yêu cầu: </strong><span> <?= $order[0]['ngayyeucau'] ?></span></label>
                                            </div>

                                            <div>
                                              <?php
                                              if(  $order[0]['tinhtrangid']== 2 || $order[0]['tinhtrangid']== 3) {
                                              ?>
                                             <label><strong>Thời gian hoàn thành: </strong><span> <?php echo 'Đang cập nhật' ?></span></label>
                                            
                                                <?php 
                                                } 
                                                else {?>
                                                    <label><strong>Thời gian hoàn thành: </strong><span> <?= $order[0]['ngayhoanthanh'] ?></span></label>
                                                <?php } ?>
                                            </div>
                                                
                                            <div>
                                                <label><strong>Điện thoại: </strong><span> <?= $order[0]['sdt'] ?></span></label>
                                            </div>
                                                
                                            <div>
                                                <label><strong>Địa chỉ: </strong><span> <?= $order[0]['chitietdiachi'] ?></span></label>
                                            </div>
                                                
                                            <table class="table table-bordered ">
                                            <tr>
                                                <th style="color:black; font-family: roboto; text-align: center">Thứ tự</th>
                                                <th style="color:black; font-family: roboto; text-align: center">Mã sản phẩm</th>													
                                                <th style="color:black; font-family: roboto; text-align: center">Tên sản phẩm</th>
                                                <th style="color:black; font-family: roboto; text-align: center">Số lượng yêu cầu</th>
                                                <th style="color:black; font-family: roboto; text-align: center">Hình ảnh đính kèm</th>
                                            </tr>
                                            <?php
                                            $i = 0;
                                            $sql_select2 = mysqli_query($conn,"SELECT *  from chitietyeucau a  join sanpham b on a.sanphamid=b.sanphamid  where a.yeucauid=".$id);

                                            while($row_donhang = mysqli_fetch_array($sql_select)){ 
                                                $i++;
                                            ?> 
                                            <tr>
                                                <td style=" font-family: roboto; text-align: center"><?php echo $i; ?></td>
                                                <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang["sanphamid"]?></td>
                                                <td style=" font-family: roboto; text-align: center"><a href="product.php?id=<?php echo $row_donhang["sanphamid"];?>" style="font-family: roboto"><?php echo $row_donhang["tensanpham"]; ?></a></td>									
                                                <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang["soluongyc"] ?></td>
                                                <?php 

                                                    $row_donhang2 = mysqli_fetch_assoc($sql_select2); 

                                                    $base64Image = base64_encode($row_donhang2['hinhanhyeucau']);
                                                    $imgSrc = 'data:' . $row_donhang2['hinhanhContent'] . ';base64,' . $base64Image ?>
                                                <td><img src="<?php echo $imgSrc; ?>" alt="" style = "width: 300px;   display: block; margin-left: auto; margin-right: auto;"></td>								
                                            </tr>
                                            <?php
                                            } 
                                            ?> 
                                            </table>

                                            <?php if( $order[0]['tinhtrangid'] ==2   ) { ?>
                                                    <button type="submit" value="" name ="xuly" >Đang xử lý</button> <?php
                                                    if($order[0]['loaiyeucauid'] =='1'){ ?>
                                                        <button type="submit"   value="" name="huy" >Hủy yêu cầu</button>
                                                    <?php
                                                    } 


                                                        } else if(  $order[0]['tinhtrangid'] ==3 )  {  ?>
                                                        <button type="submit"   value="" name="thanhcong">Thành công</button>
                                                        
                                                <?php } ?>
                                    </form>
                                        <?php
                                         }
                                          ?>
                                </div>
                            </div>
                        </div>          
                    </div>
                    </div>
                                <?php include("bottom.php");?>
                </div>
            </div>
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