<?php
// Start session safely
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NiyuCart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">🛒 NiyuCart</div>
    <div class="nav-links">
        <?php if(isset($_SESSION['user_id'])){ ?>
            <a href="shop.php">Shop</a>
            <a href="cart.php">Cart</a>
            <a href="orders.php">Orders</a>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){ ?>
                <a href="admin/dashboard.php">Admin</a>
            <?php } ?>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php } ?>
    </div>
</nav>