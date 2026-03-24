<?php
include "../includes/db.php";
include "../includes/header.php";
if($_SESSION['role']!="admin"){ echo "Access Denied"; exit(); }

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if($_FILES['image']['name']){
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name,"../images/$image");
        $conn->query("UPDATE products SET name='$name', price='$price', category='$category', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$name', price='$price', category='$category' WHERE id=$id");
    }

    echo "<script>alert('Product Updated!'); window.location='dashboard.php';</script>";
}
?>

<div class="center-container">
<form method="POST" enctype="multipart/form-data" class="form-box">
<h2>Edit Product</h2>
<input type="text" name="name" value="<?php echo $product['name']; ?>" required>
<input type="number" name="price" value="<?php echo $product['price']; ?>" required>
<input type="text" name="category" value="<?php echo $product['category']; ?>" required>
<input type="file" name="image">
<button type="submit">Update Product</button>
</form>
</div>

<?php include "../includes/footer.php"; ?>