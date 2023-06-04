<?php 
	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
     mysqli_set_charset($ketnoi, 'UTF8');
	 $id = $_GET["id"];
	 $sql1 = "SELECT * 
	 FROM donhang 
	 WHERE donhangid = ".$id ;
	 $dulieu = mysqli_query($ketnoi, $sql1);
	 $row = mysqli_fetch_array($dulieu); 

	 if (number_format($row["trangthaiid"])==1)

	 {



	$nv=$_POST["txtnhanvien"];



		$sql="UPDATE `donhang` SET `trangthaiid` = '2', nhanvienid = '$nv' where donhangid='".$id."';";


	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	}
	

	if(array_key_exists('thanhcong', $_POST)) {
		thanhcong();
	}
	else if(array_key_exists('khongthanhcong', $_POST)) {
		khongthanhcong();
	}

	function thanhcong(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
		$id = $_GET["id"];
		$sql1 = "SELECT * 
		FROM donhang 
		WHERE donhangid = ".$id ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		
		$sql=" 
		UPDATE `donhang` SET `trangthaiid` = '3'  where donhangid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}

	function khongthanhcong(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
		$id = $_GET["id"];
		$sql1 = "SELECT * 
		FROM donhang 
		WHERE donhangid = ".$id ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		$sql=" 
		UPDATE `donhang` SET `trangthaiid` = '4'  where donhangid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}

	echo '		<script type="text/javascript">
			alert("Cập nhật thành công!!!");
			window.location.href="danhsachdonhang.php";
		</script>';
;?>