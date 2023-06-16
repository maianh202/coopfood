<?php 
	$id = $_POST['txtID'];	
	$dmtt = $_POST['txtDmtt'];
	include("../config/dbconfig.php");
    $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($ketnoi, 'UTF8');
    $sql1 = "
    SELECT * 
    FROM yeucaudoitra where tinhtrangid='2'";
    $dulieu=mysqli_query($ketnoi, $sql1);
    $row1 = mysqli_fetch_array($dulieu);
       if($dmtt==2) {
	$sql="UPDATE `yeucaudoitra` SET  `loaiyeucauid` = '".$dmtt."' WHERE yeucauid = '".$id."';";
	mysqli_query($ketnoi, $sql);
	}

	echo ' 
		<script type="text/javascript">
			alert("Sửa yêu cầu thành công!!!");
			window.location.href="yeu-cau-doi-tra.php";
		</script>';
;?>