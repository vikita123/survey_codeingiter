<div class="container">
    <div class="card">
        <div class="card-body">
            <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
            <?= form_open() ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control <?= (form_error('username') == "" ? '' : 'is-invalid') ?>" placeholder="Enter Userame">
                <?= form_error('username'); ?>
            </div>
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
            <div class="form-group">
                <label>Password Confirmation</label>
                <input type="password" name="passconf" value="<?= set_value('passconf'); ?>" class="form-control <?= (form_error('passconf') == "" ? '' : 'is-invalid') ?>" placeholder="Password Confirmation">
                <?= form_error('passconf'); ?>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role_id">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
            <button type="submit" class="btn" style="background-color: #6A35D1;color: white;">Register</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
<br>