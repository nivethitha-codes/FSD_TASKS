<?php
include "includes/db.php";
include "includes/header.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT c.id as cart_id, p.*, c.quantity
          FROM cart c
          JOIN products p ON c.product_id=p.id
          WHERE c.user_id=$user_id";

$result = $conn->query($query);

$total = 0;
?>

<div class="center-container">
    <div class="form-box" style="width:90%; max-width:800px;">
        <h2>Your Cart</h2>

        <?php if($result->num_rows > 0){ ?>
            <div class="products">
                <?php while($row=$result->fetch_assoc()){
                    $subtotal = $row['price'] * $row['quantity'];
                    $total += $subtotal;
                ?>
                    <div class="card">
                        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>Price: ₹<?php echo $row['price']; ?></p>
                        <p>Quantity: <?php echo $row['quantity']; ?></p>
                        <p>Subtotal: ₹<?php echo $subtotal; ?></p>

                        <a href="increase.php?id=<?php echo $row['cart_id']; ?>" class="btn">+</a>
                        <a href="decrease.php?id=<?php echo $row['cart_id']; ?>" class="btn">-</a>
                        <a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>" class="btn-danger">Remove</a>
                    </div>
                <?php } ?>
            </div>

            <h3 style="text-align:center; margin-top:20px;">Total: ₹<?php echo $total; ?></h3>
            <div style="text-align:center; margin-top:15px;">
                <a href="checkout.php" class="btn-checkout">Proceed to Checkout</a>
            </div>

        <?php } else { ?>
            <p style="text-align:center; margin:30px 0;">Your cart is empty.</p>
        <?php } ?>
    </div>
</div>

<?php include "includes/footer.php"; ?>