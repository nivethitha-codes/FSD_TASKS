<?php
include "config.php";

$msg="";

if(isset($_POST['add'])){
$name=$_POST['name'];
$email=$_POST['email'];

if($conn->query("INSERT INTO users(name,email) VALUES('$name','$email')")){
$msg="User inserted successfully!";
}else{
$msg="Insert failed!";
}
}

if(isset($_POST['update'])){
$id=$_POST['id'];
$email=$_POST['new_email'];

if($conn->query("UPDATE users SET email='$email' WHERE id=$id")){
$msg="User updated successfully!";
}else{
$msg="Update failed!";
}
}

$users=$conn->query("SELECT * FROM users");
?>

<link rel="stylesheet" href="style.css">

<div class="header">Trigger Logging Dashboard</div>

<div class="container">

<h3><?php echo $msg; ?></h3>

<h2>Add User</h2>

<form method="POST">
<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>
<button name="add">Insert User</button>
</form>

<hr>

<h2>Update User</h2>

<form method="POST">
<input name="id" placeholder="User ID" required>
<input name="new_email" placeholder="New Email" required>
<button name="update">Update User</button>
</form>

<hr>

<h2>Existing Users</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
</tr>

<?php
while($row=$users->fetch_assoc()){
echo "<tr>
<td>".$row['id']."</td>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
</tr>";
}
?>

</table>

<br>

<a href="activity.php">View Activity Report</a>

</div>