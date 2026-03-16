<?php
session_start();
$conn=mysqli_connect("localhost","root","greatnive@1130","student_db01");
$error="";

if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM students WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
$_SESSION['user']=$email;
header("Location: dashboard.php");
exit;
}else{
$error="Invalid Email or Password!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">

<script>
function validate(){
let email=document.getElementById("email").value;
let pass=document.getElementById("password").value;

if(email==""||pass==""){
document.getElementById("msg").innerHTML="All fields required!";
return false;
}
return true;
}
</script>

</head>
<body>

<div class="navbar">
<h2>Student Management System</h2>
<div>
<a href="index.php">Register</a>
<a href="login.php">Login</a>
</div>
</div>

<div class="container">
<h2>Login</h2>

<p id="msg" style="color:red;"><?php echo $error; ?></p>

<form method="POST" onsubmit="return validate();">
<input type="email" id="email" name="email" placeholder="Email">
<input type="password" id="password" name="password" placeholder="Password">
<button type="submit" name="login">Login</button>
</form>
</div>

</body>
</html>