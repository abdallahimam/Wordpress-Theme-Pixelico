<?php get_header() ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container text-center h-100 page-not-found">
			<div class="row">
				<div class="col-md-12">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h1>Oops!</h1>
							</div>
							<h2>404 - Page not found</h2>
							<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
							<a href="<?php echo get_site_url() ;?>">Go To Homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer() ?>