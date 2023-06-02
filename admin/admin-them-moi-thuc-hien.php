<?php 


	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$tennd = $_POST['txtTen'];
	$sdt = $_POST['txtsdt'];
	$diachi = $_POST['txtdiachi'];
	$email = $_POST['txtemail'];
	$password = $_POST['txtPassword'];

	// Chàn dữ liệu vào bảng tbl_admin
	// Bước 1: Kết nối đến CSDL 
	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng tbl_admin
	$sql = "
	INSERT INTO `khachhang` (
		`khach_id`, 
		`email`, 
		`sdt`,
		`diachi`,
		`hoten`,
		`password`) 
	VALUES (
		NULL, 
		'".$email."',
		'".$sdt."',
		'".$diachi."',
		'".$tennd."',
		'".$password."')";
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Thêm mới người dùng thành công!!!");
			window.location.href="admin-list.php";
		</script>';
;?>