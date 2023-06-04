<?php 



	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
     mysqli_set_charset($ketnoi, 'UTF8');
    $id = $_GET["id"];
	$nv=$_POST["txtnhanvien"];
	$sql1 = "
    SELECT * 
    FROM donhang 
    WHERE donhangid = ".$id ;

	$dulieu = mysqli_query($ketnoi, $sql1);
	$row = mysqli_fetch_array($dulieu); 


	
	if (number_format($row["trangthaiid"])==1)

	{
		$sql=" 
		 UPDATE `donhang` SET `trangthaiid` = '2', nhanvienid = '$nv' where donhangid='".$id."';";


	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	}
	else if (number_format($row["trangthaiid"])==2) {
		$sql=" 
		 UPDATE `donhang` SET `trangthaiid` = '3' where donhangid='".$id."';";

	mysqli_query($ketnoi, $sql);
	}
	else  
		$sql=" 
		 UPDATE `donhang` SET `trangthaiid` = '4' and ngaynhan='current_timestamp()' where donhangid='".$id."';";

	mysqli_query($ketnoi, $sql);
	
	echo '		<script type="text/javascript">
			alert("Cập nhật thành công!!!");
			window.location.href="don-hang-dang-giao.php";
		</script>';
;?>