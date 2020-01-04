<?php
include '../connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kasir</title>
    <link rel="stylesheet" type="text/css" href="/kasir/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/kasir/css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" href="/kasir/fa/css/all.css"> <!--load all styles -->
  </head>

  <body>
    <?php include '../header.php'; ?>
    <div class="container" style="margin-top: 60px;">
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-1"></div>
        <a href="transaksi_list.php">
          <div class="col-md-9 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 20px 0px 10px;height: 75px;width: 79.5%">
            <h3>DAFTAR TRANSAKSI</h3>
            <!-- <i class="fas fa-cash-register" style="font-size: 100px;"></i> -->
          </div>
        </a>
      </div>
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-1"></div>
        <a href="transaction.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 20px 0px 10px;height: 200px;">
            <h3>LANGSUNG</h3>
            <i class="fas fa-cash-register" style="font-size: 100px;"></i>
          </div>
        </a>
        <a href="transaksi_pemesanan.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 10px 0px 10px;padding: 10px;height: 200px;">
            <h3>PEMESANAN</h3>
            <i class="fas fa-book" style="font-size: 100px;"></i>
          </div>
        </a>
        <a href="transaksi_reparasi.php">
          <div class="col-md-3 bg-primary" style="border: 3px solid black;border-radius: 10px;align-content: center;text-align: center;margin: 0px 20px 0px 10px;padding: 10px;height: 200px;">
            <h3>REPARASI</h3>
            <i class="fas fa-tools" style="font-size: 100px;"></i>
          </div>
        </a>
      </div>
      <div class="modal fade bs-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content" style="text-align: center;">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel"></h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <h3 id="namaKategori"></h3>
                  <b><h4 style="color: blue;" id="namaBarang"></h4></b>
                  <label id="kodeBarang" hidden></label>
                  <br>
                  <h3>Sisa stok :</h3>
                  <b><h4 id="stok" style="color: red;"></h4></b>
                  <label id="harga" hidden></label>
                  <br>
                  <h3>Jumlah :</h3>
                  <center><input type="number" name="jumlah" class="form-control" id="jumlah" autocomplete="off" style="font-size: 36px; height: auto; width:60%; text-align: center;"></center>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <input type="button" class="btn btn-success" id="addbutton" name="submit" value="Tambah" />&nbsp;
              </center>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <script src="/kasir/js/jquery.min.js"></script>    
    <script src="/kasir/js/jquery-3.1.1.min.js"></script>
    <script src="/kasir/js/bootstrap.min.js"></script>

  </body>
  <script type="text/javascript">
    function a(){
      document.getElementById("transaksi").href="kasir/transaksi/transaction.php";
      alert(document.getElementById("transaksi").href);
    }
  </script>
</html>