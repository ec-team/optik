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
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
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
      <div class="row" style="max-height: 384px;">
        <div class="col-md-12" style="overflow-y: auto;">
          <form>
            <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" autofocus="autofocus" autocomplete="off" />
          </form>
          <br>
          <div id="result"></div>
        </div>
      </div>

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
            <div class="dash">
            </div>
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
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script>

      $(document).ready(function()
      {
          $('#tblMain').DataTable();
      });

      $('#exampleModal').on('shown.bs.modal', function () {
          $('#jumlah').focus();
      })
      $('#exampleModal').on('hidden.bs.modal', function () {
          $('#search_text').focus();
      })

      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            }); 
        var modal = $(this)
        modal.find('.modal-title').text('Input jumlah barang')
        modal.find('.modal-body input').val(recipient)
      })

      $(document).ready(function(){
       load_data();

       function load_data(query)
       {
        $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{query:query},
         success:function(data)
         {
          $('#result').html(data);
         }
        });
       }
       $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
         load_data(search);
        }
        else
        {
         load_data();
        }
       });
      });
    </script>
  </body>
</html>