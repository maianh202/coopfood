
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo1.png"/>

    <title> Trang sửa sản phẩm</title>

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
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>   
  </head>

  <body class="nav-md" style="background-color:#212529;">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
         
            <?php 
                  include("top.php");

            // Bước 1: Kết nối đến CSDL 
                  include("../config/dbconfig.php");
                  $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

                  // Bước 2: Lấy dữ liệu từ trên đường đẫn
                  $id = $_GET["id_sanpham"];

                  //Bước 3: Hiển thị các dữ liệu trong bảng tbl_tin_tuc ra đây
                  $sql = "
                    SELECT * 
                    FROM sanpham
                    WHERE sanphamid = ".$id;
                  
                  $dulieu = mysqli_query($ketnoi, $sql);

                  $row = mysqli_fetch_array($dulieu);
          ;?> 
            <!-- page content -->
            <div class="right_col" role="main">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h1>SỬA SẢN PHẨM</h1>
                  <form method="post" action="sanpham-sua-thuc-hien.php" enctype="multipart/form-data">
             
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input name="txtTensp" type="text" class="form-control" value="<?php echo $row["tensanpham"];?>">
                    </div>
                  </div>

                  <br><br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá bán<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input name="txtGiaban" type="number" class="form-control" value="<?php echo $row["giaban"];?>">
                    </div>
                  </div>
                  <br><br><br>
  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá khuyến mãi<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input name="txtGiakm" type="number" class="form-control" value="<?php echo $row["giakhuyenmai"];?>">
                    </div>
                  </div>
                  <br><br><br>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea name="txtMota" class="form-control col-md-7 col-xs-12"><?php echo $row["mota"];?></textarea>
                    </div>
                  </div>
                  <br><br><br><br>

                    
                        <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea name="txtsl" class="form-control col-md-7 col-xs-12"><?php echo $row["soluong"];?></textarea>
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục sản phẩm<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="txtDmsp">
                        <?php
                        // Bước 1: Kết nối đến CSDL
                        include("../config/dbconfig.php");
                        $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                         mysqli_set_charset($ketnoi, 'UTF8');

                        // Bước 2: Lấy dữ liệu từ trên đường đẫn
                        $id = $_GET["id_sanpham"];

                        $sql = "SELECT * FROM danhmuc";
                          
                        $dulieu = mysqli_query($ketnoi, $sql);
                        while ($row1 = mysqli_fetch_array($dulieu)) {
                            if($row["danhmucid"]==$row1["danhmucid"]) {
                            ;?>
                            <option value="<?php echo $row1["danhmucid"];?>" selected><?php echo $row1["tendanhmuc"];?></option>
                            <?php
                            } else {
                            ;?>
                            <option value="<?php echo $row1["danhmucid"];?>"><?php echo $row1["tendanhmuc"];?></option>
                            <?php
                            }
                        }
                            ;?>
                        </select>
                    </div>
                  </div>
                  
                  <br><br><br>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh minh họa</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input name="txtAnhMinhHoa" type="file" class="form-control">
                    </div>
                  </div>
                  <br><br><br>


                  <div class="form-group" style="float: right;">
                   <input type="hidden" name="txtID" value='<?php echo $row["sanphamid"];?>'>
                    <button type="submit">Sửa</button>
                  </div>
                  <br>

                </div>
                </form>
              </div>
            </div>
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