<?php
/**
 * pixelico functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pixelico
 */

//////////////////////////////////////
////         Load languages 
require(get_template_directory() . '/languages/arabic.php');

require_once('class-wp-bootstrap-navwalker.php');


if ( ! function_exists( 'pixelico_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pixelico_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pixelico, use a find and replace
		 * to change 'pixelico' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pixelico', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pixelico' ),
			'navbar-menu' => 'Navbar navigation menu',
			'footer-menu' => 'Footer navigation menu',

		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pixelico_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pixelico_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pixelico_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pixelico_content_width', 640 );
}
add_action( 'after_setup_theme', 'pixelico_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pixelico_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pixelico' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pixelico' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pixelico_widgets_init' );

/**
 * Function get number od comments for a specific user.
 * by using get_var(?).
 */
function ps_count_user_comments() {
    global $wpdb, $current_user;
    get_currentuserinfo();
    $userId = $current_user->ID;

    $count = $wpdb->get_var('
             SELECT COUNT(comment_ID) 
             FROM ' . $wpdb->comments. ' 
             WHERE user_id = "' . $userId . '"');
    return $count;
}


/**
 * Function add navbar of wordpress.
 * this function allows you to add your navbar to the theme.
 * by using wp_nav_menu(?).
 */
function include_navbar_template_menu() {
    wp_nav_menu(array(
		'theme_location'    => 'navbar-menu',
		'menu_class'		=> 'navbar-nav mr-auto parent',
        'container'         => false,
        'depth'             => 2,
        'walker'            => new WP_Bootstrap_Navwalker(),
    ));
}

function include_footer_template_menu() {
    wp_nav_menu(array(
		'theme_location'    => 'footer-menu',
		'menu_class'		=> 'navbar-nav mr-auto parent',
        'container'         => false,
        'depth'             => 2,
        'walker'            => new WP_Bootstrap_Navwalker(),
    ));
}

/**
 * Function add_styles
 * this function is used to add stylesheets of my template.
 * by using helper function which is wp_enququ_style(?, ?, ?, ?, ?)
 */
function add_styles() {
    wp_enqueue_style('bootstarp-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
    // wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
    // wp_enqueue_style('owl-carousel-theme-default-css', get_template_directory_uri() . '/css/owl.theme.default.min.css');
    // wp_enqueue_style('main-css', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/style-rtl.css');
}

/**
 * Function add_scripts
 * this function is used to add scripts of my template.
 * by using helper function which is wp_enququ_script(?, ?, ?, ?, ?)
 */
function add_scripts() {
    /// remove jquery from the registration in the wordpress to change its position to end of page.
    wp_deregister_script('jquery');

    /// register the jquery to new position at the buttom ot the page.
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), false, true);

    /// enqueue the scripts that you need.
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstarp-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
    // wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/style.js', array(), false, true);

    /// add in case of IE less than 9.
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js');
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
}

/**
 * Function add action
 * this function is used to add scripts and styles which are in above two functions by calling theme
 * by using add_action(?, ?, ?, ?)
 */
add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');

// register the ajax action for authenticated users
add_action('wp_ajax_increase_post_counter', 'increase_post_counter');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_increase_post_counter', 'increase_post_counter');

// handle the ajax request
function increase_post_counter() {
    $post_id = $_REQUEST['post_id'];
	$counter_type = $_REQUEST['counter_type'];
	if ($counter_type === 'LIKE') {
		wpb_set_post_likes($post_id);
		wp_send_json_success(wpb_get_post_likes($post_id));
	} elseif ($counter_type === 'DOWNLOAD') {
		wpb_set_post_downloads($post_id);
		wp_send_json_success(wpb_get_post_downloads($post_id));
	}

    // add your logic here...

    // in the end, returns success json data
    // wp_send_json_success([]);

    // or, on error, return error json data
    // wp_send_json_error([/* some data here */]);
}


/**
 * create custom pagination.
 * by using paginate_liks(?).
 */
function get_custom_pagination() {
    global $wp_query;
    $all_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
    if ($all_pages > 1) {
        $custome_paginate = paginate_links(array(
            'base'      => get_pagenum_link() . '%_%',
            'format'    => 'page/%#%',
            'current'   => $current_page
        ));
        echo $custome_paginate;
    }
}


/****************************************************************************************************/
/****************************** Function To Add views_count field to posts **************************/
/****************************************************************************************************/
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/****************************************************************************************************/
/****************************** Function To Get views_count from posts ******************************/
/****************************************************************************************************/
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/****************************************************************************************************/
/****************************** Function To Add downloads_count field to posts **************************/
/****************************************************************************************************/
function wpb_set_post_downloads($postID) {
    $count_key = 'wpb_post_downloads_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/****************************************************************************************************/
/****************************** Function To Get downloads_count from posts ******************************/
/****************************************************************************************************/
function wpb_get_post_downloads($postID){
    $count_key = 'wpb_post_downloads_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/****************************************************************************************************/
/****************************** Function To Add downloads_count field to posts **************************/
/****************************************************************************************************/
function wpb_set_post_likes($postID) {
    $count_key = 'wpb_post_likes_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/****************************************************************************************************/
/****************************** Function To Get downloads_count from posts ******************************/
/****************************************************************************************************/
function wpb_get_post_likes($postID){
    $count_key = 'wpb_post_likes_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/*************************************************************/
/******************* Create users_ip Table *******************/
/*************************************************************/
function my_plugin_create_db_2() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'users_ip';

	$sql = "CREATE TABLE $table_name (
		id int(9) NOT NULL AUTO_INCREMENT,
		ip varchar(20) NOT NULL UNIQUE ,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	$table_name = $wpdb->prefix . 'user_log';

	$sql = "CREATE TABLE $table_name (
		id 				int(9) 		NOT NULL AUTO_INCREMENT,
		user_ip 		varchar(20) NOT NULL,
		post_id 		bigint(20) 	NOT NULL,
		click_download 	bit 		DEFAULT 0,
		click_like 		bit 		DEFAULT 0,
		CONSTRAINT fk_user_id_in_user_log FOREIGN KEY (user_ip) REFERENCES wp_users_ip(id),
		CONSTRAINT fk_post_id_in_user_log FOREIGN KEY (post_id) REFERENCES wp_posts(ID)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

my_plugin_create_db_2();