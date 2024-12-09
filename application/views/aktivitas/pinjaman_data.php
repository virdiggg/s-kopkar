<!-- Content Header (Page header) -->
<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="nav-icon fas fa-hand-holding-usd mr-2"></i></a></li>
      <li class="active">Data Pinjaman</li>
      </ol>
</section>

    <!-- Main content -->
<section class="content">
      <div class="card">
            <div class="card-header">
                  <h3 class="card-title">Data Pinjaman</h3>
                  <div class="text-right">
                  <a target="_blank" href="<?=site_url('aktivitas/aktivitas_pinjaman_print') ?>" class="btn btn-default">
                        <i class="fas fa-print"> Print </i>                      
                  </a>
                   <a href="" class="btn btn-warning">
                        <i class="fas fa-hand-holding-usd"> Total Pinjaman : Rp. <?=number_format($this->fungsi->total_pinjaman()->sisa_angsuran ?? 0,0)?> </i>                      
                  </a>
                  </div>            
            </div>
            <div class="card-body table-responsive">
                  <table class="table table-striped" id="table1">
                        <thead>
                                    <th>Aksi</th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Pinjaman</th>
                                    <th>Status</th>
                                    <th>Jumlah Pinjaman</th>
                                    <th>Lama Angsuran</th>
                                    <th>Besar Angsuran</th>
                                    <th>Total Angsuran</th>                          
                                    <th>Masuk Angsuran</th>                          
                                    <th>Sisa Angsuran</th>                           
                                    <th>Sisa Bln</th>                             
                                    
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach ($row as $data){ ?>
                        <tr>
                        <td>
                               <a class="btn btn-info btn-xs" href="<?=site_url('aktivitas/pembayaran_pinjaman/'.$data->no_pinjaman) ?>">
                                                <i class="fas fa-pencil-alt"></i>     
                              </a>                              
                              </td> 
                             <td><?=$no++?></td>          
                             <td><?=$data->nama?></td>          
                             <td><?=$data->no_pinjaman?></td>          
                             <td><?=$data->status_pinjaman?></td>          
                             <td><?=number_format($data->jumlah_pinjaman,0)?></td>  
                             <td><?=$data->lama_angsuran?></td>          
                             <td><?=number_format($data->besar_angsuran,0)?></td>    
                             <td><?=number_format($data->total_angsuran,0)?></td>    
                             <td><?=number_format($data->masuk_angsuran,0)?></td>    
                             <td><?=number_format($data->sisa_angsuran,0)?></td>     
                             <td><?=$data->sisa_angsuran_bln?></td>          
                                    
                        </tr>
                        <?php } ?>
                        </tbody>
                  </table>
            </div>

      </div>
</section>
    <!-- /.content -->
   