    <title>dymstudio | Crear Nuevo Cliente</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="content">
        <div class="container-fluid ">
            <div class="row centrar ">
                <!-- /.col -->
                <div class="col-md-8 ">
                    <div class="card mt-3">
                        <?php if (isset($error)) : ?>
                            <div class="card-header">
                                <div class="text-danger">
                                    <?= $error->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="">
                                    <div class="form-group row">
                                        <label for="mensaje" class="col-sm-3 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="" class="form-control" id="mensaje" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Imagen</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_back" name="imagen" accept="image/*" required>
                                                    <label for="file_back" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mensaje" class="col-sm-3 col-form-label">URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="url" value="" class="form-control" id="mensaje" placeholder="URL">
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label class=" col-form-label centrar">Imagen Actual</label>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="image-wrapper">
                                            
                                                <img id="imagen_back" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <div class="ml-0 mt-2">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <!-- /.tab-pane -->
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

</body>
</html>
