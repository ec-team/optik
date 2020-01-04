<?php
include '../connectdb.php';

mysqli_query($con, "DELETE FROM dummy WHERE no='$_GET[no]'");

header("location: transaction.php");
?>