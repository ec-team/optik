<?php
session_start();
include('connectdb.php');

$user=$_POST['username'];
$password= $_POST['password'];
$query = mysqli_query($con, "SELECT * FROM user WHERE username='$user'");
$row=mysqli_fetch_array($query);

if($row['username'] == "")
{
	//echo "<script>alert('Username Tidak Ada !!');</script>";
	header('location:login.php');
}
else if($row['password'] != $password)
{
	echo "<script>alert('Password Salah !!');</script>";
	header('location:login.php');
}
else if($row['password'] == $password)
{
	//echo "<script>alert('Login Sukses !!');</script>";
	$_SESSION['user']=$user;
	header('location:home.php');
}
?>
