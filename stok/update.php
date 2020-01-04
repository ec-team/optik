<?php
include 'connectdb.php';

$id = $_GET['kodebarang'];
$nama = mysqli_real_escape_string($con, $_GET['namabarang']);
$jumlah_akhir = $_GET['jumlah'];
$jumlah_tambah = $_GET['jumlahtambah'];
$satuan = $_GET['satuan'];
$harga = $_GET['harga'];
$kategori = $_GET['kategori'];
echo $jumlah_akhir;

mysqli_query($con, "UPDATE stok SET nama_kategori='$kategori', nama_barang='$nama', jumlah_barang='$jumlah_akhir', kode_satuan='$satuan', harga='$harga' WHERE kode_barang='$id'");
if($jumlah_tambah != '')
{
	mysqli_query($con, "INSERT INTO stok_masuk (petugas,kode_barang,nama_barang,jumlah,satuan,keterangan) VALUES ('$_GET[petugas]', '$id', '$nama', '$jumlah_tambah', '$satuan', 'Stok tambahan')");	
}

header('location:stok.php');
?>