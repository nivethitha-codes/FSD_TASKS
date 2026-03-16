<?php
include "config/db.php";

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$conn->query("INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");

header("Location: login.php");
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="glass">

<h3>Register</h3>

<form method="POST">

<input name="name" placeholder="Name" required>

<input name="email" placeholder="Email" required>

<input name="password" type="password" placeholder="Password" required>

<button name="register">Create Account</button>

</form>

</div>