<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>INVOICE <b>#</b>
                <small class="float-right">Tanggal: 01/02/03</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <br>
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
            <div class="table-responsive">
                <table class="table table-responsive table-borderless">
                    <tr>
                        <th>Order ID</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Payment Due</th>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>Account</th>
                        <td>3</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr class="">
                        <th>NAMA PRODUK</th>
                        <th>BERAT</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
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
                        $total_berat += $berat;
                    ?>
                        <tr>
                            <td><?php echo $items['name']; ?></td>
                            <td><?= $berat ?> g</td>
                            <td>Rp<?php echo number_format($items['price'], 0, ",", "."); ?></td>
                            <td><?php echo $items['qty']; ?></td>
                            <td>Rp<?php echo number_format($items['subtotal'], 0, ",", "."); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <hr>
    <br>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-7">
            <b>TUJUAN PENGIRIMAN</b>
            <div class="row">
                <div class="col-sm-5">
                    <br>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-5">
                    <br>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="ekspedisi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-5">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">AKUMULASI HARGA</th>
                        <td><label>Rp<?php echo number_format($this->cart->total(), 0, ",", "."); ?></label></td>
                    </tr>
                    <tr>
                        <th>TOTAL BERAT</th>
                        <td><label><?= $total_berat ?> g</label></td>
                    </tr>
                    <tr>
                        <th>ONGKOS KIRIM</th>
                        <td><label id="ongkir"></label></td>
                    </tr>
                    <tr class="bg-success">
                        <th>TOTAL PEMBAYARAN</th>
                        <td><label id="total_bayar"></label></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('belanja') ?>" class="btn btn-default"></i> Kembali</a>
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

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/ekspedisi') ?>",
                success: function(hasil_ekspedisi) {
                    $("select[name=ekspedisi]").html(hasil_ekspedisi);
                }
            });
        });

        //mendapatkan data paket
        $("select[name=ekspedisi]").on("change", function() {
            //mendapatkan ekspedisi terpilih
            var ekspedisi_terpilih = $("select[name=ekspedisi]").val();
            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?= $total_berat ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        //
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            $("#ongkir").html("Rp"+dataongkir);
            //menghitung total pembayaran
            var data_total_bayar = parseInt(dataongkir)+parseInt(<?= $this->cart->total()?>);
            $("#total_bayar").html("Rp"+data_total_bayar);
        });
    });
</script>