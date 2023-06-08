<?php 
	 include("../config/dbconfig.php");
     $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
     mysqli_set_charset($ketnoi, 'UTF8');
	 $id = $_GET["id"];
	 $sql1 = "SELECT * 
	 FROM yeucaudoitra 
	 WHERE yeucauid = ".$id ;
	 $dulieu = mysqli_query($ketnoi, $sql1);
	 $row = mysqli_fetch_array($dulieu); 

	if(array_key_exists('pheduyet', $_POST)) {
		pheduyet();
	}
	else if(array_key_exists('tuchoi', $_POST)) {
		tuchoi();
	}

    if(array_key_exists('xuly', $_POST)) {
		xuly();
	}
	else if(array_key_exists('thanhcong', $_POST)) {
		thanhcong();
	}


	function pheduyet(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $id = $_GET["id"];
        $nv=$_POST["txtnhanvien"];
        $yc=$_POST["txtloaiyeucau"];
        $sql1 = "SELECT * 
        FROM yeucaudoitra 
        WHERE yeucauid = '".$id."' " ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		$sql="
		UPDATE `yeucaudoitra` SET `tinhtrangid` = '2' , nhanvienid = '$nv',loaiyeucauid= '$yc'  where yeucauid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}

	function tuchoi(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $id = $_GET["id"];
        $sql1 = "SELECT * 
        FROM yeucaudoitra 
        WHERE yeucauid = ".$id ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		$sql=" 
		UPDATE `yeucaudoitra` SET `tinhtrangid` = '5', ngayhoanthanh =current_timestamp()  where yeucauid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}
    
	function xuly(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $id = $_GET["id"];
        $sql1 = "SELECT * 
        FROM yeucaudoitra 
        WHERE yeucauid = ".$id ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		$sql=" 
		UPDATE `yeucaudoitra` SET `tinhtrangid` = '3' where yeucauid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}

	function thanhcong(){
		include("../config/dbconfig.php");
		$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $id = $_GET["id"];
        $sql1 = "SELECT * 
        FROM yeucaudoitra 
        WHERE yeucauid = ".$id ;
		$dulieu = mysqli_query($ketnoi, $sql1);
		$row = mysqli_fetch_array($dulieu); 
		$sql=" 
		UPDATE `yeucaudoitra` SET `tinhtrangid` = '4', ngayhoanthanh =current_timestamp()  where yeucauid='".$id."';";
		mysqli_query($ketnoi, $sql);
	}

	echo '		<script type="text/javascript">
			alert("Cập nhật thành công!!!");
			window.location.href="yeu-cau-doi-tra.php";
		</script>';
;?>