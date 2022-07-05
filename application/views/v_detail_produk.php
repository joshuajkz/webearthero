<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row" style="position: sticky;">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" class="product-image img-fluid" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" alt="Product Image"></div>
                    <?php foreach ($gambar as $key => $value) { ?>
                        <div class="product-image-thumb"><img src="<?= base_url('assets/gambarproduk/' . $value->gambar) ?>" alt="Product Image"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h5 class="text-muted">Kategori : <?= $produk->nama_kategori ?></h5>
                <h3 class="my-3"><b><?= $produk->nama_produk ?></b></h3>
                <div class="bg-success py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        <b>Rp<?= number_format($produk->harga, 0, ",", ".") ?></b>
                    </h2>
                </div>
                <hr>
                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $produk->id_produk);
                echo form_hidden('price', $produk->harga);
                echo form_hidden('name', $produk->nama_produk);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="row">
                    <div class="col-sm-2">
                        <input type="number" name="qty" class="form-control text-center" value="1" min="1">
                    </div>
                    <div class="pe-2">
                        <button type="submit" class="btn btn-success btn-flat swalDefaultSuccess">
                            <i class="fas fa-cart-plus fa-lg"></i>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Spesifikasi</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?= $produk->deskripsi ?></div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
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