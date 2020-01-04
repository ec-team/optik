<?php
include 'connectdb.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nama_old = $_POST['nama_old'];

mysqli_query($con, "UPDATE satuan SET nama='$nama' WHERE id='$id'");
mysqli_query($con, "UPDATE stok SET kode_satuan='$nama' WHERE kode_satuan='$nama_old'");

header('location:satuan.php');
?>