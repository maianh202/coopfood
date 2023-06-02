  <style>
    .hinhanh {text-align: center;
      color:white;
      padding-top: 10px;
      padding-bottom: 0px;
    }
  </style>      
                    <?php
                    // Bước 1: Kết nối đến CSDL
                    include("../config/dbconfig.php");
                    $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                    mysqli_set_charset($ketnoi, 'UTF8');
                    //Bước 2: Hiển thị các dữ liệu trong bảng tbl_admin ra đây
                    $sql = "
                      SELECT * 
                      FROM nhanvien";
                    $dulieu = mysqli_query($ketnoi, $sql);
                    $row = mysqli_fetch_array($dulieu);
                       ?>    
            
            <div class="logo"><a href="index.php" class="site_title"> <img style="width: 90%; height: auto;" src="images/sunphone.png"></a></div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix" >
              <div class="hinhanh">
                <span>Xin chào</span>
                <h2><?php echo $row["tennhanvien"];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php
                //1. ket noi den may chu du lieu va co so du lieu, lau them moi sua, xoa du lieu
                include("../config/dbconfig.php");
                $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname); //(ten truy cap, ten tai khoan, mk, ten database)

                //2. viet cau lenh truy van lay ra du lieu mong muon
                $sql = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid";
                $sql1 = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid where a.trangthaiid=1";
                $sql2 = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid where a.trangthaiid=2";
                $sql3 = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid where a.trangthaiid=3";
                $sql4 = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid where a.trangthaiid=4";
                $sql5 = "SELECT * FROM donhang  as a join trangthai as b on a.trangthaiid=b.trangthaiid where a.trangthaiid=5";

                //3. thuc thi cau lech truy van
                $noidungtruyvan = mysqli_query($ketnoi, $sql);
                $noidungtruyvan1 = mysqli_query($ketnoi, $sql1);
                $noidungtruyvan2 = mysqli_query($ketnoi, $sql2);
                $noidungtruyvan3 = mysqli_query($ketnoi, $sql3);
                $noidungtruyvan4 = mysqli_query($ketnoi, $sql4);
                $noidungtruyvan5 = mysqli_query($ketnoi, $sql5);
       

                //4. dem so tin tuc
                $soluong = mysqli_num_rows($noidungtruyvan);
                $soluong1 = mysqli_num_rows($noidungtruyvan1);
                $soluong2 = mysqli_num_rows($noidungtruyvan2);
                $soluong3 = mysqli_num_rows($noidungtruyvan3);
                $soluong4 = mysqli_num_rows($noidungtruyvan4);
                $soluong5 = mysqli_num_rows($noidungtruyvan5);

                ;?>
           

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a  href="./dashboard.php"><i class="fa fa-home"></i>Hệ thống quản lý</a></li>
            
         
       
                  <li><a><i class="fa fa-table"></i> Quản trị Sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sanpham-them-moi.php">Tạo sản phẩm mới</a></li>
                      <li><a href="sanpham-list.php">Quản trị sản phẩm</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i> Quản trị Danh mục  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="dm-them-moi.php">Tạo danh mục</a></li>
                      <li><a href="dm-list.php">Danh sách danh mục</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-table"></i> Quản trị yêu cầu đổi-trả <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="yc-doi-hang.php">Yêu cầu đổi hàng</a></li>
                        <li><a href="yc-tra-hang.php">Yêu cầu trả hàng</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i> Quản trị đơn hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="don-hang-dang-xu-ly.php">Đang xử lý(<?php echo $soluong1 ;?>)</a></li>
                        <li><a href="don-hang-dang-giao.php">Đang giao(<?php echo $soluong2 ;?>)</a></li>
                        <li><a href="don-hang-thanh-cong.php">Giao hàng thành công(<?php echo $soluong3 ;?>)</a></li>
                        <li><a href="don-hang-khong-thanh-cong.php">Giao hàng không thành công(<?php echo $soluong4 ;?>)</a></li>
                        <li><a href="don-hang-da-huy.php">Đã hủy(<?php echo $soluong5 ;?>)</a></li>
                    </ul>
                  </li>
              </div>
            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" style="background-color:#212529">
          <div class="nav_menu" style="background-color:#212529">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i style="color: white" class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a style="color: white" href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> ADMIN
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="index.php"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
                  </ul>
                </li>

                
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->