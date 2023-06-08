<?php 
	$id = $_POST['txtID'];	
	$dmtt = $_POST['txtDmtt'];
	include("../config/dbconfig.php");
    $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($ketnoi, 'UTF8');
	if($dmtt==3 || $dmtt==4) {
	$sql="UPDATE `donhang` SET  `trangthaiid` = '".$dmtt."', ngaynhan= current_stamp() WHERE donhangid = '".$id."';";
	mysqli_query($ketnoi, $sql);
	}
	else {
		$sql="UPDATE `donhang` SET  `trangthaiid` = '".$dmtt."', ngaynhan='NULL' WHERE donhangid = '".$id."';";
		mysqli_query($ketnoi, $sql);
		}
	echo ' 
		<script type="text/javascript">
			alert("Sửa trạng thái đơn hàng thành công!!!");
			window.location.href="order_list.php";
		</script>';
;?>