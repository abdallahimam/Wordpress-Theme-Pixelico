<?php get_header() ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container text-center h-100 page-not-found">
			<div class="row">
				<div class="col-md-12">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h1><?php echo lang('OOPS'); ?></h1>
							</div>
							<h2><?php echo lang('PAGE_NOT_FOUND_HEAD'); ?></h2>
							<p><?php echo lang('PAGE_NOT_FOUND_TEXT'); ?></p>
							<a href="<?php echo get_site_url() ;?>"><?php echo lang('GO_TO_HOME'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer() ?>