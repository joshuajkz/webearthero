<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Gambar Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-striped" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>NAMA PRODUK</th>
                        <th>COVER</th>
                        <th>JUMLAH</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($gambarproduk as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_produk ?></td>
                            <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="200px"></td>
                            <td>
                            <h5><span class="badge bg-info"><?= $value->total_gambar ?> Gambar</span></h5>
                            </td>
                            <td>
                                <a href="<?= base_url('gambarproduk/add/'.$value->id_produk)?>" class="btn btn-success btn-sm"><i class="fas fa-plus fa-sm"></i> Tambah Gambar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>