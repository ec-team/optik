<?php
include 'connectdb.php';

$nama = $_GET['username'];

mysqli_query($con, "DELETE FROM user WHERE username='$nama'");

header('location:pengaturan.php');
//mysqli_close($con);
?>