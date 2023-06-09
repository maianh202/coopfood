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
    
    // insert into chitietyeucau
    $sql_count = "SELECT * FROM `chitietdonhang` WHERE `donhangid`='".$id_donhang."'";
    $query2 = mysqli_query($ketnoi, $sql_count);
    $rowcount = mysqli_num_rows($query2); // count the number of products in this order

    $sql_getYcId = "SELECT MAX(yeucauid) FROM `yeucaudoitra`";
    $result = mysqli_query($ketnoi, $sql_getYcId);

    $id_yeucau = mysqli_fetch_array($result)[0];

    for ($i = 1; $i <= $rowcount; $i++){
        if(isset($_POST['checkbox'.$i])){          
            $row2 = mysqli_fetch_array($query2);
            
            $sql_insert2 = "INSERT INTO `chitietyeucau`(`yeucauid`, `sanphamid`, `soluongyc`) 
            VALUES ('".$id_yeucau."', '".$row2['sanphamid']."', '".$_POST['soluong'.$i]."')";
            mysqli_query($ketnoi, $sql_insert2);
        }
    }
    
    echo   '<script>
                alert("Thêm yêu cầu đổi trả thành công!");
                window.location.href="index.php";
            </script>'
?>

