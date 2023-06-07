<?php
//******* Chỗ này dùng cho xampp
	$host = "localhost";
	$dbname = "coopfood";
	$dbusername = "root";
	$dbpassword = "";
	
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
		'id'=> $product['sanphamid'],
		'name'=>$product['ténanpham'],
		'img'=>$product['hinhanh'],
		'gia'=>($product['giakhuyenmai'] > 0) ? $product['giakhuyenmai'] 	: $product['giaban'],
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
	if($action == 'delete'){
		unset($_SESSION['wishlist'][$id]);
	}
	header('location: index.php')
	
	?>