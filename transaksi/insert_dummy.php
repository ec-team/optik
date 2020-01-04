<?php
session_start();
include '../connectdb.php';

$kodeBarang = $_GET['kode_barang'];
$namaBarang = mysqli_real_escape_string($con, $_GET['nama_barang']);
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];
$subTotal = $harga * $jumlah;

echo "kode barang: ".$kodeBarang;
echo "<br>nama barang: ".$namaBarang;
echo "<br>jumlah: ".$jumlah;
echo "<br>harga: ".$harga;
echo "<br>subtotal: ".$subTotal;

$querys="INSERT INTO dummy (kode_barang, nama_barang, jumlah, harga, sub_total) VALUES ('$kodeBarang', '$namaBarang', '$jumlah', '$harga', '$subTotal')";

echo "<br>querys: ".$querys;

mysqli_query($con, $querys);


header("location: transaction.php");
?>