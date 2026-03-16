<?php
include "../config/db.php";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$result=$conn->query("SELECT * FROM users WHERE email='$email'");
$user=$result->fetch_assoc();

if(password_verify($password,$user['password'])){

$_SESSION['user']=$user['id'];
$_SESSION['role']=$user['role'];

header("location:../index.php");

}
}
?>

<form method="post">
<h2>Login</h2>

<input name="email" placeholder="Email"><br><br>
<input name="password" type="password"><br><br>

<button name="login">Login</button>
</form>