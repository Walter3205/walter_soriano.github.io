<div class="page-wrapper">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
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
			</div>
		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination post-pagination justify-content-center">
				<p><?php echo $links; ?></p>
			</ul>
		</nav>
	</div>
</div>