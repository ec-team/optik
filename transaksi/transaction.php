<?php
include '../connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Transaksi</title>
    <?php include '../import.php'; ?>
  </head>
  <body>
    <?php include '../header.php'; ?>
    <div class="container" role="main" style="margin-top: 60px;">
      <div class="row">
        <table class='table table-bordered table-hover' id='transData'>
          <thead>
            <tr>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Tindakan</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Kode Barang</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Nama Barang</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Jumlah</td>
              <td class='text-center' style="background-color:#428BCA;color:#FFF">Harga Satuan</td>
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
              echo "<td class='text-center'><a href='delete_item.php?no=".$row['no']."'><button class='btn btn-danger'>Hapus &nbsp;<i class='far fa-trash-alt'></i></button></a></td>";
              echo "<td class='text-center' id=".$row['kode_barang'].">".$row['kode_barang']."</td>";
              echo "<td>".$row['nama_barang']."</td>";
              echo "<td class='text-center'>".$row['jumlah']."</td>";
              echo "<td class='text-right'><span class='col-xs-1 text-right'>Rp.</span><span>".number_format($row["harga"],0)."</span></td>";
              echo "<td class='text-right'><span class='col-xs-1 text-right'>Rp.</span><span>".number_format($row["sub_total"],0)."</span></td>";
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
          <span>
            <?php
              echo number_format($total);
              echo '<input hidden id="total" value="'.$total.'">';
            ?>
          </span>
        </div>
      </div>
      <div class="row"><br></div>
      <div class="row">
        <div class="col-md-10"></div>
        <?php
            $result = mysqli_query($con, "SELECT count(*) FROM dummy");
            $count = mysqli_fetch_array($result);
            $count = $count['count(*)'];
        ?>
        <div class="col-md-1">
          <?php
            if ($count == 0) {
              echo '<button class="btn btn-warning disabled">Batal</button>';
            }
            else
            {
              echo '<button onclick="batal()" class="btn btn-warning">Batal</button>';
            }
          ?>
        </div>
        <div class="col-md-1 text-right">
          <?php
            if ($count == 0) {
              echo '<button class="btn btn-primary" disabled>Selesai</button>';
            }
            else
            {
              echo '<button onclick="bayar()" class="btn btn-primary">Selesai</button>';
            }
          ?>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="tblMain" style="width: 100%;">
            <thead>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kategori</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kode Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Nama Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Stok</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Harga</td>
            </thead>
            <tbody>
            <?php
              $query = "SELECT * FROM stok ORDER BY nama_barang ASC";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result))
              {
              echo '
              <tr id="row_data" data-toggle="modal" data-target="#exampleModal" 
              data-id="'.$row["id"].'"
              data-namakategori="'.$row["id_kategori"].'" 
              data-kodebarang="'.$row["kode_barang"].'" 
              data-namabarang="'.$row["nama_barang"].'" 
              data-jumlahbarang="'.$row["jumlah_barang"].'"
              data-harga="'.$row["harga"].'" 
              style="cursor:pointer;">
              <td class="text-center" id="'.$row["id"].'">'.$row["id_kategori"].'</td>
              <td class="text-center" id="'.$row["id"].'">'.$row["kode_barang"].'</td>
              <td class="text-left" id="'.$row["kode_barang"].'">'.$row["nama_barang"].'</td>
              <td class="text-center" id="'.$row["id"].'">'.$row["jumlah_barang"].'</td>
              <td class="text-right" id="'.$row["id"].'"><span class="col-xs-1 text-right">Rp.</span><span>'.number_format($row["harga"],0).'</span></td>
              </tr>';
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <br>

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
    <?php include "../footer.php"?>
    <script>

      $(document).ready(function()
      {
          $('#tblMain').DataTable();
          var search = document.getElementById("input");

          // Execute a function when the user releases a key on the keyboard
          search.addEventListener("keyup", function(event) {
            // Cancel the default action, if needed
            event.preventDefault();
            
            var rowCount = $('#tblMain tr').length - 1;

            // Number 13 is the "Enter" key on the keyboard
            if ((event.keyCode === 13) && (rowCount === 1)) {
              // Trigger the button element with a click
              //alert(document.getElementById("input").value); 
              document.getElementById("row_data").click();
            }
          });
      });

      $('#exampleModal').on('shown.bs.modal', function () {
          $('#jumlah').focus();
          document.getElementById("input").value = "";
      })
      $('#exampleModal').on('hidden.bs.modal', function () {
          $('#input').focus();
          document.getElementById("jumlah").value = "";
      })

      function bayar()
      {
        bootbox.confirm({
            message: "<h3>Selesaikan transaksi?</h3>",
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
                  var total = document.getElementById("total").value;
                  var petugas = document.getElementById("petugas").value;
                  window.location.href = "process.php?total="+total+"&petugas="+petugas;
                }
                else
                {
                  $('#bootbox-modal').on('hidden.bs.modal', function () {
                      $('#input').focus();
                  })
                }
            }
        });
      }

      function batal()
      {
        bootbox.confirm({
            message: "<h3>Batalkan transaksi?</h3>",
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
                  window.location.href = "clear_dummy.php";
                }
                else
                {
                  $('#bootbox-modal').on('hidden.bs.modal', function () {
                      $('#input').focus();
                  })
                }
            }
        });
      }

      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var namaKategori = button.data('namakategori') // Extract info from data-* attributes
        var kodeBarang = button.data('kodebarang') // Extract info from data-* attributes
        var id=button.data('kodebarang')
        var namaBarang = document.getElementById(id).textContent;
        var jumlahBarang = button.data('jumlahbarang') // Extract info from data-* attributes
        var harga = button.data('harga') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title').text('Input jumlah barang')
        document.getElementById("namaKategori").textContent = 'Kategori : ' + namaKategori;
        document.getElementById("kodeBarang").textContent = kodeBarang;
        document.getElementById("namaBarang").textContent = namaBarang;
        document.getElementById("stok").textContent = jumlahBarang;
        document.getElementById("harga").textContent = harga;
      })

      // Get the input field
      var input = document.getElementById("jumlah");

      // Execute a function when the user releases a key on the keyboard
      input.addEventListener("keyup", function(event) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
          // Trigger the button element with a click
          document.getElementById("addbutton").click();
        }
      });

      $("#addbutton").on("click", function(){
        if( $('#jumlah').val() && $('#jumlah').val() > 0)
        {
            var kode_barang = document.getElementById("kodeBarang").textContent;
            var nama_barang = document.getElementById("namaBarang").textContent;
            var stok = parseInt(document.getElementById("stok").textContent);
            var jumlah = parseFloat(document.getElementById("jumlah").value);
            var harga = document.getElementById("harga").textContent;
            //alert(harga);
            if($("#transData").find('td#'+kode_barang).length)
            {
              $('#exampleModal').modal('hide');
              bootbox.alert("<h3>Barang sudah diinput !</h3>");
            }
            else
            {
              if(jumlah <= stok)
              {
                //alert(jumlah);
                window.location.href = "insert_dummy.php?kode_barang="+kode_barang+"&nama_barang="+nama_barang+"&jumlah="+jumlah+"&harga="+harga;
              }
              else
              {
                $('#exampleModal').modal('hide');
                bootbox.alert("<h3>Stok tidak tersedia !!</h3>");
              }
            }
        }
        else if($('#jumlah').val() == '')
        {
          $('#exampleModal').modal('hide');
          bootbox.alert("<h3>Jumlah barang harus diisi !</h3>");
        }
        else if($('#jumlah').val() == 0)
        {
          $('#exampleModal').modal('hide');
          bootbox.alert("<h3>Jumlah barang tidak boleh 0 !</h3>");
        }
        else if($('#jumlah').val() < 0)
        {
          $('#exampleModal').modal('hide');
          bootbox.alert("<h3>Jumlah barang tidak valid !</h3>");
        }
      });

    </script>
  </body>
</html>