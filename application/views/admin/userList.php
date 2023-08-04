<div class="container">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <div class="card">
        <div class="card-body">
            <h6 class="display-6 m-0">Welcome to <?= $this->session->userdata('USERNAME') ?></h6>
        </div>
    </div>
    <?php
    if (!empty($getUsers)) {
        foreach ($getUsers as $key => $value) {
    ?>
            <div class="callout callout-info">
                <div class="row d-flex">
                    <div class="col-10">
                        <h4>Name- <?php echo $value->username; ?></h4>
                        <h4>Email- <?php echo $value->email; ?></h4>
                        
                    </div>
                    <div class="col-2">
                        <a href="<?= base_url(); ?>Survey/viewAnswer/<?php echo $value->id; ?>/<?php echo $value->survey_id; ?>" class="btn btn-primary" style="background-color: #6A35D1;color:white;text-decoration: none;">View Answer</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>