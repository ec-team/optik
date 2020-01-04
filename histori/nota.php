<?php
include 'connectdb.php';
$result_nota = mysqli_query($con, "SELECT * FROM nota WHERE id_nota='$_GET[id]'");
$row_nota = mysqli_fetch_array($result_nota);
$id = $row_nota['id_nota'];
$result_detail = mysqli_query($con, "SELECT * FROM detail_nota WHERE id_nota='$_GET[id]' ORDER BY no_urut ASC");

$result_toko = mysqli_query($con, "SELECT * FROM data_toko");
$row_toko = mysqli_fetch_array($result_toko);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.p 
		{
			font-size: 12px;
			margin: 5px 0px 0px 0px;
		}
	</style>
</head>
<body style="font-family: arial;">
	<center>
		<?php echo "<input hidden id='id' value='".$id."'>"; ?>
		<button onclick="_print()" style="font-size: 18px;" autofocus>Print1</button>&nbsp;
		<button onclick="_print2()" style="font-size: 18px;" autofocus>Print2</button>
		<br><br>
	</center>
	<center>
		<b><u><p style="font-size: 20px; margin: 0px;"><?php echo $row_toko['nama']; ?></p></u></b>
		<p class="p"><?php echo nl2br($row_toko['alamat'])."<br>".$row_toko['telepon']; ?></p>
	</center>
	<p class="p"><?php echo "No. Nota : ".$row_nota['id_nota']; ?></p>
	<p class="p">======================================</p>
	<br>
	<?php
	while ($row_detail = mysqli_fetch_array($result_detail)) {
	    echo "<p class='p'>".$row_detail['nama_barang']."</p>";
	    echo "<p class='p'>(@ ".number_format($row_detail['harga'])." /".$row_detail['satuan'].")</p>";
	    echo "<p class='p' style='text-align:right;'>(x".$row_detail['jumlah'].") ".number_format($row_detail['sub_total'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</p>";
	}
	    echo "<p class='p' style='text-align:right;'>--------------------------- +&nbsp;&nbsp</p>";
	    echo "<p class='p' style='text-align:right;'>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp. ".number_format($row_nota['total'])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br>";
	?>
	<br>
	<p class="p">======================================</p>
	<center>
		<p class="p">Terima kasih atas kunjungannya</p>
		<?php
			$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
			echo "<p class='p'>".$dt->format('d F Y -- H:i:s')."</p>";
		?>
	</center>

	<script src="js/jquery.min.js"></script>    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
    	function _print() {
    		//window.print();
	    	var myWindow;
	    	var id = document.getElementById("id").value;
		    myWindow = window.open("print.php?id="+id, "_blank", "width=100,height=100");
			myWindow.close();
    	}
    	function _print2() {
    		window.print();
    	}
    </script>
</body>
</html>