<?php
include 'connectdb.php';

$username = $_GET['username'];
$password = $_GET['password'];
$invoice = $_GET['invoice'];
$pembukuan = $_GET['pembukuan'];
$stok = $_GET['stok'];

mysqli_query($con, "INSERT INTO user (username,password,invoice,pembukuan,stok) VALUES ('$username', '$password', '$invoice', '$pembukuan', '$stok')");

header('location:pengaturan.php');
//mysqli_close($con);
?>