<?php
session_start();
include '../connectdb.php';

mysqli_query($con, "TRUNCATE TABLE dummy");

header("location: transaction.php");
?>