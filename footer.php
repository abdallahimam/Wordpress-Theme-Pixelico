<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixelico
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="top-header-social">
			<div class="container-fluid">
				<div class="row">
					<div class="col-left">
						<p class="top-head-name"><?php echo lang('COPYRIGHT'); ?> &copy; <?php echo date('Y'); ?></p>
					</div>
					<div class="col-right">
						<ul class="social-top social">
							<li class="social-btn"><a href="<?php echo of_get_option('pixelico_facebook_link'); ?>" 	class="social-icon facebook" 	target="_self"><i class="fa fa-facebook"></i></a></li>
							<li class="social-btn"><a href="<?php echo of_get_option('pixelico_google_plus_link'); ?>" 	class="social-icon google" 		target="_self"><i class="fa fa-google-plus"></i></a></li>
							<li class="social-btn"><a href="<?php echo of_get_option('pixelico_twitter_link'); ?>" 		class="social-icon twitter" 	target="_self"><i class="fa fa-twitter"></i></a></li>
						</ul>
						<div class="top-bar pr-3">
							<ul>
								<li class="">
									<a href="<?php echo get_site_url(); ?>/wp-admin" target="_self" style="">
										<i class="fa fa-newspaper-o p-1"></i>
										<span><?php echo lang('ADMIN') ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo get_site_url(); ?>/page/about" target="_self" style="">
										<i class="fa fa-question-circle p-1"></i>
										<span><?php echo lang('ABOUT_US') ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo get_site_url(); ?>/page/contact" target="_self" style="">
										<i class="fa fa-envelope p-1"></i>
										<span><?php echo lang('CONTACT_US') ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo get_site_url(); ?>/page/privacy-policy" target="_self" style="">
										<i class="fa fa-envelope p-1"></i>
										<span><?php echo lang('PRIVACY_POLICY') ?></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
