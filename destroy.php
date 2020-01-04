<?php
session_start();
include('connectdb.php');

session_destroy();
mysqli_query($con, "TRUNCATE TABLE dummy");
header('location:/kasir/transaksi/menu_kasir.php');
?>
