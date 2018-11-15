<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pixelico
 */

get_header();
?>

	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-2 site-header"><?php echo bloginfo('name') ?></h1>
			<p class="text-center text-secondary h5 mb-5 tagline"><?php echo bloginfo('description') ?></p>
			<div class="row">
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
									<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-sm like">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
										<b id="download-counter"><?php echo wpb_get_post_downloads(get_the_ID());?></b>
									</a>-->
									<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-sm download side-modal">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> <?php echo wpb_get_post_downloads(get_the_ID());?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts yet.' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
