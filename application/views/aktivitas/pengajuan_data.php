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
                  <h3 class="card-title">Pengajuan Pinjaman</h3>
                  <div class="text-right">
                   <a href="" class="btn btn-warning">
                        <i class="fas fa-hand-holding-usd"> Total Pengajuan : Rp. <?=number_format($this->fungsi->total_pengajuan()->jumlah_pinjaman ?? 0,0)?> </i>                      
                  </a>
                  </div>            
            </div>
            <div class="card-body table-responsive">
                  <table class="table table-striped" id="table1">
                        <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Pinjaman</th>
                                    <th>Status Pinjaman</th>
                                    <th>Lama Angsuran</th>
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
                             <td><?=$data->no_pinjaman?></td>          
                             <td><?=$data->jenis_pinjaman?></td>          
                             <td><?=$data->lama_angsuran?></td>          
                             <td><?=number_format($data->jumlah_pinjaman,0)?></td>          
                             <td>
                             <a class="btn btn-info btn-xs" href="<?=site_url('aktivitas/cek_pinjaman/'.$data->pengajuan_id) ?>">
                                                <i class="fas fa-pencil-alt"> Cek</i>     
                              </a>
                              <a class="btn btn-info btn-xs" href="<?=site_url('aktivitas/cek_pinjaman_historical/'.$data->koperasi_id) ?>">
                                                <i class="far fa-eye"> Detail</i>     
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
   