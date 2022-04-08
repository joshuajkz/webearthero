<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="<?= base_url() ?>" class="navbar-brand">
      <i class="fas fa-store text-primary"></i>
      <span class="brand-text font-weight-light"><b>Earthero</b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contact</a>
        </li>
        <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <?php foreach ($kategori as $key => $value) { ?>
              <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?> </a></li>
            <?php } ?>


          </ul>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Some action </a></li>
            <li><a href="#" class="dropdown-item">Some other action</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="brand-text font-weight-light">Pelanggan</span>
          <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <?php
      $keranjang = $this->cart->contents();
      $jml_item = 0;
      foreach ($keranjang as $key => $value) {
        $jml_item = $jml_item + $value['qty'];
      }
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          if (empty($keranjang)) { ?>
            <a href="#" class="dropdown-item">
              <p>Keranjang Belanja Kosong</p>
            </a>
            <?php } else {

            foreach ($keranjang as $key => $value) {
              $produk = $this->m_home->detail_produk($value['id']);
            ?>
              <!-- Keranjang -->
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" class="img-size-50 mr-3" alt="Product Image">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <b><?= $value['name'] ?></b>
                    </h3>
                    <p class="text-sm"><?= $value['qty'] ?> x Rp<?= number_format($value['price'], 0,",",".") ?></p>
                    <p class="text-sm text-muted"><i class="fa fa-money-bill-wave mr-1"></i>Rp<?= number_format($value['subtotal'], 0,",","."); ?></p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
            <?php } ?>
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>TOTAL : </strong></td>
                    <td class="right">Rp<?= number_format($this->cart->total(), 0,",","."); ?></td>
                  </tr>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">Lihat Keranjang</a>
            <a href="#" class="dropdown-item dropdown-footer">Checkout</a>
          <?php  } ?>

          <!-- Keranjang -->
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Earthero</a></li>
            <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">