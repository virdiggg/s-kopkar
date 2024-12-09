<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users mr-1"></i></a></li>
      <li class="active">item</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Barcode    <i class="fa fa-barcode"></i></h3>
                  <div class="text-right">
                  <a href="<?=site_url('item') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
            <?= $row->name ?><br>
      		<?php
                  $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                  echo '<img src="data:image/png;base64,'. base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)).'" style="width:200px">';
                  ?><br>
         
             <?= $row->barcode ?>
             <br>
             <a class="btn btn-default btn-sm" href="<?=site_url('item/barcode_print/'.$row->item_id) ?>" target="_blank">
                  <i class="fas fa-print"> Print</i>     
             </a>
      	</div>

      </div>
</section>
      <section class="card">
      <div class="card">
            <div class="card-header">
                  <h3 class="card-title">QR Code   <i class="fa fa-qrcode"></i></h3>
                         
            </div>
            <div class="card-body">
            <?= $row->name ?><br>
            <?php
            $qrCode = new Endroid\QrCode\QrCode($row->barcode);
            // Save it to a file
            $qrCode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');

            ?>
            <img src="<?= base_url('uploads/qr-code/item-'.$row->barcode.'.png') ?>" style="width:200px"><br>
            <?= $row->barcode ?>
             <br>
             <a class="btn btn-default btn-sm" href="<?=site_url('item/qrcode_print/'.$row->item_id) ?>" target="_blank">
                  <i class="fas fa-print"> Print</i>     
             </a>
            </div>

      </div>

</section>
    