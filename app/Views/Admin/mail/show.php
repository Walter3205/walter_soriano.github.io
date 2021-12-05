
    <title>dymstudio | Correo Electrónico</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
    function fecha($fechamail)
    {  
        $date = date_create($fechamail); 
        $maildate = date_format($date, "Y/m/d");
        $hora = date_format($date, "H:i"); 
        $diames = date_format($date, "d M"); 
        $año = date_format($date, "Y"); 

        $fecha = $diames.'. '.$año.' '.$hora;

        echo $fecha;
    }
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de correo</h3>

                                    <div class="card-tools">
                                        <?php if(!empty($prev)): ?>
                                            
                                            <a href="<?= $prev[0]->id ?>" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                        <?php endif ?>
                                        <?php if(!empty($next)): ?>
                                            <a href="<?= $next[0]->id ?>" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="mailbox-read-info">
                                        <h5><?= $mail->subject ?></h5>
                                        <h6>De: <?= $mail->email ?>
                                        <span class="mailbox-read-time float-right"> <?= fecha($mail->created_at); ?></span></h6>
                                    </div>
                                    <!-- /.mailbox-read-info -->
                                    <div class="mailbox-read-message">
                                        <p><?= $mail->message ?></p>
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-white">
                                    <p>Att: <?= $mail->name ?></p>
                                </div>
                                <!-- /.card-footer 
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                                    </div>
                                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                </div> -->
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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

</body>
</html>
