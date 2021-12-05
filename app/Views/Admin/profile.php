<?php
    include_once "layout/head.php";
?>
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/toastr/toastr.min.css">

    <title>dymstudio | Perfil de usuario</title>
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
                 <h1 class="m-0">Perfil de usuario</h1> 
            </div>
        </div>
    </div>
</div>-->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row centrar ">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">
                                <p class="login-box-msg">Editar perfil</p>
                                <?php if (isset($error)) : ?>
                                    <div class="card-header">
                                        <div class="text-danger">
                                            <?= $error->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="profile/post" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-4 col-form-label">Nombres</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nombres" value="<?php echo $user->firstname ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-sm-4 col-form-label">Apellidos</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" value="<?php echo $user->lastname ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->email ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Nueva contraseña</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" placeholder="Nueva contraseña" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Confirmar contraseña</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="passconf" placeholder="Confirmar contraseña">
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
                                            <?php if (isset($user->image)){ ?>
                                                <img id="imagen" width="200px" src="<?php echo base_url($user->image) ?>" alt="">
                                            <?php }else{ ?>
                                                <img id="imagen" width="200px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="ml-0">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
        
        <!-- /.card -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->


<?php
    include_once "layout/footer.php";
?>

<script src="<?php echo base_url();?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>/plugins/toastr/toastr.min.js"></script>

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

<script>
    $(function() {
        <?php if(isset($success)){ ?>
            toastr.success('<?= $success ?>')
        <?php }if(isset($warning)) { ?>
            toastr.warning('<?= $warning ?>')
        <?php }if (isset($t_error)) { ?>
            toastr.error('<?= $t_error ?>')
        <?php } ?>
    });
</script>

</body>
</html>
