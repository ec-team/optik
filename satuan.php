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
    <title>Tambah Satuan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" type="text/css" href="css/datatables.bootstrap.min.css" />
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
                echo '<li><a style="color: white;" href="home.php">Invoice</a></li>';
              if($row['pembukuan']==1)
                echo '<li><a style="color: white;" href="pembukuan.php">Pembukuan</a></li>';
              if($row['stok']==1)
                echo '<li class="active"><a style="color: white;" href="#">Stok</a></li>';
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

    <div class="container" role="main" style="margin-top: 60px; width: 50%;">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
          <center>
            <div class="form-group">
              <a href="stok.php"><button class="btn btn-warning" data-toggle="modal" data-target="#add" style="font-size: 26px;padding: 0px,0px,5px,5px;"><i class="fas fa-arrow-left"></i></button></a>
            </div>
            <div class="form-group">
              <h4>Kembali</h4>
            </div>
          </center>
        </div>
        <div class="col-md-3">
          <center>
            <div class="form-group">
              <button class="btn btn-success" data-toggle="modal" data-target="#add" style="font-size: 26px;padding: 0px,0px,5px,5px;"><i class="fas fa-plus"></i></button>
            </div>
            <div class="form-group">
              <h4>Tambah Satuan</h4>
            </div>
          </center>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="stok">
            <thead>
              <td class="text-center" style="background-color:#428BCA;color:#FFF">Nomor</td>
              <td class="text-center" style="background-color:#428BCA;color:#FFF">Nama Satuan</td>
            </thead>
            <?php
            $query = "SELECT * FROM satuan ORDER BY id ASC";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result))
            {
              echo '
              <tr data-toggle="modal" data-target="#edit" data-id="'.$row["id"].'" data-nama="'.$row["nama"].'" style="cursor:pointer;">
              <td class="text-center">'.$row["id"].'</td>
              <td class="text-center">'.$row["nama"].'</td>
              </tr>';
            }
            ?>
          </table>
        </div>
      </div>

      <div class="modal fade bs-example-modal-sm" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <form action="update_satuan.php" method="post">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="text-align: center;">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="exampleModalLabel">Ubah Satuan</h3>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="number" id="id" name="id" hidden>
                    <input type="text" id="nama_old" name="nama_old" hidden>
                    <h3>Nama Satuan :</h3>
                    <input type="text" name="nama" class="form-control" id="nama_satuan" style="text-align: center;" autocomplete="off" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <center>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  <input type="submit" class="btn btn-success" name="submit" value="Simpan" />&nbsp;
                </center>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal fade bs-example-modal-sm" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content" style="text-align: center;">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel">Tambah Satuan</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <h3>Nama Satuan :</h3>
                  <input type="text" name="nama" class="form-control" id="nama_satuan2" style="text-align: center;" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" id="addbutton" value="Tambah" onclick="tambah()" />&nbsp;
              </center>
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
    <script type="text/javascript" src="js/datatables.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <script>
      $(document).ready(function()
      {
          $('#stok').DataTable();

          <?php 
          if(isset($_SESSION['add_satuan']))
          {
          ?>
            bootbox.alert({
                message: "<h3>Satuan <b><i><?php echo strtolower($_SESSION['add_satuan']) ?></i></b> sudah ada !</h3>",
                size: "small",
                backdrop: true,
                callback: function (result) {
                  <?php unset($_SESSION['add_satuan']) ?>
                }
            });
          <?php
          }
          ?>
      });

      $('#nama_satuan').bind('keypress', function(e) {
        if (e.which < 13 || 
           (e.which > 13 && e.which < 32) ||
           (e.which > 32 && e.which < 48) || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      });

      $('#nama_satuan2').bind('keypress', function(e) {
        if (e.which < 13 || 
           (e.which > 13 && e.which < 32) ||
           (e.which > 32 && e.which < 48) || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      });

      $('#add').on('shown.bs.modal', function () {
          $('#nama_satuan2').focus();
      })
      $('#add').on('hidden.bs.modal', function () {
          $('#input').focus();
          document.getElementById("nama_satuan2").value = "";
      })

      $('#edit').on('hidden.bs.modal', function () {
          $('#input').focus();
      })
      $('#edit').on('shown.bs.modal', function () {
          $('#nama_satuan').focus();
      })

      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var namaSatuan = button.data('nama') // Extract info from data-* attributes
        var modal = $(this)
        document.getElementById("id").value = id;
        document.getElementById("nama_old").value = namaSatuan;
        document.getElementById("nama_satuan").value = namaSatuan;
      })

      function tambah()
      {
        $satuan = document.getElementById("nama_satuan2").value;
        if($satuan != '')
        {
          $('#add').modal('hide');
          bootbox.confirm({
              message: "<h3>Tambah Satuan <i>"+$satuan+"</i>?</h3>",
              buttons: {
                  confirm: {
                      label: 'Ya',
                      className: 'btn-success'
                  },
                  cancel: {
                      label: 'Tidak',
                      className: 'btn-danger'
                  }
              },
              size: "small",
              backdrop: true,
              callback: function (result) {
                  if(result === true)
                  {
                    window.location.href = "add_satuan.php?satuan="+$satuan;
                  }
                  else
                  {
                    $('#add').modal('show');
                    $('#bootbox-modal').on('hidden.bs.modal', function () {
                        $('#nama_satuan2').focus();
                    })
                  }
              }
          });
        }
        else
        {
          $('#add').modal('hide');
          bootbox.alert({
              message: "<h3>Nama Satuan harus diisi !</h3>",
              size: "small",
              backdrop: true,
              callback: function (result) {
                  $('#add').modal('show');
                  $('#bootbox-modal').on('hidden.bs.modal', function () {
                      $('#nama_satuan2').focus();
                  })
              }
          });
        }
      }
    </script>
  </body>
</html>