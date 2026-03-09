<?php

include "../config/db.php";
include "../includes/header.php";

$highest=$conn->query("
SELECT MAX(products.price*orders.quantity) AS max_order
FROM orders
JOIN products ON orders.product_id=products.id
")->fetch_assoc();

$active=$conn->query("
SELECT customers.name,
COUNT(orders.id) total
FROM orders
JOIN customers ON orders.customer_id=customers.id
GROUP BY customers.id
ORDER BY total DESC
LIMIT 1
")->fetch_assoc();

?>

<div class="container">

<div class="card">

<h2>Highest Value Order</h2>

₹<?php echo $highest['max_order']; ?>

</div>

<div class="card">

<h2>Most Active Customer</h2>

<?php echo $active['name']; ?>

</div>

</div>

<?php include "../includes/footer.php"; ?>