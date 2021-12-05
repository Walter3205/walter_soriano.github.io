<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" style="cursor:pointer" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo base_url();?>/dashboard" class="nav-link">Inicio</a>
            </li>
            
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Contact</a>
            </li>-->
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a style="cursor:pointer" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php if(isset($user->image)){ echo base_url($user->image); } else{ echo base_url('/dist/img/user2-160x160.jpg');} ?>" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"><?php echo $user->firstname . ' ' . $user->lastname; ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-dark">
                        <img src="<?php if(isset($user->image)){ echo base_url($user->image); } else{ echo base_url('/dist/img/user2-160x160.jpg');} ?>" class="img-circle elevation-2" alt="User Image">
                        <p>
                            <?php echo $user->email; ?>
                            <small> <?php echo $_SESSION['header']; ?> </small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="<?php echo base_url();?>/dashboard/profile" class="btn btn-default btn-flat">Perfil</a>
                        <a href="<?php echo base_url('/logout') ?>" class="btn btn-default btn-flat float-right" role="button">Cerrar Sesión</a>
                    </li>
                </ul>
            </li>
        </ul>    
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="centrar">
            <a href="<?php echo base_url();?>" class="brand-link">
                <img src="<?php echo base_url();?>/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">dymstudio</span>
            </a>
        </div>
        
        
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php if(isset($user->image)){ echo base_url($user->image); } else{ echo base_url('/dist/img/user2-160x160.jpg');} ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= base_url('/dashboard/profile') ?>" class="d-block"><?php echo $user->firstname . ' ' . $user->lastname; ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard') ?>" class="nav-link <?php if($segment == 'dashboard') echo 'active' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <br>
                    <?php if($_SESSION['header'] == 'Admin') { ?>
                    <li class="nav-item <?php if($segment == 'users') echo 'menu-open' ?>">
                        <a style="cursor:pointer" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Administración
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="<?= base_url('/dashboard/users') ?>" class="nav-link <?php if($segment == 'users') echo 'active' ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <br>
                    <?php } ?>
                    <li class="nav-item <?php if($segment == 'mantenimiento' || $segment == 'clientes' || $segment == 'trabajos_recientes') echo 'menu-open' ?>">
                        <a style="cursor:pointer" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <p>
                                Contenido del Sitio
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/mantenimientos/mantenimiento') ?>" class="nav-link <?php if($segment == 'mantenimiento') echo 'active' ?>">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Mantenimientos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/mantenimientos/clientes') ?>" class="nav-link <?php if($segment == 'clientes') echo 'active' ?>">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        Clientes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/mantenimientos/trabajos_recientes') ?>" class="nav-link <?php if($segment == 'trabajos_recientes') echo 'active' ?>">
                                    <i class="nav-icon fas fa-laptop"></i>
                                    <p>
                                        Trabajos Recientes
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <br>
                    <li class="nav-item <?php if($segment == 'posts' || $segment == 'categories' || $segment == 'tags') echo 'menu-open' ?>">
                        <a style="cursor:pointer" class="nav-link">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blog
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/blog/posts') ?>" class="nav-link <?php if($segment == 'posts') echo 'active' ?>">
                                    <i class="nav-icon fab fa-blogger-b"></i>
                                    <p>
                                        Entradas del Blog
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/blog/categories') ?>" class="nav-link <?php if($segment == 'categories') echo 'active' ?>">
                                    <i class="nav-icon fas fa-bookmark"></i>
                                    <p>
                                        Categorias del Blog
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/dashboard/blog/tags') ?>" class="nav-link <?php if($segment == 'tags') echo 'active' ?>">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>
                                        Etiquetas del Blog
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">