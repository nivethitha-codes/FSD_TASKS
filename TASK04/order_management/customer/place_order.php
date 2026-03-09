<?php

session_start();
include "../config/db.php";

$customer_id=1;

foreach($_SESSION['cart'] as $product){

$conn->query("INSERT INTO orders(customer_id,product_id,quantity)
VALUES($customer_id,$product,1)");

}

unset($_SESSION['cart']);

header("Location: order_history.php");

?>