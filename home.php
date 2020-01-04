<?php
include 'connectdb.php';
session_start();
if(!isset ($_SESSION['user'])){
  header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);
//echo "<script>alert('$_SESSION[user]')</script>";
if($row['invoice'] == 0)
{
  header("location:pembukuan.php"); 
}
if($row['invoice'] == 1 && $_SESSION['user']!='admin')
{
  header("location:transaction.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
    <link href="fa/css/all.css" rel="stylesheet"> <!--load all styles -->
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
        </div>
        <div id="navbar" class="collapse navbar-collapse">  
          <ul class="nav navbar-nav">
          <?php 
          if ($_SESSION['user'] == "admin")
          {
            echo '
            <li><a style="color: white;" href="home.php">Menu &nbsp;<i class="fas fa-bars"></i></a></li>';
          }
          else
          {
            if($row['invoice']==1)
              echo '<li class="active"><a style="color: white;" href="#">Transaksi</a></li>';
            if($row['pembukuan']==1)
              echo '<li><a style="color: white;" href="pembukuan.php">Pembukuan</a></li>';
            if($row['stok']==1)
              echo '<li><a style="color: white;" href="stok.php">Stok</a></li>';
          }
          ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a style="color: white;"><?php echo $_SESSION['user']; ?> &nbsp;<i class="fas fa-user"></i></a></li>
            <li><a style="color: white;" href="destroy.php">Keluar &nbsp;<i class="fas fa-sign-out-alt"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" style="margin-top: 60px;">
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-3"></div>
        <a href="transaksi/menu_kasir.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 20px 0px 10px;height: 200px;">
            <h3>TRANSAKSI</h3>
            <i class="fas fa-cash-register" style="font-size: 100px;"></i>
          </div>
        </a>
        <a href="histori/pembukuan.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 10px 0px 10px;padding: 10px;height: 200px;">
            <h3>HISTORI PENJUALAN</h3>
            <i class="fas fa-chart-line" style="font-size: 100px;"></i>
          </div>
        </a>
      </div>
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-3"></div>
        <a href="stok/stok.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 20px 0px 10px;padding: 10px;height: 200px;">
            <h3>MASTER BARANG</h3>
            <i class="fas fa-book" style="font-size: 100px;"></i>
          </div>
        </a>
        <a href="pengaturan/pengaturan.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 10px 0px 10px;padding: 10px;height: 200px;">
            <h3>PENGATURAN</h3>
            <i class="fas fa-tools" style="font-size: 100px;"></i>
          </div>
        </a>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
  <script type="text/javascript">
    function a(){
      document.getElementById("transaksi").href="transaksi/transaction.php";
      alert(document.getElementById("transaksi").href);
    }
  </script>
</html>