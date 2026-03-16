<?php

include "../config/db.php";
include "../includes/header.php";

$result = $conn->query("SELECT * FROM products");

?>

<div class="container">

<h2>Products</h2>

<?php while($row=$result->fetch_assoc()){ ?>

<div class="card">

<h3><?php echo $row['name']; ?></h3>

<p>Price: ₹<?php echo $row['price']; ?></p>

<a href="cart.php?id=<?php echo $row['id']; ?>">
<button>Add to Cart</button>
</a>

</div>

<?php } ?>

</div>

<?php include "../includes/footer.php"; ?>