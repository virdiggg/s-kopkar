<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-dolly mr-1"></i></a></li>
      <li class="active">item</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <?php $this->view('messages') ?>
      
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Data item</h3>
                  <div class="text-right">
                  <a href="<?=site_url('item/add') ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"> Create</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th style="width:5%">No</th>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Stock</th>
	      				<th>Image</th>
	      				<th class="text-center">Action</th>
      			</thead>
      			<tbody>
      			<?php 
      			$no=1;
      			foreach($row->result() as $key => $data) { ?>
	      			<tr>
		      			<td><?= $no++ ?>.</td>
                                    <td>
                                    <?= $data->barcode ?><br>
                                          <a class="btn btn-defautl btn-xs" href="<?=site_url('item/barcode_qrcode/'.$data->item_id) ?>">
                                                 Generate<i class="fas fa-barcode"></i>     
                                          </a>
                                    </td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->category_name ?></td>
                                    <td><?= $data->unit_name ?></td>
                                    <td><?= $data->price ?></td>
                                    <td><?= $data->stock ?></td>
		      			<td>
                                    <?php if($data->image != null) { ?>
                                          <img style="width:100px" src="<?=base_url('uploads/product/'.$data->image)?>">
		      				<?php } ?>
                                    </td>      			
		      			<td class="text-center">
                                          <a class="btn btn-primary btn-xs" href="<?=site_url('item/edit/'.$data->item_id) ?>">
                                                <i class="fas fa-edit"> Update</i>     
                                          </a>
                                          <a onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs" href="<?=site_url('item/del/'.$data->item_id) ?>">
                                                <i class="fas fa-trash"> Delete</i>     
                                          </a>
                                      
                                         
                                          </form>
                                    </td> 
	      			</tr>
	      			<?php } ?>	
      			</tbody>
      		</table>
      	</div>

      </div>
</section>
    <!-- /.content -->