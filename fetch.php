<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "kasir");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM stok
  WHERE nama_kategori LIKE '%".$search."%'
  OR kode_barang LIKE '%".$search."%' 
  OR nama_barang LIKE '%".$search."%' 
  OR jumlah_barang LIKE '%".$search."%' 
  OR kode_satuan LIKE '%".$search."%' 
  OR harga LIKE '%".$search."%'
  ORDER BY nama_kategori,kode_barang
 ";
}
else
{
 $query = "
  SELECT * FROM stok ORDER BY nama_kategori,kode_barang
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr id="'.$row["id"].'" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["id"].'" style="cursor:pointer;">
    <td class="text-center" id="'.$row["id"].'">'.$row["nama_kategori"].'</td>
    <td class="text-center" id="'.$row["id"].'">'.$row["kode_barang"].'</td>
    <td class="text-left" id="'.$row["id"].'">'.$row["nama_barang"].'</td>
    <td class="text-center" id="'.$row["id"].'">'.$row["jumlah_barang"].'</td>
    <td class="text-center" id="'.$row["id"].'">'.$row["kode_satuan"].'</td>
    <td class="text-right" id="'.$row["id"].'"><span class="col-xs-1 text-right">Rp.</span><span>'.number_format($row["harga"],0).'</span></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>