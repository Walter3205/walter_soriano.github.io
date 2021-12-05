<body id="body">

<?php

    function fecha($fecha)
    {
        $fecha = new DateTime($fecha);
		$formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
		$formatter->setPattern('d, MMM y');
		echo $formatter->format($fecha);
    }

?>

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg p-0">
					<a class="navbar-brand" href="<?= base_url();?>">
						<img width="132px" src="<?php if(isset($manten[2]->image)) echo base_url("images/Honeyview_logo_transparent.png");?>" alt="Homepage">
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ion-android-menu"></span>
					</button>

					<div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
						<ul class="navbar-nav ml-lg-auto">
							<li class="nav-item @@home">
								<a class="nav-link" href="<?= base_url('blog');?>">Inicio</a>
							</li>
							<li class="nav-item dropdown active">
								<a class="nav-link dropdown-toggle" href="<?= base_url();?>/blog" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">Blog <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown05">
									<li><a class="dropdown-item <?php if($segment =='blog' || $segment == 'blog-grid') echo "active"; ?>" href="<?= base_url();?>/blog-grid">Blog Grid</a></li>
									<li><a class="dropdown-item <?php if($segment =='blog-right-sidebar') echo "active"; ?>" href="<?= base_url();?>/blog-right-sidebar">Blog Right Sidebar</a></li>
									<li><a class="dropdown-item <?php if($segment =='blog-left-sidebar') echo "active"; ?>" href="<?= base_url();?>/blog-left-sidebar">Blog Left Sidebar</a></li>
									<li><a class="dropdown-item <?php if($segment =='blog-full-width') echo "active"; ?>" href="<?= base_url();?>/blog-full-width">Blog Full Width</a></li>
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