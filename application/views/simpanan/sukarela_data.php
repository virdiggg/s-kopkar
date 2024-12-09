<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Simpanan sukarela</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Simpanan sukarela</h3>
                  <div class="text-right">
                   <div class="text-right">
                  <a target="_blank" href="<?=site_url('simpanan_sukarela/simpanan_sukarela_print') ?>" class="btn btn-default">
                        <i class="fas fa-print"> Print </i>                      
                  </a>
                   <a href="" class="btn btn-warning">
                        <i class="fas fa-hand-holding-usd"> Total : Rp. <?=number_format($this->fungsi->total_sukarela()->jumlah ?? 0, 0)?> </i>                      
                  </a>
                  <a href="<?=site_url('simpanan_sukarela/tambah_data_sukarela') ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"> Tambah Data</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No</th>
	      				<th>Nama</th>
	      				<th>No Tabungan S_sukarela</th>
	      				<th>Jumlah</th>	      				
	      				<th>Action</th>
      			</thead>
      			<tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
      			<tr>
                             <td><?=$no++?></td>          
                             <td><?=$data->nama?></td>          
                             <td><?=$data->no_tab_sukarela?></td>          
                             <td><?=number_format($data->jumlah,0)?></td>          
                             <td>
                              <a id="set_dtl" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail" 
                                          data-koperasi_id="<?=$data->koperasi_id?>"
                                          data-jumlah="<?=$data->jumlah?>"
                                          data-ss_id="<?=$data->ss_id?>">
                                               <i class="fas fa-edit"> Ubah</i>     
                                          </a>
                              <a class="btn btn-info btn-xs" href="<?=site_url('simpanan_sukarela/kegiatan_tabungan/'.$data->ss_id) ?>">
                                                <i class="fas fa-pencil-alt"> Kegiatan</i>     
                                          </a>
                             </td>          
                        </tr>
                        <?php } ?>
      			</tbody>
      		</table>
      	</div>

      </div>
</section>
    <!-- /.content -->
    <!-- Modal detail -->
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Simpanan sukarela</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
          <div class="row">
            <div class="col-md">
            
              <form action="" method="post">
              <div class="form-group">
                    <label>SP ID</label>            
                    <input type="text" name="ss_id" id="ss_id" class="form-control" readonly>
              </div>
              <div class="form-group">
                    <label>Koperasi ID</label>            
                    <input type="text" name="koperasi_id" id="koperasi_id" class="form-control">
              </div>
               <div class="form-group">
                    <label>Jumlah</label>            
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
              </div>
              
              
              <div clas="form-group">
              <button type="submit" name="btn_edit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                          
              </form>
              
            </div>
            
          </div>
        </div>
              
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
            $(document).ready(function(){
                  $(document).on('click','#set_dtl',function(){
                        var koperasi_id = $(this).data('koperasi_id');
                        var jumlah = $(this).data('jumlah');
                        var ss_id = $(this).data('ss_id');                       
                       
                        $('#koperasi_id').val(koperasi_id);
                        $('#ss_id').val(ss_id);
                        $('#jumlah').val(jumlah);
                       
                        
                  })
            })
      </script>