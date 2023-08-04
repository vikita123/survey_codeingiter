<div class="container">
    <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
    <div class="card">
        <div class="card-body">
            <h6 class="display-6 m-0">Welcome to <?= $this->session->userdata('USERNAME') ?></h6>
        </div>
    </div>
    <style type="text/css">
        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border-top: #6A35D1;
            border-right: #6A35D1;
            border-left: #6A35D1;
            border-bottom: 3px solid #6A35D1;
        }

        .link_color {
            color: black;
        }

        a:hover {
            color: inherit;
        }
    </style>
    <br />
    <div class="container">
        <ul class="nav nav-tabs " id="myTab" role="tablist" style="justify-content: center;">
            <li class="nav-item">
                <a class="nav-link active link_color" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="home" aria-selected="true">Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link_color" id="response-tab" data-toggle="tab" href="#response" role="tab" aria-controls="response" aria-selected="false">Responses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link_color" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane container fade show active mt-3" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                <form method="post" action="<?= base_url(); ?>Survey/saveSurveyQuestion">
                    <div class="card card-outline card-success" style="border-top: 10px solid #6A35D1">
                        <div class="card-header">
                            <div class="form-group">
                                <input type="text" placeholder="Form title" value="Untitled form" style="height:80px;font-weight:600;" class="form-control" name="form_title">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Form Description" value="Form description" style="height:50px;font-weight:400;" class="form-control" name="form_description">
                            </div>
                        </div>
                    </div>
                    <div id="dynamic_render_div">
                        <div class="callout callout-info">
                            <div class="row d-flex">
                                <div class="col-10" style="border-left-color: #39f">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Untitled Question" value="" style="height:40px;font-weight:500;" class="form-control" name="question[]">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <select name="question_type[]" class="form-control" id="dynamicSelectInput" onchange="changeInput(this)">
                                                    <option value="tp_checkbox">Checkboxes</option>
                                                    <option value="tp_multichoice">Multiple Choice</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 col-1 mt-1">
                                    <button type="button" class="add_queations btn btn-sm btn-flat btn-default"> <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5" id="dynamic_input">
                                    <div id="dynamicField">
                                        <div class="card">
                                            <table width="100%" class="table">
                                                <colgroup>
                                                    <col width="10%">
                                                    <col width="80%">
                                                    <col width="10%">
                                                </colgroup>
                                                <tbody>
                                                    <tr class="">
                                                        <td class="text-center">
                                                            <div class="icheck-primary d-inline" data-count='1'>
                                                                <input type="checkbox" id="checkboxPrimary1">
                                                                <label for="checkboxPrimary1">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]">
                                                        </td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td class="text-center">
                                                            <div class="icheck-primary d-inline" data-count='2'>
                                                                <input type="checkbox" id="checkboxPrimary2">
                                                                <label for="checkboxPrimary2">
                                                                </label>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]">
                                                        </td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                    <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))" id="addNewCheckbox"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn" style="background-color: #6A35D1;color: white;">Save</button>
                </form>
            </div>
            <div class="tab-pane container fade show mt-3" id="response" role="tabpanel" aria-labelledby="response-tab">
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
                                    <a href= "<?= base_url(); ?>Survey/viewSurvey/<?php echo $value->id; ?>" class="btn btn-primary" style="background-color: #6A35D1;color:white;text-decoration: none;">View Survey</a>
                                    <a href= "<?= base_url(); ?>Survey/viewResponse/<?php echo $value->id; ?>" class="btn btn-primary mt-2" style="background-color: #6A35D1;color:white;text-decoration: none;">Response</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                else{
                    echo "<h2>Survey not found!!</h2>";
                }
                ?>
            </div>
        </div>

    </div>
</div>
</div>
<div id="check_opt_clone" style="display: none">
    <div class="card">
        <table width="100%" class="table">
            <colgroup>
                <col width="10%">
                <col width="80%">
                <col width="10%">
            </colgroup>
            <tbody>
                <tr class="">
                    <td class="text-center">
                        <div class="icheck-primary d-inline" data-count='1'>
                            <input type="checkbox" id="checkboxPrimary1">
                            <label for="checkboxPrimary1">
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]">
                    </td>
                    <td class="text-center"></td>
                </tr>
                <tr class="">
                    <td class="text-center">
                        <div class="icheck-primary d-inline" data-count='2'>
                            <input type="checkbox" id="checkboxPrimary2">
                            <label for="checkboxPrimary2">
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]">
                    </td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 text-center">
                <button class="btn btn-sm btn-flat btn-default" type="button" id="addNewCheckbox" onclick="new_check($(this))"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
<div id="radio_opt_clone" style="display: none">
    <div class="card">
        <table width="100%" class="table">
            <colgroup>
                <col width="10%">
                <col width="80%">
                <col width="10%">
            </colgroup>
            <tbody>
                <tr class="">
                    <td class="text-center">
                        <div class="icheck-primary d-inline" data-count='1'>
                            <input type="radio" id="radioPrimary1" name="radio">
                            <label for="radioPrimary1">
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <input type="text" class="form-control form-control-sm check_inp" name="radio_label[0][]">
                    </td>
                    <td class="text-center"></td>
                </tr>
                <tr class="">
                    <td class="text-center">
                        <div class="icheck-primary d-inline" data-count='2'>
                            <input type="radio" id="radioPrimary2" name="radio">
                            <label for="radioPrimary2">
                            </label>
                        </div>
                    </td>

                    <td class="text-center">
                        <input type="text" class="form-control form-control-sm check_inp" name="radio_label[0][]">
                    </td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 text-center">
                <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))" id="addNewRadio"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
<div id="clone_label" style="display: none">
    <div class="callout callout-info" id="new_div">
        <div class="row d-flex">
            <div class=" col-10" style="border-left-color: #39f">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" placeholder="Untitled Question" value="" style="height:40px;font-weight:500;" class="form-control" name="question[]">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select name="question_type[]" class="form-control" id="dynamicSelectInput_new" onchange="changeInput(this)">
                                <option value="tp_checkbox">Checkboxes</option>
                                <option value="tp_multichoice">Multiple Choice</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-2 col-1 mt-2 d-flex">
                <button type="button" class="add_queations btn btn-sm btn-flat btn-default"> <i class="fa fa-plus"></i></button>
                <button type="button" class="ml-1 remove_queations btn btn-sm btn-flat btn-default"> <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-5" id="dynamic_input_new">
                <div id="dynamicField_new">
                    <div class="card">
                        <table width="100%" class="table">
                            <colgroup>
                                <col width="10%">
                                <col width="80%">
                                <col width="10%">
                            </colgroup>
                            <tbody>
                                <tr class="">
                                    <td class="text-center">
                                        <div class="icheck-primary d-inline" data-count='1'>
                                            <input type="checkbox" id="checkboxPrimary1">
                                            <label for="checkboxPrimary1">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[]">
                                    </td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr class="">
                                    <td class="text-center">
                                        <div class="icheck-primary d-inline" data-count='2'>
                                            <input type="checkbox" id="checkboxPrimary2">
                                            <label for="checkboxPrimary2">
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[]">
                                    </td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))" id="addNewCheckbox_new"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    var countQue = 1;
    var wrapper = $('#dynamic_render_div');
    $(document).on('click', '.add_queations', function() {
        let id = `dynamicInputField_${countQue}`;
        let dynamicInput = `dynamic_input_${countQue}`;
        let dynamicField = `dynamicField_${countQue}`;
        let dynamicSelectInput = `dynamicSelectInput_${countQue}`;
        let addNewInput = `addNewCheckbox_${countQue}`;
        var cloning = $('#clone_label').clone();
        cloning.find("input[name='checkbox_label[]']").attr('name', `checkbox_label[${countQue}][]`);
        var fieldHTML = cloning.html().replace("new_div", id).replace("dynamic_input_new", dynamicInput).replace("dynamicField_new", dynamicField).replace("dynamicSelectInput_new", dynamicSelectInput).replace("addNewCheckbox_new", addNewInput);
        $(wrapper).append(fieldHTML);
        countQue++;
    });

    function new_check(_this) {
        var id = $(_this).attr('id');
        var myArray = id.split("_");
        if (myArray.length == 1) {
            var tbody = _this.closest('.row').siblings('table').find('tbody')
            var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
            var opt = '';
            opt += '<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "' + count + '"><input type="checkbox" id="checkboxPrimary' + count + '"><label for="checkboxPrimary' + count + '"> </label></div></td>';
            opt += '<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[0][]"></td>';
            opt += '<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
            var tr = $('<tr></tr>')
            tr.append(opt)
            tbody.append(tr)
        } else {
            var lastValue = myArray.pop();
            var tbody = _this.closest('.row').siblings('table').find('tbody')
            var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
            var opt = '';
            opt += '<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "' + count + '"><input type="checkbox" id="checkboxPrimary' + count + '"><label for="checkboxPrimary' + count + '"> </label></div></td>';
            opt += '<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="checkbox_label[' + lastValue + '][]"></td>';
            opt += '<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
            var tr = $('<tr></tr>')
            tr.append(opt)
            tbody.append(tr)
        }

    }

    function new_radio(_this) {


        var id = $(_this).attr('id');
        var myArray = id.split("_");
        if (myArray.length == 1) {
            var tbody = _this.closest('.row').siblings('table').find('tbody')
            var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
            var opt = '';
            opt += '<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "' + count + '"><input type="radio" id="radioPrimary' + count + '" name="radio"><label for="radioPrimary' + count + '"> </label></div></td>';
            opt += '<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="radio_label[0][]"></td>';
            opt += '<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
            var tr = $('<tr></tr>')
            tr.append(opt)
            tbody.append(tr)
        } else {
            var lastValue = myArray.pop();
            var tbody = _this.closest('.row').siblings('table').find('tbody')
            var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
            count++;
            var opt = '';
            opt += '<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "' + count + '"><input type="radio" id="radioPrimary' + count + '" name="radio"><label for="radioPrimary' + count + '"> </label></div></td>';
            opt += '<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="radio_label[' + lastValue + '][]"></td>';
            opt += '<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
            var tr = $('<tr></tr>')
            tr.append(opt)
            tbody.append(tr)
        }


    }

    function changeInput(t) {
        // console.log(t.id);
        var inputType = $(t).val();
        var myArray = t.id.split("_");
        if (myArray.length == 1) {
            $('#dynamicField').remove();
            if (inputType == "tp_checkbox") {
                var check_opt_clone = $('#check_opt_clone').clone()
                $('#dynamic_input').html(check_opt_clone.html())
            } else if (inputType == "tp_multichoice") {
                var radio_opt_clone = $('#radio_opt_clone').clone()
                $('#dynamic_input').html(radio_opt_clone.html())
            } else if (inputType == "tp_dropdown") {

            } else {

            }
        } else {
            var lastValue = myArray.pop();
            $(`#dynamicField_${lastValue}`).remove();
            if (inputType == "tp_checkbox") {
                var check_opt_clone = $('#check_opt_clone').clone()
                check_opt_clone.find("input[name='checkbox_label[0][]']").attr('name', `checkbox_label[${lastValue}][]`);
                $(`#dynamic_input_${lastValue}`).html(check_opt_clone.html())
            } else if (inputType == "tp_multichoice") {
                var radio_opt_clone = $('#radio_opt_clone').clone()
                radio_opt_clone.find("input[name='radio_label[0][]']").attr('name', `radio_label[${lastValue}][]`);
                $(`#dynamic_input_${lastValue}`).html(radio_opt_clone.html())
            } else if (inputType == "tp_dropdown") {

            } else {

            }
        }

    }
</script>