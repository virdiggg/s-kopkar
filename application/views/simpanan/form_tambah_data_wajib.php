<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Simpanan Wajib</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Tambah Data</h3>
                  <div class="text-right">
                  <a href="<?=site_url('simpanan_wajib/tampil_data') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="" method="post">
                              
      				<div class="form-group <?= form_error('koperasi_id') ? 'text-danger' : null;?>">
      					<label>Koperasi ID*</label>
                                    <input type="hidden" name="pengurus" value="<?= $this->fungsi->user_login()->koperasi_id ?>">
      						<input type="text" name="koperasi_id" value="<?=set_value('koperasi_id'); ?>" class="form-control" autofocus>
      						<?= form_error('koperasi_id'); ?>
      					      					
      				</div>
      				<div class="form-group <?= form_error('simpanan_wajib') ? 'text-danger' : null; ?>">
      					<label>Simpanan wajib *</label> 
      						<input type="number" name="simpanan_wajib" value="<?=set_value('simpanan_wajib'); ?>" class="form-control">
      						<?= form_error('simpanan_wajib'); ?>
      					     					
      				</div>
      				
      				
      				<div clas="form-group">
      				<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
      				<button type="reset" class="btn btn-secondary"> Reset</button>
      				</div>     					
      				</form>
      				
      			</div>
      			
      		</div>
      	</div>

      </div>
</section>
    <!-- /.content -->