<?php
include '../connectdb.php';
session_start();
if($_SESSION['user']!="admin")
{
  header("location:login.php");
}
if(!isset ($_SESSION['user'])){
	header("location:login.php");
}
$result = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[user]'");
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pengaturan</title>
    <?php include '../import.php'; ?>
    <script>
      function show()
      {
        var myWindow;
        var id = 0;
        myWindow = window.open("printview.php?id="+id, "_blank", "width=300,height=650,location=no,status=no,top=0,left=500");
      }
    </script>
  </head>

  <body>
    <?php include "../header.php"?>

    <div class="container" style="margin-top: 60px;">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary" style="width: auto;">
              <div class="panel-heading text-center" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Tambah User Baru
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Username</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="username_new" placeholder="Username" required autocomplete="off" style="text-transform: lowercase;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Password</label>
                      <div class="col-sm-7">
                        <!--<input type="password" class="form-control" id="password_new" placeholder="Password" required>-->
                        <input type="password" class="form-control" placeholder="Password" required id="password_new" data-toggle="tooltip" data-trigger="manual" data-title="Caps lock is on">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="invoice_new">Transaksi
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="pembukuan_new">Pembukuan
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="stok_new">Stok
                          </label>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="panel-footer text-center">
                <!--<input type="submit" id="addbutton" name="submit" value="Tambah" class="btn btn-primary">-->
                <button class="btn btn-primary" id="tambah" type="button">Tambah</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        </div>
      </div>
      <div class="row">
        <center>
          <table class='table table-bordered table-hover' id='transData' style="width: auto;">
            <thead>
              <tr>
                <th rowspan="2" class='text-center' style="background-color:#428BCA;color:#FFF; vertical-align: middle;">Username</th>
                <th rowspan="2" class='text-center' style="background-color:#428BCA;color:#FFF; vertical-align: middle;">Password</th>
                <th colspan="3" class='text-center' style="background-color:#428BCA;color:#FFF">Hak Akses</th>
                <th rowspan="2" class='text-center' style="background-color:#428BCA;color:#FFF; vertical-align: middle;">Ubah</th>
                <th rowspan="2" class='text-center' style="background-color:#428BCA;color:#FFF; vertical-align: middle;">Hapus</th>
              </tr>
              <tr>
                <th class='text-center' style="background-color:#428BCA;color:#FFF">Transaksi</th>
                <th class='text-center' style="background-color:#428BCA;color:#FFF">Pembukuan</th>
                <th class='text-center' style="background-color:#428BCA;color:#FFF">Stok</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $result = mysqli_query($con, "SELECT * FROM user");
            while($row = mysqli_fetch_array($result))
            {
              if(!isset($_GET['username']))
              {
                echo "<tr>";
                echo "<td class='text-center' id='".$row['username']."'>".$row['username']."</td>";
                echo "<td class='text-center'><input type='password' class='form-control' style='width: 100px;' disabled value=".$row['password']."></td>";
                if($row['invoice']==1)
                {
                  echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                }
                else
                {
                  echo "<td class='text-center'><input type='checkbox' disabled></td>";
                }
                if($row['pembukuan']==1)
                {
                  echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                }
                else
                {
                  echo "<td class='text-center'><input type='checkbox' disabled></td>";
                }
                if($row['stok']==1)
                {
                  echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                }
                else
                {
                  echo "<td class='text-center'><input type='checkbox' disabled></td>";
                }
                  echo "<td class='text-center'><a href='pengaturan.php?username=".$row['username']."'><button class='btn btn-warning'><i class='far fa-edit'></button></a></td>";
                  if($row['username']!="admin")
                    echo "<td class='text-center'><a href='delete_user.php?username=".$row['username']."'><button class='btn btn-danger'><i class='far fa-trash-alt'></button></a></td>";
                  else
                    echo '<td></td>';
                echo "</tr>";
              }
              else
              {
                if($row['username'] == 'admin' && $_GET['username'] == 'admin')
                {
                  echo "<tr>";
                  echo "<td class='text-center' id='".$row['username']."'>".$row['username']."<label id='username' hidden>".$row['username']."</label></td>";
                  echo "<td class='text-center'><input type='text' id='password' class='form-control' style='width: auto;' value=".$row['password']." autofocus='on'></td>";
                    echo "<td class='text-center'><input type='checkbox' id='invoice_cb' checked disabled></td>";
                    echo "<td class='text-center'><input type='checkbox' id='pembukuan_cb' checked disabled></td>";
                    echo "<td class='text-center'><input type='checkbox' id='stok_cb' checked disabled></td>";
                  echo "<td class='text-center'><button class='btn btn-success' onclick='simpan()'>Simpan</button></td>";
                  echo '<td></td>';
                  echo "</tr>";
                }
                else
                {
                  echo "<tr>";
                  if($row['username'] == $_GET['username'])
                    echo "<td class='text-center' id='".$row['username']."'>".$row['username']."<label id='username' hidden>".$row['username']."</label></td>";
                  else
                    echo "<td class='text-center'>".$row['username']."</td>";
                  if($row['username'] == $_GET['username'])
                    echo "<td class='text-center'><input type='text' id='password' class='form-control' style='width: auto;' value=".$row['password']." autofocus='on'></td>";
                  else
                    echo "<td class='text-center'><input type='password' class='form-control' style='width: auto;' disabled value=".$row['password']."></td>";
                  if($row['username'] == 'admin')
                  {
                    echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                    echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                    echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                  }
                  else
                  {
                    if($row['invoice']==1)
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='invoice_cb' checked></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                    }
                    else
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='invoice_cb'></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' disabled></td>";
                    }
                    if($row['pembukuan']==1)
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='pembukuan_cb' checked></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                    }
                    else
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='pembukuan_cb'></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' disabled></td>";
                    }
                    if($row['stok']==1)
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='stok_cb' checked></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' checked disabled></td>";
                    }
                    else
                    {
                      if($row['username'] == $_GET['username'])
                        echo "<td class='text-center'><input type='checkbox' id='stok_cb'></td>";
                      else
                        echo "<td class='text-center'><input type='checkbox' disabled></td>";
                    }
                  }
                  if($row['username'] == $_GET['username'])
                    echo "<td class='text-center'><button class='btn btn-success' onclick='simpan()'>Simpan</button></td>";
                  else
                    echo "<td class='text-center'><button class='btn btn-warning' disabled>Ubah</button></td>";
                  echo '<td></td>';
                  echo "</tr>";
                }
              }
            }
            ?>
            </tbody>
          </table>
          <hr><br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary" style="width: auto;">
              <div class="panel-heading text-center" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Edit Data Toko
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <form class="form-horizontal" action="update_data_toko.php" method="POST">
                  <div class="panel-body">
                    <?php
                    $query = "SELECT * FROM data_toko";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama Toko</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_toko" name="nama" placeholder="Nama Toko" required autocomplete="off" value="<?php echo $row['nama']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Alamat</label>
                      <div class="col-sm-7">
                        <textarea rows="3" class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Telepon</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required autocomplete="off" value="<?php echo $row['telepon']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer text-center">
                  <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
                  <button class="btn btn-warning" onclick="show()";>Lihat Nota <i class="far fa-file-alt"></i></button>
                  <!-- <button class="btn btn-primary" id="tambah" type="button">Ubah</button> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </center>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   
    <?php include "../footer.php"?>
    <script>

      $('[type=password]').keypress(function(e) {
        var $password = $(this),
            tooltipVisible = $('.tooltip').is(':visible'),
            s = String.fromCharCode(e.which);
        
        //Check if capslock is on. No easy way to test for this
        //Tests if letter is upper case and the shift key is NOT pressed.
        if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
          if (!tooltipVisible)
            $password.tooltip('show');
        } else {
          if (tooltipVisible)
            $password.tooltip('hide');
        }
        
        //Hide the tooltip when moving away from the password field
        $password.blur(function(e) {
          $password.tooltip('hide');
        });
      });

      function simpan()
      {
        if(document.getElementById('invoice_cb').checked == true)
          var invoice = 1;
        else
          var invoice = 0;
        if(document.getElementById('pembukuan_cb').checked == true)
          var pembukuan = 1;
        else
          var pembukuan = 0;
        if(document.getElementById('stok_cb').checked == true)
          var stok = 1;
        else
          var stok = 0;
        var username=document.getElementById('username').textContent;
        var password=document.getElementById('password').value;

        /*/
        alert(invoice);
        alert(pembukuan);
        alert(stok);
        alert(username);
        alert(password);
        */
        if(invoice==0 && pembukuan==0 && stok==0)
          bootbox.alert("<h3>Harus ada minimal 1 hak akses !</h3>");
        else
          window.location.href = "update_pengaturan.php?username="+username+"&password="+password+"&invoice="+invoice+"&pembukuan="+pembukuan+"&stok="+stok;
      }

      $('#username_new').bind('keypress', function(e) {
        if (e.which < 48 || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      });

      $('#password_new').bind('keypress', function(e) {
        if (e.which < 48 || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      }); 

      $('#password').bind('keypress', function(e) {
        if (e.which < 48 || 
           (e.which > 57 && e.which < 65) || 
           (e.which > 90 && e.which < 97) ||
            e.which > 122) {
           e.preventDefault();
          bootbox.alert("<h3>Hanya boleh huruf dan angka !</h3>");
        }
      }); 

      $("#tambah").on("click", function(){
        if($('#username_new').val()!='' && $('#password_new').val()!='')
        {
          var username=document.getElementById('username_new').value;
          var password=document.getElementById('password_new').value;
          if(document.getElementById('invoice_new').checked == true)
            var invoice = 1;
          else
            var invoice = 0;
          if(document.getElementById('pembukuan_new').checked == true)
            var pembukuan = 1;
          else
            var pembukuan = 0;
          if(document.getElementById('stok_new').checked == true)
            var stok = 1;
          else
            var stok = 0;

          if($("#transData").find('td#'+username).length)
          {
            bootbox.alert("<h3>Username sudah terdaftar !</h3>");
          }
          else if(invoice==0 && pembukuan==0 && stok==0)
            bootbox.alert("<h3>Harus ada minimal 1 hak akses !</h3>");
          else
            window.location.href = "insert_username.php?username="+username+"&password="+password+"&invoice="+invoice+"&pembukuan="+pembukuan+"&stok="+stok;
        }
        else if($('#username_new').val() == '')
        {
          bootbox.alert("<h3>Username harus diisi !</h3>");
        }
        else if($('#password_new').val() == '')
        {
          bootbox.alert("<h3>Password harus diisi !</h3>");
        }
      });
    </script>
  </body>
</html>