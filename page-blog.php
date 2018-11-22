<?php get_header(); ?>

<?php
    // the query
	$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1));

	/**
	 * Get Latest Download Posts
	 */
	$latest_downloads = new WP_Query( array( 'numberposts' => '5', 'posts_per_page' => 5, 'meta_key' => 'wpb_post_downloads_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );

	//$args = array( 'numberposts' => '5', 'meta_key' => 'wpb_post_downloads_count' );
	//$recent_posts = wp_get_recent_posts( $args );
?>

	<div id="primary" class="home page-blog">
		<div class="container-fluid">
			<h1 class="text-center pb-2 site-header"><?php echo bloginfo('name') ?></h1>
			<p class="text-center text-secondary h5 mb-5 tagline"><?php echo bloginfo('description') ?></p>
			<div class="row">
				<div class="col-md-8">
					<?php if ( $wpb_all_query->have_posts() ) : while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
						<div class="row blog-post" id="<?php get_the_ID() ?>">
							<div class="col-md-7 text-right">
								<div class="d-inline-block w-100 m-0 mb-4 post-info">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
										<h3><?php the_title() ?></h3>
										<span class="post-date"><?php the_time( 'F jS, Y' ); ?></span>
										<?php the_excerpt(); ?>
									</a>
								</div>
							</div>
							<div class="col-md-5">
								<div class="d-inline-block w-100 m-0 mb-4">
									<a href="<?php the_permalink() ?>" class="head-item side-modal item-ajax">
										<div class="dim"></div>
										<?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail']); ?>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); else : ?>
						<p class="d-block w-100 text-right"><?php echo lang('NO_CONTENT'); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<div class="my-sidebar mt-0">
						<div class="widgets">
							<div class="widget">
								<h4 class="widget-title text-right"><?php echo lang('LATEST_DOWNLOADS_TITLE'); ?></h4>
								<div class="widget-body">
									<?php if($latest_downloads->have_posts()) : ?>
									<ul class="list-unstyled popular-list">
										<?php while($latest_downloads->have_posts()) : $latest_downloads->the_post(); ?>
											<li class="row popular-post mb-3">
												<div class="col-6 p-0 text-right">
													<a target="_blank" href="<?php echo the_permalink() ?>" class="d-block w-100 h-100 py-4 px-2">
														<h6 class="mb-3"><?php echo the_title(); ?></h6>
														<p><?php echo lang('ADDED_ON');?> <span><?php the_time('F j, Y'); ?></span></p>
													</a>
												</div>
												<div class="col-6 p-0">
													<a href="<?php echo the_permalink() ?>" class="d-block w-100">
														<?php echo the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail']); ?>
													</a>
												</div>
											</li>
										<?php endwhile; ?>
									</ul>
									<?php else: ?>
										<div class="text-center h4">
											<?php echo lang('NO_CONTENT'); ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
