<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kopkar</title>
  <link rel="shortcut icon" href="kopkar.png" type="image/x-icon">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     <!--  -->
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i><span class="ml-2 black"><?= $this->fungsi->user_login()->nama ?></span><span>/</span><span><?= $this->fungsi->user_login()->username ?></span><span>/</span><span><?=$this->fungsi->user_login()->kode_toko?></span>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= site_url('auth/logout') ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">            
              
              <div class="media-body">              
                <h3 class="dropdown-item-title">
                 Logout
                  <span class="float-right text-sm text-danger"><i class="fas fa-sign-out-alt"></i></span>
                </h3>
               
              </div>
            </div>
            <!-- Message End -->
          </a>
         
      </li>
      <!-- Notifications Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container =======================================-->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/kopkar.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Kopkar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->     

      <!-- Sidebar Menu -->
      <!-- Ini Di hide dulu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li class="nav-item <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'btn-light' : '' ?>">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>            
          </li>
           
          
          
        
<!--MENU Absensi di Nonaktifkan dulu-->
          <!--<li class="nav-header">KARYAWAN KOPERASI</li>
           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Absensi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">-->
              <!--<li class="nav-item">-->
                <!--<a href="<?=site_url('absen/cek_absen_karyawan')?>"" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>
                  <p>Cek Absen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('absen/data_absen')?>" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>
                  <p>Data Absen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('absen/gaji_karyawan')?>" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>
                  <p>Gaji Kayawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('absen/data_karyawan')?>" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>
                  <p>Data Kayawan</p>
                </a>
              </li>
            </ul>
          </li>          
          </li>-->
          <!--Batas menu absensi===============================-->

           <li class="nav-header">SIMPAN - PINJAM</li>
           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
               Simpanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('simpanan_pokok/tampil_data')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pokok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('simpanan_wajib/tampil_data')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wajib</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?=site_url('simpanan_sukarela/tampil_data')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sukarela</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-credit-card"></i>
              <p>
               Pinjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('aktivitas/tampil_data_pinjaman')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pinjaman</p>
                </a>
              </li>
              
            </ul>
          </li>         
          </li>

           <li class="nav-header">AKTIVITAS</li>
           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
               Simpanan Anggota
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('aktivitas/aktivitas_data')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Simpanan</p>
                </a>
              </li>             
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fab fa-btc"></i>
              <p>
               Pinjaman Anggota
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('aktivitas/pengajuan_softloan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Softloan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?=site_url('aktivitas/pengajuan_hardloan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Hardloan</p>
                </a>
              </li>
               <!--<li class="nav-item">
                <a href="<?=site_url('aktivitas/pengajuan_belanja')?>" <!--class="nav-link">-->
                  <!--<i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Belanja</p>
                </a>
              </li>-->
               <li class="nav-item">
                <a href="<?=site_url('aktivitas/tampil_data_pengajuan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('aktivitas/aktivitas_data_pembayaran')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembayaran</p>
                </a>
              </li>               
             
            </ul>
          </li>



          <!--<li class="nav-item">
            <a href="<?= site_url('') ?>" <!--class="nav-link">-->
              <!--<i class="nav-icon fas fa-paste"></i>
              <p>
                  Payroll               
              </p>
            </a>         
          </li>-->
          
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="<?=site_url('user') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Anggota</p>
            </a>
          </li>
          <?php } ?>

          <!-- Menu Anggota -->
          <?php if($this->fungsi->user_login()->level == 2) { ?>
              <li class="nav-item">
            <a href="<?= site_url('') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?=site_url('simpanan_sukarela_saya/tampil_data_saya')?>" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Simpanan Saya            
              </p>
            </a>            
          </li>
           <li class="nav-item">
            <a href="<?=site_url('pinjaman_saya/tampil_data_saya')?>" class="nav-link">
             <i class="nav-icon far fa-credit-card"></i>
             <p>
                Pinjaman Saya              
              </p>
            </a>            
          </li>
          <!-- FORM anggota -->
           <li class="nav-item">
            <a href="<?=site_url('aktivitas/pengajuan_softloan_saya')?>" class="nav-link">
             <i class="nav-icon far fa-circle nav-icon"></i>
             <p>
                Form Softloan              
              </p>
            </a>            
          </li>
           <li class="nav-item">
            <a href="<?=site_url('aktivitas/pengajuan_hardloan_saya')?>" class="nav-link">
             <i class="nav-icon far fa-circle nav-icon"></i>
             <p>
                Form Hardloan              
              </p>
            </a>            
          </li>
           <li class="nav-item">
            <a href="<?=site_url('aktivitas/pengajuan_elektronik_saya')?>" class="nav-link">
             <i class="nav-icon far fa-circle nav-icon"></i>
             <p>
                Form Elektronik              
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?=site_url('aktivitas/pengajuan_motor_saya')?>" class="nav-link">
             <i class="nav-icon far fa-circle nav-icon"></i>
             <p>
                Form Motor              
              </p>
            </a>            
          </li>
            <!--<li class="nav-item">
            <a href="<?= site_url('') ?>" class="nav-link">
             <!--<i class="nav-icon fas fa-id-card-alt"></i>
             <p>
                Profile               
              </p>
            </a>            
          </li>-->
          <?php } ?>
          <!-- Batas menu Anggota -->
          <!-- Menu Karyawan Kopkar -->
          <?php if($this->fungsi->user_login()->level == 3) { ?>
              <li class="nav-item">
            <a href="<?= site_url('absen') ?>" class="nav-link">
              <i class="far fa-clipboard"></i>
              <p>
               Absen
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?= site_url('absen/riwayat') ?>" class="nav-link">
              <i class="fas fa-history"></i>
              <p>
                Riwayat               
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?= site_url('') ?>" class="nav-link">
              <i class="fas fa-hand-holding-usd"></i>
              <p>
                Gaji               
              </p>
            </a>            
          </li>
          
            <li class="nav-item">
            <a href="<?= site_url('') ?>" class="nav-link">
             <i class="fas fa-id-card-alt"></i>
             <p>
                Profile               
              </p>
            </a>            
          </li>
          <?php } ?>
          <!-- Batas menu Karyawan kopkar -->
          <li class="nav-item">
            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout               
              </p>
            </a>
            
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $contents; ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2020.1
    </div>
    <strong>Copyright &copy; 2023 <a href="">Ridwan-Hakim</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
$(document).ready(function(){
  $('#table1').DataTable()
})
</script>
</body>
</html>

