<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-map-marker"></i> Alamat Pengiriman
                <small class="float-right">Date: 2/10/2014</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <address>
                <strong>Admin, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NAMA PRODUK</th>
                        <th>BERAT</th>
                        <th>HARGA</th>
                        <th class="col-sm-1">JUMLAH</th>
                        <th>SUB-TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php
                    $total_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $produk = $this->m_home->detail_produk($items['id']);
                        $berat = $items['qty'] * $produk->berat;
                        $total_berat += $total_berat + $berat;
                    ?>
                        <tr>
                            <td><?php echo $items['name']; ?></td>
                            <td><?= $berat ?> g</td>
                            <td>Rp<?php echo number_format($items['price'], 0, ",", "."); ?></td>
                            <td>
                                <?php echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty']
                                ));
                                ?>
                            </td>
                            <td>Rp<?php echo number_format($items['subtotal'], 0, ",", "."); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-7">
            Tujuan
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="ekspedisi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" class="form-control"></select>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-5">
            <div class="table-responsive">
                <table class="table">
                    <tr">
                        <th style="width:50%">AKUMULASI HARGA</th>
                        <td>Rp<?php echo number_format($this->cart->total(), 0, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <th>TOTAL BERAT</th>
                            <td><?= $total_berat ?> g</td>
                        </tr>
                        <tr>
                            <th>ONGKOS KIRIM</th>
                            <td><label>0</label></td>
                        </tr>
                        <tr class="bg-success">
                            <th>TOTAL PEMBAYARAN</th>
                            <td><label>0</label></td>
                        </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row no-print">
        <div class="col-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"></i> Kembali</a>
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Proses Checkout
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //masukkan data ke select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //masukkan data ke select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
    });
</script>