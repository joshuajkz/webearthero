<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nomor Rekening Earthero</h3>
                </div>
                <div class="card-body">
                    <p>Silakan lakukan pembayaran dengan transfer ke Nomor Rekening Earthero sebesar :</p><br>
                    <h1 class="text-primary">Rp<?= number_format($pesanan->total_bayar, 0, ",", ".") ?>,-</h1>
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening (a/n)</th>
                        </tr>
                        <?php foreach ($rekening as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_bank ?></td>
                                <td><?= $value->no_rek ?></td>
                                <td><?= $value->atas_nama ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upload Bukti Pembayaran</h3>
                </div>
                <?php
                echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Rekening</label>
                        <input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input name="no_rek" class="form-control" placeholder="Nomor Rekening" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                    <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-default float-left">Kembali</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>