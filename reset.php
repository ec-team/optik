<?php
include 'connectdb.php';

$id = $_GET['kodebarang'];
$nama = $_GET['namabarang'];

mysqli_query($con, "UPDATE stok SET jumlah_barang=0 WHERE kode_barang='$id'");

header('location:stok.php?stok_id='.$id.'&&nama='.$nama.'&&jumlah=0');
//mysqli_close($con);
?>