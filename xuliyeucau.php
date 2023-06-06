<?php 
    include("config/dbconfig.php");
    $id_donhang = $_GET['id'];
    // connect to db
    $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

    // // query donhang by donhangid
    $sql_donhang = "SELECT * FROM `donhang` WHERE `donhangid` =".$id_donhang;
    $query = mysqli_query($ketnoi, $sql_donhang);
    $row = mysqli_fetch_array($query);

    $id_kh = $row['khachhangid'];

    $lido = $_POST['txtlydo'];

    $id_loaiyc = $_POST['txtdoitra'];

    // insert into yeucaudoitra
    $sql_insert1 = "INSERT INTO `yeucaudoitra`(`yeucauid`, `donhangid`, `khachhangid`, `ngayyeucau`, `lydo`, `tinhtrangid`, `loaiyeucauid`) 
                VALUES (NULL, '".$id_donhang."',  '".$id_kh."', current_timestamp(), '".$lido."', '1', '".$id_loaiyc."')";
    mysqli_query($ketnoi, $sql_insert1);           
?>