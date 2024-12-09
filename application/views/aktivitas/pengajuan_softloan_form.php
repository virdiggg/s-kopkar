<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Pengajuan Pinjaman</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Softloan</h3>
                  <div class="text-right">
                  <a href="<?=site_url('') ?>" class="btn btn-warning">
                        <i class="fas fa-undo"> Back</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-md-4">
      			
      				<form action="<?=site_url('aktivitas/pengajuan_softloan_proses')?>" method="post">
                             <div class="form-group">
                              <label>Date *</label>
                                    <input type="date" name="tgl_pengajuan" value="<?=date('Y-m-d')?>" class="form-control" required>
                              </div>
                              <div>
                                    <label for="barcode">Nama *</label>
                              </div>
                              <div class="form-group input-group">
                                   
                                    <input type="text" name="nama" id="nama" class="form-control" required readonly>
                                    <span class="input-group-btn">
                                          <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                          <i class="fa fa-search"></i>
                                          </button>                                        
                                    </span>
                              </div>
                               <div class="form-group">
                               <label>Koperasi ID</label>
                                    <input type="text" name="koperasi_id" id="koperasi_id" class="form-control" readonly>
                              </div>
                              <div class="form-group">
                               <label>Jumlah ( Max Rp 500.000 )</label>
                                    <input type="number" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" required>
                              </div>
                               <div class="form-group">
                               <label>Status</label>
                                    <input type="text" name="jenis_pinjaman" class="form-control" value="SOFTLOAN" readonly>
                                    <input type="hidden" name="status_pengajuan" class="form-control" value="MENUNGGU">
                              </div>
                              <div class="form-group">
                              <label>Lama Angsuran ( Bulan )</label>
                                    <input type="text" name="lama_angsuran" class="form-control col-md-2" value="1" readonly>
                                    <input type="hidden" name="diajukan" value="<?= $this->fungsi->user_login()->koperasi_id ?>">
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
     <!-- Modal -->
    <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive">                  
             <table class="table table-bordered table-striped" id="table1">
                              <thead>
                                    <tr>
                                          <th>Koperasi ID</th>
                                          <th>Nama</th>                    
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php foreach($row as $i => $data) { ?>
                                    <tr>
                                         
                                        <td><?=$data->koperasi_id?></td>  
                                        <td><?=$data->nama?></td> 
                                        <td class="text-center">     
                                        <button class="btn btn-xs btn-info" id="select"
                                          data-nama="<?=$data->nama?>"
                                          data-koperasi_id="<?=$data->koperasi_id?>"                          
                                          >
                                                <i class="fa fa-check"> Pilih</i>
                                        </button>
                                        </td> 
                                    </tr>
                              <?php } ?>
                              </tbody>
            </table>
            </div>
              
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
            $(document).ready(function(){
                  $(document).on('click','#select',function(){
                        var koperasi_id = $(this).data('koperasi_id');
                        var nama = $(this).data('nama');
                      
                        $('#koperasi_id').val(koperasi_id);
                        $('#nama').val(nama);                       
                        $('#modal-item').modal('hide');
                  })
            })
      </script>