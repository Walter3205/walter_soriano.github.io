<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dymstudio | Forgot Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/adminlte.min.css">

    <link rel="shortcut icon" href="<?php echo base_url();?>/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>/images/favicon.png" type="image/x-icon">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url();?>/"><b>dymstudio</b>dev</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">¿Olvidaste tu contraseña? <br> Aquí puedes obtener fácilmente una nueva contraseña.</p>
            <?php if (isset($error)) : ?>
                <div class="text-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form name="contactForm" id="contactForm" method="post" action="forgot-password/post" novalidate="novalidate">
                <?= csrf_field() ?>
                <fieldset>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Solicitar una nueva contraseña</button>
                    </div>
                    <!-- /.col -->
                </div>
                </fieldset>
            </form>

            <p class="text-center mt-3 mb-1">
                <a href="<?= base_url('login');?>">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>

</body>
</html>
