
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo1.png"/>

    <title> Trang sửa trạng thái đơn hàng</title>

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
                  include("../config/dbconfig.php");
                  $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

                  // Bước 2: Lấy dữ liệu từ trên đường đẫn
                  $id = $_GET["id"];
                  $sql = "
                    SELECT * 
                    FROM yeucaudoitra
                    WHERE yeucauid = ".$id;  
                  $dulieu = mysqli_query($ketnoi, $sql);
                  $row = mysqli_fetch_array($dulieu);
                  ;?> 
            <!-- page content -->
            <div class="right_col" role="main">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h1>SỬA YÊU CẦU ĐỔI TRẢ</h1>
                  <form method="post" action="suayeucauthuchien.php" enctype="multipart/form-data">
              
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã yêu cầu: <span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input name="txtdhid" type="text" class="form-control" value="<?php echo $row["yeucauid"];?>" readonly>

                    </div>
                  </div>

                  <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại yêu cầu<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select name="txtDmtt">
                        <?php
                        // Bước 1: Kết nối đến CSDL
                        include("../config/dbconfig.php");
                        $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                        mysqli_set_charset($ketnoi, 'UTF8');
                        $id = $_GET["id"];
                          $sql = "
                          SELECT * 
                          FROM loaiyeucau";
                         
                             $dulieu = mysqli_query($ketnoi, $sql);
                        while ($row1 = mysqli_fetch_array($dulieu)) {
                            if($row["loaiyeucauid"]==$row1["loaiyeucauid"]) {
                        ;?>
                            <option value="<?php echo $row1["loaiyeucauid"];?>" selected><?php echo $row1["tenyeucau"];?></option>
                        <?php
                            } else {
                        ;?>
                            <option value="<?php echo $row1["loaiyeucauid"];?>"><?php echo $row1["tenyeucau"];?></option>
                        <?php
                            }
                        }
                        ;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group" style="float: right;">
                    <input type="hidden" name="txtID" value='<?php echo $row["yeucauid"];?>'>
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