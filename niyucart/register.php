<?php
include "includes/header.php";
include "includes/db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($res->num_rows>0){
        $error = "Email already registered!";
    } else {
        $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['role'] = 'user';
        header("Location: shop.php");
        exit();
    }
}
?>

<div class="center-container">
    <form method="POST" class="form-box">
        <h2>Create Account</h2>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</div>

<?php include "includes/footer.php"; ?>