<div class="center mx-auto" style="width: 40%;">
    <div class="card">
        <div class="card-body login-card-body">
            <h4 class="login-box-msg">Login</h4>

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

            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-times"></i> Error!</h5>';
                echo $this->session->flashdata('error');
                echo '</div>';
            }

            echo form_open('pelanggan/login'); ?>
            <div class="input-group mb-3">
                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="E-Mail">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('pelanggan/register') ?>" class="text-center">Belum Punya Akun</a>
            <div class="float-right">
                <button type="submit" class="btn btn-success float-right">Login</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>