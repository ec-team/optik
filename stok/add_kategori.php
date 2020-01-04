<?php
include 'connectdb.php';
session_start();

$kategori = $_GET['kategori'];
$keterangan = $_GET['keterangan'];
echo $kategori;
echo $keterangan;

$query = "SELECT nama FROM kategori WHERE nama='$kategori'";
$result = mysqli_query($con, $query);
$count = 0;
while($row = mysqli_fetch_array($result))
{
	if(strtolower($row['nama']) == strtolower($kategori))
	{
		$count+=1;
	}
}

if($count>0)
{
	$_SESSION['add_kategori'] = $kategori;
	header('location:kategori.php');	
}
else
{
	mysqli_query($con, "INSERT INTO kategori (nama,keterangan) VALUES ('$kategori', '$keterangan')");
	header('location:kategori.php');
}

?>