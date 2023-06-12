<?php
//******* Chỗ này dùng cho xampp
	$host = "localhost";
	$dbname = "coopfood";
	$dbusername = "root";
	$dbpassword = "";

//******* Chỗ này dùng cho webhost
// $host="localhost";
// $dbusername="id20134519_maianh";
// $dbpassword="M&~SHAnIRF97!y~V";
// $dbname="id20134519_sunphone";
	
	$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);



session_start();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add'; 

$slg = (isset($_GET['slg'])) ? $_GET['slg'] : 1;

$_SESSION['tongtien']=$tongtien;


if($slg <= 0){
	$slg = 1;
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$query = mysqli_query($conn, "SELECT * FROM sanpham WHERE sanphamid = " .$id);
if($query){
	$product = mysqli_fetch_assoc($query);
}

$item =[
	'id'=> $product['sanphamid'],
	'name'=>$product['tensanpham'],
	'img'=>$product['hinhanh'],
	'gia'=>($product['giakhuyenmai'] > 0) ? $product['giakhuyenmai'] : $product['giaban'],
	'slg'=> $slg,
	'kiemtra'=>$product['soluong']
];
if($action == 'add'){
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['slg'] += $slg;
	}
	else{
		$_SESSION['cart'][$id] = $item;
	
	}
}	
// Tăng số lượng
if ($action == 'increase'){
	if(isset($_SESSION['cart'][$id]))
		if($_SESSION['cart'][$id]['slg']<$product['soluong'])
	{
		$_SESSION['cart'][$id]['slg'] +=1;
	}
}

//Giảm số lượng
if ($action == 'decrease'){
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['slg'] = ($_SESSION['cart'][$id]['slg'] > 1) ? $_SESSION['cart'][$id]['slg'] -1 : 1; 
	}
}

// Cập nhật giỏ hàng
if($action == 'update'){
	
	$_SESSION['cart'][$id]['slg'] = $slg;
}

//Xóa sản phẩm khỏi giỏ hàng
if($action == 'delete'){
	unset($_SESSION['cart'][$id]);
}

header('location: cart.php')
//echo "<pre>";
//print_r($_SESSION['cart']);

// Thêm mới giỏ hàng


?>