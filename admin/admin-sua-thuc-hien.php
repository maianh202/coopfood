<?php 


	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$id = $_POST['txtID'];
	$tennd = $_POST['txtTen'];
	$sdt = $_POST['txtsdt'];
	$diachi = $_POST['txtdiachi'];
	$password= $_POST['txtPassword'];
	$email= $_POST['txtemail'];


	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng Liên hệ
		
		$sql = "
		UPDATE `khachhang` SET 
			`hoten` = '".$tennd."',
			`sdt` = '".$sdt."',
			`diachi` = '".$diachi."',
			`email` = '".$email."',
			`password` = '".$password."'
		WHERE `khach_id` = '".$id."'
		";
	
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Sửa người dùng thành công!!!");
			window.location.href="admin-list.php";
		</script>';
;?>