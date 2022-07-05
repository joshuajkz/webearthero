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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
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
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
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
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
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
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                                    Ongkir: <?= $value->ongkir ?>
                                </td>
                                <td>
                                    <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b><br>
                                    <span class="badge badge-primary">Diproses</span>
                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"> Kirim Pesanan</button>
                                    <?php } ?>
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
                            <th>Nomor Resi</th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                                    Ongkir: <?= $value->ongkir ?>
                                </td>
                                <td>
                                    <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b><br>
                                    <span class="badge badge-info">Dikirim</span>
                                </td>
                                <td>
                                    <h4><?= $value->no_resi?></h4>
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
                            <th>Nomor Resi</th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <?= $value->ekspedisi ?> | <?= $value->paket ?> <br>
                                    Ongkir: <?= $value->ongkir ?>
                                </td>
                                <td>
                                    <b>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></b><br>
                                    <span class="badge badge-success">Diterima</span>
                                </td>
                                <td>
                                    <h4><?= $value->no_resi?></h4>
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

<!-- modal bukti pembayaran -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <b><?= $value->no_order ?></b>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <th><?= $value->nama_bank ?></th>
                        </tr>
                        <tr>
                            <th>Nomor Rekening</th>
                            <th>:</th>
                            <th><?= $value->no_rek ?></th>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <th><?= $value->atas_nama ?></th>
                        </tr>
                        <tr>
                            <th>Total Tagihan</th>
                            <th>:</th>
                            <th>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></th>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
                    <div class="modal-footer">
                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-success btn-block">Verifikasi Pesanan</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- modal kirim -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>

                    <table class="table">
                        <tr>
                            <th>Ekspedisi</th>
                            <th>:</th>
                            <th><?= $value->ekspedisi ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <th>Rp<?= number_format($value->total_bayar, 0, ",", ".") ?></th>
                        </tr>
                        <tr>
                            <th>Nomor Resi</th>
                            <th>:</th>
                            <th><input name="no_resi" placeholder="Nomor Resi" class="form-control"></th>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>