<?php
session_start();
include "config/db.php";

$user=$_SESSION['user'];

if(isset($_POST['add'])){

$amount=$_POST['amount'];

$conn->query("UPDATE users SET balance = balance + $amount WHERE id=$user");

header("Location: dashboard.php");

}
?>

<link rel="stylesheet" href="css/style.css">

<div class="glass">

<h3>Add Money</h3>

<form method="POST">

<input name="amount" placeholder="Enter Amount">

<button name="add">Add Balance</button>

</form>

</div>