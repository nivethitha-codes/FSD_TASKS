<?php
session_start();

if(!isset($_SESSION['user'])){
header("Location: index.php");
exit();
}

include "config/db.php";

$user=$_SESSION['user'];

$res=$conn->query("SELECT * FROM users WHERE id=$user");
$data=$res->fetch_assoc();
?>

<link rel="stylesheet" href="css/style.css">

<div class="glass">

<h3>Welcome <?php echo $data['name']; ?></h3>

<h2>Balance: ₹<?php echo $data['balance']; ?></h2>

<br>

<a href="add_money.php">
<button>Add Money</button>
</a>

<br><br>

<form action="pay.php" method="POST">

<select name="merchant">

<?php

$m=$conn->query("SELECT * FROM merchants");

while($row=$m->fetch_assoc()){

echo "<option value='{$row['id']}'>{$row['name']}</option>";

}

?>

</select>

<input name="amount" placeholder="Enter Amount" required>

<button>Pay Now</button>

</form>

<br>

<a href="history.php">
<button>Transaction History</button>
</a>

<br><br>

<a href="logout.php">
<button>Logout</button>
</a>

</div>