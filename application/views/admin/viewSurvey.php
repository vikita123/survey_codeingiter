<div class="container">
    <?php if (!empty($getQuestion)) {

    ?>
        <div class="card card-outline card-success" style="border-top: 10px solid #6A35D1">
            <div class="card-header">
                <div class="form-group">
                    <input type="text" value="<?php print_r($getQuestion[0]->title); ?>" style="height:80px;font-weight:600;" class="form-control" name="form_title" readonly>
                </div>
                <div class="form-group">
                    <input type="text" value="<?php print_r($getQuestion[0]->description); ?>" style="height:50px;font-weight:400;" class="form-control" name="form_description" readonly>
                </div>
            </div>
        </div>
        <?php foreach ($getQuestion as $key => $val) {
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

                <?php if ($val->type == "tp_checkbox") {
                ?>
                    <div class="row">
                        <div class="col-5">
                            <div class="card">
                                <table width="100%" class="table">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="80%">
                                        <col width="10%">
                                    </colgroup>
                                    <tbody>
                                        <?php $checkboxValue = explode(",", $val->frm_option);
                                        foreach ($checkboxValue as $k => $checkValue) { ?>
                                            <tr class="">
                                                <td class="text-center">
                                                    <div class="icheck-primary d-inline" data-count='1'>
                                                        <input type="checkbox" id="checkboxPrimary1">
                                                        <label for="checkboxPrimary1">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]" value="<?php echo $checkValue; ?>" readonly>
                                                </td>
                                                <td class="text-center"></td>
                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php  } else { ?>
                    <div class="row">
                        <div class="col-5">
                            <div class="card">
                                <table width="100%" class="table">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="80%">
                                        <col width="10%">
                                    </colgroup>
                                    <tbody>
                                        <?php $radiobuttonValue = explode(",", $val->frm_option);
                                        foreach ($radiobuttonValue as $r_k => $radioValue) { ?>
                                            <tr class="">
                                                <td class="text-center">
                                                    <div class="icheck-primary d-inline" data-count='1'>
                                                        <input type="radio" id="radioPrimary1" name="radio" >
                                                        <label for="radioPrimary1">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="form-control form-control-sm check_inp" name="radio_label[0][]" value="<?php echo $radioValue; ?>" readonly>
                                                </td>
                                                <td class="text-center"></td>
                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    <?php }
    } else{
        echo "<h2>Not any response found!!!</h2>";
    } ?>
</div>