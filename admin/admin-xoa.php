<?php 

  // Lấyid từ trên đường dẫn
  $id = $_GET['id_nd'];

  // Xóa bài viết có id trong bảng tbl_admin
  // Bước 1: Kết nối đến CSDL 
  include("../config/dbconfig.php");
  $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  // Bước 2: Xóa dữ liệu trong bảng tbl_admin   i
  $sql = "DELETE FROM `khachhang` WHERE `khach_id` = '".$id."'";

  // Xem câu lệnh SQL viết có đúng hay không?
  // echo $sql;

  // Cho thực thi câu lệnh SQL trên
  mysqli_query($ketnoi, $sql);
  echo '
    <script type="text/javascript">
      alert("Xóa người dùng thành công!!!");
      window.location.href="admin-list.php";
    </script>';
;?>