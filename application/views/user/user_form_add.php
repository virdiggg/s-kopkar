<!-- Content Header (Page header) -->
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
      		<h3 class="card-title">Tambah Anggota</h3>
                  <div class="text-right">
                  <a href="<?=site_url('user') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="" method="post">
                              <div class="form-group <?= form_error('koperasi_id') ? 'text-danger' : null; ?>">
                                    <label>Koperasi ID *</label> 
                                          <input type="number" name="koperasi_id" value="<?=set_value('koperasi_id'); ?>" class="form-control">
                                          <?= form_error('koperasi_id'); ?>
                                                                  
                              </div>
      				<div class="form-group <?= form_error('nama') ? 'text-danger' : null;?>">
      					<label>Nama *</label>
      						<input type="text" name="nama" value="<?=set_value('nama'); ?>" class="form-control">
      						<?= form_error('nama'); ?>
      					      					
      				</div>
                              <div class="form-group <?= form_error('tgl_lahir') ? 'text-danger' : null;?>">
                                    <label>Tanggal Lahir *</label>
                                          <input type="date" name="tgl_lahir" value="<?=set_value('tgl_lahir'); ?>" class="form-control">
                                          <?= form_error('tgl_lahir'); ?>
                                                                        
                              </div>
      				<div class="form-group <?= form_error('alamat') ? 'text-danger' : null; ?>">
      					<label>Alamat </label> 
      						<textarea type="text" name="alamat" class="form-control"><?=set_value('alamat'); ?></textarea>

      					     					
      				</div>
                              <div class="form-group <?= form_error('tgl_gabung') ? 'text-danger' : null;?>">
                                    <label>Tanggal Bergabung *</label>
                                          <input type="date" name="tgl_gabung" value="<?=set_value('tgl_gabung'); ?>" class="form-control">
                                          
                                                                        
                              </div>
                              <div class="form-group <?= form_error('toko') ? 'text-danger' : null;?>">
                                    <label>Kode Toko</label>
                                         <select name="toko" class="form-control">
                                           <option value="">---</option>    
                                           <?php foreach($toko as $tk => $data) { ?>
                                           <option value="<?=$data->kode_toko?>"><?=$data->nama_toko?></option>
                                           <?php } ?>                       
                                         </select>
                                         <?= form_error('kode_toko'); ?>                                                                       
                              </div>
                              <div class="form-group <?= form_error('bank') ? 'text-danger' : null;?>">
                                    <label>Bank</label>
                                         <select name="bank" class="form-control">
                                           <option value="">---</option>    
                                               <?php foreach($bank as $bk => $data) { ?>
                                               <option value="<?=$data->bank?>"><?=$data->bank?></option>
                                               <?php } ?>                           
                                         </select>                                                                        
                              </div>
                              <div class="form-group <?= form_error('no_rek') ? 'text-danger' : null; ?>">
                                    <label>No Rekening </label> 
                                          <input type="number" name="no_rek" value="<?=set_value('no_rek'); ?>" class="form-control">
                                          
                                                                  
                              </div>
                              <div class="form-group <?= form_error('username') ? 'text-danger' : null; ?>">
                                    <label>User name *</label> 
                                          <input type="text" name="username" value="<?=set_value('username'); ?>" class="form-control">
                                          <?= form_error('username'); ?>
                                                                  
                              </div>
                              <div class="form-group <?= form_error('password') ? 'text-danger' : null; ?>">
                                    <label>Password *</label> 
                                          <input type="password" name="password" value="<?=set_value('password'); ?>" class="form-control">
                                          <?= form_error('password'); ?>
                                                                  
                              </div>
                              <div class="form-group <?=form_error('passconf') ? 'text-danger' : null; ?>">
                                    <label>Password Confirmation*</label>   
                                          <input type="password" name="passconf" class="form-control">
                                          <?= form_error('passconf'); ?>
                                                                  
                              </div>
      				<div class="form-group <?= form_error('level') ? 'text-danger' : null; ?>">
      					<label>Level *</label> 
      						<select name="level" class="form-control">
      						<option value="">---</option>
      						<option value="1" <?=set_value('level') == 1 ? "selected" : null; ?>>Pengurus</option>
      						<option value="2" <?=set_value('level') == 2 ? "selected" : null; ?>>Anggota</option>     							
      						</select>
      						<?= form_error('level'); ?>    					     					
      				</div>
      				
      				<div clas="form-group">
      				<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
      				<button type="Reset" class="btn btn-secondary"> Reset</button>
      				</div>     					
      				</form>
      				
      			</div>
      			
      		</div>
      	</div>

      </div>
</section>
    <!-- /.content -->