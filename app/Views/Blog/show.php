<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
                    <?php foreach ($posts as $post) { ?>
                        <h2 class="post-title"><?= $post->name ?></h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> <?= fecha($post->fecha);  ?>
                                </li>
                                <li>
                                    <i class="ion-android-people"></i> PUBLICADO POR <a href="<?= base_url() ?>/blog/user/<?= $post->usuario ?>"><?= $post->firstname; ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>/blog/categoria/<?= $post->cat_slug ?>"><i class="ion-android-bookmark"></i> <?= $post->category ?></a>
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
                        <?php if($post->tipo == "imagen") { ?>
                            <div class="post-thumb">
                                <img class="img-fluid" src="<?= base_url($post->miniatura);?>" alt="">
                        <?php }else { ?>
                            <div class="mt-4">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <iframe class="note-video-clip embed-responsive-item" src="<?= $post->miniatura ?>" title="YouTube video player" frameborder="0" 
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                        <?php } ?>
                            </div>
                            <div class="post-content post-excerpt mt-4">
                                
                                <?= $post->body ?>
                            </div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>