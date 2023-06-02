<?php 


	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$tieude = $_POST['txtTieuDe'];
	



	// Upload hình ảnh
	$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
	$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$result = move_uploaded_file($fileanhtam, $anhminhhoa);
	if(!$result) {
		$anhminhhoa=NULL;
	}
	

	// Chàn dữ liệu vào bảng tbl_tin_tuc
	// Bước 1: Kết nối đến CSDL 
	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chèn dữ liệu vào bảng tbl_su_kien
	$sql = "
	INSERT INTO `banner` (
		`ma_banner`, 
		`ten_banner`,
		`img`) 
	VALUES (
		NULL, 
		N'".$tieude."',
		'".$anhminhhoa."')";
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Thêm mới sự kiện thành công!!!");
			window.location.href="su-kien-list.php";
		</script>';
;?>