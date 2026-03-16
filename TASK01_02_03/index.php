<?php
$conn=mysqli_connect("localhost","root","greatnive@1130","student_db01");

if(isset($_POST['register'])){
$name=$_POST['name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$department=$_POST['department'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$sql="INSERT INTO students(name,email,dob,department,phone,password)
VALUES('$name','$email','$dob','$department','$phone','$password')";

mysqli_query($conn,$sql);
echo "<script>alert('Registered Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
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
<h2>Registration</h2>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="date" name="dob" required>

<select name="department" required>
<option value="">Select Department</option>
<option value="CSE">CSE</option>
<option value="CSE(AI-DS)">CSE(AI-DS)</option>
<option value="ECE">ECE</option>
</select>

<input type="text" name="phone" placeholder="Phone" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>
</form>
</div>

</body>
</html>