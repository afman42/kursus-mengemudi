<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php alamat_website() ?>/assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php alamat_website() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('admin/index');?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_kursus');?>" class="nav-link">
              <i class="nav-icon fas fa-archway"></i>
              <p>Data Kursus</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_member');?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Member</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_paket');?>" class="nav-link">
              <i class="nav-icon fas fa-first-aid"></i>
              <p>Data Paket</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_mobil');?>" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>Data Mobil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_instruktur');?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Data Instruktur</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/data_buku_tamu');?>" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Data Buku Tamu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/ubah_data');?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Ubah Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href<?php echo site_url('loginadmin/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>