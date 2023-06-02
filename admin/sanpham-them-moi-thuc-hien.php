<?php 

	// Lấy các dữ liệu bên trang Thêm mới 
	$tensp = $_POST['txtTensp'];
	$giaban = $_POST['txtGiaban'];
	$giakm = $_POST['txtGiakm'];
	$mota = $_POST['txtMota'];
	$dmsp = $_POST['txtDmsp'];
	$sl = $_POST['txtsl'];
	
	
	// Upload hình ảnh
	$anhminhhoa = "images/". basename($_FILES["txtAnhMinhHoa"]["name"]);
	$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$result = move_uploaded_file($fileanhtam, $anhminhhoa);
	if(!$result) {
		$anhminhhoa=NULL;
	}
	// Anh zoom
	$anhzoom = "images/". basename($_FILES["txtAnhZoom"]["name"]);
	$fileanhzoom = $_FILES["txtAnhZoom"]["tmp_name"];
	$result1 = move_uploaded_file($fileanhzoom, $anhzoom);
	if(!$result1) {
		$anhzoom=NULL;
	}
	

	// Chàn dữ liệu vào bảng tbl_sp
	// Bước 1: Kết nối đến CSDL 
	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng tbl_sp
	$sql = "INSERT INTO `sanpham` (
		`sanphamid`, 
		`tensanpham`,
		`giaban`,
		`danhmucid`, 
		`hinhanh`,
		`mota`,
		`giakhuyenmai`,
		
		`soluong`,
		
		`hinhanhzoom`
		) 
	VALUES (
		NULL, 
		'".$tensp."',
		'".$giaban."',
		'".$dmsp."',
		'".$anhminhhoa."',
		'".$mota."',
		'".$giakm."',
	
		'".$sl."',
		
		'".$anhzoom."'
		)";
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Thêm mới bài viết thành công!!!");
		
			window.location.href="sanpham-list.php";
		</script>';
;?>