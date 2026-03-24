<?php
include "../includes/db.php";
include "../includes/header.php";
if($_SESSION['role']!="admin"){ echo "Access Denied"; exit(); }
$result = $conn->query("SELECT * FROM products");
?>

<h2 class="title">Admin - Manage Products</h2>
<div style="text-align:center;"><a href="add_product.php" class="btn">➕ Add Product</a></div>
<table class="admin-table">
<tr><th>ID</th><th>Image</th><th>Name</th><th>Price</th><th>Category</th><th>Actions</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><img src="../images/<?php echo $row['image']; ?>"></td>
<td><?php echo $row['name']; ?></td>
<td>₹<?php echo $row['price']; ?></td>
<td><?php echo $row['category']; ?></td>
<td>
    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn-danger">Delete</a>
</td>
</tr>
<?php } ?>
</table>
<?php include "../includes/footer.php"; ?>