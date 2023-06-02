<?php 

	// Lấy các dữ liệu bên trang sửa sản phẩm
	

	$id = $_POST['txtID'];
	
	$dmtt = $_POST['txtDmtt'];


	
	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                      mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng tbl_sp
	
		$sql=" 
		UPDATE `donhang` SET  `trangthaiid` = '".$dmtt."'WHERE `donhang`.`donhangid` = '".$id."';
		 ";

	
	
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo ' 
		<script type="text/javascript">
			alert("Sửa trạng thái thành công!!!");
			window.location.href="don-hang-dang-giao.php";
		</script>';
;?>