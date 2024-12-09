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
      		<h3 class="card-title">Data Customer</h3>
                  <div class="text-right">
                  <a href="<?=site_url('customer/add') ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"> Create</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No</th>
	      				<th>Name</th>
	      				<th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
	      				<th>Action</th>
      			</thead>
      			<tbody>
      			<?php 
      			$no=1;
      			foreach($row->result() as $key => $data) { ?>
	      			<tr>
		      			<td><?= $no++ ?>.</td>
		      			<td><?= $data->name ?></td>
		      			<td><?= $data->gender ?></td>
                                    <td><?= $data->phone ?></td>
                                    <td><?= $data->address ?></td>
		      			
		      			<td class="text-center">
                                          <a class="btn btn-primary btn-xs" href="<?=site_url('customer/edit/'.$data->customer_id) ?>">
                                                <i class="fas fa-edit"> Update</i>     
                                          </a>
                                          <a onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs" href="<?=site_url('customer/del/'.$data->customer_id) ?>">
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