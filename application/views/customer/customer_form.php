<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-users mr-1"></i></a></li>
      <li class="active">Customer</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title"><?=ucfirst($page)?> Customer</h3>
                  <div class="text-right">
                  <a href="<?=site_url('customer') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="<?=site_url('customer/process') ?>" method="post">
      				<div class="form-group">
      					<label>customer Name *</label>
                                    <input type="hidden" name="id" value="<?=$row->customer_id?>">
      					<input type="text" name="customer_name" value="<?=$row->name ?>" class="form-control" required>
      				</div>
                              <div class="form-group">
                                    <label>Gender *</label>
                                    <select name="gender" class="form-control" required>
                                          <option value="">-Pilih-</option>
                                          <option value="L" <?=$row->gender == 'L' ? 'selected' : "" ?>>Laki-laki</option>
                                          <option value="P" <?=$row->gender == 'P' ? 'selected' : "" ?>>Perempuan</option>
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="number" name="phone" value="<?=$row->phone ?>" class="form-control" required>
                              </div>
                               <div class="form-group">
                                    <label>Address *</label>
                                    <textarea name="addr" class="form-control" required><?=$row->address?></textarea>
                              </div>
                              
      				
      				
      				<div clas="form-group">
            				<button type="submit" name="<?=$page?>" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
            				<button type="Reset" class="btn btn-secondary"> Reset</button>
      				</div>     					
      				</form>
      				
      			</div>
      			
      		</div>
      	</div>

      </div>
</section>
    <!-- /.content -->