    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/summernote/summernote-bs4.min.css">
    <title>dymstudio | Editar Entrada de Blog</title>
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
                                <form action="edit/<?php echo $post['0']->id ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Título</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="<?php echo $post['0']->name ?>" class="form-control" id="name" placeholder="Título" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="slug" value="<?php echo $post['0']->slug ?>" class="form-control" id="slug" placeholder="Slug" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline mr-5">
                                                <input class="form-check-input-2" type="radio" name="status" id="borrador" value="0" <?php if($post['0']->status == "0") echo "checked" ?>>
                                                <label class="form-check-label" for="borrador">Borrador</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input-2" type="radio" name="status" id="publicado" value="1" <?php if($post['0']->status == "1") echo "checked" ?>>
                                                <label class="form-check-label" for="publicado">Publicado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="extract" class="col-sm-2 col-form-label">Extract</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" name="extract" class="form-control" id="extract" placeholder="Extract" ><?php echo $post['0']->extract ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body" class="col-sm-2 col-form-label">Contenido del post</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" name="body" class="form-control" id="body" placeholder="Contenido del post" ><?php echo $post['0']->body ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Categoría del post</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" aria-label="Default select example" name="category" id="category">
                                                <option value="-1">Seleccione una categoria</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category->id ?>" <?php if($post['0']->category_id == $category->id) echo "selected" ?>><?php echo $category->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Etiquetas del post</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline">
                                                <?php foreach ($tags as $tag) { ?>
                                                    <input class="form-check-input-2" type="checkbox" id="tag<?php echo $tag->id ?>" name="tags[]" value="<?php echo $tag->id ?>" <?php if(isset($OldTags)) foreach ($OldTags as $OldTag) { if($tag->id == $OldTag) echo "checked";  } ?>>
                                                    <label class="form-check-label mr-3" for="tag<?php echo $tag->id ?>"><?php echo $tag->name ?></label>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="body" class="col-sm-2 col-form-label">Tipo de Miniatura</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline mr-5">
                                                <input class="form-check-input" type="radio" name="tipo" id="imagen" value="imagen" <?php if($post['0']->tipo == "imagen") echo "checked" ?>>
                                                <label class="form-check-label" for="imagen">Imágen</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipo" id="video" value="video" <?php if($post['0']->tipo == "video") echo "checked" ?>>
                                                <label class="form-check-label" for="video">Video</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row video">
                                        <label  for="video_miniatura" class="col-sm-2 col-form-label">Video de miniatura</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="video_miniatura" value="<?php if($post['0']->tipo == "video") echo $post['0']->miniatura ?>" class="form-control" id="video_miniatura" placeholder="URL del video(embebido)" >
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
                                                <?php if($post['0']->tipo == "imagen") if(isset($post['0']->miniatura) && $post['0']->miniatura != ""){ ?>
                                                    <img id="imagen_miniatura" width="400px" src="<?php echo base_url($post['0']->miniatura) ?>" alt="">
                                                <?php }else{ ?>
                                                    <img id="imagen_miniatura" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="" >
                                                <?php } else { ?>
                                                    <img id="imagen_miniatura" width="400px" src="<?php echo base_url();?>/images/404/wallhaven-4v1exm.png" alt="" >
                                                <?php } ?>
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

        $('#body').summernote({
            placeholder: 'Contenido del post',
            tabsize: 2,
            height: 100,
            lang: 'es-ES'
        });
    </script>

    <script>
        $(document).ready( function() {
            <?php if($post['0']->tipo == "video"){ ?>
                $('.imagen').hide();
            <?php }else { ?>
                $('.video').hide();   
            <?php } ?>
            
            $(".form-check-input").change(function() {
                var fileInput = document.getElementById('file');
                //fileInput.value = ''
                fileInput.dispatchEvent(new Event('change'));
                $('.imagen').hide();
                //document.getElementById("imagen_miniatura").setAttribute('src', " <?php //echo base_url();?>/images/404/wallhaven-4v1exm.png");
                //document.getElementById("video_miniatura").value = "";
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
