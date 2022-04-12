<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">

                <?php echo form_open('belanja/update'); ?>

                <table class="table text-center" cellpadding="6" cellspacing="1" style="width:100%">

                    <tr class="bg-info" style="opacity: 80%">
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th class="col-sm-1">JUMLAH</th>
                        <th>BERAT</th>
                        <th>SUB-TOTAL</th>
                        <th>AKSI</th>
                    </tr>

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
                            <td>Rp<?php echo number_format($items['price'], 0, ",", "."); ?></td>
                            <td>
                                <?php echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty'],
                                    'maxlength' => '3',
                                    'min' => '0',
                                    'size' => '5',
                                    'type' => 'number',
                                    'class' => 'form-control'
                                ));
                                ?>
                            </td>
                            <td><?= $berat ?> g</td>
                            <td>Rp<?php echo number_format($items['subtotal'], 0, ",", "."); ?></td>
                            <td>
                                <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php } ?>

                    <tr class="bg-success" style="opacity: 80%;">
                        <td colspan="2"></td>
                        <td>
                            <h5><strong>TOTAL</strong></h5>
                        </td>
                        <td>
                            <?= $total_berat ?> g
                        </td>
                        <td>
                            <h5><strong>Rp<?php echo number_format($this->cart->total(), 0, ",", "."); ?></strong></h5>
                        </td>
                        <td colspan="1"></td>
                    </tr>
                </table>
                <div class="table-footer">
                    <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Bersihkan Keranjang</a>
                    <div class="float-right">
                        <button type="submit" class="btn btn-info float-center"><i class="fas fa-spinner"></i> Update Keranjang</button>
                        <a href="" class="btn btn-success">Check Out</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <br>
            </div>
        </div>
    </div>