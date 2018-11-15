<?php
    /**
     * Template Name: Search Page
     */

    global $query_string;

    wp_parse_str( $query_string, $search_query );
    $search_result = new WP_Query( $search_query );
?>

<?php get_header(); ?>

	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-2 site-header"><?php echo esc_html_e( 'Search Result For...', 'pixelico' ); ?></h1>
			<p class="text-center text-secondary h5 mb-5 tagline"><?php echo $search_query['s']; ?></p>
			<div class="row">
				<?php if ( $search_result->have_posts() ) : while ( $search_result->have_posts() ) : $search_result->the_post(); ?>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
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
									<a href="javascript:void(0);" class="btn btn-sm like">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
										<b id="id-pex-free-psd-template">35</b>
									</a>
									<a href="<?php echo get_post_meta(get_the_ID(), 'download_link', true) ?>" class="btn btn-sm download side-modal">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> 189
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); else : ?>
					<p><?php esc_html_e( 'Sorry, no posts yet.' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>
