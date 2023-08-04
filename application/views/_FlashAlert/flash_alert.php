<?php
$success_flashData = $this->session->flashdata('success_flashData');
$error_flashData = $this->session->flashdata('error_flashData');
$warning_flashData = $this->session->flashdata('warning_flashData');

if ($success_flashData !== NULL) {
    echo '<div class="alert alert-success fade show" role="alert">' . $success_flashData . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div>';
}

if ($error_flashData !== NULL) {
    echo '<div class="alert alert-danger fade show" role="alert">' . $error_flashData . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
}

if ($warning_flashData !== NULL) {
    echo '<div class="alert alert-danger fade show" role="alert">' . $warning_flashData . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
}
