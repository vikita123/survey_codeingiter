<div class="container">
    <div class="card">
        <div class="card-body">
            <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
            <?= form_open() ?>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control <?= (form_error('email') == "" ? '' : 'is-invalid') ?>" placeholder="Enter Email">
                <?= form_error('email'); ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control <?= (form_error('password') == "" ? '' : 'is-invalid') ?>" placeholder="Password">
                <?= form_error('password'); ?>
            </div>
            <button type="submit" class="btn" style="background-color: #6A35D1;color: white;">Login</button>
            <?= form_close() ?>
        </div>
    </div>
</div>