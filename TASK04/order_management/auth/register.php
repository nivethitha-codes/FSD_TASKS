<?php
include "../config/db.php";

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$conn->query("INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");

header("location:login.php");
}
?>

<form method="post">
<h2>Register</h2>

<input name="name" placeholder="Name"><br><br>
<input name="email" placeholder="Email"><br><br>
<input name="password" type="password"><br><br>

<button name="register">Register</button>
</form>