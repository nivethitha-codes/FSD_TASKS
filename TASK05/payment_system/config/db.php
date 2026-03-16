<?php
$conn = new mysqli("localhost","root","greatnive@1130","payment_system");

if($conn->connect_error){
die("Connection Failed");
}
?>