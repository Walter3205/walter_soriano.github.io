<?php
    include_once "layout/head.php";
?>
    <title>dymstudio | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
    include_once "layout/header.php";
?>

<?php

    function fecha($fechamail)
    {
        $actual = new DateTime();  
        $date = date_create($fechamail); 
        $maildate = date_format($date, "Y/m/d");
        $maildate = new DateTime($maildate); 
        $hora = date_format($date, "H:i"); 
        $diames = date_format($date, "d M"); 
        $diamesaño = date_format($date, "d/m/y"); 

        $dif = date_diff($actual, $maildate);

        if($dif->y < 1) : 
            if($dif->days < 1) : 
                echo $hora; 
            else:
                echo $diames; 
            endif; 
        else:
            echo $diamesaño;
        endif;
    }

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Nuevos Mensajes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm update-readed">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    <?= $pager->links() ?>
                                </div>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover">
                                    <tbody>
                                        <?php if(isset($mails[0]->name)) :  ?>
                                        <?php foreach ($mails as $mail) : ?>
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="<?= $mail->id ?>" id="check<?= $mail->id ?>">
                                                    <label for="check<?= $mail->id ?>"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-name"><?= $mail->name ?></td>
                                            <td width="67%" class="mailbox-subject"><a href="dashboard/mail/<?=  $mail->id ?>"><b><?= $mail->subject ?></b> - <?= substr($mail->message, 0, (85 - strlen($mail->subject))) ?> ...</a>
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date"><?= fecha($mail->created_at); ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php else : ?>
                                            <label class="ml-5 float-left">No hay mensajes nuevos...</label>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                               <!-- Check all button -->
                               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    <?= $pager->links() ?>
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->
    
    
<?php
    include_once "layout/footer.php";
?>

<script>
    $(function () {
        //Enable check and uncheck all functionality
        $('.checkbox-toggle').click(function () {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })

        $('.update-readed').click(function () {
            var clicks = $(this).data('clicks')
            if (clicks) {

            }else{
                
            }
        })
    })
</script>

</body>
</html>
