<?php 

  // Lấyid từ trên đường dẫn
  $id = $_GET['id_sp'];

  // Xóa bài viết có id trong bảng tbl_tainghe
  // Bước 1: Kết nối đến CSDL 
  include("../config/dbconfig.php");
  $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

  // Bước 2: Xóa dữ liệu trong bảng Tin tức   i
  $sql = "DELETE FROM `danhmuc` WHERE `danhmucid` = '".$id."'";

  // Xem câu lệnh SQL viết có đúng hay không?
  // echo $sql;

  // Cho thực thi câu lệnh SQL trên
  mysqli_query($ketnoi, $sql);
  echo '
    <script type="text/javascript">
      alert("Xóa danh mục thành công!!!");
      window.location.href="dm-list.php";
    </script>';
;?>