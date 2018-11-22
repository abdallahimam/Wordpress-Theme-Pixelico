<?php get_header(); ?>

<?php
	$popularpost = new WP_Query( array( 'posts_per_page' => 12, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
?>

	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-5 site-header"><i class="fa fa-star"></i> <?php echo lang('POPULAR');?></h1>
			<div class="row">
				<?php if ( $popularpost->have_posts() ) : while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
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
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> <?php echo wpb_get_post_downloads(get_the_ID());?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); else : ?>
					<p class="d-block w-100 text-center"><?php echo lang('NO_CONTENT'); ?></p>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="posts-paginator">
						<?php get_custom_pagination(); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
