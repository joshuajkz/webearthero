<div class="col-12 col-m-12">
  <?php

  if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
    echo $this->session->flashdata('pesan');
    echo '</h5></div>';
  }
  ?>
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Semua Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Sedang Diproses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dalam Pengiriman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Pesanan Selesai</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-four-tabContent">
        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
          <table class="table">
            <tr>
              <th>No. Order</th>
              <th>Tanggal</th>
              <th>Ekspedisi</th>
              <th>Total Bayar</th>
              <th>Action</th>
            </tr>
            <?php foreach ($belum_bayar as $key => $value) { ?>
              <tr>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tgl_order ?></td>
                <td>
                  <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                  Ongkir: <?= $value->ongkir ?>
                </td>
                <td>
                  <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b><br>
                  <?php if ($value->status_bayar == 0) { ?>
                    <span class="badge badge-warning">Belum Bayar</span>
                  <?php } else { ?>
                    <span class="badge badge-success">Sudah Bayar</span> <br>
                    <span class="badge badge-secondary">Menunggu Verifikasi</span>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($value->status_bayar == 0) { ?>
                    <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-warning">Bayar</a>
                  <?php } else { ?>
                    <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-info">Lacak Pesanan</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>

          </table>
        </div>
        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
          <table class="table">
            <tr>
              <th>No. Order</th>
              <th>Tanggal</th>
              <th>Ekspedisi</th>
              <th>Total Bayar</th>
            </tr>
            <?php foreach ($diproses as $key => $value) { ?>
              <tr>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tgl_order ?></td>
                <td>
                  <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                  Ongkir: <?= $value->ongkir ?>
                </td>
                <td>
                  <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b> <br>
                  <span class="badge badge-success">Pembayaran Terverifikasi</span>
                  <span class="badge badge-secondary">Sedang Dikemas</span>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
          <table class="table">
            <tr>
              <th>No. Order</th>
              <th>Tanggal</th>
              <th>Ekspedisi</th>
              <th>Total Bayar</th>
              <th>No Resi</th>
            </tr>
            <?php foreach ($dikirim as $key => $value) { ?>
              <tr>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tgl_order ?></td>
                <td>
                  <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                  Ongkir: <?= $value->ongkir ?>
                </td>
                <td>
                  <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b> <br>
                  <span class="badge badge-success">Sedang Dikirim</span>
                </td>
                <td>
                  <h5>
                    <?= $value->no_resi ?> <br>
                    <button data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-primary btn-sm">Pesanan Diterima</button>
                  </h5>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
          <table class="table">
            <tr>
              <th>No. Order</th>
              <th>Tanggal</th>
              <th>Ekspedisi</th>
              <th>Total Bayar</th>
              <th>No Resi</th>
            </tr>
            <?php foreach ($selesai as $key => $value) { ?>
              <tr>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tgl_order ?></td>
                <td>
                  <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                  Ongkir: <?= $value->ongkir ?>
                </td>
                <td>
                  <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b> <br>
                  <span class="badge badge-success">Selesai</span>
                </td>
                <td>
                  <h5>
                    <?= $value->no_resi ?>
                  </h5>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
</div>

<?php foreach ($dikirim as $key => $value) { ?>
  <!-- modal selesai -->
  <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pesanan Diterima</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin pesanan sudah diterima?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>