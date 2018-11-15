<?php get_header(); ?>
<?php
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
?>

	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-2 site-header"><?php echo bloginfo('name') ?></h1>
			<p class="text-center text-secondary h5 mb-5 tagline"><?php echo bloginfo('description') ?></p>
			<div class="row">
				<div class="col-12">
					<div id="downloads" class="row">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="d-inline-block w-100 m-0 mb-4 post">
									<div class="item" id="<?php get_the_ID() ?>">
										<a href="<?php the_permalink() ?>" class="head-item side-modal item-ajax">
											<div class="dim"></div>
											<?php the_post_thumbnail(); ?>
										</a>
										<a class="item-content side-modal" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
											<h3><?php the_title() ?></h3>
											<span class="the-date"><?php the_time( 'F jS, Y' ); ?></span>
										</a>
										<div class="item-info">
											<!--
											<a href="javascript:void(0)" id="buttonLike<?php echo get_the_ID(); ?>" class="btn btn-sm like" data-id="<?php echo get_the_ID(); ?>">
												<img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
												<b class="like-counter"><?php echo wpb_get_post_likes(get_the_ID());?></b>
											</a>
											-->
											<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-sm download side-modal">
												<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>">
												<b class="download-counter"><?php echo wpb_get_post_downloads(get_the_ID());?></b>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; else : ?>
							<p class="d-block w-100 text-center"><?php echo lang('NO_CONTENT'); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-12">
						<div class="posts-paginator">
							<?php get_custom_pagination(); ?>
						</div>
					</div>
					<!--
					<input type="hidden" id="total_downloads" value="<?php echo $published_posts; ?>">
					<input type="hidden" id="page_number" value="1">
					<div class="divloadmore animated fadeInUp" id="showloadmore" style="display: block;"><p><?php echo lang('NO_MORE_DOWNLOADS_TO_LOAD')?></p></div>
					<div class="divloadmore" id="loading" style="display: none;">
						<button id="loadMore" class="btn btn-danger btn-lg btn-block">
							<div class="load_more">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</button>
					</div>-->
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
