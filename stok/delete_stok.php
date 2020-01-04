<?php
include 'connectdb.php';

session_start();
$petugas = $_SESSION['user'];
$id = $_GET['kodebarang'];

$result = mysqli_query($con, "SELECT * FROM stok WHERE kode_barang='$id'");
$row = mysqli_fetch_array($result);

mysqli_query($con, "INSERT INTO stok_masuk (petugas,kode_barang,nama_barang,jumlah,satuan,keterangan) VALUES ('$petugas', '$row[kode_barang]', '$row[nama_barang]', '$row[jumlah_barang]', '$row[kode_satuan]', 'Barang dihapus')");
//echo $query;
mysqli_query($con, "DELETE FROM stok WHERE kode_barang='$id'");

header('location:stok.php');
//mysqli_close($con);
?>