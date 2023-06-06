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
$id=$_GET['id'];
$khachhang=$_SESSION['khachhangid']
?>
<body>
    <main class="main">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">                       
                        <div class="row">
                            <div class="col-md-5">
        
                            </div><!-- End .col-md-5 -->

                            <div class="col-md-7" style="width: 960px;"> 
                                    <div class="right_col" role="main">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12"> 
                                                <form onsubmit = "return validateCheckbox();" action="xuliyeucau.php?id=<?php echo $id ;?>" style=" margin: 5px; border-color: black;" method="post" enctype="multipart/form-data">
                                                    <h3 style="color: #005DAC ;text-align: center; margin: 50px 50px 25px 25px" >Yêu cầu đổi trả</h3>
                                                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                                                    <h3 class="summary-title" style=" font-family: roboto">THÔNG TIN ĐƠN HÀNG</h3>
                                                    <!-- End .summary-title -->
                                                    <?php
                                                    // Bước 1: Kết nối đến CSDL
                                                    $ketnoi = mysqli_connect($servername, $username, $password, $dbname);
                                                    /*mysqli_set_charset($ketnoi, 'UTF8');*/
                                                    // Bước 2: Lấy dữ liệu từ trên đường đẫn
                                                    $sql="SELECT * FROM khachhang WHERE khachhangid=".$khachhang;
                                                    $sql1="SELECT * FROM donhang WHERE donhangid=".$id;
                                                    $dulieu = mysqli_query($ketnoi, $sql);
                                                    $row = mysqli_fetch_array($dulieu);
                                                    $dulieu1 = mysqli_query($ketnoi, $sql1);
                                                    $row1 = mysqli_fetch_array($dulieu1);
                                                    ;?>

                                                    <table style="margin-left: 50px">
                                                        <tr>
                                                            <th>Tên khách hàng<span class="required">*:</span></th><th><?php echo $row["tenkhach"] ;?><th>
                                                        </tr>
                                                        <tr>
                                                            <th>Mã đơn hàng<span class="required">*:</span></th><th><input type="text" name="txtdonhang" value="<?php echo $id ;?>" style="border: none;"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Thời gian đặt<span class="required">*:</span></th><th><?php echo $row1['ngaydat'] ;?><th>
                                                        </tr>
                                                        <tr>
                                                            <th>Tổng tiền<span class="required">*:</span></th><th><?php echo number_format($row1['tongtien']).'₫'  ;?><th>
                                                        </tr>
                                                    </table><br>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 50px;"> 
                                                        <h3 class="summary-title" style=" font-family: roboto">CHI TIẾT ĐƠN HÀNG</h3>

                                                        <?php
                                                        $sql_select = mysqli_query($conn,"SELECT donhang.donhangid,tensanpham, chitietdonhang.gia,chitietdonhang.soluong,thanhtien, sanpham.sanphamid FROM chitietdonhang JOIN donhang on donhang.donhangid=chitietdonhang.donhangid  JOIN sanpham on chitietdonhang.sanphamid=sanpham.sanphamid Where chitietdonhang.donhangid='$id' ORDER BY donhang.ngaydat DESC");
                                                    
                                                        ?>
                                                        <table class="table table-bordered ">
                                                            <tr>
                                                                <th style="color:black; font-family: roboto; text-align: center">Thứ tự</th>
                                                                <th style="color:black; font-family: roboto; text-align: center">Tên sản phẩm</th>
                                                                <th style="color:black; font-family: roboto; text-align: center">Số lượng</th>
                                                                <th style="color:black; font-family: roboto; text-align: center">Hình ảnh đi kèm</th>
                                                                <th style="color:black; font-family: roboto; text-align: center">Chọn</th>
                                                            </tr>
                                                            <?php
                                                            $i=0;
                                                            
                                                            while($row_donhang = mysqli_fetch_array($sql_select))
                                                            {
                                                                $i++;  
                                                            ?> 
                                                            <tr>
                                                                <td style=" font-family: roboto; text-align: center"><?php echo $i; ?></td>                                                
                                                                <td style=" font-family: roboto; text-align: center"><?php echo $row_donhang['tensanpham']; ?></td>                                    
                                                                <td style=" font-family: roboto; text-align: center;"><input name="soluong<?php echo $i ;?>" class="soluong" type="number" min="1" max="<?php echo $row_donhang['soluong']; ?>"></td>                                    
                                                                <td style=" font-family: roboto; text-align: center"><input name="anhminhchung<?php echo $i ;?>" type="file" class="form-control"></td>   
                                                                <td style=" font-family: roboto; text-align: center"><input class="checkbox" type="checkbox" name="checkbox<?php echo $i ;?>"></td>                                  
                                                            </tr>                                                               
                                                            <?php } ;?>
                                                        </table>
                                                    </div>
                                                    </div>
                                                                
                                                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;"> 
                                                        <h3 class="summary-title" style=" font-family: roboto">YÊU CẦU</h3>
                                                                
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lựa chọn yêu cầu<span class="required">*</span></label>
                                                                    
                                                            <select required name ="txtdoitra" style="background-color:#FBF7EC; border-top-right-radius: 3px; border-bottom-right-radius: 3px; width: 435px; height: 27px; margin-left: 10px;">
                                                            
                                                                <option disabled selected value style="text-align: center">Chọn yêu cầu đổi/trả</option>
                                                                <?php 
                                                                $sql = "
                                                                SELECT * 
                                                                FROM loaiyeucau";
                                                                $dulieu = mysqli_query($ketnoi, $sql);
                                                                $i=0;
                                                                    
                                                                while ($row1 = mysqli_fetch_array($dulieu)) {
                                                                    $i++;
                                                                ;?>
                                                                    <option value="<?php echo $row1["loaiyeucauid"];?>" style="text-align: center;font-size: 13pt"><span></span><?php echo $row1["tenyeucau"];?></span></option>
                                                                
                                                                <?php
                                                                    }
                                                                
                                                                ;?>
                                                            
                                                            </select>
                                                        </div>
                                                            
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lý do yêu cầu<span class="required">*</span></label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <textarea name="txtlydo" style="width: 95%" required></textarea>
                                                            </div>
                                                        </div>

                                                        <br><br><br>
                                                            
                                                        <div class="form-group" style="float: right;">
                                                            <button type="submit" class="btn btn-primary" style="background-color: #017ee9; border-top-right-radius: 3px; border-bottom-right-radius: 3px;">Gửi yêu cầu</button>
                                                        </div>

                                                        <br>
                                                    </div>
                                                </form>
                                            </div> 
                                        </div>
                                    </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->                
                        </div><!-- End .col-lg-9 -->   
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        function validateCheckbox() {
            const checkboxes = document.getElementsByClassName("checkbox");
            const soluongs = document.getElementsByClassName("soluong");
            var checked = false;
            for(var i = 0; i < checkboxes.length; i++){
                if (checkboxes[i].checked){
                    checked = true;
                    break;
                }
            }

            if (checked){
                for(var i = 0; i < checkboxes.length; i++){
                    if (checkboxes[i].checked){
                        if(soluongs[i].value == ""){
                            alert("Vui lòng điền số lượng!");
                            return false;
                        }
                    }
                }
                return true;
            }else{
                alert("Vui lòng chọn sản phẩm!");
                return false;
            }
        }
    </script>
</body>
</html>