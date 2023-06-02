<?php 



	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
     mysqli_set_charset($ketnoi, 'UTF8');
    $id = $_GET["id"];

	$sql1 = "
    SELECT * 
    FROM donhang 
    WHERE donhangid = ".$id ;

	$dulieu = mysqli_query($ketnoi, $sql1);
	$row = mysqli_fetch_array($dulieu); 

	$sql3 = "
	SELECT * 
	FROM nhanvien";
  $dulieu3 = mysqli_query($ketnoi, $sql3);
  $row3 = mysqli_fetch_array($dulieu3); 
  $idnv= $row3["nhanvienid"];
	
	if (number_format($row["trangthaiid"])==1)

	{
		$sql=" 
		 UPDATE `donhang` SET `trangthaiid` = '2', `nhanvienid`='".$idnv."' where donhangid='".$id."';";


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