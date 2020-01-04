<?php 
include 'connectdb.php';
?>
<html>
<br>
<table border="3px solid">
	<thead>
		<td>kode barang</td>
		<td>kode harga</td>
		<td>harga</td>
	</thead>
	<?php
	$result = mysqli_query($con, "SELECT * FROM harga_barang ORDER BY kode_barang,kode_harga ASC");
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>";
		echo $row['kode_barang'];
		echo "</td>";
		echo "<td>";
		echo $row['kode_harga'];
		echo "</td>";
		echo "<td>";
		echo $row['harga'];
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>
<form action="insert_harga.php" method="post">
<input type="text" name="kodebarang" autofocus="on" placeholder="kode barang">
<input type="text" name="kodeharga" placeholder="kode harga">
<input type="text" name="harga" placeholder="harga">
<input type="submit" value="Submit">
</form>
</html>