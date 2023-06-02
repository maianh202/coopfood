<?php
//******* Chỗ này dùng cho xampp
	$host = "localhost";
	$dbname = "sunphone";
	$dbusername = "root";
	$dbpassword = "";

    // $host="localhost";
    // $dbusername="id20134519_maianh";
    // $dbpassword="M&~SHAnIRF97!y~V";
    // $dbname="id20134519_sunphone";
	
	$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);


session_start();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add'; 



if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$query = mysqli_query($conn, "SELECT * FROM sanpham WHERE sanpham_id = $id");
if($query){
$product = mysqli_fetch_assoc($query);
}

$item =[
	'id'=> $product['sanpham_id'],
	'name'=>$product['ten_sp'],
	'img'=>$product['hinh_anh'],
	'gia'=>($product['khuyenmai'] > 0) ? $product['khuyenmai'] 	: $product['giaban'],
    'sl'=> $product['soluong']

];
if($action == 'add'){
	if(isset($_SESSION['wishlist'][$id])){
		$_SESSION['wishlist'][$id]['slg'] += $slg;
	}
	else{   
		$_SESSION['wishlist'][$id] = $item;
	
	}
}	
// Tăng số lượng
/*if(isset($_SESSION['wishlist'][$id])){
	$_SESSION['wishlist'][$id]['slg'] +=1;
}
else{
	$_SESSION['wishlist'][$id] = $item;

}*/
// Cập nhật giỏ hàng


//Xóa sản phẩm khỏi giỏ hàng
if($action == 'delete'){
	unset($_SESSION['wishlist'][$id]);
}
header('location: index.php')
//echo "<pre>";
//print_r($_SESSION['wishlist']);

// Thêm mới giỏ hàng


?>