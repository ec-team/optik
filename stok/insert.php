<?php
include 'connectdb.php';

$namabarang= mysqli_real_escape_string($con, $_GET['namabarang']);
echo $namabarang;

if(mysqli_query($con, "INSERT INTO stok (nama_kategori,kode_barang,nama_barang,jumlah_barang,kode_satuan,harga) VALUES ('$_GET[kategori]', '$_GET[kodebarang]', '$namabarang', '$_GET[jumlah]', '$_GET[satuan]', '$_GET[harga]')"))
{
	mysqli_query($con, "INSERT INTO stok_masuk (petugas,kode_barang,nama_barang,jumlah,satuan,keterangan) VALUES ('$_GET[petugas]', '$_GET[kodebarang]', '$namabarang', '$_GET[jumlah]', '$_GET[satuan]', 'Stok baru')");
}
else
{
	session_start();
	$_SESSION['same_product'] = $_GET['kodebarang'];
}

header('location:stok.php');

?>