<?php
include "config.php";

$result=$conn->query("SELECT * FROM activity_log");
?>

<link rel="stylesheet" href="style.css">

<div class="header">Activity Log (Trigger Output)</div>

<div class="container">

<table>

<tr>
<th>Log ID</th>
<th>User ID</th>
<th>Action</th>
<th>Time</th>
</tr>

<?php

while($row=$result->fetch_assoc()){

echo "<tr>
<td>".$row['log_id']."</td>
<td>".$row['user_id']."</td>
<td>".$row['action_type']."</td>
<td>".$row['action_time']."</td>
</tr>";

}

?>

</table>

<br>

<a href="index.php">Back</a>

</div>