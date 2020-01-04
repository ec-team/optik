<?php
include 'connectdb.php';

$username = $_GET['username'];
$password = $_GET['password'];
$invoice = $_GET['invoice'];
$pembukuan = $_GET['pembukuan'];
$stok = $_GET['stok'];

mysqli_query($con, "UPDATE user SET password='$password',invoice='$invoice',pembukuan='$pembukuan',stok='$stok' WHERE username='$username'");

header('location:pengaturan.php');
//mysqli_close($con);
?>