<?php
include 'connectdb.php';

mysqli_query($con, "INSERT INTO harga_barang (kode_barang,kode_harga,harga) VALUES ('$_POST[kodebarang]', '$_POST[kodeharga]', '$_POST[harga]')");

$id = $_POST['kodebarang'];
$nama = $_POST['namabarang'];
//echo $_POST['namabarang'];
header('location:stok.php?id='.$id.'&&nama='.$nama.'');
//mysqli_close($con);
?>