<?php 

	$id = $_POST['txtID'];
	$tendm = $_POST['txtTenDm'];


	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng tbl_danh_muc
		
		$sql = "
		UPDATE `danhmuc` SET 
			`tendanhmuc` = '".$tendm."'
		WHERE `danhmucid` = '".$id."'
		";
	
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Sửa danh mục thành công!!!");
			window.location.href="dm-list.php";
		</script>';
;?>