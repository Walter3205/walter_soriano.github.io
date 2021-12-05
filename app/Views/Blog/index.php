<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Basic Page Needs
  	================================================== -->
  	<meta charset="utf-8">
  	<title>dymstudio | Blog</title>

  	<!-- Mobile Specific Metas
  	================================================== -->
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="description" content="dymstudio">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  	<meta name="author" content="dymstudio">

  	<!-- bootstrap.min css -->
    <link rel="stylesheet" href="<?php echo base_url();?>/plugins/bootstrap/bootstrap.min.css">
  	<!-- Ionic Icon Css -->
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/Ionicons/css/ionicons.min.css">
  	<!-- animate.css -->
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/animate-css/animate.css">
 	<!-- Magnify Popup -->
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/magnific-popup/magnific-popup.css">
  	<!-- Slick CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/slick/slick.css">
  
  	<!-- Main Stylesheet -->
  	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css">

	<link rel="shortcut icon" href="<?php echo base_url();?>/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>/images/favicon.png" type="image/x-icon">

	<style>
		.imagen {
			background: url("<?php echo base_url($manten[0]->image);?>");
			background-size: 100% 100%;
  			background-attachment: fixed;
			background-position: center;
		}
		.img-fluid2{
			max-width:100%;
			width: 1098px;
			height:407px;
		}
	</style>

</head>

<body id="body">

<?php
	function fecha($fecha)
    {
        $fecha = new DateTime($fecha);
		$formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
		$formatter->setPattern('d MMM y');
		//$time = Time::createFromInstance($dt, 'en_US');
		//$actual = new DateTime();  
        //$date = date_create($fecha); 
        //$maildate = date_format($date, "Y/m/d");
        //$maildate = new DateTime($maildate); 
        //$hora = date_format($date, "H:i"); 
        //$dia = date_format($fecha, "d");
		//$mes = date_format($fecha, "M");
        //$año = date_format($fecha, "y"); 

		//$formatted_time = strftime("%e, %b %g", $fecha->getTimestamp());

        //echo $dia.", ".$mes." ".$año;
		//echo $formatted_time;
		echo $formatter->format($fecha);
    }

?>

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<nav class="navbar navbar-expand-lg p-0">
					<a class="navbar-brand" href="<?php echo base_url();?>">
						<img width="132px" src="<?php if(isset($manten[2]->image)) echo base_url("images/Honeyview_logo_transparent.png");?>" alt="Homepage">
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ion-android-menu"></span>
					</button>

					<div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
						<ul class="navbar-nav ml-lg-auto">
							<li class="nav-item @@home">
								<a class="nav-link" href="<?php echo base_url('blog');?>">Inicio</a>
							</li>
							<li class="nav-item dropdown active">
								<a class="nav-link dropdown-toggle" href="<?php echo base_url();?>/blog" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">Blog <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown05">
									<li><a class="dropdown-item active" href="blog-grid.html">Blog Grid</a></li>
									<li><a class="dropdown-item activeSingle" href="blog-single.html">Blog Single</a></li>
									<li><a class="dropdown-item activeRS" href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
									<li><a class="dropdown-item activeLS" href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
									<li><a class="dropdown-item activeFW" href="blog-full-width.html">Blog Full Width</a></li>

									<li class="dropdown dropdown-submenu dropleft">
										<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

										<ul class="dropdown-menu" aria-labelledby="dropdown0501">
											<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
											<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="nav-item @@contact"><a class="nav-link" href="<?php echo base_url('#contact');?>">Contáctanos</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header><!-- header close -->

<section class="page-title imagen">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Blog</h1>
          <p><?php if (isset($manten[1]->text)) echo $manten[1]->text  ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<?php if(isset($posts)) { ?>
				<?php foreach ($posts as $post) { ?>
					<div class="col-md-6">
						<div class="post">
							<?php if($post->tipo == "imagen") { ?>
								<div class="post-thumb">
									<a href="blog/post/<?= $post->slug ?>">
										<img class="img-fluid2" src="<?php echo base_url($post->miniatura);?>" alt="">
									</a>
							<?php }else { ?>
								<div class="post-media post-media-audio">
									<iframe width="100%" height="400" src="<?= $post->miniatura?>" title="YouTube video player" frameborder="0" 
										allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<?php } ?>
								</div>
								<h3 class="post-title"><a href="blog/post/<?= $post->slug ?>"><?= $post->name?></a></h3>
								<div class="post-meta">
									<ul>
										<li>
											<i class="ion-calendar"></i> <?= fecha($post->fecha);  ?>
										</li>
										<li>
											<i class="ion-android-people"></i> PUBLICADO POR <?= $post->firstname; ?>
										</li>
										<li>
											<?php if(isset($post->tags)) { ?>
												<?php foreach ($post->tags as $tag) { ?>
													<a href="/blog/tag/<?= $tag->slug ?>"><i class="ion-pricetags"></i> <?php echo $tag->name; ?> </a>
												<?php } ?>
											<?php } ?>
										</li>
									</ul>
								</div>
								<div class="post-content">
									<p> <?= $post->extract ?> </p>
									<a href="/blog/post/<?= $post->slug ?>" class="btn btn-main">Seguir leyendo</a>
								</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			
		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination post-pagination justify-content-center">
				<p><?php echo $links; ?></p>
			</ul>
		</nav>
	</div>
</div>


<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="copyright mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; 
					dymstudio.dev | 2016 - 2021
				</p>
			</div>
		</div>
	</div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
	<span class="icon ion-ios-arrow-up"></span>
</div>

    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="<?php echo base_url();?>/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick Carousel -->
    <script src="<?php echo base_url();?>/plugins/slick/slick.min.js"></script>
    <script src="<?php echo base_url();?>/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- filter -->
    <script src="<?php echo base_url();?>/plugins/shuffle/shuffle.min.js"></script>
    <script src="<?php echo base_url();?>/plugins/SyoTimer/jquery.syotimer.min.js"></script>

    <script src="<?php echo base_url();?>/js/script.js"></script>

    </body>

    </html>