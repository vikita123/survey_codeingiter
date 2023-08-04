<div class="container">
    <?php if (!empty($getAllQuestions)) {

    ?>
        <div class="card card-outline card-success" style="border-top: 10px solid #6A35D1">
            <div class="card-header">
                <div class="form-group">
                    <input type="text" value="<?php print_r($getAllQuestions[0]->title); ?>" style="height:80px;font-weight:600;" class="form-control" name="form_title" readonly>
                </div>
                <div class="form-group">
                    <input type="text" value="<?php print_r($getAllQuestions[0]->description); ?>" style="height:50px;font-weight:400;" class="form-control" name="form_description" readonly>
                </div>
                <div class="form-group" style="float: right;">
                 -  <label><?php print_r($getAllQuestions[0]->username); ?></label>
                </div>
            </div>
        </div>
        <?php foreach ($getAllQuestions as $key => $val) {
        ?>

            <div class="callout callout-info">
                <div class="row d-flex">
                    <div class="col-10" style="border-left-color: #39f">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h3><?php echo $val->question; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5><?php print_r($val->answer); ?></h5>
            </div>
    <?php }
    } 
    else{
        echo "<h2>Not any response found!!!</h2>";
    }?>
</div>