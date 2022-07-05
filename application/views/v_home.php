<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slide (1).jpg" style="width: 100vw; height: 55vh; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slide (2).jpg" style="width: 100vw; height: 55vh; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slide (3).jpg" style="width: 100vw; height: 55vh; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slide (4).jpg" style="width: 100vw; height: 55vh; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slide (5).jpg" style="width: 100vw; height: 55vh; object-fit: cover;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <br>
  <h1 style="font-style: italic; font-weight: bold;">Little Step Matters</h1>
  <p style="text-align: justify;">Earthero adalah platform edukasi&nbsp; hidup berkelanjutan/ sustainable living sekaligus menyediakan produk ramah lingkungan yg affordable di Indonesia. Kami memiliki visi untuk memberikan edukasi hidup berkelanjutan/ sustainable yang realistis dan praktis serta edukasi lingkungan yang mudah dicerna untuk kaum awam.<br></p>
  <a href="/webearthero/f-frontend/Our Story.html"><button class="btn" type="button" style="background: #368b85; color: white;"> Selengkapnya</button></a>  
  <br>
  <br>
</div>

<div class="container">
  <div class="card card-solid">
    <div class="card-body pb-0">
      <h1 style="text-align: center; font-weight: bold;">Best Selling Products</h1>
      <br>
      <div class="row">
        <?php foreach ($produk as $key => $value) { ?>
          <div class="col-sm-3">
            <?php
            echo form_open('belanja/add');
            echo form_hidden('id', $value->id_produk);
            echo form_hidden('qty', 1);
            echo form_hidden('price', $value->harga);
            echo form_hidden('name', $value->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>

            <div class="card">
              <!-- <div class="card-header text-center">
              <h2 class="lead"><b><?= $value->nama_produk ?></b></h2>
              <p class="text-sm"><b>Kategori : </b><?= $value->nama_kategori ?></p>
            </div> -->
              <div class="card-body p-2">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="" class="img-fluid" width="500px">
                  </div>
                </div>
              </div>
              <div class="card-footer" style="text-align: center; background-color: #FDFFE7;">
                <h4><?= $value->nama_produk ?></h4>
                <h3 style="font-weight: bold;">Rp<?= number_format($value->harga, 0, ",", ".") ?></h3>
                <div class="text-center">
                  <a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>" class="btn btn-sm btn-dark ">
                    <i class="fas fa-eye"></i>
                  </a>
                  <button type="submit" class="btn btn-sm swalDefaultSuccess" style="background: #368b85; color: white;">
                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang</button>
                </div>
              </div>
            </div>
            <?php echo form_close();
            ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<br> <br>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1><strong>Check Our Easy &amp; Realistic Sustainability Tips!</strong></h1><br>
      <a href="/webearthero/d-frontend/learnwithus.html"><button class="btn btn-primary" type="button" style="background: #368b85;">Selengkapnya</button></a>
    </div>
    <div class="col-sm-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card"><img class="card-img w-100 d-block" src="/webearthero/f-frontend/assets/img/condi%20BON%20june%202021%20(9).jpg" style="width: 100vw; height: 25vh; object-fit: cover; opacity:0.5;">
            <div class="card-img-overlay">
              <h4 style="font-weight:bold;">How Does Recycling Help The Environment?</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card"><img class="card-img w-100 d-block" src="/webearthero/f-frontend/assets/img/pexels-karolina-grabowska-4239146.jpg" style="width: 100vw; height: 25vh; object-fit: cover; opacity:0.5;">
            <div class="card-img-overlay">
              <h4 style="font-weight:bold;">Could Humans Really Destroy All Life On Earth?</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br> <br>
<div class="container">
  <h1 class="text-center"><strong>Contact Us</strong></h1>
  <br>
  <div class="row" style="column-gap:50px;">
    <div class="col" style="padding:20px; border-style:solid;">
      <a href="https://wa.me/6287784069238"><img class="mx-auto d-block" src="/webearthero/f-frontend/assets/img/Whatsapp%20icon.png" style="width: 100px;"></a>
      <br>
      <h3 class="text-center" style="font-weight: bold;">WhatsApp</h3>
    </div>
    <div class="col" style="padding:20px; border-style:solid;">
      <a href="mailto:eartheroid@gmail.com"><img class="mx-auto d-block" src="/webearthero/f-frontend/assets/img/email%20icon.png" style="width: 100px;"></a>
      <br>
      <h3 class="text-center" style="font-weight: bold;">E-Mail</h3>
    </div>
    <div class="col" style="padding:20px; border-style:solid;">
      <a href="https://instagram.com/earthero.id"><img class="mx-auto d-block" src="/webearthero/f-frontend/assets/img/instagram%20icon.png" style="width: 100px;"></a>
      <br>
      <h3 class="text-center" style="font-weight: bold;">Instagram</h3>
    </div>
  </div>
</div>
<br><br>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Produk berhasil ditambahkan ke Keranjang'
      })
    });
  });
</script>