<?php
session_start();
include 'connectdb.php';
//echo $_POST['barang'];
echo $_GET['barang']."&&";
$barang = $_GET['barang'];
$_SESSION['barang'] = $barang;

echo $_SESSION['barang']."&&";

//$_SESSION['barang']=$_POST['barang'];
//echo $_SESSION['barang'];
//mysqli_query($con, "TRUNCATE TABLE `detail_nota`");
header("location:home.php");
//mysqli_close($con);
?>
