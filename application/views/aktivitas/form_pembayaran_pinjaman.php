<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Pembayaran Pinjaman</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Pembayaran</h3>
                  <div class="text-right">
                  <a href="<?=site_url('aktivitas/tampil_data_pinjaman') ?>" class="btn btn-warning">
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
                              <input type="text" name="no_pinjaman" class="form-control" value="<?=$row->no_pinjaman?>" readonly>                      
                              <input type="hidden" name="koperasi_id" class="form-control" value="<?=$row->koperasi_id?>" readonly>
                              <input type="text" name="shu_bln" class="form-control" value="<?=$row->shu_bln?>" readonly>
                              <input type="hidden" name="status_pinjaman" class="form-control" value="<?=$row->status_pinjaman?>" readonly>
                              </div>
                              <div class="form-group">
                              <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?=$row->nama?>" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="hidden" name="qty" value="1">
                                  <input type="text" name="jumlah" value="<?=$row->besar_angsuran?>" class="form-control" readonly>  
                              </div>
                              <div class="form-group">
                                  <label>Aksi</label>
                                  <select name="aksi" class="form-control" required>
                                    
                                    <option value="Bayar">Bayar</option>
                                    <option value="Koreksi">Koreksi</option>
                                  </select> 
                              </div>
                              <div class="form-group">
                                  <label>Transaksi</label>
                                  <select name="transaksi" class="form-control" required>
                                    
                                    <option value="Payroll">Payroll</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                  </select> 
                              </div>
                              <div class="form-group">
                                  <label>No Kwitansi</label>
                                  <input type="number" name="no_kwitansi" class="form-control" required autocomplete="off">  
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