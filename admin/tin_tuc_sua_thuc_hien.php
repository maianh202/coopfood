<?php 
	

	// Lấy các dữ liệu bên trang Thêm mới tin tức
	$id = $_POST['txtID'];
	$tieude = $_POST['txtTieuDe'];
	$noidung = $_POST['txtNoiDung'];

	//Upload hình ảnh
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

	// Bước 2: Chàn dữ liệu vào bảng tbl_tin_tuc
	if($anhminhhoa==NULL) {		
		$sql = "
		UPDATE `blog` SET 
			`blog_name` = '".$tieude."', 
			`blog_noidung` = '".$noidung."'
		WHERE `blog_id` = '".$id."'
		";
	} else {
		$sql = "
		UPDATE `blog` SET 
			`blog_name` = '".$tieude."', 
			`blog_noidung` = '".$noidung."', 
			`bog_image` = '".$anhminhhoa."'				
		WHERE `blog_id` = '".$id."'
		";
	}
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Sửa tin tức thành công!!!");
			window.location.href="tin_tuc_quan_tri.php";
		</script>';
;?>