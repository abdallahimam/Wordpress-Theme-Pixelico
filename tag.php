<?php get_header(); ?>

<?php
	/*
    global $wpdb;
    $cat_ID = get_queried_object()->cat_ID;
    // this query to get the number of comments in the current category.
    $query = "SELECT SUM(p.comment_count) AS count, t.name, t.term_id FROM wp_posts p
    JOIN wp_term_relationships tr ON tr.object_id = p.ID
    JOIN wp_term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
    JOIN wp_terms t ON t.term_id = tt.term_id
    WHERE t.term_id = $cat_ID
    AND p.post_status = 'publish'
    GROUP BY t.term_id";
    $categories = $wpdb->get_results($query);
    $comments_count = $categories[0]->count;
	$posts_count    = get_queried_object();
	*/
?>

	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-5 site-header"><?php single_tag_title(); ?></h1>
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
									<a href="javascript:void(0);" class="btn btn-sm like">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
										<b id="id-pex-free-psd-template">35</b>
									</a>
									<a href="<?php echo get_post_meta(get_the_ID(), 'download_link', true) ?>" class="btn btn-sm download side-modal">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> 189
									</a>
									-->
									<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-sm download side-modal">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> <?php echo wpb_get_post_downloads(get_the_ID());?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; else : ?>
					<p class="d-block w-100 text-center"><?php echo lang('NO_CONTENT'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
