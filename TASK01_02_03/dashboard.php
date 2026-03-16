<?php
session_start();
if(!isset($_SESSION['user'])){
header("Location: login.php");
exit;
}

$conn=mysqli_connect("localhost","root","greatnive@1130","student_db01");

$sort="";
if(isset($_GET['sort'])){
if($_GET['sort']=="name") $sort="ORDER BY name ASC";
elseif($_GET['sort']=="dob") $sort="ORDER BY dob ASC";
}

$where="";
if(isset($_GET['department']) && $_GET['department']!=""){
$dept=$_GET['department'];
$where="WHERE department='$dept'";
}

$sql="SELECT * FROM students $where $sort";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
<h2>Dashboard</h2>
<div>
<a href="dashboard.php">Dashboard</a>
<a href="view.php">View</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<h2>Data Retrieval Dashboard</h2>

<form method="GET">
Sort:
<select name="sort">
<option value="">None</option>
<option value="name">Name</option>
<option value="dob">DOB</option>
</select>

Filter:
<select name="department">
<option value="">All</option>
<option value="CSE">CSE</option>
<option value="CSE(AI-DS)">CSE(AI-DS)</option>
<option value="ECE">ECE</option>
</select>

<button type="submit">Apply</button>
</form>

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

<h3>Count Per Department</h3>

<?php
$count_sql="SELECT department,COUNT(*) as total FROM students GROUP BY department";
$count_result=mysqli_query($conn,$count_sql);

echo "<table><tr><th>Department</th><th>Total</th></tr>";

while($row=mysqli_fetch_assoc($count_result)){
echo "<tr><td>{$row['department']}</td><td>{$row['total']}</td></tr>";
}
echo "</table>";
?>

</div>
</body>
</html>