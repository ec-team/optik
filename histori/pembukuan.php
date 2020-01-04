<?php
include '../connectdb.php';
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
    <title>Histori Penjualan</title>
    <?php include "../import.php" ?>

    <script>
      function print(id)
      {
        var myWindow;
        var id1 = id;
        myWindow = window.open("nota.php?id="+id1, "_blank", "width=300,height=650,location=no,status=no,top=0,left=500");
      }
    </script>
  </head>

  <body>
    <?php include "../header.php" ?>
    <div class="container" style="margin-top: 60px; width: 65%;">
      <div class="row">
        <div class="col-md-2">
          <center>
            <div class="form-group">
              <a href="/kasir/home.php"><button class="btn btn-warning" data-toggle="modal" data-target="#add" style="font-size: 16px;padding: 0px,0px,5px,5px;"><i class="fas fa-arrow-left"></i></button></a>
            </div>
            <div class="form-group">
              <h5>Kembali</h5>
            </div>
          </center>
        </div>
        <div class="col-md-5">
          <center>
            <form class="form-inline" action="pembukuan.php?tanggal=">
              <form class="form-inline">
                <div class="form-group">
                  <label>Cari Tanggal : </label>
                  <?php
                  if(isset($_GET['tanggal']))
                  {
                    echo '<input type="date" class="form-control" name="tanggal" value="'.$_GET['tanggal'].'">';
                  }
                  else
                  {
                    echo '<input type="date" class="form-control" name="tanggal">';
                  }
                  ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </form>
            </form>
          </center>
        </div>
        <div class="col-md-5">
          <center>
        	  <form class="form-inline" action="pembukuan.php?barang=">
              <form class="form-inline">
                <div class="form-group">
                  <label>Cari Barang : </label>
                  <input type="text" class="form-control" name="barang">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </form>
            </form>
          </center>
        </div>
      </div>
      <br>
      <?php
      if(isset($_GET['tanggal']))
      {
      ?>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        $pemasukan = 0;
        $result = mysqli_query($con, "SELECT * FROM nota WHERE date_format(tanggal,'%Y-%m-%d')='$_GET[tanggal]' ORDER BY id_nota DESC");
        while ($row = mysqli_fetch_array($result))
        {
          echo '
            <div class="panel panel-info">
              <div class="panel-heading" role="tab" id="heading'.$row['id_nota'].'">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id_nota'].'" aria-expanded="false" aria-controls="collapse'.$row['id_nota'].'">
                    <center>Nota No. '.$row['id_nota'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal : '.date("d-m-Y", strtotime($row['tanggal'])).'</center>
                  </a>
                </h4>
              </div>
              <div id="collapse'.$row['id_nota'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$row['id_nota'].'">
                <div class="panel-body">';
                ?>
                <table class='table'>
                  <td class="text-left" style="border-top: 0px;">
                    <h5>Petugas : <?php echo $row['petugas']; ?> </h5>
                    <h5><?php echo "Waktu : "; echo date("H:i:s", strtotime($row['tanggal'])); ?></h5>
                  </td>
                </table>
                <table class='table table-bordered table-hover' id='transData'>
                  <thead>
                    <tr>
                      <td class='text-center' style="background-color:#428BCA;color:#FFF">No.</td>
                      <td class='text-center' style="background-color:#428BCA;color:#FFF">Nama barang</td>
                      <td class='text-center' style="background-color:#428BCA;color:#FFF">Jumlah</td>
                      <td class='text-center' style="background-color:#428BCA;color:#FFF">Harga</td>
                      <td class='text-center' style="background-color:#428BCA;color:#FFF">Subtotal</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $total = 0;
                  $result2 = mysqli_query($con, "SELECT * FROM detail_nota WHERE id_nota='$row[id_nota]' ORDER BY id_nota,no_urut ASC");
                  while($row2 = mysqli_fetch_array($result2))
                  {
                    echo "<tr>";
                    echo "<td class='text-center'>".$row2['no_urut']."</td>";
                    echo "<td>".$row2['nama_barang']."</td>";
                    echo "<td class='text-center'>".$row2['jumlah']." ".$row2['satuan']."</td>";
                    echo "<td class='text-right'>Rp. ".number_format($row2['harga'])."</td>";
                    echo "<td class='text-right'>Rp. ".number_format($row2['sub_total'])."</td>";
                    echo "</tr>";
                    $total = $total + $row2['sub_total'];
                  }
                  $pemasukan = $pemasukan + $total;
                  ?>
                  </tbody>
                </table>
                <table class='table' style="border-color: none;">
                  <td class="text-right" style="border-top: 0px;">
                    <label>Total&nbsp;&nbsp;&nbsp;:</label>
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <span>Rp.</span>
                    &nbsp;&nbsp;&nbsp;
                    <span id="total">
                      <?php
                        echo number_format($total);
                      ?>
                    </span>
                  </td>
                </table>
                <center><?php echo '<button class="btn btn-warning" onclick="print('.$row['id_nota'].')";>Print Nota &nbsp;<i class="fas fa-print"></i></button>'?></center>
                  <?php
                echo '
                </div>
              </div>
            </div>
          ';
        }
        if (mysqli_num_rows($result)==0)
        {
          echo '<center><h4>Tidak ada transaksi</h4></center>';
        }
        ?>
        
      </div>
        <?php if(!empty($result2))
        {
          echo '
          <center><h4>';
          $pemasukan = number_format($pemasukan); echo "Total pemasukan : Rp. ".$pemasukan;
          echo '</h4></center><br>';
        }

        //echo $_GET['tanggal'];
        $res_nota = mysqli_query($con, "SELECT id_nota FROM nota WHERE date_format(tanggal,'%Y-%m-%d')='$_GET[tanggal]' ORDER BY id_nota ASC");
        //echo mysqli_num_rows($res_nota);
        if (mysqli_num_rows($res_nota)!=0)
        {
          echo "<center><h4>Barang Terjual :</h4>
          <table class='table table-bordered table-hover' style='width: auto;'>
          <thead>
            <tr>
              <td class='text-center' style='background-color:#428BCA;color:#FFF'>Kode Barang</td>
              <td class='text-center' style='background-color:#428BCA;color:#FFF'>Nama Barang</td>
              <td class='text-center' style='background-color:#428BCA;color:#FFF'>Jumlah</td>
            </tr>
          </thead>
          <tbody>
          ";
          $res_stok = mysqli_query($con, "SELECT * FROM stok ORDER BY kode_barang ASC");
          while($row_stok = mysqli_fetch_array($res_stok))
          {
            $keluar = 0;
            $res_nota = mysqli_query($con, "SELECT id_nota FROM nota WHERE date_format(tanggal,'%Y-%m-%d')='$_GET[tanggal]' ORDER BY id_nota ASC");
            while($row_nota = mysqli_fetch_array($res_nota))
            {
              $res_detailnota = mysqli_query($con, "SELECT * FROM detail_nota WHERE kode_barang='$row_stok[kode_barang]'");
              while($row_detailnota = mysqli_fetch_array($res_detailnota))
              {
                //echo "<br>".$row_detailnota['id_nota']." | kode barang = ".$row_stok['kode_barang'];
                if($row_detailnota['id_nota'] == $row_nota['id_nota'])
                {
                  $keluar = $keluar+$row_detailnota['jumlah'];
                  $nama = $row_detailnota['nama_barang'];
                }
              }
              //echo "<br>".$row_stok['nama_barang']." | keluar = ".$keluar;
            }
            if($keluar != 0)
            {
              echo "<tr>";
              echo "<td class='text-center'>".$row_stok['kode_barang']."</td>";
              echo "<td>".$row_stok['nama_barang']."</td>";
              echo "<td class='text-center'>".$keluar."</td>";
              echo "</tr>";
            }
          }
          echo '</tbody></table>';
        } 
        else
        {
          echo '<center><h4>Tidak ada barang terjual</h4></center>'; 
        }

        $result = mysqli_query($con, "SELECT * FROM stok_masuk WHERE date_format(tanggal,'%Y-%m-%d')='$_GET[tanggal]' ORDER BY tanggal DESC");
        if (mysqli_num_rows($result)!=0)
        {
        ?>
        <center>
          <br>
          <h4>Histori Barang :</h4>
          <table class='table table-bordered table-hover' id='transData' style="width: auto;">
            <thead>
              <tr>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Waktu</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Petugas</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Kode Barang</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Nama Barang</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Jumlah</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Keterangan</td>
              </tr>
            </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td class='text-center'>".date("H:i:s", strtotime($row['tanggal']))."</td>";
              echo "<td class='text-center'>".$row['petugas']."</td>";
              echo "<td class='text-center'>".$row['kode_barang']."</td>";
              echo "<td>".$row['nama_barang']."</td>";
              echo "<td class='text-center'>".$row['jumlah']." ".$row['satuan']."</td>";
              echo "<td>".$row['keterangan']."</td>";
              echo "</tr>";
            }
            ?>
            </tbody>
          </table>
        </center>
        <?php
        }
        else
        {
          echo '<center><h4>Tidak ada barang masuk</h4></center>';
        }
      }
      else if(isset($_GET['barang']))
      {
        $barang = mysqli_real_escape_string($con, $_GET['barang']);

        $res_nota = mysqli_query($con, "SELECT id_nota FROM nota ORDER BY id_nota ASC");
        //echo mysqli_num_rows($res_nota);
        $res_stok = mysqli_query($con, "SELECT * FROM stok WHERE nama_barang LIKE '%".$barang."%' ORDER BY kode_barang ASC");
        if (mysqli_num_rows($res_stok)!=0)
        {
            echo "<center><h4>Total Barang Terjual :</h4>
            <table class='table table-bordered table-hover' style='width: auto;'>
            <thead>
              <tr>
                <td class='text-center' style='background-color:#428BCA;color:#FFF'>Kode Barang</td>
                <td class='text-center' style='background-color:#428BCA;color:#FFF'>Nama Barang</td>
                <td class='text-center' style='background-color:#428BCA;color:#FFF'>Jumlah</td>
              </tr>
            </thead>
            <tbody>
            ";
          while($row_stok = mysqli_fetch_array($res_stok))
          {
            $keluar = 0;
            $res_nota = mysqli_query($con, "SELECT id_nota FROM nota ORDER BY id_nota ASC");
            while($row_nota = mysqli_fetch_array($res_nota))
            {
              $res_detailnota = mysqli_query($con, "SELECT * FROM detail_nota WHERE kode_barang='$row_stok[kode_barang]'");
              while($row_detailnota = mysqli_fetch_array($res_detailnota))
              {
                //echo "<br>".$row_detailnota['id_nota']." | kode barang = ".$row_stok['kode_barang'];
                if($row_detailnota['id_nota'] == $row_nota['id_nota'])
                {
                  $keluar = $keluar+$row_detailnota['jumlah'];
                  $nama = $row_detailnota['nama_barang'];
                }
              }
              //echo "<br>".$row_stok['nama_barang']." | keluar = ".$keluar;
            }
            if($keluar != 0)
            {
              echo "<tr>";
              echo "<td class='text-center'>".$row_stok['kode_barang']."</td>";
              echo "<td>".$row_stok['nama_barang']."</td>";
              echo "<td class='text-center'>".$keluar."</td>";
              echo "</tr>";
            }
          }
          echo '</tbody></table>';
        }
        else
        {
          echo '<center><h4>Data barang terjual tidak ditemukan !!</h4></center>'; 
        }

      	$result = mysqli_query($con, "SELECT * FROM stok_masuk WHERE nama_barang LIKE '%".$barang."%' ORDER BY tanggal DESC");
        if (mysqli_num_rows($result)!=0)
        {
        ?>
        <center>
          <br>
          <h4>Histori Barang :</h4>
          <table class='table table-bordered table-hover' id='transData' style="width: auto;">
            <thead>
              <tr>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Tanggal / Waktu</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Petugas</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Kode Barang</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Nama Barang</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Jumlah</td>
                <td class='text-center' style="background-color:#428BCA;color:#FFF">Keterangan</td>
              </tr>
            </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td class='text-center'>".date("d-M-Y", strtotime($row['tanggal']))." / ".date("H:i:s", strtotime($row['tanggal']))."</td>";
              echo "<td class='text-center'>".$row['petugas']."</td>";
              echo "<td class='text-center'>".$row['kode_barang']."</td>";
              echo "<td>".$row['nama_barang']."</td>";
              echo "<td class='text-center'>".$row['jumlah']." ".$row['satuan']."</td>";
              echo "<td>".$row['keterangan']."</td>";
              echo "</tr>";
            }
            ?>
            </tbody>
          </table>
        </center>
        <?php
        }
        else
        {
          echo '<center><h4>Data barang masuk tidak ditemukan !!</h4></center>';
        }
      }
      ?>



    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>