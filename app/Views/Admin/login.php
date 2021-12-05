<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dymstudio | Log in</title>

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
            <p class="login-box-msg">Inicio de Sesión</p>
            <?php if (isset($error)) : ?>
                <div class="card-header">
                    <div class="text-danger">
                        <?= $error->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($msg)) : ?>
                    <div class="text-danger">
                        <?= $msg ?>                   
                    </div>
                <?php endif; ?>
            <form action="login/post" method="post">
                <?= csrf_field() ?>
                <?php if (isset($email)) : ?>
                    <div class="text-danger">
                        <?= $email ?>                   
                    </div>
                <?php endif; ?>
                <div class="form-group input-group ">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Correo" value="<?= set_value('email') ?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($pass)) : ?>
                    <div class="text-danger">
                        <?= $pass ?>                   
                    </div>
                <?php endif; ?>
                <div class="form-group input-group ">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recordar me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class=".text-center">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div> 
            </form>
            <div class="social-auth-links text-center mb-3">
                
                <p class="mb-1">
                    <a href="<?= base_url('/forgot-password') ?>">Olvidé mi contraseña</a>
                </p>
            </div>
        </div>
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

</body>
</html>