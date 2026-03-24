<?php
include "../includes/db.php";
include "../includes/header.php";
if($_SESSION['role']!="admin"){ echo "Access Denied"; exit(); }

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name,"../images/$image");

    $conn->query("INSERT INTO products(name,price,category,image) VALUES('$name','$price','$category','$image')");
    echo "<script>alert('Product Added!'); window.location='dashboard.php';</script>";
}
?>

<div class="center-container">
<form method="POST" enctype="multipart/form-data" class="form-box">
<h2>Add Product</h2>
<input type="text" name="name" placeholder="Product Name" required>
<input type="number" name="price" placeholder="Price" required>
<input type="text" name="category" placeholder="Category" required>
<input type="file" name="image" required>
<button type="submit">Add Product</button>
</form>
</div>

<?php include "../includes/footer.php"; ?>