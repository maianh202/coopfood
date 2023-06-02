<?php 

	// Lấy các dữ liệu bên trang sửa sản phẩm
	

	$id = $_POST['txtID'];
	$tensp = $_POST['txtTensp'];
	$giaban = $_POST['txtGiaban'];
	$giakm = $_POST['txtGiakm'];
	$mota = $_POST['txtMota'];
	
	$sl = $_POST['txtsl'];
	$dmsp = $_POST['txtDmsp'];


	// Upload hình ảnh
	$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
	$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
	$result = move_uploaded_file($fileanhtam, $anhminhhoa);
	if(!$result) {
		$anhminhhoa=NULL;
	}

	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                      mysqli_set_charset($ketnoi, 'UTF8');

	// Bước 2: Chàn dữ liệu vào bảng tbl_sp
	if($anhminhhoa==NULL) {		
		$sql=" 
		UPDATE `sanpham` SET `tensanpham` = '".$tensp."', `danhmucid` = '".$dmsp."', `soluong` = '".$sl."', `giaban` = '".$giaban."', `giakhuyenmai` = '".$giakm."',   `mota` = '".$mota."' WHERE `sanpham`.`sanphamid` = '".$id."';
		 ";

	} else {
		$sql=" 
		 UPDATE `sanpham` SET `tensanpham` = '".$tensp."', `danhmucid` = '".$dmsp."', `soluong` = '".$sl."', `giaban` = '".$giaban."', `giakhuyenmai` = '".$giakm."', `hinhanh` = '".$anhminhhoa."',  `mota` = '".$mota."' WHERE `sanpham`.`sanphamid` = '".$id."';
		 ";
	}
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo ' 
		<script type="text/javascript">
			alert("Sửa sản phẩm thành công!!!");
			window.location.href="sanpham-list.php";
		</script>';
;?>