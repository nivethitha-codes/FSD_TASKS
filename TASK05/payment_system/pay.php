<?php

session_start();
include "config/db.php";

$user=$_SESSION['user'];
$merchant=$_POST['merchant'];
$amount=$_POST['amount'];

$conn->begin_transaction();

try{

$res=$conn->query("SELECT balance FROM users WHERE id=$user");
$row=$res->fetch_assoc();

$balance=$row['balance'];

if($balance < $amount){

throw new Exception("Insufficient Balance");

}

$conn->query("UPDATE users SET balance = balance - $amount WHERE id=$user");

$conn->query("UPDATE merchants SET balance = balance + $amount WHERE id=$merchant");

$conn->query("INSERT INTO transactions(user_id,merchant_id,amount,status)
VALUES($user,$merchant,$amount,'SUCCESS')");

$conn->commit();

header("Location: success.php");

}

catch(Exception $e){

$conn->rollback();

$conn->query("INSERT INTO transactions(user_id,merchant_id,amount,status)
VALUES($user,$merchant,$amount,'FAILED')");

echo "Payment Failed: ".$e->getMessage();

}

?>