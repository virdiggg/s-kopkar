<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Pembayaran detail</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Detaill data</h3>
                  <div class="text-right">
                   
                  <a href="<?=site_url('pinjaman_saya/tampil_data_saya') ?>" class="btn btn-primary">
                        <i class="fas fa-undo"> Kembali</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No</th>	      				
                <th>No Pinjaman</th>
                <th>No Pembayaran</th>
                <th>Status</th>
	      				<th>Transaksi</th>
                <th>Angsuran</th>               
	      				<th>Shu/bln</th>	      				
	      				
      			</thead>
      			<tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
      			<tr>
                             <td><?=$no++?></td>                            
                             <td><?=$data->no_pinjaman?></td>             
                             <td><?=$data->no_pembayaran?></td>             
                             <td><?=$data->status_pinjaman?></td>             
                             <td><?=$data->transaksi?></td>             
                             <td><?=number_format($data->besar_angsuran,0)?></td>                    
                             <td><?=number_format($data->shu_bln,0)?></td>                    
                                    
                        </tr>
                        <?php } ?>
      			</tbody>
      		</table>
      	</div>

      </div>
</section>
   