<?php include "../includes/header.php";

$c=$conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc();
$p=$conn->query("SELECT COUNT(*) as p FROM products")->fetch_assoc();
$o=$conn->query("SELECT COUNT(*) as o FROM orders")->fetch_assoc();
?>

<h2>Admin Dashboard</h2>

<div class="grid">

<div class="card">
Customers
<h1><?php echo $c['c']; ?></h1>
</div>

<div class="card">
Products
<h1><?php echo $p['p']; ?></h1>
</div>

<div class="card">
Orders
<h1><?php echo $o['o']; ?></h1>
</div>

</div>

<?php include "../includes/footer.php"; ?>