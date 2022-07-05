<div class="container card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">

            <?php foreach ($produk as $key => $value) { ?>

                <div class="col-sm-4">
                    <div class="card">
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
                </div>
            <?php } ?>
        </div>
    </div>
</div>