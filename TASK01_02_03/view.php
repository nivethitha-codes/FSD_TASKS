<?php
$conn = mysqli_connect("localhost", "root", "greatnive@1130", "student_db01");
$sql="SELECT * FROM students";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{
background:linear-gradient(135deg,#667eea,#764ba2);
min-height:100vh;padding:20px;
}
.navbar{
background:white;padding:15px 30px;border-radius:10px;
margin-bottom:20px;display:flex;justify-content:space-between;
}
.navbar a{text-decoration:none;color:#333;margin-left:15px;}
.container{
background:white;padding:30px;border-radius:15px;
width:80%;margin:auto;box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
table{width:100%;border-collapse:collapse;margin-top:20px;}
th,td{padding:12px;text-align:center;}
th{background:#667eea;color:white;}
tr:nth-child(even){background:#f2f2f2;}
</style>
</head>

<body>

<div class="navbar">
<h2>Student Management System</h2>
<div>
<a href="index.php">Add Student</a>
<a href="view.php">View Students</a>
<a href="dashboard.php">Dashboard</a>
</div>
</div>

<div class="container">
<h2 style="text-align:center;">Registered Students</h2>

<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th>
<th>DOB</th><th>Department</th><th>Phone</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['email']}</td>
<td>{$row['dob']}</td>
<td>{$row['department']}</td>
<td>{$row['phone']}</td>
</tr>";
}
?>

</table>
</div>

</body>
</html>