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

<script>
$("#addbutton").on("click", function(){
  if( $('#jumlah').val() && $('#jumlah').val() > 0)
  {
      var kode_barang = document.getElementById("kodebarang").textContent;
      //var nama_barang = document.getElementById("input").value;
      var stok = parseInt(document.getElementById("stok").textContent);
      var jumlah = parseInt(document.getElementById("jumlah").value);
      alert(jumlah);
      //var kode_harga = document.getElementById("kodeharga").value;
      //var harga = document.getElementById("harga").value;
      //harga = +harga.replace(/[^\d\.-]/g,'');
      if($("#transData").find('td#'+kode_barang).length)
      {
        alert(nama_barang+" sudah diinput, tidak boleh input item yang sama.");
        //<?php unset($_SESSION['barang']); ?>
        window.location.href = "home.php";
      }/*
      else
      {
        if(jumlah <= stok)
        {
          alert(jumlah);
          //window.location.href = "insert_dummy.php?kode_barang="+kode_barang+"&nama_barang="+nama_barang+"&jumlah="+jumlah+"&kode_harga="+kode_harga+"&harga="+harga;
        //alert(barang);
        }
        else
        {
          alert("Stok tidak tersedia !!");
        }
      }*/
  }
  /*
  else if($('#input').val() == '')
  {
    alert("Nama barang harus diisi.");
  }
  else if($('#kodeharga').val() == '')
  {
    alert("Kode harga harus diisi.");
  }
  else if($('#jumlah').val() == '' || $('#jumlah').val() == 0)
  {
    alert("Jumlah harus diisi.");
  }
  else if($('#jumlah').val() < 0)
  {
    alert("Jumlah tidak valid");
  }*/
});
</script>