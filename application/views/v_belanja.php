<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">

                <?php echo form_open('belanja/update'); ?>

                <table class="table text-center" cellpadding="6" cellspacing="1" style="width:100%">

                    <tr class="bg-info">
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th class="col-sm-1">JUMLAH</th>
                        <th>SUB-TOTAL</th>
                        <th>AKSI</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                            <td><?php echo $items['name']; ?></td>
                            <td>Rp<?php echo $this->cart->format_number($items['price']); ?></td>
                            <td>
                                <?php echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty'],
                                    'maxlength' => '3',
                                    'size' => '5',
                                    'type' => 'number',
                                    'class' => 'form-control'
                                ));
                                ?>
                            </td>
                            <td>Rp<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr class="bg-success" style="opacity: 80%;">
                        <td colspan="2"></td>
                        <td class="right">
                            <h5><strong>TOTAL</strong></h5>
                        </td>
                        <td class="right">
                            <h5><strong>Rp<?php echo $this->cart->format_number($this->cart->total()); ?></strong></h5>
                        </td>
                        <td colspan="1"></td>
                    </tr>

                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-info"><i class="fas fa-spinner"></i> Update Keranjang</button>
                    <a href="" class="btn btn-success">Check Out</a>
                    <?php echo form_close(); ?>
                </div>
                <br>
            </div>
        </div>
    </div>