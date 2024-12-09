 
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users mr-1"></i></a></li>
      <li class="active">Anggota</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Data Anggota</h3>
                  <div class="text-right">
                  <a href="<?=site_url('user/print') ?>" target="_blank" class="btn btn-default">
                        <i class="fas fa-print"> Print </i>                      
                  </a>
                  <a href="<?=site_url('user/add') ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"> Tambah Anggota </i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No</th>
	      				<th>User Name</th>
                <th>Nama</th>
                <th>Bergabung</th>	      				
                <th>Kode Toko</th>
	      				<th>Level</th>
	      				<th>Action</th>
      			</thead>
      			<tbody>
      			<?php 
      			$no=1;
      			foreach($row->result() as $key => $data) { ?>
	      			<tr>
		      			<td><?= $no++ ?>.</td>
		      			<td><?= $data->username ?></td>
                <td><?= $data->nama ?></td>
		      			<td><?= $data->tgl_gabung ?></td>                                   
		      			<td><?= $data->kode_toko ?></td>
		      			<td>
                                         <?php
                                         if($data->level =="1"){
                                          echo "Pengurus";
                                         }
                                         else if($data->level =="2"){
                                          echo "Anggota";
                                         }
                                         ?> 
                                    </td>
		      			<td class="text-center">
                                        <form class="" method="post" Action="<?= site_url('user/del'); ?>" >
                                          <a class="btn btn-primary btn-xs" href="<?=site_url('user/edit/'.$data->anggota_id) ?>">
                                                <i class="fas fa-edit"> edit</i>     
                                          </a>
                                      
                                          <input type="hidden" name="user_id" value="<?= $data->anggota_id; ?>"></input>

                                          <button onclick="return confirm('apakah anda yakin?')" class="btn btn-danger btn-xs" href="<?=site_url('user/delete/') ?>">
                                                <i class="fas fa-trash"> delete</i>  
                                          </button>
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