<?php
include 'connectdb.php';

$petugas = $_POST['petugas'];
$keterangan = $_POST['keterangan'];
$id = $_POST['kodebarang'];
$nama = $_POST['namabarang'];
$sisa = $_POST['sisa'];
$jumlah = $_POST['jumlahbarang'];
$total = $sisa + $jumlah;

mysqli_query($con, "UPDATE stok SET jumlah_barang='$total' WHERE kode_barang='$id'");
mysqli_query($con, "INSERT INTO stok_masuk (petugas,kode_barang,nama_barang,jumlah,keterangan) VALUES ('$petugas', '$id', '$nama', '$jumlah', '$keterangan')");

header('location:stok.php?stok_id='.$id.'&&nama='.$nama.'&&jumlah='.$total.'');
//mysqli_close($con);
?>