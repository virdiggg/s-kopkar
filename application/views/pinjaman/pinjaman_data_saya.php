<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Pinjaman Saya</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Pinjaman Saya</h3>
                		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No Pinjaman</th>
	      				<th>Jenis Pinjaman</th>
	      				<th>Jumlah Pinjaman</th>
                <th>Kewajiban</th>               
                <th>Kewajiban/bln</th>                
                <th>lm_angs</th>                
                <th>Sisa_ang</th>               
                <th>Masuk_ang</th>                
	      				<th>Sisa kwjb</th>	      				
	      				<th>Action</th>
      			</thead>
      			<tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
      			<tr>
                             <td><?=$data->no_pinjaman?></td>          
                             <td><?=$data->status_pinjaman?></td>          
                             <td><?=number_format($data->jumlah_pinjaman,0)?></td>          
                             <td><?=number_format($data->total_angsuran,0)?></td>          
                             <td><?=number_format($data->besar_angsuran,0)?></td>          
                             <td><?=$data->lama_angsuran?></td>          
                             <td><?=$data->sisa_angsuran_bln?></td>          
                             <td><?=number_format($data->masuk_angsuran,0)?></td>          
                             <td><?=number_format($data->sisa_angsuran,0)?></td>          
                                  
                             <td>
                             
                              <a class="btn btn-info btn-xs" href="<?=site_url('pinjaman_saya/tampil_data_saya_detail/'.$data->no_pinjaman) ?>">
                                                <i class="fas fa-pencil-alt"> Detail</i>     
                                          </a>
                             </td>          
                        </tr>
                        <?php } ?>
      			</tbody>
      		</table>
      	</div>

      </div>
</section>
   