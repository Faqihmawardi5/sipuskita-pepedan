<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title_web; ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/assets/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/assets/dist/css/responsivelogin.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets_style/landing/css/styles6.css'); ?>">

    <link rel="shortcut icon" href="<?= base_url('assets_style/image/logo_desa.png'); ?>">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .navbar-inverse {
            background-color: #333;
        }

        .navbar-color {
            color: #fff;
        }

        blink,
        .blink {
            animation: blinker 3s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="hold-transition login-page slideshow-header">

<div class="overlay"></div>

<div class="login-box">

    <br>

    <div class="login-logo">
        <a href="<?= base_url(); ?>" style="color:yellow;">
          <b>SIPUSKITA <br>DESA PEPEDAN</b>
        </a>
    </div>

    <div id="tampilalert"></div>

    <?php if($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message'); ?>
    <?php endif; ?>

    <div class="login-box-body" style="border:2px solid #226bbf;">
        <br>
        <form action="<?= base_url('login/auth'); ?>" method="POST">

            <div class="form-group has-feedback">
                <input type="text"
                    class="form-control"
                    placeholder="Username"
                    id="user"
                    name="user"
                    autocomplete="off"
                    required>

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password"
                    class="form-control"
                    placeholder="Password"
                    id="pass"
                    name="pass"
                    autocomplete="off"
                    required>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">

                <div class="col-xs-8"></div>

                <div class="col-xs-4">
                    <button type="submit"
                        id="loding"
                        class="btn btn-primary btn-block btn-flat">
                        Sign In
                    </button>

                    <div id="loadingcuy"></div>
                </div>

            </div>

        </form>
    </div>

    <br>

    <footer>
        <div class="login-box-body text-center bg-blue">
            <span style="color:white;">
                Copyright &copy; SIPUSDAN | Desa Pepedan - <?= date('Y'); ?>
            </span>
        </div>
    </footer>

</div>

<div id="tampilkan"></div>

<script src="<?= base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>

</body>
</html>