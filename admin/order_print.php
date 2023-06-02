
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="images/dumbum.ico" type="image/ico" />
        <title>Sun Phone | Trang quản trị đơn hàng</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <style>
    #order-detail-wrapper {
    width: 450px;
    margin: 50px auto;
    border: 4px double #000;
    padding: 8px;
    text-align: justify
    }

    ul{
        padding-left:0px
        
    } 
    h1 {
        margin: 10px 0px 10px 0px
    }
    </style>
        <?php

            include("../config/dbconfig.php");
          $con = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
          mysqli_set_charset($con, 'UTF8');
            $order = mysqli_query($con, "SELECT `order_detail`.soluong as sl, khachhang.*, orders.*, sanpham.*, order_detail.* FROM `order_detail` INNER JOIN `sanpham` ON `order_detail`.sanpham_id = `sanpham`.sanpham_id INNER JOIN orders on orders.order_id=order_detail.order_id inner join `khachhang` ON `khachhang`.khach_id = `orders`.khach_id  WHERE `orders`.order_id = " . $_GET['id']);
            $order = mysqli_fetch_all($order, MYSQLI_ASSOC);
        
        ?>
        <div id="order-detail-wrapper">
            <div id="order-detail" class="double row">
                <h1>Chi tiết đơn hàng</h1>
                <div style="border-bottom: 1px black">
                    <div>
                        <label><strong>Người nhận: </strong> <span> <?= $order[0]['hoten'] ?></span> </label>
                    </div>

                    <div>
                        <label><strong>Điện thoại: </strong><span> <?= $order[0]['sdt'] ?></span></label>
                    </div>

                    <div>
                        <label><strong>Địa chỉ: </strong><span> <?= $order[0]['diachi'] ?></span></label>
                    </div>
                </div>
                
                <h3>Danh sách sản phẩm</h3>
                <ul type="none">
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($order as $row) {
                        ?>
                        <li>
                            <span class="item-name"><?= $row['ten_sp'] ?></span>
                            <span class="item-quantity"><strong>- SL: </strong> <?= $row['sl'] ?> sản phẩm</span>
                            <span class="item-quantity"><strong>- Giá: </strong> <?= $row['gia'] ?>đ</span>
                        </li>
                        <?php
                        $totalQuantity += $row['sl'];
                    }
                    ?>
                </ul>
                
                <label> <strong>Tổng SL: </strong></label> <?= $totalQuantity ?> - <label><strong>Tổng tiền: </strong></label> <?= number_format($row['tongtien'], 0, ",", ".") ?> đ
                <p><label><strong>Ghi chú: </strong></label><?= $order[0]['ghichu'] ?></p>
            </div>
        </div>
    </body>
</html>

