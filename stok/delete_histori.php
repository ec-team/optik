<?php
include 'connectdb.php';

$id = $_GET['kodebarang'];

mysqli_query($con, "DELETE FROM stok_masuk WHERE kode_barang='$id'");

header('location:stok.php');
//mysqli_close($con);
?>