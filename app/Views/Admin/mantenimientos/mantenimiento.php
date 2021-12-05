<?php
    //include "../layout/head.php";
?>
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/toastr/toastr.min.css">
    
    <title>dymstudio | Mantenimientos varios</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
    //include "../layout/header.php";
?>

<!-- Content Header (Page header) 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>-->

<!-- Main content -->
<div class="content">
    <div class="container-fluid ">
        <div class="row centrar ">
            <!-- /.col -->
            <div class="col-md-12 ">
                <div class="card mt-3">
                    <?php if (isset($error)) : ?>
                        <div class="card-header">
                            <div class="text-danger">
                                <?= $error->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#background" data-toggle="tab">Background Image</a></li>
                            <li class="nav-item"><a class="nav-link" href="#welcome" data-toggle="tab">Welcome Message</a></li>
                            <li class="nav-item"><a class="nav-link" href="#logo" data-toggle="tab">Logo</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="background">
                                <form action="mantenimiento/background" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $manten[0]->id ?>">
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">Imagen de Fondo</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_back" name="imagen" accept="image/*" required>
                                                    <label for="file_back" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label class=" col-form-label centrar">Imagen Actual</label>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="image-wrapper">
                                            <?php if (isset($manten[0]->image)){ ?>
                                                <img id="imagen_back" width="700px" src="<?php echo base_url($manten[0]->image) ?>" alt="">
                                            <?php }else{ ?>
                                                <img id="imagen_back" width="700px" src="https://w.wallhaven.cc/full/4v/wallhaven-4v1exm.png" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row centrar">
                                        <div class="ml-0">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="welcome">
                                <form action="mantenimiento/welcome" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $manten[1]->id ?>">
                                    <div class="form-group row">
                                        <label for="mensaje" class="col-sm-3 col-form-label">Mensaje de Bienvenida</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="text" value="<?php if (isset($manten[1]->text)) echo $manten[1]->text ?>" class="form-control" id="mensaje" placeholder="Mensaje" required>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label class=" col-form-label centrar">Texto Actual</label>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="col-sm-7">
                                            <h3 class="centrar"><?php if (isset($manten[1]->text)) echo $manten[1]->text  ?></h3>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row centrar">
                                        <div class="ml-0">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="logo">
                                <form action="mantenimiento/logo" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= $manten[2]->id ?>">
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">Logo del sitio web</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_logo" name="imagen_logo" accept="image/*" required>
                                                    <label for="file_logo" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label class=" col-form-label centrar">Logo Actual</label>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="image-wrapper">
                                            <?php if (isset($manten[2]->image)){ ?>
                                                <img id="imagen_logo"  src="<?php echo base_url($manten[2]->image) ?>" alt="">
                                            <?php }else{ ?>
                                                <img id="imagen_logo" width="400px" src="https://w.wallhaven.cc/full/4v/wallhaven-4v1exm.png" alt="">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br>
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /.content -->

</div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="centrar">
            <strong class="centrar">dymstudio.dev | 2016 - 2021</strong>
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url();?>/dist/js/adminlte.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>/plugins/toastr/toastr.min.js"></script>
 
<?php
    //include_once "../../layout/footer.php";
?>

<script src="<?php echo base_url();?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });

    //Cambiar imagen
    document.getElementById("file_back").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imagen_back").setAttribute('src', event.target.result); 
        };

        reader.readAsDataURL(file);
    }
</script>

<script>
    document.getElementById("file_logo").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("imagen_logo").setAttribute('src', event.target.result); 
        };

        reader.readAsDataURL(file);
    }
</script>

<script>
    $(function() {
        <?php if(isset($msg)){ ?>
            toastr.success('<?= $msg ?>')
        <?php }if(isset($warning)) { ?>
            toastr.warning('<?= $warning ?>')
        <?php }if (isset($t_error)) { ?>
            toastr.error('<?= $t_error ?>')
        <?php } ?>
    });
</script>

</body>
</html>
