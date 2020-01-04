<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 16px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barcode128.php';
		$product = $_GET['product'];
		$product_id = $_GET['product_id'];
		$rate = $_GET['rate'];


			echo "<p class='inline' style='text-align:center;'><span style='text-align:center;''><b>$product</b></span>".bar128(stripcslashes($_GET['product_id']))."<span ><b>Rp. ".number_format($rate,0)." </b><span></p>&nbsp&nbsp&nbsp&nbsp";

		?>
	</div>
</body>
</html>