<div class="center mx-auto" style="width: 40%;">
    <div class="card">
        <div class="card-body register-card-body">
            <h4 class="login-box-msg">Register Pelanggan Baru</h4>

            <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

            echo form_open('pelanggan/register'); ?>

            <div class="input-group mb-3">
                <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan')?>" class="form-control" placeholder="Nama Lengkap">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" value="<?= set_value('email')?>" class="form-control" placeholder="E-Mail">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" value="<?= set_value('password')?>" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" value="<?= set_value('ulangi_password')?>" name="ulangi_password" class="form-control" placeholder="Ulangi Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <a href="<?=base_url('pelanggan/login')?>" class="text-center">Sudah Punya Akun</a>
            <div class="float-right">
                <button type="submit" class="btn btn-primary float-right">Register</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>