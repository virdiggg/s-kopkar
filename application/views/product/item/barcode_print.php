<!DOCTYPE html>
<html>
<head>
	<title>barcode <?=$row->barcode ?></title>
</head>
<body>
  <table border="1" cellpadding="10">
  <tr>
  <td>
 <?= $row->name ?><br>
   <?php
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
         echo '<img src="data:image/png;base64,'. base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)).'" style="width:300px">';
                  ?><br>
 
 <?= $row->barcode ?>
 </td>
</tr>
</table>
</body>
</html>