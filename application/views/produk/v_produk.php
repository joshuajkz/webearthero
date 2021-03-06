<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Produk</h3>

      <div class="card-tools">
        <a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus fa-sm"></i> Tambah Produk</a>
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
      <table class="table table-striped" id="example1">
        <thead class="text-center">
          <tr>
            <th>NO</th>
            <th>NAMA PRODUK</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>GAMBAR</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($produk as $key => $value) { ?>
            <tr class="text-center">
              <td><?= $no++; ?></td>
              <td>
                <?= $value->nama_produk ?> <br>
                Berat : <?= $value->berat ?> g
              </td>
              <td><?= $value->nama_kategori ?></td>
              <td>Rp<?= number_format($value->harga, 0) ?></td>
              <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
              <td>
                <a href="<?= base_url('produk/edit/' . $value->id_produk) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i> Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_produk ?>"><i class="fa fa-trash"></i> Delete</button>
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

<!--modal delete -->
<?php foreach ($produk as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_produk?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->nama_produk?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <h5>Ingin hapus data ini?</h5>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('produk/delete/'.$value->id_produk) ?>" class="btn btn-primary">Delete</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>