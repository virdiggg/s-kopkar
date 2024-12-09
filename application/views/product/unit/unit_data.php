<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-dolly mr-1"></i></a></li>
      <li class="active">Unit</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <?php $this->view('messages') ?>
      
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Data unit</h3>
                  <div class="text-right">
                  <a href="<?=site_url('unit/add') ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"> Create</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th style="width:5%">No</th>
	      				<th>Name</th>
	      				<th class="text-center">Action</th>
      			</thead>
      			<tbody>
      			<?php 
      			$no=1;
      			foreach($row->result() as $key => $data) { ?>
	      			<tr>
		      			<td><?= $no++ ?>.</td>
		      			<td><?= $data->name ?></td>
		      					      			
		      			<td class="text-center">
                                          <a class="btn btn-primary btn-xs" href="<?=site_url('unit/edit/'.$data->unit_id) ?>">
                                                <i class="fas fa-edit"> Update</i>     
                                          </a>
                                          <a onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs" href="<?=site_url('unit/del/'.$data->unit_id) ?>">
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