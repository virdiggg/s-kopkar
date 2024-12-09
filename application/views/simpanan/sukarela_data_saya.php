<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Simpanan Saya</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title">Simpanan Saya</h3>
                   		
      	</div>
        <div class="card-body table-responsive">
        <table class="table table-striped">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?=$row->nama?></td>
        </tr>
        </table>
        </div>
        <div class="card-body table-responsive">
        <table class="table table-striped">        
        <tr>
        <td>No tabungan</td>
        <td>Jumlah</td>        
        <td>Action</td>        
        </tr>
        <tr>
        <td><?=$row->no_tab_sukarela?></td>
        <td><?=number_format($row->jumlah,0)?></td>
        <td><a class="btn btn-info btn-xs" href="<?=site_url('simpanan_sukarela_saya/tampil_data_saya_detail_sukarela/'.$row->koperasi_id)?>">
                                                <i class="fas fa-pencil-alt"> Detail</i>     
                                          </a></td>         
        </tr>
         <tr>
            
        </tr>
        <tr>
        <td><?=$row->no_tab_wajib?></td>
        <td><?=number_format($row->jml_wajib,0)?></td> 
        <td><a class="btn btn-info btn-xs" href="<?=site_url('simpanan_sukarela_saya/tampil_data_saya_detail_wajib/'.$row->koperasi_id)?>">
                                                <i class="fas fa-pencil-alt"> Detail</i>     
                                          </a></td>        
        </tr>
         <tr>
               
        </tr>
        <tr>
        <td><?=$row->no_tab_pokok?></td>
        <td><?=number_format($row->jml_pokok,0)?></td> 
        <td><a class="btn btn-info btn-xs" href="<?=site_url('simpanan_sukarela_saya/tampil_data_saya_detail_pokok/'.$row->koperasi_id)?>">
                                                <i class="fas fa-pencil-alt"> Detail</i>     
                                          </a></td>      
        </tr>  
        </table>
        </div>
      	

      </div>
</section>
   