<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
    <?php header('Access-Control-Allow-Origin: *'); ?>
<head>

    <?php
        include_once "layout/head.php";
    ?>

</head>

<body id="top">

    <!-- header
    ================================================== -->
    
    <?php
        include_once "layout/header.php";
    ?>

    <!-- home
    ================================================== -->
    
    <?php
        include_once "layout/principal.php";
    ?>

    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead subhead--dark">Hola a todos</h3>
                <h1 class="display-1 display-1--light">dymstudio</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full">
                <p>
                Somos una empresa 100% salvadoreña. Nos especializamos en servicios de Firma Electrónica. Desarrollos Web, Microservicios. Queremos ser sus socios estratégicos para hacer crecer su negocio. 5 años de experiencia en el sector de desarrollo.
                </p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full"></div>
        </div> <!-- end separtion line -->

        <div class="row block-1-3 block-m-1-2 block-mob-full" data-aos="fade-up">
                
            
            <div class="col-block section-header">
                <h3 class="subhead subhead--dark">Misión:</h3>
                <br>
                <p>
                    Buscamos ofrecer soluciones, proporcionando herramientas necesarias de calidad y a la medida.
                </p>
            </div>
            <div class="col-block section-header">
                <h3 class="subhead subhead--dark">Visión:</h3>
                <br>
                <p>
                    Ser la empresa líder en proporcionar servicios de Firma Electrónica en Centroamérica.
                </p>    
            </div>
            <div class="col-block section-header">
                <h3 class="subhead subhead--dark">Valores:</h3>
                <br>
                <p>
                    Confianza: Cuente con nosotros para el resguardo de su información.
                </p>
                <p>
                    Innovación: Estamos siempre alerta de los cambios para aplicar nuevas tecnologías al servicio de usted.
                </p>
            </div>

        </div> <!-- end about-stats -->

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full"></div>
        </div> <!-- end separtion line -->


        <div class="row about-stats stats block-1-3 block-m-1-2 block-mob-full" data-aos="fade-up">
                
            <!--<div class="col-block stats__col ">
                <div class="stats__count">127</div>
                <h5>Awards Received</h5>
            </div>-->
            <div class="col-block stats__col">
                <div class="stats__count">500</div>
                <h5>Tazas de Café</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">25</div>
                <h5>Proyectos Completados</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">20</div>
                <h5>Clientes Felices</h5> 
            </div>

        </div> <!-- end about-stats -->

        <div class="about__line"></div>

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Nuestros SERVICIOS</h3>
                <!--<h1 class="display-2">We’ve got everything you need to launch and grow your business</h1>-->
            </div>
        </div> <!-- end section-header -->

        <div class="row services-list block-1-2 block-tab-full">

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-pencil"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">Firma Electrónica</h3>
                    <p>Para validación de Documentos, Facturas Electrónicas,
                        etc y que estos gocen de una certificación válida ante las 
                        autoridades competentes.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-desktop"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">Web Institucionales</h3>
                    <p>Diseños a la medida, responsivos y adaptados a todo tipo de dispositivos.</p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-attachment"></i>
                </div>  
                <div class="service-text">
                    <h3 class="h2">Microservicios</h3>
                    <p>Servicios que trabajan de forma independiente intercomunicados 
                        entre sí, ofreciendo una solución efectiva para usted.
                    </p>
                </div>
            </div>

            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-cloud"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">API</h3>
                    <p>Desarrollamos APIs a la medida de sus necesidades, seguras, confiables y escalables.
                    </p>
                </div>
            </div>

            <!-- <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-cube"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">Packaging Design</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>
    
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon"><i class="icon-lego-block"></i></div>
                <div class="service-text">
                    <h3 class="h2">Web Development</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>-->

        </div> <!-- end services-list -->

    </section> <!-- end s-services -->

    <!-- works
    ================================================== -->
    <section id='works' class="s-works">

        <div class="intro-wrap">
                
            <div class="row section-header has-bottom-sep light-sep" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">TRABAJOS RECIENTES</h3>
                    <h1 class="display-2 display-2--light">Amamos lo que hacemos. Vea algunos de nuestros últimos trabajos.</h1>
                </div>
            </div> <!-- end section-header -->

        </div> <!-- end intro-wrap -->

        <div class="row works-content">
            <div class="col-full masonry-wrap">
                <div class="masonry">
                    
                    <?php foreach ($trabajos as $trabajo) { ?>
                       
                        <div class="masonry__brick" data-aos="fade-up">
                            <div class="item-folio">
                                <div class="item-folio__thumb">
                                    <a href="<?= base_url($trabajo->image);?>" class="thumb-link" title="<?= $trabajo->name;?>" data-size="1902x1008">
                                        <img src="<?= base_url($trabajo->image600);?>" 
                                            srcset="<?= base_url($trabajo->image600);?> 1x, <?= base_url($trabajo->image1200);?> 2x" alt="">
                                    </a>
                                </div>
                                <div class="item-folio__text">
                                    <h3 class="item-folio__title">
                                        <?= $trabajo->name;?>
                                    </h3>
                                    <p class="item-folio__cat">
                                        <?= $trabajo->categoria;?>
                                    </p>
                                </div>
                                <a href="<?= $trabajo->url;?>" class="item-folio__project-link" title="Link del proyecto">
                                    <i class="icon-link"></i>
                                </a>
                                <div class="item-folio__caption">
                                    <p><?= $trabajo->descripcion;?></p>
                                </div>
                            </div>
                        </div> <!-- end masonry__brick -->

                    <?php } ?>

                    <!-- <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                                
                            <div class="item-folio__thumb">
                                <a href="images/portfolio/gallery/g-beetle.jpg" class="thumb-link" title="The Beetle Car" data-size="1050x700">
                                    <img src="images/portfolio/the-beetle.jpg"
                                         srcset="images/portfolio/the-beetle.jpg 1x, images/portfolio/the-beetle@2x.jpg 2x" alt="">
                                </a>
                            </div>
    
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    The Beetle
                                </h3>
                                <p class="item-folio__cat">
                                    Web Development
                                </p>
                            </div>
    
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>
    
                            <div class="item-folio__caption">
                                <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                            </div>
    
                        </div>
                    </div> --> <!-- end masonry__brick -->
    
                    <!-- <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                                
                            <div class="item-folio__thumb">
                                <a href="images/portfolio/gallery/g-grow-green.jpg" class="thumb-link" title="Grow Green" data-size="1050x700">
                                    <img src="images/portfolio/grow-green.jpg" 
                                         srcset="images/portfolio/grow-green.jpg 1x, images/portfolio/grow-green@2x.jpg 2x" alt="">
                                </a>
                            </div>
    
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Grow Green
                                </h3>
                                <p class="item-folio__cat">
                                    Branding
                                </p>
                            </div>
    
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>
    
                            <div class="item-folio__caption">
                                <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                            </div>
    
                        </div>
                    </div> --> <!-- end masonry__brick -->

                     <!-- <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                                
                            <div class="item-folio__thumb">
                                <a href="images/portfolio/gallery/g-guitarist.jpg" class="thumb-link" title="Guitarist" data-size="1050x700">
                                    <img src="images/portfolio/guitarist.jpg" 
                                         srcset="images/portfolio/guitarist.jpg 1x, images/portfolio/guitarist@2x.jpg 2x" alt="">
                                </a>
                            </div>
    
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Guitarist
                                </h3>
                                <p class="item-folio__cat">
                                    Web Design
                                </p>
                            </div>
    
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>
    
                            <div class="item-folio__caption">
                                <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                            </div>
    
                        </div>
                    </div> --> <!-- end masonry__brick -->
    
                     <!-- <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                                
                            <div class="item-folio__thumb">
                                <a href="images/portfolio/gallery/g-palmeira.jpg" class="thumb-link" title="Palmeira" data-size="1050x700">
                                    <img src="images/portfolio/palmeira.jpg"
                                         srcset="images/portfolio/palmeira.jpg 1x, images/portfolio/palmeira@2x.jpg 2x" alt="">
                                </a>
                            </div>
    
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Palmeira
                                </h3>
                                <p class="item-folio__cat">
                                    Web Design
                                </p>
                            </div>
    
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                <i class="icon-link"></i>
                            </a>
    
                            <div class="item-folio__caption">
                                <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                            </div>
    
                        </div>
                    </div> --> <!-- end masonry__brick -->

                </div> <!-- end masonry -->
            </div> <!-- end col-full -->
        </div> <!-- end works-content -->

    </section> <!-- end s-works -->

    <!-- clients
    ================================================== -->
    <section id="clients" class="s-clients">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">NUESTROS CLIENTES</h3>
                <h1 class="display-2">Tenemos el orgullo de ser socios estratégicos de estas marcas</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row clients-outer" data-aos="fade-up">
            <div class="col-full">
                <div class="clients">
                    <?php foreach ($clientes as $cliente) { ?>
                        <a <?php if($cliente->cliente_url){ echo 'href="'.$cliente->cliente_url.'"' ;} ?> style="cursor:pointer" title="<?= $cliente->name ?>" class="clients__slide"><img src="<?= base_url($cliente->image); ?>" /></a>
                    <?php } ?>
                </div> <!-- end clients -->
            </div> <!-- end col-full -->
        </div> <!-- end clients-outer -->

        <!-- <div class="row clients-testimonials" data-aos="fade-up">
            <div class="col-full">
                <div class="testimonials">

                    <div class="testimonials__slide">

                        <p>Qui ipsam temporibus quisquam vel. Maiores eos cumque distinctio nam accusantium ipsum. 
                        Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium quos qui praesentium corpori.
                        Excepturi nam cupiditate culpa doloremque deleniti repellat.</p>

                        <img src="images/avatars/user-01.jpg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__info">
                            <span class="testimonials__name">Tim Cook</span> 
                            <span class="testimonials__pos">CEO, Apple</span>
                        </div>

                    </div>

                    <div class="testimonials__slide">
                        
                        <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                        Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>

                        <img src="images/avatars/user-05.jpg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__info">
                            <span class="testimonials__name">Sundar Pichai</span> 
                            <span class="testimonials__pos">CEO, Google</span>
                        </div>

                    </div>

                    <div class="testimonials__slide">
                        
                        <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                        Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>

                        <img src="images/avatars/user-02.jpg" alt="Author image" class="testimonials__avatar">
                        <div class="testimonials__info">
                            <span class="testimonials__name">Satya Nadella</span> 
                            <span class="testimonials__pos">CEO, Microsoft</span>
                        </div>

                    </div>

                </div> --> <!-- end testimonials -->
                
            <!-- </div> end col-full -->
         <!-- </div>  end client-testimonials -->

    </section> <!-- end s-clients -->


    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">CONTACTENOS</h3>
                <h1 class="display-2 display-2--light">Si tiene un nuevo proyecto o simplemente quiere decir hola</h1>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">
            
            <div class="contact-primary">

                <h3 class="h6">Envienos un Mensaje</h3>
                <!-- ajax_form -->
                <form name="contactForm" id="contactForm" method="post" action="" novalidate="novalidate">
                    <?= csrf_field() ?>
                    <fieldset>
                   
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Su Nombre" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Su Correo" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Asunto" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="Su Mensaje" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Enviar</button>
                        <div class="submit-loader">
                            <div class="text-loader">Enviando...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

                <!-- contact-warning -->
                <div class="message-warning">
                    A ocurrido un error, por favor intente nuevamente.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Su mensaje ha sido enviado, Gracias!<br>
                </div>

            </div> <!-- end contact-primary -->

            <div class="contact-secondary">
                <div class="contact-info">

                    <h3 class="h6 hide-on-fullwidth">Informacion de Contacto</h3>

                    <!-- <div class="cinfo">
                        <h5>Where to Find Us</h5>
                        <p>
                            1600 Amphitheatre Parkway<br>
                            Mountain View, CA<br>
                            94043 US
                        </p>
                    </div> -->

                    <div class="cinfo">
                        <h5>Escribenos a</h5>
                        <p>
                            info@dymstudio.dev
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Llamanos al</h5>
                        <p>
                            Telefono: (+503) 2563 6781 <br>
                            Celular: (+503) 7856 1668
                        </p>
                    </div>

                    <ul class="contact-social">
                        <li>
                            <a href="https://www.facebook.com/dymstudio.dev"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/dymstudio"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/dymstudio.dev/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </li> -->
                    </ul> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    
    <?php
        include_once "layout/footer.php";
    ?>

</body>

</html>