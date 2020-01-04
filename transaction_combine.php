<?php
include 'connectdb.php';
session_start();
if(!isset ($_SESSION['user'])){
  header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);
if($row['invoice'] == 0)
{
  header("location:pembukuan.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kasir</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" type="text/css" href="css/datatables.bootstrap.min.css" />
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
              echo '<li class="active"><a href="#">Invoice</a></li>';
            if($row['pembukuan']==1)
              echo '<li><a href="pembukuan.php">Pembukuan</a></li>';
            if($row['stok']==1)
              echo '<li><a href="stok.php">Stok</a></li>';
            echo '<li><a href="destroy.php">Keluar</a></li>'; 
          }
          ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" role="main" style="margin-top: 60px;">
      <div class="row" style="max-height: 384px; overflow-y: auto;">
        <div class="col-md-12">
          <table class="table table-bordered table-hover" id="stok">
            <thead>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kategori</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kode Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Nama Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Stok</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Harga</td>
            </thead>
            <?php
            $query = "SELECT * FROM stok ORDER BY nama_kategori,kode_barang";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result))
            {
              echo '
              <tr id="'.$row["id"].'" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["id"].'" style="cursor:pointer;">
              <td class="text-center" id="'.$row["id"].'">'.$row["nama_kategori"].'</td>
              <td class="text-center" id="'.$row["id"].'">'.$row["kode_barang"].'</td>
              <td class="text-left" id="'.$row["id"].'">'.$row["nama_barang"].'</td>
              <td class="text-center" id="'.$row["id"].'">'.$row["jumlah_barang"].' '.$row["kode_satuan"].'</td>
              <td class="text-right" id="'.$row["id"].'"><span class="col-xs-1 text-right">Rp.</span><span>'.number_format($row["harga"],0).'</span></td>
              </tr>';
            }
            ?>
          </table>
        </div>
      </div>
      <br>
      <div class="row">
        <table class='table table-bordered table-hover' id='transData'>
          <thead>
            <tr>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">#</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Kode Barang</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Nama Barang</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Jumlah</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Satuan</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Harga</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Subtotal</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($con, "SELECT * FROM dummy ORDER BY no ASC");
            $total = 0;
            while ($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td class='text-center'><a href='delete_item.php?no=".$row['no']."'><button class='btn btn-danger'>Hapus</button></a></td>";
              echo "<td class='text-center' id=".$row['kode_barang'].">".$row['kode_barang']."</td>";
              echo "<td>".$row['nama_barang']."</td>";
              echo "<td class='text-center'>".$row['jumlah']."</td>";
              echo "<td class='text-center'>".$row['kode_harga']."</td>";
              echo "<td class='text-right'>".number_format($row['harga'],0)."</td>";
              echo "<td class='text-right'>".number_format($row['sub_total'],0)."</td>";
              echo "</tr>";
              $total = $total + $row['sub_total'];
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-1 text-right">
          <label>Total :</label>
        </div>
        <div class="col-md-1 text-right">
          <span>Rp.</span>
        </div>
        <div class="col-md-1 text-right">
          <span id="total">
            <?php
              echo number_format($total);
            ?>
          </span>
        </div>
      </div>
      <div class="row"><br></div>
      <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-1">
          <a class="btn btn-warning" href="clear_dummy.php">Cancel</a>
        </div>
        <div class="col-md-1 text-right">
          <!--<button class="btn btn-primary" type="button">Submit</button>-->
          <?php
            $result = mysqli_query($con, "SELECT count(*) FROM dummy");
            $count = mysqli_fetch_array($result);
            $count = $count['count(*)'];

            if ($count == 0) {
              echo '<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" disabled>Submit</button>';
            }
            else
            {
              echo '<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>';
            }
          ?>
          
        </div>
      </div>

      <div class="modal fade bs-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content" style="text-align: center;">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel"></h3>
            </div>
            <?php
                require('connectdb.php');
                $id = $_GET['id'];

                if (isset($_POST['submit'])) {
                  header("location:transaction.php");
                }

                $query = mysqli_query($con, "SELECT * FROM stok WHERE id='$id'");
                $row = mysqli_fetch_assoc($query);

            ?>
            <form method="post" action="modal.php" role="form">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Kategori : <?php echo $row['nama_kategori'] ?></h3>
                    <h4 style="color: red;"><b><?php echo $row['nama_barang']; ?></b></h4>
                    <label id="kodebarang" hidden><?php echo $row['kode_barang']; ?></label>
                    <br>
                    <h3>Sisa stok :</h3>
                    <h4 style="color: red;"><b><?php echo $row['jumlah_barang']." ".$row['kode_satuan']; ?></b></h4>
                    <label id="stok" hidden><?php echo $row['jumlah_barang']; ?></label>
                    <br>
                    <h3>Jumlah :</h3>
                    <center><input type="number" name="jumlah" class="form-control" id="jumlah" autocomplete="off" style="font-size: 36px; height: auto; width:60%; text-align: center;"></center>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                   <input type="button" class="btn btn-primary" id="addbutton" name="submit" value="Update" />&nbsp;
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div><!-- /.container -->

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/datatables.bootstrap.min.js"></script>
    <script>
      
      $(document).ready(function()
      {
          $('#stok').DataTable();
      });

      $('#exampleModal').on('shown.bs.modal', function () {
          $('#jumlah').focus();
      })
      $('#exampleModal').on('hidden.bs.modal', function () {
          $('#search_text').focus();
      })

    </script>
  </body>
</html>