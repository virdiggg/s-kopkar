<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Simpanan Wajib detail</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Detaill data</h3>
                  <div class="text-right">
                   
                  <a href="<?=site_url('simpanan_sukarela_saya/tampil_data_saya') ?>" class="btn btn-primary">
                        <i class="fas fa-undo"> Kembali</i>                      
                  </a>
                        
                  </div>     		
      	</div>
      	<div class="card-body table-responsive">
      		<table class="table table-striped" id="table1">
      			<thead>
      					<th>No</th>
	      				<th>Nama</th>
                <th>kode kegiatan</th>
	      				<th>Status</th>
	      				<th>Jumlah</th>	      				
	      				
      			</thead>
      			<tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
      			<tr>
                             <td><?=$no++?></td>          
                             <td><?=$data->nama?></td>          
                             <td><?=$data->kode_kegiatan?></td>
                             <?php
                             if($data->aksi == "Keluar") { ?>
                             <td style="color:red"><?=$data->aksi?></td>
                             <?php } else {?>
                              <td style="color:blue"><?=$data->aksi?></td>
                             
                            <?php } ?>
                             <td><?=number_format($data->jumlah,0)?></td>                    
                                    
                        </tr>
                        <?php } ?>
      			</tbody>
      		</table>
      	</div>

      </div>
</section>
   