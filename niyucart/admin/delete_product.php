<?php
include "../includes/db.php";
session_start();
if($_SESSION['role']!="admin"){ echo "Access Denied"; exit(); }

$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");
header("Location: dashboard.php");