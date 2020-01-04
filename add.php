<?php 
include 'connectdb.php';
?>
<html>
<br>
<table border="3px solid">
	<thead>
		<td>kode</td>
		<td>nama</td>
		<td>jumlah</td>
	</thead>
	<?php
	$result = mysqli_query($con, "SELECT * FROM stok ORDER BY kode_barang ASC");
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>";
		echo $row['kode_barang'];
		echo "</td>";
		echo "<td>";
		echo $row['nama_barang'];
		echo "</td>";
		echo "<td>";
		echo $row['jumlah_barang'];
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>
<form action="insert.php" method="post">
<input type="text" name="barang" style="width: 300px;" autofocus="on">
<input type="submit" value="Submit">
</form>
</html>