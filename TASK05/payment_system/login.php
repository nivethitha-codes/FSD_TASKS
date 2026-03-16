<?php
session_start();
include "config/db.php";

$error="";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=$conn->query($sql);

if($result->num_rows>0){

$user=$result->fetch_assoc();

$_SESSION['user']=$user['id'];

header("Location: dashboard.php");
exit();

}else{

$error="Invalid login";

}

}
?>

<link rel="stylesheet" href="css/style.css">

<div class="glass">

<h2>Login</h2>

<?php if($error!=""){ echo "<p style='color:red'>$error</p>"; } ?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<br>

<a href="register.php">Create Account</a>

</div>