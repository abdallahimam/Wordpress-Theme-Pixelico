<?php
    /**
     * get some statistics about blog.
     */
    global $wpdb;

    $comments_count = 0;
    $posts_count    = 0;

    $recent_posts = null;

    if (is_category()) {
        /*
        $categories = get_categories(array(
        'hide_empty'   => 0,
        'hierarchical' => 0,
        'exclude' => '1' //exclude uncategorised
        ));

        // create a comma separated string of category ids
        // used for SQL `WHERE IN ()`
        $category_ids = implode(',', array_map(function($cat) {
        return $cat->term_id;
        }, $categories));

        // this query to get the number of comments in all categories.
        $query_all = "SELECT SUM(p.comment_count) AS count, t.name FROM wp_posts p
        JOIN wp_term_relationships tr ON tr.object_id = p.ID
        JOIN wp_term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
        JOIN wp_terms t ON t.term_id = tt.term_id
        WHERE t.term_id in ($category_ids)
        AND p.post_status = 'publish'
        GROUP BY t.term_id";
        */
        /*
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
        
        // get latest posts.
        $args = array( 'numberposts' => '5', 'category' => $cat_ID );
        $recent_posts = wp_get_recent_posts( $args );
        
        // get hot posts.
        $hot_posts_args = array(
            'posts_per_page'    => 5,
            'cat'               => $cat_ID,
            'orderby'           => 'comments_count'
        );
        $hot_posts = new WP_query($hot_posts_args);
        */

    } else {
        $comments_count = get_comments(array('count' => true));
        $posts_count = wp_count_posts();

        $args = array( 'numberposts' => '5');
        $recent_posts = wp_get_recent_posts( $args );
        
        // get hot posts.
        /*
        $hot_posts_args = array(
            'posts_per_page'    => 5,
            'orderby'           => 'comments_count'
        );
        $hot_posts = new WP_query($hot_posts_args);
        */
        // Popular posts.
	    $popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );

    }
?>

<div class="my-sidebar">
    <div class="widgets">
		<div class="widget">
			<h4 class="widget-title text-right mt-2"><?php echo lang('LATEST') ?></h4>
			<div class="widget-body">
				<ul class="list-unstyled popular-list">
					<?php foreach($recent_posts as $post) { ?>
						<li class="row popular-post mb-3">
                            <div class="col-6 p-0 text-right">
                                <a target="_self" href="<?php echo get_permalink($post['ID']) ?>" class="d-block w-100 h-100 py-4 px-2">
                                    <h6 class="mb-3"><?php echo $post['post_title']; ?></h6>
                                    <p><?php echo lang('ADDED_ON'); ?> <span><?php echo date('F j, Y', strtotime($post['post_date'])); ?></span></p>
                                </a>
                            </div>
							<div class="col-6 p-0">
								<a href="<?php echo get_permalink($post['ID']) ?>" class="d-block w-100">
									<?php echo get_the_post_thumbnail($post['ID'], '', ['class' => 'img-responsive img-thumbnail']); ?>
								</a>
							</div>
						</li>
					<?php } wp_reset_query(); ?>
				</ul>
			</div>
        </div>
        <?php if ( $popularpost->have_posts() ) : ?>        
            <div class="widget">
                <h4 class="widget-title text-right"><?php echo lang('POPULAR') ?></h4>
                <div class="widget-body">
                    <ul class="list-unstyled popular-list">
                        <?php while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
                            <li class="row popular-post mb-3">
                                <div class="col-6 p-0 text-right">
                                    <a target="_self" href="<?php  the_permalink() ?>" class="d-block w-100 h-100 py-3 px-2">
                                        <h6 class="mb-3"><?php the_title(); ?></h6>
                                        <p><?php echo lang('ADDED_ON'); ?> <span><?php the_time('F j, Y'); ?></span></p>
                                    </a>
                                </div>
                                <div class="col-6 p-0">
                                    <a href="<?php  the_permalink() ?>" class="d-block w-100">
                                        <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail']); ?>
                                    </a>
                                </div>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
