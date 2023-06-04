<?php
// Ket noi CSDL 

$servername="localhost";
$username="root";
$password="";
$dbname="coopfood";


$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die ("Connection failed: ".$conn->connect_error);
}
mysqli_query($conn,'set names utf8');
session_start();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$wishlist = (isset($_SESSION['wishlist'])) ? $_SESSION['wishlist'] : [];

?>

<?php

if(isset($_POST['dangnhap_home'])) {  //tồn tại khi ấn submit đăng nhập
    $taikhoan = $_POST['email_login'];  //lấy lại email và pass
    $matkhau = $_POST['password_login'];
    if($taikhoan=='' || $matkhau ==''){
        echo '<script>alert("Làm ơn không để trống")</script>';
    }else{
        $sql_select_admin = mysqli_query($conn,"SELECT * FROM khachhang WHERE email='$taikhoan' AND matkhau='$matkhau' LIMIT 1"); //select ra kh có tk
        $count = mysqli_num_rows($sql_select_admin); //đếm sl dòng
        $row_dangnhap = mysqli_fetch_array($sql_select_admin);  //chuyển sang mảng
        if($count>0){  //nếu dòng >0 tức có tk
            $_SESSION['dangnhap_home'] = $row_dangnhap['tenkhach']; //nếu ok thì sẽ tạo 1 session phiên đăng nhập = tên khách hàng
            $_SESSION['khachhangid'] = $row_dangnhap['khachhangid']; //tạo 1 session phiên mãkh = khách hàng id
            $_SESSION['email'] = $row_dangnhap['email'];
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                header('Location: '.$action.'.php');
            }else{
            header('Location: index.php');  //HƯỚNG VỀ TRANG INDEX NOT GIỎ HÀNG
            }

        }else{
            if($count==0)
            echo "<script> alert('Tài khoản hoặc mật khẩu bị sai') </script>";
            else
                echo "<script> alert('Đã xảy ra lỗi') </script>";   
        }

    }
}elseif(isset($_POST['dangky'])){
    $name = $_POST['tenkhach'];
     $phone = $_POST['dienthoai'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     $address = $_POST['diachi'];
   
     $sql_khachhang = mysqli_query($conn,"INSERT INTO khachhang(tenkhach,dienthoai,diachi,email,matkhau) values ('$name','$phone','$address','$email','$password')");
     $sql_select_khachhang = mysqli_query($conn,"SELECT * FROM khachhang ORDER BY khachhangid DESC LIMIT 1");
     $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
     $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhangid'] = $row_khachhang['khachhangid'];
    $_SESSION['email'] = $row_khachhang['email'];

    header('Location:index.php?quanly=giohang');

}elseif(isset($_GET['dangxuat'])){ //tồn tại khi ấn đăng xuất
    $id = $_GET['dangxuat']; //lấy lại dangxuat=1
    if($id==1){
        unset($_SESSION['dangnhap_home']);
       session_destroy();
       $sql_delete_thanhtoan = mysqli_query($conn,"DELETE FROM giohang WHERE khachhangid=1000"); //xoá hết giỏ hàng của khách hàng ko có tk
    }

}
?> 

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coop Food </title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Sun Phone">    
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/haha.png">
    <link rel="icon" type="image/png" sizes="40x20" href="assets/images/haha.png">  
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/haha.png">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo1.png">
    <link rel="icon" type="image/png" sizes="40x20" href="assets/images/logo1.png">  
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo1.png">

    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-3.css">
    <link rel="stylesheet" href="assets/css/demos/demo-3.css">

        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-7.css">
    <link rel="stylesheet" href="assets/css/demos/demo-7.css">

    

    <style>
        .sticky-nav {
            height: 100px;
            background-color: #005dac;
            padding: 0 10px;
        }

        .category-list {
            
        }



        .listing-icon span {
            display: block;
            width: 100%;
            height: 3px;
            margin-top: 2px;
            background: #005dac;
        }

        .listing-icon {
            display: block;
            float: left;
            padding-top: 2px;
            margin: 0px 9px 0 0;
            width: 20px;
        }
    </style>
</head>


    <!-- <div class="page"> -->
    <div class="page-wrapper" >
        <header class="header header-7">
        <div class="header-top" style="margin: 20px">
            <div class="container" style="background-color: white">
                <div class="header-left">
                    <a href="tel:#"><i class="icon-phone"></i>Call: 1800 6601</a>
                </div>
                <div class="header-right">
                    <ul class="">
                        <li>
                            
                            <ul>

                                <li>
                                    <?php
                                        if(!isset($_SESSION['dangnhap_home'])){
                                            echo '<a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Đăng nhập</a>';
                                        };
                                    ?>
                                    
                                </li>
                                        <?php
						        if(isset($_SESSION['dangnhap_home'])){ 
                                
						        ?>
						        <li class="text-center" >
                                    <a href="mypurchase.php?id=<?php echo $_SESSION['khachhangid']?>" style="color:  #017ee9" >						        	
						        	    <b>Xem đơn hàng của : </b><?php echo $_SESSION['dangnhap_home'] ?>
                                    </a>
                                    <br>                                  
						        </li>
						        <?php
						        }
						        ?>
                                <li>
                                    <?php  
                                    if(isset($_SESSION['dangnhap_home'])){ //tồn tại đăng nhập thì xuất hiện đăng xuất
                                        echo '<a href="index.php?quanly=giohang&dangxuat=1" class="text-center"style="color:  #017ee9"><b>Đăng xuất</b></a>' ;
                                    }else{
                                        echo '';
                                    }
                                    ?>                            
                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->
        
                    <!-- register -->
 
                <!-- log in -->

                <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="icon-close"></i></span>
                                </button>

                                <div class="form-box">
                                    <div class="form-tab">
                                        <ul class="nav nav-pills nav-fill" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Đăng nhập</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Đăng ký</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="tab-content-5">
                                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                                <form action="#" method="post">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Email</label>
                                                        <input type="text" class="form-control " placeholder=" " name="email_login" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Mật khẩu</label>
                                                        <input type="password" class="form-control" placeholder=" " name="password_login" required="">
                                                    </div>
                                                    <div class="right-w3l">
                                                        <!-- name= dangnhap_home, nếu tồn tại dangnhap_home phương thức post thì ghi đăng xuất, ngược lại -->
                                                        <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập"> 
                                                    </div>
                                                </form>
                                                <div class="form-choice">
                                                    <p class="text-center">or sign in with</p>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <a href="#" class="btn btn-login btn-g">
                                                                <i class="icon-google"></i>
                                                                Login With Google
                                                            </a>
                                                        </div><!-- End .col-6 -->
                                                        <div class="col-sm-6">
                                                            <a href="#" class="btn btn-login btn-f">
                                                                <i class="icon-facebook-f"></i>
                                                                Login With Facebook
                                                            </a>
                                                        </div><!-- End .col-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .form-choice -->
                                            </div><!-- .End .tab-pane -->

                                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                                <form action="#" method="post">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Họ và tên</label>
                                                        <input type="text" class="form-control" placeholder=" " name="tenkhach" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder=" " name="email" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Số điện thoại</label>
                                                        <input type="text" class="form-control" placeholder=" " name="dienthoai"  required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Địa chỉ</label>
                                                        <input type="text" class="form-control" placeholder=" " name="diachi"  required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Mật khẩu</label>
                                                        <input type="password" class="form-control" placeholder=" " name="password"  required="">
                                                        <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
                                                    </div>>
                                                    <div class="right-w3l">
                                                        <input type="submit" class="form-control" name="dangky" value="Đăng ký">
                                                    </div>
                                                </form>

                                            </div><!-- .End .tab-pane -->
                                        </div><!-- End .tab-content -->
                                    </div><!-- End .form-tab -->
                                </div><!-- End .form-box -->
                            </div><!-- End .modal-body -->
                        </div><!-- End .modal-content -->
                    </div><!-- End .modal-dialog -->
                </div><!-- End .modal -->

            <div class="header-middle sticky-header sticky-nav" style="padding: 0px; height: auto">
                <div class="container-fluid" style="padding: 0px;  height: 70px">
                    <div class="header-left" >
                        <button class="mobile-menu-toggler" style="padding: 0px">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <nav class="main-nav">
                            <ul class="menu" style="padding: 0px; height: 44px">
                                <li>
                                    <a href="" class="category-list" style="width: 380px; padding: 10px; margin-right: 20px; background-color: white; border-top-right-radius: 3px; border-top-left-radius: 3px;
                                    font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: #005dac">
                                        <div class="listing-icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                    
                                        </div>
                                        Danh mục sản phẩm
                                    </a>

                                    <ul>
                                        <li>
                                            <?php 
                                            $sql = "SELECT * FROM danhmuc"  ;
                            $dulieu = mysqli_query($conn, $sql);
                        
                            while ($row = mysqli_fetch_array($dulieu))
                            {
                                ;?>
                                            <a href="./category.php?id=<?php echo $row["danhmucid"];?>"><?php echo $row["tendanhmuc"] ;?></a>
                                            <?php };?>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" style="padding: 10px; font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: white">Khuyến mãi</a>

                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="assets/images/km1.png">
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="assets/images/km2.png">
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="assets/images/km3.png">
                                                </div>
                                            </div>
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-sm -->
                                
                                </li>
                                <li>
                                    <a href="" style="padding: 10px; font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: white">Nhãn hiệu</a>
                                </li>
                                <li>
                                    <a href="" style="padding: 10px; font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: white">E Brochure</a>
                                </li>
                                <li>
                                    <a href="" style="padding: 10px; font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: white">E Gift</a>
                                </li>
                                <li>
                                    <a href="" style="padding: 10px; font-family: 'Roboto', 'sans-serif'; font-weight: 600; font-size: 14px; color: white">Thêm</a>
                                    
                                    <ul>
                                        <li>
                                            <a href="#" style="width: 400px;">Đăng kí thẻ Co.opMart</a>
                                            <a href="#" style="width: 400px;">Tin tức</a>

                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right" style="margin-right: 20px; width: 500px">
                        <div class="header-search header-search-extended header-search-visible"  style="max-width: 400px">
                            <a href="#" class="search-toggle" role="button" ><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide" style="width: 400px">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Bạn muốn tìm..." required>
                                    <button class="btn btn-primary" type="submit" style="background-color: #017ee9; border-top-right-radius: 3px; border-bottom-right-radius: 3px;"><i class="icon-search" style="color: white"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        
                        <div class="dropdown cart-dropdown" style="float: right; position: relative">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <a href=""><i class="icon-shopping-cart"></i></a>
                                <span class="cart-count">2</span>
                            </a>

                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
    <div>



    