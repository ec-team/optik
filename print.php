<?php
include 'connectdb.php';
/* Change to the correct path if you copy this example! */
require __DIR__ . '/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
$result_nota = mysqli_query($con, "SELECT * FROM nota WHERE id_nota='$_GET[id]'");
$row_nota = mysqli_fetch_array($result_nota);
$result_detail = mysqli_query($con, "SELECT * FROM detail_nota WHERE id_nota='$_GET[id]' ORDER BY no_urut ASC");

$result_toko = mysqli_query($con, "SELECT * FROM data_toko");
$row_toko = mysqli_fetch_array($result_toko);

$connector = new WindowsPrintConnector("webeasyprint");
$printer = new Printer($connector);

$printer->setTextSize(2,1);
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->setUnderline(Printer::UNDERLINE_DOUBLE);
$printer->text("".$row_toko['nama']."");
$printer->setUnderline(false);
$printer->setTextSize(1,1);
$printer->text("\n");
$printer->text("".$row_toko['alamat']."");
$printer->text("\n");
$printer->text("".$row_toko['telepon']."");
$printer->text("\n");
$printer->setTextSize(1,1);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("No. Nota : ".$row_nota['id_nota']."\n");
$printer->text("==========================================");
$printer->text("\n\n");
while ($row_detail = mysqli_fetch_array($result_detail)) {
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text($row_detail['nama_barang']);
    $printer->text("\n");
    $printer->text("(@ ".number_format($row_detail['harga'])." /".$row_detail['satuan'].")");
    $printer->text("\n");
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text("(x".$row_detail['jumlah'].") ".number_format($row_detail['sub_total'])."  ");
    $printer->text("\n");
}

$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("------------------ +");
$printer->text("\n");
$printer->setTextSize(1,1);
$printer->text("Total        ");
$printer->text("Rp. ".number_format($row_nota['total'])."  \n\n");
$printer->setTextSize(1,1);
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("==========================================");
$printer->text("\nTerima kasih atas kunjungannya");
$printer->text("\n");
$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$printer->text($dt->format('d F Y -- H:i:s'));
$printer->text("\n\n");

$printer->cut();

/* Close printer */
$printer->close();

?>