<?php

include "../config/db.php";
include "../includes/header.php";

$sql="SELECT customers.name,
products.name AS product,
products.price,
orders.quantity,
orders.order_date

FROM orders

JOIN customers ON orders.customer_id=customers.id
JOIN products ON orders.product_id=products.id

ORDER BY orders.order_date DESC";

$result=$conn->query($sql);

?>

<div class="container">

<h2>Order History</h2>

<table>

<tr>
<th>Customer</th>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Date</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['product']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['order_date']; ?></td>
</tr>

<?php } ?>

</table>

</div>

<?php include "../includes/footer.php"; ?>