<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="<?php echo base_url();?>">
            <img src="<?php if(isset($manten[2]->image)) echo base_url($manten[2]->image);?>" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav">

        <a style="cursor:pointer" class="header-nav__close" title="close"><span>Close</span></a>

        <div class="header-nav__content">
            <h3>Navigation</h3>
            
            <ul class="header-nav__list">
                <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                <li><a class=""  href="<?= base_url('blog') ?>" title="Blog">Blog</a></li>
                <li><a class="smoothscroll"  href="#about" title="about">About us</a></li>
                <li><a class="smoothscroll"  href="#services" title="services">Services</a></li>
                <li><a class="smoothscroll"  href="#works" title="works">Wokrs</a></li>
                <li><a class="smoothscroll"  href="#clients" title="clients">Clients</a></li>
                <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
            </ul>

            <label class="idioma"><i class=" ion-android-globe"></i> Language</label>

            <div id="ca-lang-selector">
                <ul class="menu">
                    <li><a href="<?= base_url('en') ?>" data-code="en">Inglés</a></li>
                    <li><a href="<?= base_url() ?>" data-code="es">Español</a></li>
                </ul>
            </div>

            <p>Follow us on our social networks</p>

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
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>

</header> <!-- end s-header -->