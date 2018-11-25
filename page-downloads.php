<?php get_header(); ?>
<?php
if (isset($_GET['post']) !== null) {
    //$slug = $_GET['post'];
    /*
    $args = [
        'name'          => $slug,
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'numberposts'   => 1
    ];
    */
    //$downloadLink = $post['download_link'];
    $id = $_GET['post'];
    $post = get_post($id);
    if ($post) {
        $downloadLink = get_post_meta($id, 'download_link', true);
        //wpb_set_post_downloads($id);
    }
}
?>
<?php
	$most_downloads = new WP_Query( array( 'posts_per_page' => 12, 'meta_key' => 'wpb_post_downloads_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
?>
<?php if (is_page('Downloads')) : ?>
    <div class="home page-download" id="primary">
        <div class="container-fluid">
            <div class="text-center border-0 rounded-0 py-5">
                <h3 id="downloadHeading"><?php echo lang('DOWNLOAD_WAITING_TEXT') ?></h3>
                <p class="text-center lead text-secondary mt-3" id="downloadCounterDown"><?php echo lang('DOWNLOAD_WAITING_COUNTER_TEXT') ?></p>
                <a download="<?php echo $id; ?>" id="downloadLink" href="<?php echo $downloadLink ?>" target="_blank" class="btn btn-success btn-lg text-light mt-3" rel="noopener noreferrer"><?php echo lang('DOWNLOAD_BUTTON_TEXT') ?></a>
            </div>
            <hr>
            <div class="latest-downloads text-right">
                <h3 class="text-center p3-5 pb-4"><?php echo lang('LATEST_DOWNLOADS_TITLE') ?></h3>
                <div class="row">
                    <?php if ( $most_downloads->have_posts() ) : while ( $most_downloads->have_posts() ) : $most_downloads->the_post(); ?>
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
                                        <?php /*
                                        <!--
                                        <a href="javascript:void(0);" class="btn btn-sm like">
                                            <img src="<?php echo get_template_directory_uri() . '/images/icon_like.png' ?>">
                                            <b id="id-pex-free-psd-template">35</b>
                                        </a>
                                        <a href="<?php echo get_post_meta(get_the_ID(), 'download_link', true) ?>" class="btn btn-sm download side-modal">
                                            <img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> 189
                                        </a>
                                        -->
                                        */ ?>
                                        <a href="<?php echo get_site_url(); ?>/downloads/?post=<?php echo /*basename(get_permalink());*/ get_the_ID(); ?>" class="btn btn-sm download side-modal">
                                            <img src="<?php echo get_template_directory_uri() . '/images/icon_download.png' ?>"> <?php echo wpb_get_post_downloads(get_the_ID());?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); else : ?>
                        <p class="d-block w-100 text-center"><?php echo lang('NO_CONTENT'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
