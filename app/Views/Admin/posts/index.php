    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/sweetalert2/sweetalert2.min.css">

    <title>dymstudio | Listado de Posts</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
   //include_once "layout/header.php";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="posts/create"><span>Crear Nueva Entrada de Blog</span></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabletrabajos" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Categoria</th>
                                    <th>Status</th>
                                    <th>Usuario</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post) { ?>
                                    <tr>
                                        <td><?php echo $post->name ?></td>
                                        <td><?php echo $post->slug ?></td>
                                        <td><?php echo $post->category ?></td>
                                        <td><?php echo $post->status ?></td>
                                        <td><?php echo $post->usuario ?></td>
                                        <td >
                                            <a class="btn btn-primary btn-sm centrar" href="posts/<?php echo $post->id?>"><span>Editar</span></a>
                                        </td>
                                        <td>
                                            <form action="posts/destroy/<?php echo $post->id?>" class="delete_post" method="POST">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm float-left">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Page specific script -->
<script>
    <?php if (isset($post_insert) || isset($post_update)) { ?>
        //$('#liveToast').toast('show');
    <?php } ?>
    
    $(document).ready(function() {
        $('#tabletrabajos').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            columnDefs: [
                { targets: [5, 6], orderable: false },
                { targets: [5, 6], searchable: false },
                { width: "18px", targets: [5, 6] }
            ],
            language: {
                url: '<?= base_url() ?>/plugins/datatables/es_es.json'
            }
        });

        $('.delete_post').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Quiere eliminar esta entrada del Blog?',
                text: "La entrada del blog se elminará definitvamente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>

<script>
    $(function() {
        <?php if(isset($success)){ ?>
            toastr.success('<?= $success ?>')
        <?php }elseif(isset($warning)) { ?>
            toastr.warning('<?= $warning ?>')
        <?php } ?>
    });
</script>

</body>
</html>
