<!-- Top Header -->
<div class="container-fluid" style="background-color : #C2FFD9">
  <div class="container">
    <div class="row">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="/webearthero/d-frontend/faqreal.html" style="color: black;">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/d-frontend/petasetorsampah.html" style="color: black;">Peta Setor Sampah</a></li>
      </ul>
      <ul class="navbar-nav navbar-no-expand ml-auto float-right">
        <li class="nav-item-dropdown">
          <?php
          if ($this->session->userdata('email') == "") { ?>
            <a class="nav-link" href="<?= base_url('pelanggan/login') ?>" style="color: black;">
              <span class="brand-text font-weight-light" style="color: black;">Login/Register</span>
              <i class="fas fa-sign-in-alt"></i>
            </a>
          <?php } else { ?>
            <a class="nav-link" data-toggle="dropdown" href="#" style="color: black;">
              <span class="brand-text font-weight-light">Hi, <?= $this->session->userdata('nama_pelanggan') ?>!</span>
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Akun Saya
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                <i class="fas fa-receipt mr-2"></i></i> Pesanan Saya
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer" style="color: black;">Log Out</a>
            </div>
          <?php } ?>
        </li>
        <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
          $jml_item = $jml_item + $value['qty'];
        }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" style="color: black;">
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
                      <p class="text-sm"><?= $value['qty'] ?> x Rp<?= number_format($value['price'], 0, ",", ".") ?></p>
                      <p class="text-sm text-muted"><i class="fa fa-money-bill-wave mr-1"></i>Rp<?= number_format($value['subtotal'], 0, ",", "."); ?></p>
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
                      <td class="right">Rp<?= number_format($this->cart->total(), 0, ",", "."); ?></td>
                    </tr>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">Lihat Keranjang</a>
              <a href="<?= base_url('belanja/checkout') ?>" class="dropdown-item dropdown-footer">Checkout</a>
            <?php  } ?>
          </div>
      </ul>
    </div>
    <div>
      <a href="<?= base_url() ?>">
        <img class="mx-auto d-block" src="http://localhost/webearthero/assets/gambar/logoeh2.png" style="width: 100px;">
      </a>
      <form class="form-inline">
        <div class="input-group input-group-sm mx-auto">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border-radius: 10px;">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Navbar -->
    <nav>
      <ul class="nav nav-tabs justify-content-center pb-3 pt-2" style="border-style: none">
        <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>" style="border-radius: 20px;">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/f-frontend/Our Story.html" style="color: black;">Our Story</a></li>
        <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color: black;">Eco Shop</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <?php foreach ($kategori as $key => $value) { ?>
              <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?> </a></li>
            <?php } ?>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/d-frontend/learnwithus.html" style="color: black;">Learn with Us</a></li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/d-frontend/testimony.html" style="color: black;" >Testimony</a></li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/d-frontend/littleaction.html" style="color: black;">Little Actions</a></li>
        <li class="nav-item"><a class="nav-link" href="/webearthero/f-frontend/reach us.html" style="color: black;">Reach Us</a></li>
      </ul>
    </nav>
    <!-- /.navbar -->
  </div>
</div>

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
    <div class="container-fluid">