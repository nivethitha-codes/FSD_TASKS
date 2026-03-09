<?php
session_start();
include "config/db.php";

$user=$_SESSION['user'];

$res=$conn->query("SELECT * FROM transactions WHERE user_id=$user");
?>

<link rel="stylesheet" href="css/style.css">

<div class="glass">

<h3>Transaction History</h3>

<table border="1" width="100%">

<tr>
<th>ID</th>
<th>Amount</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php

while($row=$res->fetch_assoc()){

echo "<tr>

<td>{$row['id']}</td>
<td>{$row['amount']}</td>
<td>{$row['status']}</td>
<td>{$row['date']}</td>

</tr>";

}

?>

</table>

<br>

<a href="dashboard.php">

<button>Back</button>

</a>

</div>