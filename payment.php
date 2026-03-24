<?php
include "includes/header.php";
include "includes/db.php";

$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $cart = $conn->query("SELECT p.id, p.price, c.quantity
                          FROM cart c
                          JOIN products p ON c.product_id=p.id
                          WHERE c.user_id=$user_id");

    $total = 0;
    while($item=$cart->fetch_assoc()){
        $total += $item['price']*$item['quantity'];
    }

    $conn->query("INSERT INTO orders(user_id,total_amount,status)
                  VALUES($user_id,$total,'Paid')");
    $order_id = $conn->insert_id;

    $cart = $conn->query("SELECT p.id, p.price, c.quantity
                          FROM cart c
                          JOIN products p ON c.product_id=p.id
                          WHERE c.user_id=$user_id");
    while($item=$cart->fetch_assoc()){
        $conn->query("INSERT INTO order_items(order_id,product_id,quantity,price)
                      VALUES($order_id,{$item['id']},{$item['quantity']},{$item['price']})");
    }

    $conn->query("DELETE FROM cart WHERE user_id=$user_id");
    echo "<script>alert('Order Placed Successfully!'); window.location='orders.php';</script>";
}
?>

<h2 class="title">Payment</h2>

<div class="payment-container">
    <form method="POST" class="form-box">
        <h3>Enter Your Payment Details</h3>
        <input type="text" placeholder="Card Number" required>
        <input type="text" placeholder="Card Holder Name" required>
        <input type="text" placeholder="Expiry Date (MM/YY)" required>
        <input type="text" placeholder="CVV" required>
        <button type="submit" class="btn-checkout">Pay Now</button>
    </form>
</div>

<?php include "includes/footer.php"; ?>