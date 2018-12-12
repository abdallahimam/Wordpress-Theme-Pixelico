<?php get_header(); ?>
<?php 
    $page_slug ='contact';
    $page_data = get_page_by_path($page_slug);
    $page_id = $page_data->ID;
    
?>
	<div id="primary" class="home">
		<div class="container-fluid">
			<h1 class="text-center pb-5 site-header"><?php echo get_the_title();?></h1>
			<div class="card">
                <div class="card-body text-right">
                    <?php echo $page_data->post_content; ?>
                </div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
