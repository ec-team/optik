<?php
include 'connectdb.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nama_old = $_POST['nama_old'];
$keterangan = $_POST['keterangan'];

mysqli_query($con, "UPDATE kategori SET nama='$nama', keterangan='$keterangan' WHERE id='$id'");
mysqli_query($con, "UPDATE stok SET nama_kategori='$nama' WHERE nama_kategori='$nama_old'");

header('location:kategori.php');
?>