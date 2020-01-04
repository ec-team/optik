<?php
include '../connectdb.php';
session_start();
if(!isset ($_SESSION['user'])){
	header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tambah Kategori</title>
    <?php include "../import.php"?>
  </head>

  <body>

    <?php include "../header.php"?>

    <div class="container" role="main" style="margin-top: 60px; width: 50%;">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
          <center>
            <div class="form-group">
              <a href="/kasir/stok/stok.php"><button class="btn btn-warning" data-toggle="modal" data-target="#add" style="font-size: 26px;padding: 0px,0px,5px,5px;"><i class="fas fa-arrow-left"></i></button></a>
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
              <h4>Tambah Kategori</h4>
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
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Nama Kategori</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Keterangan</td>
            </thead>
            <?php
            $query = "SELECT * FROM kategori ORDER BY id ASC";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result))
            {
              echo '
              <tr data-toggle="modal" data-target="#edit" data-id="'.$row["id"].'" data-nama="'.$row["nama"].'" data-keterangan="'.$row["keterangan"].'" style="cursor:pointer;">
              <td class="text-center">'.$row["nama"].'</td>
              <td class="text-left"><p>'.$row["keterangan"].'</p></td>
              </tr>';
            }
            ?>
          </table>
        </div>
      </div>

      <div class="modal fade bs-example-modal-sm" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <form action="update_kategori.php" method="post">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="text-align: center;">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="exampleModalLabel">Ubah Kategori</h3>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="number" id="id" name="id" hidden>
                    <input type="text" id="nama_old" name="nama_old" hidden>
                    <h3>Nama Kategori :</h3>
                    <input type="text" name="nama" class="form-control" id="nama_kategori" style="text-align: center;" autocomplete="off" required>
                    <br>
                    <h3>Keterangan :</h3>
                    <center><textarea class="form-control" name="keterangan" rows="3" id="keterangan" style="max-width: 100%; min-width: 100%;"></textarea>
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
              <h3 class="modal-title" id="exampleModalLabel">Tambah Kategori</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <h3>Nama Kategori :</h3>
                  <input type="text" name="nama" class="form-control" id="nama_kategori2" style="text-align: center;" required autocomplete="off">
                  <br>
                  <h3>Keterangan :</h3>
                  <center><textarea class="form-control" name="keterangan2" rows="3" id="keterangan2" style="max-width: 100%; min-width: 100%;"></textarea>
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
    <?php include "../footer.php"?>
    <script>
      $(document).ready(function()
      {
          $('#stok').DataTable();

          <?php 
          if(isset($_SESSION['add_kategori']))
          {
          ?>
            bootbox.alert({
                message: "<h3>Kategori <b><i><?php echo strtolower($_SESSION['add_kategori']) ?></i></b> sudah ada !</h3>",
                size: "small",
                backdrop: true,
                callback: function (result) {
                  <?php unset($_SESSION['add_kategori']) ?>
                }
            });
          <?php
          }
          ?>
      });

      $('#nama_kategori').bind('keypress', function(e) {
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

      $('#nama_kategori2').bind('keypress', function(e) {
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
          $('#nama_kategori2').focus();
      })
      $('#add').on('hidden.bs.modal', function () {
          $('#input').focus();
          document.getElementById("nama_kategori2").value = "";
          document.getElementById("keterangan2").value = "";
      })

      $('#edit').on('hidden.bs.modal', function () {
          $('#input').focus();
      })
      $('#edit').on('shown.bs.modal', function () {
          $('#nama_kategori').focus();
      })

      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var namaKategori = button.data('nama') // Extract info from data-* attributes
        var keterangan = button.data('keterangan') // Extract info from data-* attributes
        var modal = $(this)
        document.getElementById("id").value = id;
        document.getElementById("nama_old").value = namaKategori;
        document.getElementById("nama_kategori").value = namaKategori;
        document.getElementById("keterangan").value = keterangan;
      })

      function tambah()
      {
        $kategori = document.getElementById("nama_kategori2").value;
        $keterangan = document.getElementById("keterangan2").value;
        if($kategori != '')
        {
          $('#add').modal('hide');
          bootbox.confirm({
              message: "<h3>Tambah Kategori <i>"+$kategori+"</i>?</h3>",
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
                    window.location.href = "add_kategori.php?kategori="+$kategori+"&keterangan="+$keterangan;
                  }
                  else
                  {
                    $('#add').modal('show');
                    $('#bootbox-modal').on('hidden.bs.modal', function () {
                        $('#nama_kategori2').focus();
                    })
                  }
              }
          });
        }
        else
        {
          $('#add').modal('hide');
          bootbox.alert({
              message: "<h3>Nama Kategori harus diisi !</h3>",
              size: "small",
              backdrop: true,
              callback: function (result) {
                  $('#add').modal('show');
                  $('#bootbox-modal').on('hidden.bs.modal', function () {
                      $('#nama_kategori2').focus();
                  })
              }
          });
        }
      }
    </script>
  </body>
</html>