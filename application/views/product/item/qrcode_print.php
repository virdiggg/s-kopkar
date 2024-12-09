<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>qrcode <?=$row->barcode ?></title>
</head>
<body>
<img style="width:250px" src="uploads/qr-code/item-<?=$row->barcode?>.png" >
<img style="width:250px" src="uploads/qr-code/item-89902.png" >
<img style="width:100px" src="<?=base_url('uploads/product/'.$row->image)?>">
<img src="<?= site_url('uploads/qr-code/item-'.$row->barcode.'.png') ?>" style="width:200px"><br>
</body>
</html>