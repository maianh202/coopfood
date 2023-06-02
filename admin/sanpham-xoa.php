<?php 

  // Lấyid từ trên đường dẫn
  $id = $_GET['id_sanpham'];

  // Xóa sản phẩm có id trong bảng tbl_sp
  // Bước 1: Kết nối đến CSDL 
  include("../config/dbconfig.php");
  $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  // Bước 2: Xóa dữ liệu trong bảng Tin tức   i
  $sql = "DELETE FROM `sanpham` WHERE `sanphamid` = '".$id."'";

  // Xem câu lệnh SQL viết có đúng hay không?
  // echo $sql;

  // Cho thực thi câu lệnh SQL trên
  mysqli_query($ketnoi, $sql);
  echo '
    <script type="text/javascript">
      alert("Xóa sản phẩm thành công!!!");
      window.location.href="sanpham-list.php";
    </script>';
;?>