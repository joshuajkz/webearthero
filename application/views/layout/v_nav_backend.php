<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin') ?>" class="brand-link">
    <img src="<?= base_url() ?>assets\gambar\logoeh2.png" alt="Logo Earthero" class="brand-image">
    <span class="brand-text font-weight-light"><b>Earthero</b> Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/webearthero/assets/gambar/testi3.jpeg" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('nama_user') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2)=="") {
                                                                echo "active";
                                                              } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'kategori') {
                                                                  echo "active";
                                                                } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p> Kategori </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('produk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'produk') {
                                                                echo "active";
                                                              } ?>">
            <i class="nav-icon fas fa-box"></i>
            <p> Produk </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('gambarproduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'gambarproduk') {
                                                                      echo "active";
                                                                    } ?>">
            <i class="nav-icon fas fa-images"></i>
            <p> Gambar Produk </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pesanan_masuk' and $this->uri->segment(1)=='admin') {
                                                                      echo "active";
                                                                    } ?>">
            <i class="nav-icon fas fa-download"></i>
            <p> Pesanan Masuk </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') {
                                                              echo "active";
                                                            } ?>">
            <i class="nav-icon fas fa-users"></i>
            <p> User </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'setting') {
                                                                        echo "active";
                                                                      } ?>">
            <i class="nav-icon fa fa-wrench"></i>
            <p> Setting </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('auth/logout_user') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign"></i>
            <p> Log Out </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">