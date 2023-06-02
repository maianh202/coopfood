<?php 


	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$id = $_POST['txtID'];
	$tieude = $_POST['txtTieuDe'];

	// Upload hình ảnh
	$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
	$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$result = move_uploaded_file($fileanhtam, $anhminhhoa);
	if(!$result) {
		$anhminhhoa=NULL;
	}

	// Chàn dữ liệu vào bảng 
	// Bước 1: Kết nối đến CSDL 
	include("../config/dbconfig.php");
	$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng 
	if($anhminhhoa==NULL) {		
		$sql = "
		UPDATE `banner` SET 
			`ten_banner` = '".$tieude."'
			
		WHERE `ma_banner` = '".$id."'
		";
	} else {
		$sql = "
		UPDATE `banner` SET 
			`ten_banner` = '".$tieude."', 
			`img` = '".$anhminhhoa."'				
		WHERE `ma_banner` = '".$id."'
		";
	}
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Sửa ảnh thành công!!!");
			window.location.href="su-kien-list.php";
		</script>';
;?>