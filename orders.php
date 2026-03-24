<?php
include "includes/header.php";
include "includes/db.php";

$user_id = $_SESSION['user_id'];

$orders = $conn->query("SELECT * FROM orders WHERE user_id=$user_id ORDER BY created_at DESC");
?>

<h2 class="title">Order History</h2>
<div class="order-list">
<?php while($row=$orders->fetch_assoc()){ ?>
<div class="order-card">
    <p><strong>Order ID:</strong> <?php echo $row['id']; ?></p>
    <p>Total: ₹<?php echo $row['total_amount']; ?></p>
    <p>Status: <?php echo $row['status']; ?></p>
    <p>Date: <?php echo $row['created_at']; ?></p>
</div>
<?php } ?>
</div>

<?php include "includes/footer.php"; ?>