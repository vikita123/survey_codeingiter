<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/plugins/toastr/toastr.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/styles.css"); ?>">
    <script src="<?= base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
    <script src="<?= base_url("assets/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <!-- <a class="navbar-brand" href="#">Login Application</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="form-inline my-2 my-lg-0">
                <?php if (!empty($this->session->userdata('USER_ID')) && $this->session->userdata('USER_ID') > 0) { ?>
                    <!-- User isLogin -->
                    <a href="<?= base_url('User/Panel') ?>" class="btn btn-primary my-2 my-sm-0">Home</a> &nbsp;
                    <a href="<?= base_url('User/logout') ?>" class="btn btn-danger my-2 my-sm-0">Logout</a>
                <?php } else { ?>
                    <!-- User not Login -->
                    <a href="<?= base_url('User/registration') ?>" class="btn btn-info my-2 my-sm-0">Register</a> &nbsp;
                    <a href="<?= base_url('User/login') ?>" class="btn btn-success my-2 my-sm-0">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <br>