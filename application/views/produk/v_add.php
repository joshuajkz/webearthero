<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Add Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open_multipart('produk/add') ?>
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" placeholder="Nama Produk" value="<?= set_value('nama_produk') ?>">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Harga Produk" value="<?= set_value('harga') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk" rows="5"><?= set_value('deskripsi') ?></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <div class="form-group">
                <a href="<?= base_url('produk') ?>" class="btn btn-warning btn-sm">Kembali</a>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>