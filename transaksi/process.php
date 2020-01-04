<?php
session_start();
include '../connectdb.php';

//echo "<br>total : ".$_GET['total'];
//echo "<br>total : ".$_GET['petugas'];

mysqli_query($con, "INSERT INTO nota (total,petugas) VALUES ('$_GET[total]', '$_GET[petugas]')");
/*
echo "<table>";
echo "<thead><tr>";
echo "<td>id</td>";
echo "<td>tanggal</td>";
echo "<td>total</td>";
echo "<td>petugas</td>";
echo "</tr></thead>";
echo "<tbody>";
$result = mysqli_query($con, "SELECT * FROM nota ORDER BY id_nota ASC");
while ($row = mysqli_fetch_array($result)) 
{
	echo "<tr>";
	echo "<td>".$row['id_nota']."</td>";
	echo "<td>".$row['tanggal']."</td>";
	echo "<td>".$row['total']."</td>";
	echo "<td>".$row['petugas']."</td>";
	echo "</tr>";
}
echo "</tbody></table>";
*/
$result = mysqli_query($con, "SELECT id_nota FROM nota ORDER BY id_nota DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$id = $row['id_nota'];
echo "<br><input hidden id='id' value='".$id."'>";

$result = mysqli_query($con, "SELECT * FROM dummy ORDER BY no ASC");
while ($row = mysqli_fetch_array($result)) 
{
	$row['nama_barang'] = mysqli_real_escape_string($con, $row['nama_barang']);
	mysqli_query($con, "INSERT INTO detail_nota (id_nota,no_urut,kode_barang,nama_barang,jumlah,satuan,harga,sub_total) VALUES ('$id', '$row[no]', '$row[kode_barang]', '$row[nama_barang]', '$row[jumlah]', '$row[satuan]', '$row[harga]', '$row[sub_total]')");
	$jumlah = $row['jumlah'];
	$kodebarang = $row['kode_barang'];

	$result_stok = mysqli_query($con, "SELECT * FROM stok WHERE kode_barang='$kodebarang'");
	$row_stok = mysqli_fetch_array($result_stok);
	$stok = $row_stok['jumlah_barang'];

	$stok_update = $stok - $jumlah;
	mysqli_query($con, "UPDATE stok SET jumlah_barang='$stok_update' WHERE kode_barang='$kodebarang'");
	mysqli_query($con, "INSERT INTO stok_masuk (petugas,kode_barang,nama_barang,jumlah,satuan,keterangan) VALUES ('$_GET[petugas]', '$row[kode_barang]', '$row[nama_barang]', '$row[jumlah]', '$row[satuan]', 'Penjualan')");
}
/*
echo "<table>";
echo "<thead><tr>";
echo "<td>id nota</td>";
echo "<td>kode barang</td>";
echo "<td>nama barang</td>";
echo "<td>jumlah</td>";
echo "<td>satuan</td>";
echo "<td>harga</td>";
echo "<td>sub total</td>";
echo "</tr></thead>";
echo "<tbody>";
$result = mysqli_query($con, "SELECT * FROM detail_nota ORDER BY id_nota,no_urut ASC");
while ($row = mysqli_fetch_array($result)) 
{
	echo "<tr>";
	echo "<td>".$row['id_nota']."</td>";
	echo "<td>".$row['kode_barang']."</td>";
	echo "<td>".$row['nama_barang']."</td>";
	echo "<td>".$row['jumlah']."</td>";
	echo "<td>".$row['satuan']."</td>";
	echo "<td>".$row['harga']."</td>";
	echo "<td>".$row['sub_total']."</td>";
	echo "</tr>";
}
echo "</tbody></table>";
*/
mysqli_query($con, "TRUNCATE TABLE dummy");
?>
<!DOCTYPE html>
  <head>
  </head>

  <body>

    <script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
    	var myWindow;
    	var id = document.getElementById("id").value;
	    myWindow = window.open("nota.php?id="+id, "_blank", "width=300,height=650,location=no,status=no,top=0,left=500");
		window.location.href = "transaction.php";
    </script>
  </body>
</html>