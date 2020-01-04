<?php
include 'connectdb.php';
session_start();
if(!isset ($_SESSION['user'])){
	header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);
if($row['stok'] == 0)
{
  header("location:home.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kasir</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Version 2.0</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">  
          <ul class="nav navbar-nav">
            <li><a>Petugas : <?php echo $_SESSION['user']; ?></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php 
          if ($_SESSION['user'] == "admin")
          {
            echo '
            <li><a href="home.php">Menu</a></li>
            <li><a href="destroy.php">Keluar</a></li>';
          }
          else
          {
            if($row['invoice']==1)
              echo '<li><a href="home.php">Invoice</a></li>';
            if($row['pembukuan']==1)
              echo '<li><a href="pembukuan.php">Pembukuan</a></li>';
            if($row['stok']==1)
              echo '<li class="active"><a href="#">Stok</a></li>';
            echo '<li><a href="destroy.php">Keluar</a></li>'; 
          }
          ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" role="main" style="margin-top: 60px;">
      <div class="row">
        <div class="col-md-3"></div>
        <button class="btn btn-primary col-md-6">Tambah barang</button>
        <div class="col-md-3"></div>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>