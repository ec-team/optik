<?php
include 'connectdb.php';

$nama = mysqli_real_escape_string($con, $_POST['nama']);
$alamat = mysqli_real_escape_string($con, $_POST['alamat']);
$telepon = mysqli_real_escape_string($con, $_POST['telepon']);
/*echo $nama."<br>";
echo $alamat."<br>";
echo $telepon."<br>";*/

mysqli_query($con, "UPDATE data_toko SET nama='$nama', alamat='$alamat', telepon='$telepon'");

header('location:pengaturan.php');
?>