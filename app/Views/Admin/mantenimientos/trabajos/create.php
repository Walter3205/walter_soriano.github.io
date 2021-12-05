<title>dymstudio | Crear Nuevo Trabajo</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" id="name" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">URL</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="url" value="<?= set_value('url') ?>" class="form-control" id="url" placeholder="URL" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="categoria" value="<?= set_value('categoria') ?>" class="form-control" id="categoria" placeholder="Categoría" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="descripcion" value="<?= set_value('descripcion') ?>" class="form-control" id="descripcion" placeholder="Descripcion">
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label for="file" class="col-sm-2 col-form-label">Imagen Original</label>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="imagen" accept="image/*" required>
                                                    <label for="file" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="image-wrapper">
                                               
                                                    <img id="imagen" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label for="file600" class="col-sm-2 col-form-label">Imagen 600px</label>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file600" name="imagen600" accept="image/*" required>
                                                    <label for="file600" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="image-wrapper">
                                                
                                                    <img id="imagen600" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row centrar">
                                        <label for="file1200" class="col-sm-2 col-form-label">Imagen 1200px</label>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file1200" name="imagen1200" accept="image/*" required>
                                                    <label for="file1200" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="image-wrapper">
                                                
                                                    <img id="imagen1200" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="">
                                                
                                            </div>
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
        $(function () {
            bsCustomFileInput.init();
        });

        //Cambiar imagen
        document.getElementById("file600").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("imagen600").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>

    <script>
        $(function () {
            bsCustomFileInput.init();
        });

        //Cambiar imagen
        document.getElementById("file1200").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("imagen1200").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>

</body>
</html>
