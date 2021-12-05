<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="<?php echo base_url();?>">
            <img src="<?php if(isset($manten[2]->image)) echo base_url($manten[2]->image);?>" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav">

        <a style="cursor:pointer" class="header-nav__close" title="close"><span>Cerrar</span></a>

        <div class="header-nav__content">
            <h3>Navegación</h3>
            
            <ul class="header-nav__list">
                <li class="current"><a class="smoothscroll"  href="#home" title="Inicio">Inicio</a></li>
                <li><a class=""  href="<?= base_url('blog') ?>" title="Blog">Blog</a></li>
                <li><a class="smoothscroll"  href="#about" title="Acerca de Nosotros">Acerca de Nosotros</a></li>
                <li><a class="smoothscroll"  href="#services" title="Servicios">Servicios</a></li>
                <li><a class="smoothscroll"  href="#works" title="Trabajos Realizados">Trabajos Realizados</a></li>
                <li><a class="smoothscroll"  href="#clients" title="Clientes">Clientes</a></li>
                <li><a class="smoothscroll"  href="#contact" title="Contáctanos">Contáctanos</a></li>
            </ul>

            <label class="idioma"><i class=" ion-android-globe"></i> Idioma</label>

            <div id="ca-lang-selector">
                <ul class="menu">
                    <li><a href="<?= base_url('en/') ?>" data-code="en">Inglés</a></li>
                    <li><a href="<?= base_url() ?>" data-code="es">Español</a></li>
                </ul>

                <form action="/es/ca_change_language" method="post">
                    <input type="hidden" name="language" value="es">
                    <input type="hidden" name="path" value="/">
                </form>
            </div>

            <p>Siganos en nuestras redes sociales</p>

            <ul class="header-nav__social">
                <li>
                    <a href="https://www.facebook.com/dymstudio.dev"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/dymstudio"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/dymstudio.dev/"><i class="fa fa-instagram"></i></a>
                </li>
                <!--<li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                </li>-->
            </ul>

        </div> <!-- end header-nav__content -->

    </nav>  <!-- end header-nav -->

    <a class="header-menu-toggle" style="cursor:pointer">
        <span class="header-menu-text">Menú</span>
        <span class="header-menu-icon"></span>
    </a>

</header> <!-- end s-header -->