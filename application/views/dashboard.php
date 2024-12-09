<!-- Content Header (Page header) -->
<!-- <section class="content-header">
     
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-tachometer-alt mr-1"></i></a></li>
      <li class="active">Kopkar</li>
      </ol>
</section> -->

    <!-- Main content -->
<section class="content" style="color:blue;">
<div style="padding:10px;">
	<h1>Selamat Datang <?=$this->fungsi->user_login()->nama ?></h1>
    <h2>Koperasi Karyawan</h2>
    <h3>Lotte Grosir Pasar Rebo</h3>
<div>
<hr>
<h4 style="color:green;">Simpanan</h4>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $total_pokok = $this->fungsi->total_pokok();
                if ($total_pokok && isset($total_pokok->jumlah)) {
                  echo '<h3>' . number_format($total_pokok->jumlah, 0) . '</h3>';
                } else {
                echo '<h3>0</h3>'; // atau tindakan yang sesuai jika nilai null
              }
              ?>
                <p>Pokok</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-usd""></i>
              </div>
              <a href="simpanan_pokok/tampil_data" class="small-box-footer">Info lainnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $total_wajib = $this->fungsi->total_wajib();
                if ($total_wajib && isset($total_wajib->jumlah)) {
                  echo '<h3>' . number_format($total_wajib->jumlah, 0) . '</h3>';
                } else {
                echo '<h3>0</h3>'; // atau tindakan yang sesuai jika nilai null
              }
              ?>

                <p>Wajib</p>
              </div>
              <div class="icon">
                <i class="fas fa-search-dollar"></i>
              </div>
              <a href="simpanan_wajib/tampil_data" class="small-box-footer">Info lainnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $total_sukarela = $this->fungsi->total_sukarela();
                if ($total_sukarela && isset($total_sukarela->jumlah)) {
                  echo '<h3>' . number_format($total_sukarela->jumlah, 0) . '</h3>';
                } else {
                echo '<h3>0</h3>'; // atau tindakan yang sesuai jika nilai null
              }
              ?>

                <p>Sukarela</p>
              </div>
              <div class="icon">           
                <i class="fas fa-coins"></i>
              </div>
              <a href="simpanan_sukarela/tampil_data" class="small-box-footer">Info lainnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row --> 
        <!-- Baris Pinjaman-->
        <h4 style="color:green;">Pinjaman</h4>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=number_format($this->fungsi->total_pinjaman_hardloan()->sisa_angsuran,0)?></h3>

                <p>Hardloan</p>
              </div>
              <div class="icon">            
                <i class="fas fa-wallet"></i>
              </div>
              <a href="aktivitas/tampil_data_pinjaman" class="small-box-footer">Info lainnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= number_format($this->fungsi->total_pinjaman_softloan()->sisa_angsuran ?? 0, 0) ?></h3>

                <p>Sofloan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="aktivitas/tampil_data_pinjaman" class="small-box-footer">Info lainnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->    
        </div>

        <!-- /.row --> 
               
        </div>
</section>
    <!-- /.content -->
