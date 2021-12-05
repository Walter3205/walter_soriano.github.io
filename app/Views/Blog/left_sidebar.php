<div class="page-wrapper">
	<div class="container">
		<div class="row">
            <div class="col-lg-4 order-1 order-lg-0">
				<div class="pr-0 pr-xl-4">
					<aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
	                    <!-- Widget Latest Posts -->
	                    <div class="widget widget-latest-post">
		                    <h4 class="widget-title">Últimas publicaciones</h4>
                            <?php if(isset($latest_posts)) { ?>
                                <?php foreach ($latest_posts as $lastest_post) { ?>
                                    <div class="media">
                                        <?php if($lastest_post->tipo == "imagen") { ?>
                                            <a class="pull-left" href="<?= base_url() ?>/blog/post/<?= $lastest_post->slug ?>">
                                                <img class="media-object" src="<?= base_url($lastest_post->miniatura);?>" alt="Image">
                                            </a>
                                        <?php }else { ?>
                                            <div class="media-object">
                                            <iframe  width="90px" height="90px" src="<?= $lastest_post->miniatura?>" title="YouTube video player" frameborder="0" 
                                                allow="encrypted-media; gyroscope;" allowfullscreen></iframe>
                                            </div>
                                        <?php } ?>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="<?= base_url() ?>/blog/post/<?= $lastest_post->slug ?>"><?= $lastest_post->name ?></a></h4>
                                            <p><?php echo substr($lastest_post->extract,0,75); if(strlen($lastest_post->extract) > 75) echo '...' ?></p>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php } ?>
                        </div>
                        <!-- End Latest Posts -->

                        <!-- Widget Category -->
                        <div class="widget widget-category">
                            <h4 class="widget-title">Categorías</h4>
                            <ul class="widget-category-list">
                                <?php if (isset($categorias)) { ?>
                                    <?php foreach($categorias as $categoria) { ?>
                                        <li>
                                            <a href="<?= base_url() ?>/blog/categoria/<?= $categoria->slug ?>"><?= $categoria->name ?></a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div> <!-- End category  -->

                        <!-- Widget tag -->
                        <div class="widget widget-tag">
                            <h4 class="widget-title">Nube de Etiquetas</h4>
                            <ul class="widget-tag-list">
                                <?php if (isset($tags)) { ?>
                                    <?php foreach($tags as $tag) { ?>
                                        <li>
                                            <a href="<?= base_url() ?>/blog/tag/<?= $tag->slug ?>"><?= $tag->name ?></a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div> <!-- End tag  -->
                    </aside>
                </div>
            </div>
			<div class="col-lg-8 order-0 order-lg-1">
                <?php if(isset($posts)) { ?>
                    <?php foreach ($posts as $post) { ?>
                        <div class="post">
                            <?php if($post->tipo == "imagen") { ?>
                                <div class="post-media post-thumb">
                                    <a href="<?= base_url() ?>/blog/post/<?= $post->slug ?>">
                                        <img class="img-fluid2" src="<?php echo base_url($post->miniatura);?>" alt="">
                                    </a>
                            <?php }else { ?>
                                <div class="post-media post-media-audio">
                                    <iframe width="100%" height="400" src="<?= $post->miniatura?>" title="YouTube video player" frameborder="0" 
                                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php } ?>
                                </div>
                                <h3 class="post-title"><a href="<?= base_url() ?>/blog/post/<?= $post->slug ?>"><?= $post->name?></a></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li>
                                            <i class="ion-calendar"></i> <?= fecha($post->fecha);  ?>
                                        </li>
                                        <li>
                                            <i class="ion-android-people"></i> PUBLICADO POR <a href="<?= base_url() ?>/blog/user/<?= $post->usuario ?>"><?= $post->firstname; ?></a>
                                        </li>
                                        <li>
                                            <?php if(isset($post->tags)) { ?>
                                                <?php foreach ($post->tags as $tag) { ?>
                                                    <?php $result = end($post->tags);  ?>
                                                    <a href="<?= base_url() ?>/blog/tag/<?= $tag->slug ?>"><i class="ion-pricetag"></i> <?= $tag->name ?><?php if($result->name != $tag->name) { echo ','; } ?></a>
                                                <?php } ?>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p> <?= $post->extract ?> </p>
                                    <a href="<?= base_url() ?>/blog/post/<?= $post->slug ?>" class="btn btn-main">Seguir leyendo</a>
                                </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination post-pagination justify-content-center">
                        <p><?php echo $links; ?></p>
                    </ul>
                </nav>
			</div>
		</div>
	</div>
</div>
