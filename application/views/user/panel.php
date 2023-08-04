<div class="container">

    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <div class="card">
        <div class="card-body">
            <h6 class="display-6 m-0">Welcome to <?= $this->session->userdata('USERNAME') ?></h6>
        </div>
    </div>
    <?php
    if (!empty($survey_data)) {
        foreach ($survey_data as $key => $value) {
    ?>
            <div class="callout callout-info">
                <div class="row d-flex">
                    <div class="col-10">
                        <h3>Survey- <?php echo $value->title; ?></h3>
                        <p><?php echo $value->description; ?></p>
                    </div>
                    <div class="col-2">
                        <a href="<?= base_url(); ?>Survey/TakeSurvey/<?php echo $value->id; ?>" class="btn btn-primary" style="background-color: #6A35D1;color:white;text-decoration: none;">Ready!</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>