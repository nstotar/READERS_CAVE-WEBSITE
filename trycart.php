<?php
session_start();
include('include.php');
$status="";
if (isset($_GET['delete']) && $_GET['delete']!=""){
$code = $_GET['delete'];
$result = mysqli_query(
$con,
"SELECT * FROM `books` WHERE `book_id`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['book_name'];
$code = $row['book_id'];
$price = $row['book_price'];
$image = $row['book_img'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
