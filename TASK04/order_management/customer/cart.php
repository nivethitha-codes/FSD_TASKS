<?php
session_start();
include "../config/db.php";
include "../includes/header.php";

if(isset($_GET['id'])){
$_SESSION['cart'][]=$_GET['id'];
}

?>

<div class="container">

<h2>Your Cart</h2>

<?php

if(isset($_SESSION['cart'])){

foreach($_SESSION['cart'] as $id){

$p=$conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

echo "<div class='card'>";
echo $p['name']." - ₹".$p['price'];
echo "</div>";

}

?>

<a href="place_order.php">
<button>Place Order</button>
</a>

<?php } ?>

</div>

<?php include "../includes/footer.php"; ?>