<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Kegiatan Tabungan</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Kegiatan</h3>
                  <div class="text-right">
                  <a href="<?=site_url('simpanan_pokok/tampil_data') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="" method="post">
                              <div class="form-group ">
                              <input type="hidden" name="pengurus" value="<?= $this->fungsi->user_login()->koperasi_id ?>">
                              <input type="hidden" name="sp_id" class="form-control col-md-2" value="<?=$row->sp_id?>" readonly>                             
                              <input type="hidden" name="koperasi_id" class="form-control" value="<?=$row->koperasi_id?>" readonly>
                              </div>
                              <div class="form-group">
                              <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?=$row->nama?>" readonly>
                              </div>
                               <div class="form-group">
                               <label>Status</label>
                                    <input type="text" name="pokok" class="form-control" value="Pokok" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Aksi</label>
                                  <select name="aksi" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <option value="Masuk">Menabung</option>
                                    <option value="Keluar">Pengambilan Tabungan</option>
                                  </select> 
                              </div>
                              <div class="form-group">
                                  <label>Transaksi</label>
                                  <select name="transaksi" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Payroll">Payroll</option>
                                  </select> 
                              </div>
                              <div class="form-group">
                                  <label>No Kwitansi</label>
                                  <input type="number" name="no_kwitansi" class="form-control" required autocomplete="off">  
                              </div>
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="number" name="jumlah" class="form-control" required autocomplete="off">  
                              </div>
      				<div clas="form-group">
      				<button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
      				<button type="reset" class="btn btn-secondary"> Reset</button>
      				</div>     					
      				</form>
      				
      			</div>
      			
      		</div>
      	</div>

      </div>
</section>
    <!-- /.content -->