<?php get_header(); ?>

<?php
$args = array(
	'numberposts' 		=> 12,
	'offset' 			=> 0,
	'category' 			=> 0,
	'orderby' 			=> 'post_date',
	'order' 			=> 'DESC',
	'include' 			=> '',
	'exclude' 			=> '',
	'meta_key' 			=> '',
	'meta_value' 		=>'',
	'post_type' 		=> 'post',
	'post_status' 		=> 'draft, publish, future, pending, private',
	'suppress_filters' 	=> true
);
$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
?>

	<div id="primary" class="home page-latest-posts">
		<div class="container-fluid">
			<h1 class="text-center pb-2 site-header"><?php echo bloginfo('name') ?></h1>
			<p class="text-center text-secondary h5 mb-5 tagline"><?php echo bloginfo('description') ?></p>
			<div class="row">
				<?php if ( $recent_posts ) : foreach ($recent_posts as $post) : ?>
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="d-inline-block w-100 m-0 mb-4 post">
							<div class="item" id="<?php echo $post['ID'] ?>">
								<a href="<?php echo get_permalink($post['ID']) ?>" class="head-item side-modal item-ajax">
									<div class="dim"></div>
									<?php echo get_the_post_thumbnail($post['ID']); ?>
								</a>
								<a class="item-content side-modal" href="<?php the_permalink($post['ID']) ?>" rel="bookmark" title="Permanent Link to <?php echo $post['post_title'] ?>">
									<h3><?php echo $post['post_title'] ?></h3>
									<span class="the-date"><?php echo get_post_time( 'F jS, Y', true, $post['ID'] ); ?></span>
								</a>
								<div class="item-info">
									<!--
									<a href="javascript:void(0)" id="buttonLike<?php echo $post['ID']; ?>" class="btn btn-sm like" data-id="<?php echo $post['ID']; ?>">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
										<b class="like-counter"><?php echo wpb_get_post_likes($post['ID']);?></b>
									</a>
									-->
									<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ $post['ID']; ?>" class="btn btn-sm download side-modal">
										<img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> <?php echo wpb_get_post_downloads($post['ID']);?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; wp_reset_query(); else : ?>
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
