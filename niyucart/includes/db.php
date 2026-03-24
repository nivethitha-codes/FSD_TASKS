<?php
$conn = new mysqli("localhost","root","greatnive@1130","niyucart");
if($conn->connect_error){
    die("Database Connection Failed: " . $conn->connect_error);
}
?>