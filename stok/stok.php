<?php
include '../connectdb.php';
include 'barcode128.php';
session_start();
if(!isset ($_SESSION['user'])){
  header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);
unset($_SESSION['barang']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Master Barang</title>
    <?php include "../import.php" ?>
    <style type="text/css">
      .modal-footer {
        text-align: center !important;
      }
    </style>
  </head>

  <body>
    <?php include "../header.php" ?>

    <div class="container" role="main" style="margin-top: 60px;">
      <input type="text" id="petugas" hidden value="<?php echo $_SESSION['user']; ?>">
      <div class="row">
        <div class="col-md-6">
          <center>
            <div class="form-group">
              <a href="kategori.php"><button class="btn btn-warning" style="font-size: 26px;padding: 0px,0px,5px,5px;"><i class="fas fa-plus"></i></button></a>
            </div>
            <div class="form-group">
              <h4>Tambah Kategori</h4>
            </div>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <div class="form-group">
              <button class="btn btn-info" data-toggle="modal" data-target="#add" style="font-size: 26px;padding: 0px,0px,5px,5px;"><i class="fas fa-plus"></i></button>
            </div>
            <div class="form-group">
              <h4>Tambah Barang</h4>
            </div>
          </center>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="stok">
            <thead>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kategori</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Kode Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Nama Barang</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Stok</td>
               <td class="text-center" style="background-color:#428BCA;color:#FFF">Harga</td>
            </thead>
            <?php
            $query = "SELECT * FROM stok ORDER BY nama_barang ASC";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result))
            {
              echo '
              <tr id="'.$row["id"].'" data-toggle="modal" data-target="#edit"
              data-id="'.$row["id"].'"
              data-namakategori="'.$row["id_kategori"].'" 
              data-kodebarang="'.$row["kode_barang"].'" 
              data-namabarang="'.$row["nama_barang"].'" 
              data-jumlahbarang="'.$row["jumlah_barang"].'"
              data-harga="'.$row["harga"].'"
              style="cursor:pointer;">
              <td class="text-center">'.$row["id_kategori"].'</td>
              <td class="text-center">'.$row["kode_barang"].'</td>
              <td class="text-left" id="'.$row["kode_barang"].'_edit">'.$row["nama_barang"].'</td>
              <td class="text-center">'.$row["jumlah_barang"].'</td>
              <td class="text-right"><span class="col-xs-1 text-right">Rp.</span><span id="'.$row["kode_barang"].'">'.number_format($row["harga"],0).'</span></td>
              </tr>';
              $kodebarang = $row["kode_barang"];
              //echo '<script>alert("'.$kodebarang.'");</script>';
              $query2 = "SELECT * FROM stok_masuk where kode_barang = '$kodebarang' order by tanggal DESC";
              $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
              echo '<div class="row" id="histori'.$kodebarang.'"" style="display:none;">';
              while($row2 = mysqli_fetch_array($result2))
              { 
                echo '<div class="col-sm-4">'.date("d-m-Y", strtotime($row2['tanggal'])).'</div><div class="col-sm-4">';
                if($row2['keterangan']=='Stok tambahan')
                {
                  echo '+ ';
                }
                else if($row2['keterangan']=='Penjualan')
                {
                  echo '- ';
                }
                echo $row2['jumlah'].'</div><div class="col-sm-4">'.$row2['keterangan'].'</div><br>';
              }
              echo '</div>';
            }
            ?>
          </table>
        </div>
      </div>

      <div class="modal fade bs-example-modal-md" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content" style="text-align: center;">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Data barang
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="pilihan_kategori_edit">
                            <?php
                              $query = "SELECT * FROM kategori ORDER BY nama";
                              $result = mysqli_query($con, $query);
                              while($row = mysqli_fetch_array($result))
                              {
                                echo '
                                <option>'.$row["nama"].'</option>
                                ';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="kodebarang" class="col-sm-3 control-label">Kode Barang</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="kodebarang_edit" placeholder="Kode barang" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="namabarang" class="col-sm-3 control-label">Nama Barang</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namabarang_edit" placeholder="Nama barang" required autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Jumah" class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-5">
                          <input type="number" class="form-control" id="jumlah_edit" placeholder="Jumlah" required autocomplete="off" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="harga" class="col-sm-3 control-label">Harga Jual</label>
                        <label for="harga" class="col-sm-1 control-label">Rp.</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" id="harga_edit" placeholder="" required autocomplete="off">
                        </div>
                      </div>
                    </form>
                    <div class="modal-footer">
                      <center>
                        <button onclick="hapus()" type="button" class="btn btn-danger">Hapus barang</button>
                        <button onclick="update()" type="button" class="btn btn-warning">Ubah data</button>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Tambah stok
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <h3 id="jumlah_tambah_satuan"></h3>
                    <center><input type="number" name="jumlah" class="form-control" id="jumlah_tambah" autocomplete="off" style="font-size: 36px; height: auto; width:50%; text-align: center;"></center>
                    <button onclick="tambahStok()" type="button" class="btn btn-success">Tambah</button>
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Histori barang
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body" id="tabel_histori" style="max-height: 400px; overflow-y: auto;">
                  </div>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Barcode
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body" style="max-height: 400px; overflow-y: auto;">
                    <input type="hidden" id="barcode">
                    <label id="nama_barcode"></label><br>
                    <img src="barcode.png" style="width: 50%;"><br>
                    <label id="kode_barcode">Kode</label><br>
                    <label id="harga_barcode">Harga</label><br>
                    <br><br>
                    <button class="btn btn-primary" onclick="barcode()">Cetak Barcode</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade bs-example-modal-md" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content" style="text-align: center;">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="pilihan_kategori" required>
                      <option> </option>
                      <?php
                        $query = "SELECT * FROM kategori ORDER BY nama";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                          echo '
                          <option>'.$row["nama"].'</option>
                          ';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kodebarang" class="col-sm-3 control-label">Kode Barang</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kodebarang" placeholder="Kode barang" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="namabarang" class="col-sm-3 control-label">Nama Barang</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="namabarang" placeholder="Nama barang" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Jumah" class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="harga" class="col-sm-3 control-label">Harga Jual</label>
                  <label for="harga" class="col-sm-1 control-label">Rp.</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="harga" placeholder="" required autocomplete="off">
                  </div>
                </div>
              </form>
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
          if(isset($_SESSION['same_product']))
          {
          ?>
            bootbox.alert({
                message: "<h3>Kode barang <b><i><?php echo strtolower($_SESSION['same_product']) ?></i></b> sudah ada !</h3>",
                backdrop: true,
                callback: function (result) {
                  <?php unset($_SESSION['same_product']) ?>
                }
            });
          <?php
          }
          ?>
      });

      $('#kodebarang').bind('keypress', function(e) {
        if (e.which < 48 || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      });

      $('#namabarang').bind('keypress', function(e) {
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

      $('#namabarang_edit').bind('keypress', function(e) {
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

      $('#add').on('hidden.bs.modal', function () {
          $('#input').focus();
          document.getElementById("pilihan_kategori").selectedIndex = 0;
          document.getElementById("kodebarang").value = "";
          document.getElementById("namabarang").value = "";
          document.getElementById("jumlah").value = "";
          document.getElementById("harga").value = "";
      })

      $('#edit').on('hidden.bs.modal', function () {
          $('#input').focus();
          document.getElementById("jumlah_tambah").value = "";
      })

      $('#edit').on('show.bs.modal', function (event) {
        $('#jumlah_tambah').focus();
        var button = $(event.relatedTarget); // Button that triggered the modal
        var namaKategori = button.data('namakategori'); // Extract info from data-* attributes
        var kodeBarang = button.data('kodebarang'); // Extract info from data-* attributes
        var id=button.data('kodebarang')+"_edit";
        var namaBarang = document.getElementById(id).textContent;
        var jumlahBarang = button.data('jumlahbarang'); // Extract info from data-* attributes
        var id=button.data('kodebarang');
        var harga = document.getElementById(id).textContent; // Extract info from data-* attributes
        harga = +harga.replace(/[^\d\.-]/g,'');
        document.getElementById("pilihan_kategori_edit").value = namaKategori;
        document.getElementById("kodebarang_edit").value = kodeBarang;
        document.getElementById("namabarang_edit").value = namaBarang;
        document.getElementById("jumlah_edit").value = jumlahBarang;
        document.getElementById("harga_edit").value = harga;
        document.getElementById("barcode").value = kodeBarang;
        document.getElementById("nama_barcode").textContent = namaBarang;
        document.getElementById("kode_barcode").textContent = kodeBarang;
        var harga_barcode = harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("harga_barcode").textContent = "Rp. "+harga_barcode;
        $("#tabel_histori").empty();
        var itm = document.getElementById("histori"+id);
        var cln = itm.cloneNode(true);
        cln.style.display = "block";
        //$("#tabel_histori").append('<button onclick="hapus_histori()" type="button" class="btn btn-info">Bersihkan Histori</button><br><br>');
        $("#tabel_histori").append('<div class="row"><div class="col-sm-4"><b>Tanggal</b></div><div class="col-sm-4"><b>Jumlah</b></div><div class="col-sm-4"><b>Keterangan</b></div></div>');
        $("#tabel_histori").append(cln);
        //document.getElementById("#histori"+id).style.display = "block";
      })

      $('#harga').keydown(function(e) {
        if (e.keyCode === 190) {
          e.preventDefault();
        }
      });
      $('#jumlah').keydown(function(e) {
        if (e.keyCode === 189) {
          e.preventDefault();
        }
      });

      function tambah()
      {
        var kategori = document.getElementById("pilihan_kategori").value;
        var kodebarang = document.getElementById("kodebarang").value;
        var namabarang = document.getElementById("namabarang").value;
        var jumlah = parseFloat(document.getElementById("jumlah").value);
        var harga = document.getElementById("harga").value;  
        var petugas = document.getElementById("petugas").value;

        if((kategori != "" ) && (kodebarang != "") && (namabarang != "") && (jumlah != "") && (harga != ""))
        {
          $('#add').modal('hide');
          bootbox.confirm({
              message: "<h3>Tambahkan barang <i>"+namabarang+"</i> ?</h3>",
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
                    window.location.href = "insert.php?kategori="+kategori+"&kodebarang="+kodebarang+"&namabarang="+namabarang+"&jumlah="+jumlah+"&harga="+harga+"&petugas="+petugas;
                  }
                  else
                  {
                    $('#add').modal('show');
                  }
              }
          });
        }
        else
        {
          bootbox.alert("<h3>Data belum lengkap !</h3>");
        }
      }

      function hapus() 
      {
        var kodebarang1 = document.getElementById("kodebarang_edit").value;
        var namabarang1 = document.getElementById("namabarang_edit").value;
        $('#edit').modal('hide');
        bootbox.confirm({
            message: "<center><h3>Konfirmasi untuk menghapus barang :<br><br><i>"+namabarang1+"</i></h3></center>",
            buttons: {
                confirm: {
                    label: 'Hapus',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Batal',
                    className: 'btn-success'
                }
            },
            size: "small",
            backdrop: true,
            callback: function (result) {
                if(result === true)
                {
                  window.location.href = "delete_stok.php?kodebarang="+kodebarang1;
                }
            }
        });
      }

      function update()
      {
        var kategori2 = document.getElementById("pilihan_kategori_edit").value;
        var kodebarang2 = document.getElementById("kodebarang_edit").value;
        var namabarang2 = document.getElementById("namabarang_edit").value;
        var jumlah2 = parseFloat(document.getElementById("jumlah_edit").value);
        var harga2 = document.getElementById("harga_edit").value;  

        if((namabarang2 != '') && (harga2 != ''))
        {
          $('#edit').modal('hide');
          bootbox.confirm({
              message: "<center><h3>Simpan perubahan?</h3></center>",
              buttons: {
                  confirm: {
                      label: 'Simpan',
                      className: 'btn-success'
                  },
                  cancel: {
                      label: 'Batal',
                      className: 'btn-danger'
                  }
              },
              size: "small",
              backdrop: true,
              callback: function (result) {
                  if(result === true)
                  {
                    window.location.href = "update.php?kategori="+kategori2+"&kodebarang="+kodebarang2+"&namabarang="+namabarang2+"&jumlah="+jumlah2+"&harga="+harga2;
                  }
              }
          });
        }
        else
        {
          bootbox.alert("<h3>Data belum lengkap !</h3>");
        }
      }

      function tambahStok()
      {
        var kategori3 = document.getElementById("pilihan_kategori_edit").value;
        var kodebarang3 = document.getElementById("kodebarang_edit").value;
        var namabarang3 = document.getElementById("namabarang_edit").value;
        var jumlah_awal = document.getElementById("jumlah_edit").value;
        var jumlah_tambah = document.getElementById("jumlah_tambah").value;
        var harga3 = document.getElementById("harga_edit").value;  
        var jumlah_akhir = parseFloat(jumlah_awal)+parseFloat(jumlah_tambah);
        var petugas = document.getElementById("petugas").value;

        if(jumlah_tambah != "" && jumlah_tambah > 0)
        {
          $('#edit').modal('hide');
          bootbox.confirm({
              message: "<h3>Tambahkan "+jumlah_tambah+"?</h3>",
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
                    window.location.href = "update.php?kategori="+kategori3+"&kodebarang="+kodebarang3+"&namabarang="+namabarang3+"&jumlahtambah="+jumlah_tambah+"&jumlah="+jumlah_akhir+"&harga="+harga3+"&petugas="+petugas;
                  }
              }
          });
        }
        else if(jumlah_tambah == '')
        {
          bootbox.alert("<h3>Jumlah barang harus diisi !</h3>");
        }
        else if(jumlah_tambah == 0)
        {
          bootbox.alert("<h3>Jumlah barang tidak boleh 0 !</h3>");
        }
        else if(jumlah_tambah < 0)
        {
          bootbox.alert("<h3>Jumlah barang tidak valid !</h3>");
        }
      }

      function hapus_histori() 
      {
        var kodebarang4 = document.getElementById("kodebarang_edit").value;
        var namabarang4 = document.getElementById("namabarang_edit").value;
        $('#edit').modal('hide');
        bootbox.confirm({
            message: "<center><h3>Hapus histori barang <i>"+namabarang4+"</i> ?</h3></center>",
            buttons: {
                confirm: {
                    label: 'Hapus',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Batal',
                    className: 'btn-success'
                }
            },
            size: "small",
            backdrop: true,
            callback: function (result) {
                if(result === true)
                {
                  window.location.href = "delete_histori.php?kodebarang="+kodebarang4;
                }
            }
        });
      }

      function barcode()
      {
        var myWindow;
        var id = document.getElementById("barcode").value;
        var nama = document.getElementById("namabarang_edit").value;
        var harga = document.getElementById("harga_edit").value;
        //alert(harga);
        myWindow = window.open("barcode.php?product_id="+id+"&product="+nama+"&rate="+harga, "_blank");
      }
/*
      $('#reset').click(function(){
        if(confirm("Reset stok jadi 0 ?"))
        {
          //var result = prompt("Enter a value");
          var id = document.getElementById("kodebarang").value;
          var nama = document.getElementById("namabarang").value;
          var jumlah = document.getElementById("jumlahbarang").value;
          var keterangan = "reset stok";

          window.location.href = "reset.php?kodebarang="+id+"&namabarang="+nama+"&jumlahbarang="+jumlah+"&keterangan="+keterangan;
        }
        else
        {
          //alert("B");
        }
      });*/
    </script>
  </body>
</html>