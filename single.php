<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pixelico
 */

get_header();
?>

	<div id="primary" class="content-area post-page">
		<div id="main" class="container-fluid">
			<div class="row">
				<?php while ( have_posts() ) : the_post(); wpb_set_post_views(get_the_ID()); ?>
					<div class="col-sm-12 col-md-8">
						<div class="main-post single-post">
							<?php edit_post_link(lang('EDIT') . ' <i class="fa fa-pencil"></i>'); ?>
							<?php edit_post_link(lang('EDIT') . ' <i class="fa fa-pencil"></i>'); ?>
							<h4 class="post-title">
								<?php the_title(); ?>
							</h4>
							<span class="post-author ml-2"><i class="fa fa-user fa-fw fa-lg"></i><?php the_author_posts_link(); ?>,</span>
							<span class="post-date ml-2"><i class="fa fa-calendar fa-fw fa-lg"></i><?php the_time('F j, Y');?>,</span>
							<span class="post-comments">
								<i class="fa fa-comments fa-fw fa-lg"></i>
								<?php comments_popup_link(lang('ZERO_COMMENT'), lang('ONE_COMMENT'), lang('MANY_COMMENTS'), 'comments-url', lang('DISABLED_COMMENTS')); ?>.
							</span>
							<div class="clearfix"></div>
							<?php /* ?>
							<div class="post-image">
								<?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail']); ?>
							</div>
							<?php */ ?>
							<div class="text-right post-images-slider">
								<?php echo pixelico_get_images(get_the_ID()); ?>
								<?php /* ?>
								<div class="customNavigation">
									<a class="btn prev">Previous</a>
									<a class="btn next">Next</a>
									<a class="btn play">Autoplay</a>
									<a class="btn stop">Stop</a>
								</div>
								<?php */ ?>
							</div>
							<div class="post-share">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-4 mb-2">
										<div class="share-facebook border border-primary rounded">
											<a class="btn btn-block text-primary" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;"><?php echo lang('SHARE_ON_FACEBOOK'); ?> <i class="fa fa-facebook"></i></a>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 mb-2">
										<div class="share-twitter border border-twitter rounded">
											<a class="btn btn-block text-twitter" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;"><?php echo lang('SHARE_ON_TWITTER'); ?> <i class="fa fa-twitter"></i></a>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="share-google-plus border border-danger rounded">
											<a class="btn btn-block text-danger" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;"><?php echo lang('SHARE_ON_GOOGLE_PLUS'); ?> <i class="fa fa-google-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="my-4 text-secondary post-content text-right">
								<h3 class="text-secondary"><?php echo lang('DESCRIPTION'); ?></h3>
								<?php the_content(); ?>
							</div>
							<div class="btn-down-like mb-4">
								<div class="row">
									<div class="col-sm-4 col-md-3 mb-3">
										<a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-block btn-success border border-success rounded-0 py-4 btn-download text-right">
											<i class="fa fa-cloud-download"></i> <?php echo lang('DOWNLOAD'); ?> (<span><?php echo wpb_get_post_downloads(get_the_ID());?></span>)
										</a>
									</div>
									<?php /*
									<!--
									<div class="col-sm-4 col-md-3 mb-3">
										<a href="javascript:void(0)" id="buttonLike" class="btn btn-block border border-danger rounded-0 py-4 btn-like">
											<i class="fa fa-heart"></i> <?php echo lang('LIKE'); ?> (<span id="singlePostLikes"><?php echo wpb_get_post_likes(get_the_ID());?></span>)
										</a>
									</div>
									-->
									*/ ?>
								</div>
							</div>
							<p class="text-right post-categories"><i class="fa fa-tags fa-fw fa-lg"></i><?php the_category(', '); ?></p>
							<?php if (has_tag()) {  ?>
								<p class="text-right post-tags"><i class="fa fa-key fa-fw fa-lg"></i>
									<?php the_tags(lang('TAGS', ' - ')); ?>
								</p>
							<?php } ?>
						</div>
						<div class="clearfixr"></div>
						<hr>
						<div class="random-posts">
							<?php
								$random_posts_per_page = count_user_posts(get_the_author_meta('ID')) < $random_posts_per_page ? count_user_posts(get_the_author_meta('ID')) : 8;
								$author_random_posts_args = array(
									'catagory__in'      => wp_get_post_categories(get_queried_object_id()),
									'post__not__in'     => array(get_queried_object_id()),
									'orderby'           => 'rand',
									'posts_per_page'    => $random_posts_per_page
								);
								$author_posts = new WP_Query($author_random_posts_args);
								if ($author_posts->have_posts()) { ?>
								<h4 class="text-right random-posts-header"><?php echo lang('SEE_ALSO') ?></h4>
								<hr>
								<div class="row">
									<?php
										while ($author_posts->have_posts()) { 
											$author_posts->the_post(); ?>
											<div class="col-md-4 col-sm-6 p-0 mb-3">
												<div class="single-post m-0 p-3">
													<div class="row">
														<div class="col-12 p-0">
															<div class="post-image">
																<a href="<?php the_permalink() ?>">
																	<?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail d-block mx-auto']); ?>
																</a>
															</div>
														</div>
														<div class="col-12 m-0 p-0 text-right">
															<a href="<?php the_permalink(); ?>" class="py-2 d-block">
																<h4 class="p-0 post-title">
																	<?php the_title(); ?>
																</h4>
																<span><?php echo lang('ADDED_ON') ?> <?php the_time('F j, Y'); ?></span>
															</a>
														</div>
													</div>
												</div>
											</div>
									<?php } ?>
								</div>
								<hr class="mt-0">
							<?php }
							wp_reset_postdata();
							?>
						</div>
						<div class="clearfixr"></div>
						<div class="about-author text-right">
							<div class="row">
								<div class="col-md-2">
									<?php
									echo get_avatar(get_the_author_meta('ID'), 96, '', 'User avatar', array('class' => 'img-responsive img-thumbnail'));
									?>
								</div>
								<div class="col-md-10">
									<h5 class="post-author-name">
										<?php
										if (!get_the_author_meta('first_name') && !get_the_author_meta('last_name')) {
											if (get_the_author_meta('nickname')) {
												the_author_posts_link();
											} else {
												echo lang('NO_NAME');
											}
										} else {
										?>
										<?php
											the_author_meta('first_name');
										?>
										<?php the_author_meta('last_name'); ?>
										<span class="nickname">
											<?php
											if (get_the_author_meta('nickname')) {
												echo '( ';
												the_author_posts_link();
												echo ' )';
											}
										}
											?>
										</span>
									</h5>
									<?php if (get_the_author_meta('description')) { ?>
										<p class="post-author-bio"><?php the_author_meta('description'); ?></p>
									<?php } else { ?>
										<p class="post-author-bio"><?php echo lang('NO_BIO'); ?></p>
									<?php } ?>
									<hr />
									<div class="author-stats">
										<div class="row">
											<div class="col-md-6">
												<p class="author-posts-count mt-2 mb-1"><span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span> <?php echo lang('POSTS'); ?></p>
											</div>
											<div class="col-md-6">
												<p class="author-posts-count mt-2 mb-1"><span><?php echo ps_count_user_comments(); ?></span> <?php echo lang('COMMENTS'); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<hr class="comment-separator" />
						<div class="w-100" id="comments">
							<?php comments_template(); ?>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endwhile; // End of the loop. ?>
			</div>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
