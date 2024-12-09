<section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="far fa-calendar-check mr-2"></i></i></a></li>
      <li class="active">Data Pembayaran</li>
      </ol>
</section>
<!-- /.row -->
<?php $this->view('messages') ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Aktivitas Pembayaran</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
           
              
             <!--  <div class="card">
              <form action="" method="post">
              <div class="form-group">
                <input name="tanggal_awal" type="date" value=""> s/d <input name="tanggal_akhir" type="date" value="">
                 <button type="submit" name="btnSubmit" class="btn btn-primary">Tampil</button>
                </div>
               
             </form>
            </div> -->
            <form action="" method="post">
          <div class="card-body">
          
          <div class="row">
             <div class="input-group input-group-sm col-6">              
                  <input type="date" name="tanggal_awal" value="<?=set_value('tanggal_awal')?>" class="form-control"><i class="mr-2 ml-2">s/d</i><input type="date" name="tanggal_akhir" class="form-control" value="<?=set_value('tanggal_akhir')?>">
                  <span class="input-group-append">
                    <button type="submit" name="btnSubmit" class="btn btn-info btn-flat">Tampilkan</button>
                  </span>                                 
                </div>
                 <span><a class="btn btn-default btn-xs text-right" href="<?=site_url('') ?>"><i class="fas fa-print"> Print</i></a></span>
             </div>    
          </div>
              </form>
               <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>No</th>                      
                      <th>No Pembayaran</th>                      
                      <th>No Pinjaman</th>                      
                      <th>Koperasi ID</th>                      
                      <th>Nama</th>                      
                      <th>Status Pinjaman</th>
                      <th>No Kwitansi</th>                     
                      <th>Transaksi</th>
                      <th>Besar Angsuran</th>                      
                      <th>Tanggal</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                 $no=1;
                 foreach($row as $data) { ?>
                    <tr>
                      <td><?=$no++?></td>                      
                      <td><?=$data->no_pembayaran?></td>                      
                      <td><?=$data->no_pinjaman?></td>            
                      <td><?=$data->koperasi_id?></td>            
                      <td><?=$data->nama?></td>            
                      <td><?=$data->status_pinjaman?></td>                    
                      <td><?=$data->no_kwitansi?></td>
                      <td><?=$data->transaksi?></td>
                      <td><?=number_format($data->besar_angsuran,0)?></td>                     
                      <td><?=$data->tanggal?></td>
                     
                    </tr>
                   <?php } ?> 
                  </tbody>
                </table>
               
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- Modal detail -->
         </form>