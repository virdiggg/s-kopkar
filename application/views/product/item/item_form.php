<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users mr-1"></i></a></li>
      <li class="active">item</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title"><?=ucfirst($page)?> item</h3>
                  <div class="text-right">
                  <a href="<?=site_url('item') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			   <?php echo form_open_multipart('item/process') ?>      				
      				<div class="form-group">
      					<label>Barcode *</label>
                                    <input type="hidden" name="id" value="<?=$row->item_id?>">
      					<input autocomplete="off" type="text" name="barcode" value="<?=$row->barcode ?>" class="form-control" required>
      				</div>
                              <div class="form-group">
                                    <label for="product_name">Name *</label>                                   
                                    <input autocomplete="off" type="text" name="product_name" id="product_name" value="<?=$row->name ?>" class="form-control" required>
                              </div>
<!-- ============================================================================================================== -->
                               <div class="form-group">
                                    <label for="product_name">Category *</label>
                                    <select name="category" class="form-control" required>
                                          <option value="">-Pilih-</option>
                                          <?php
                                          foreach($category->result() as $key => $data) { ?>
                                          <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? 'selected' : null ?> ><?=$data->name ?></option>
                                          <?php } ?>
                                    </select>                                 
                                   
                              </div>
                               <div class="form-group">
                                    <label for="product_name">Unit *</label> 
                                    <?php echo form_dropdown('unit',$unit,$selectedunit,['class' => 'form-control','required']) ?>                             
                                    
                              </div>
<!-- ================================================================================================================== -->
                              <div class="form-group">
                                    <label>Price *</label>                                   
                                    <input type="number" name="price" value="<?=$row->price ?>" class="form-control" required>
                              </div>
                              <div class="form-group">
                                    <label>Image</label>  
                                    <?php if($page == 'edit') {
                                                if($row->image != null) { ?>
                                                      <div style="margin-bottom:5px">
                                                       <img style="width:80%" src="<?=base_url('uploads/product/'.$row->image)?>">
                                                      </div>
                                                <?php
                                              }
                                    }
                                    ?>                              
                                    <input type="file" name="image" class="form-control">
                              </div>
                             
      				<div clas="form-group">
            				<button type="submit" name="<?=$page?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
            				<button type="Reset" class="btn btn-secondary"> Reset</button>
      				</div>     					
      				<?php echo form_close() ?>
      				
      			</div>
      			
      		</div>
      	</div>

      </div>
</section>
    <!-- /.content