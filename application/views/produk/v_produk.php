<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Produk</h3>

                <div class="card-tools">
                  <a href="<?= base_url('produk/add')?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add</a>
                </div>
                <!-- /.card-tools -->
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
                <table class="table table-bordered" id="example1">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                    <tr class="text-center">
                      <td><?= $no++; ?></td>
                      <td><?= $value->nama_produk ?></td>
                      <td><?= $value->nama_kategori ?></td>
                      <td>Rp<?= number_format($value->harga,0) ?></td>
                      <td><img src="<?= base_url('assets/gambar/'.$value->gambar)?>" width="150px"></td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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