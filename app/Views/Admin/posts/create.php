    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/summernote/summernote-bs4.min.css">
    <title>dymstudio | Crear Nueva Entrada de Blog</title>
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
                                        <label for="name" class="col-sm-2 col-form-label">Título</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" id="name" placeholder="Título" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="slug" value="<?= set_value('slug') ?>" class="form-control" id="slug" placeholder="Slug" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline mr-5">
                                                <input class="form-check-input-2" type="radio" name="status" id="borrador" value="0" checked>
                                                <label class="form-check-label" for="borrador">Borrador</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input-2" type="radio" name="status" id="publicado" value="1">
                                                <label class="form-check-label" for="publicado">Publicado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="extract" class="col-sm-2 col-form-label">Extract</label>
                                        <div class="col-sm-10">
                                            <textarea rows="2" name="extract" class="form-control" id="extract" placeholder="Extract"><?= set_value('extract') ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body" class="col-sm-2 col-form-label">Contenido del post</label>
                                        <div class="col-sm-10">
                                            <textarea name="body" id="body" ><?= set_value('body') ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Categoría del post</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" aria-label="Default select example" name="category" id="category">
                                                <option value="-1" selected>Seleccione una categoria</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Etiquetas del post</label>
                                        <?php if ($tags) { ?>
                                            <div class="col-sm-10 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <?php if(isset($tags)) { foreach ($tags as $tag) { ?>
                                                        <input class="form-check-input-2" type="checkbox" id="tag<?php echo $tag->id ?>" name="tags[]" value="<?php echo $tag->id ?>">
                                                        <label class="form-check-label mr-3" for="tag<?php echo $tag->id ?>"><?php echo $tag->name ?></label>
                                                    <?php } } ?>
                                                </div>
                                            </div>
                                        <?php }else { ?>
                                            <div class="col-sm-10 mt-2">
                                                <p class=" text-danger">No se encontraron etiquetas</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body" class="col-sm-2 col-form-label">Tipo de Miniatura</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline mr-5">
                                                <input class="form-check-input" type="radio" name="tipo" id="imagen" value="imagen" checked>
                                                <label class="form-check-label" for="imagen">Imágen</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipo" id="video" value="video">
                                                <label class="form-check-label" for="video">Video</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row video">
                                        <label  for="video_miniatura" class="col-sm-2 col-form-label">Video de miniatura</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="video_miniatura" value="<?= set_value('video_miniatura') ?>" class="form-control" id="video_miniatura" placeholder="URL del video(embebido)" >
                                        </div>
                                    </div>
                                    <div class="form-group row centrar imagen">
                                        <label for="file" class="col-sm-2 col-form-label">Imagen de Miniatura</label>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="miniatura" accept="image/*" >
                                                    <label for="file" class="custom-file-label">Selecciona una imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="image-wrapper">
                                                <img id="imagen_miniatura" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="" >
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

    <script src="<?php echo base_url();?>/plugins/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js"></script>

    <!-- Summernote -->
    <script src="<?php echo base_url();?>/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url();?>/plugins/summernote/lang/summernote-es-ES.js"></script>

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
                document.getElementById("imagen_miniatura").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        /*ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );*/

        $('#body').summernote({
            placeholder: 'Contenido del post',
            tabsize: 2,
            height: 100,
            lang: 'es-ES'
          });
    </script>

    <script>
        $(document).ready( function() {
            //$('.imagen').hide();
            $('.video').hide();
            
            $(".form-check-input").change(function() {
                var fileInput = document.getElementById('file');
                fileInput.value = ''
                fileInput.dispatchEvent(new Event('change'));
                $('.imagen').hide();
                document.getElementById("imagen_miniatura").setAttribute('src', "<?php echo base_url();?>/images/404/wallhaven-4v1exm.png");
                document.getElementById("video_miniatura").value = "";
                $('.video').hide();

                var selectValue = $(this).val();
                switch (selectValue) {
                    case "imagen":
                        $('.imagen').show();
                    break;
                    case "video":
                        $('.video').show();
                    break;
                }
            });
        });
    </script>

</body>
</html>
