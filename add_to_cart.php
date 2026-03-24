<?php
include "includes/db.php";
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Check if product is passed
if(!isset($_GET['product']) || empty($_GET['product'])){
    echo "<script>alert('Invalid Product'); window.location='shop.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$product_name = urldecode($_GET['product']);

// Find product in database
$product_check = $conn->query("SELECT * FROM products WHERE name='".$conn->real_escape_string($product_name)."'");
if($product_check->num_rows == 0){
    echo "<script>alert('Product not found'); window.location='shop.php';</script>";
    exit();
}

$product = $product_check->fetch_assoc();
$product_id = $product['id'];

// Check if product already in cart
$check = $conn->query("SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id");

if($check && $check->num_rows > 0){
    $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE user_id=$user_id AND product_id=$product_id");
} else {
    $conn->query("INSERT INTO cart(user_id,product_id,quantity) VALUES($user_id,$product_id,1)");
}

header("Location: cart.php");
exit();
?>