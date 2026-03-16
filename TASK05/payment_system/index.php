<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>SmartPay Payment System</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="glass">

<h2>💳 SmartPay Payment System</h2>

<?php
if(isset($_SESSION['user'])){
?>

<a href="dashboard.php">
<button>Go to Dashboard</button>
</a>

<br><br>

<a href="logout.php">
<button>Logout</button>
</a>

<?php
}else{
?>

<a href="login.php">
<button>Login</button>
</a>

<br><br>

<a href="register.php">
<button>Register</button>
</a>

<?php
}
?>

</div>

</body>
</html>