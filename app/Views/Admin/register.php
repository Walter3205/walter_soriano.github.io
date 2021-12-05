<?php
    include_once "layout/head.php";
?>
    <title>dymstudio | Resgistar un usuario</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
    include_once "layout/header.php";
?>



<!-- Content Header (Page header) 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Resgistar un usuario</h1>
            </div>
        </div>
    </div>
</div>-->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row centrar">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Registrar un nuevo usuario</p>
                        <?php if (isset($error)) : ?>
                            <div class="card-header">
                                <div class="text-danger">
                                    <?= $error->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form action="register/post" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-4 col-form-label">Nombres</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nombres" value="<?= set_value('firstname') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-sm-4 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" value="<?= set_value('lastname') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Contraseña</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Confirmar contraseña</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="passconf" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-sm-4 col-form-label">Role</label>
                                <div class="col-sm-8 mt-2">
                                    <!-- radio -->
                                    <?php foreach ($roles as $role) { ?>
                                        <div class="icheck-primary d-inline mr-3">
                                            <input type="radio" id="<?php echo $role->name; ?>" name="roles" value="<?php echo $role->id; ?>" required>
                                            <label for="<?php echo $role->name; ?>">
                                                <?php echo $role->name ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-4 col-form-label">Imagen</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="imagen" accept="image/*">
                                            <label for="file" class="custom-file-label">Selecciona una imagen</label>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="form-group row centrar">
                                <div class="image-wrapper">
                                        <img id="imagen" width="300px" src="https://w.wallhaven.cc/full/4v/wallhaven-4v1exm.png" alt="">
                                </div>
                            </div>
                            <div class="form-group row centrar">
                                <div class="ml-0">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!-- /.form-box -->
        </div><!-- /.card -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->
    
<?php
    include_once "layout/footer.php";
?>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });

    //Cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imagen").setAttribute('src', event.target.result); 
        };

        reader.readAsDataURL(file);
    }
</script>

</body>
</html>
