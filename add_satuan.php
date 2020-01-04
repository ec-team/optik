<?php
include 'connectdb.php';
session_start();

$satuan = $_GET['satuan'];
//echo $satuan;

$query = "SELECT nama FROM satuan WHERE nama='$satuan'";
$result = mysqli_query($con, $query);
$count = 0;
while($row = mysqli_fetch_array($result))
{
	if(strtolower($row['nama']) == strtolower($satuan))
	{
		$count+=1;
	}
}

if($count>0)
{
	$_SESSION['add_satuan'] = $satuan;
	header('location:satuan.php');	
}
else
{
	mysqli_query($con, "INSERT INTO satuan (nama) VALUES ('$satuan')");
	header('location:satuan.php');
}

?>