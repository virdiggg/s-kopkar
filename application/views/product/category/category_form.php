<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users mr-1"></i></a></li>
      <li class="active">Category</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title"><?=ucfirst($page)?> Category</h3>
                  <div class="text-right">
                  <a href="<?=site_url('category') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="<?=site_url('category/process') ?>" method="post">
      				<div class="form-group">
      					<label>category Name *</label>
                                    <input type="hidden" name="id" value="<?=$row->category_id?>">
      					<input type="text" name="category_name" value="<?=$row->name ?>" class="form-control" required>
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