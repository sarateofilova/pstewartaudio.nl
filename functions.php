<?php
/**
 * @package patstewart
 */

if ( ! function_exists( 'patstewart_setup' ) ) :
	
	function patstewart_setup() {
		load_theme_textdomain( 'patstewart', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'patstewart' ),
		) );

	}
endif;
add_action( 'after_setup_theme', 'patstewart_setup' );

/**
 * @global int $content_width
 */
function patstewart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'patstewart_content_width', 640 );
}
add_action( 'after_setup_theme', 'patstewart_content_width', 0 );

/**
 * Register widget area.
 */
function patstewart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'gigPress', 'patstewart' ),
		'id'            => 'gig-press',
		'description'   => esc_html__( 'Add widgets here.', 'patstewart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'discography', 'patstewart' ),
		'id'            => 'discography',
		'description'   => esc_html__( 'Add widgets here.', 'patstewart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'patstewart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function patstewart_scripts() {
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style( 'bootstrap' );
	
	wp_enqueue_style( 'Montserrat', "https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap&subset=cyrillic-ext" );
	wp_enqueue_style( 'fontawesome', "https://use.fontawesome.com/releases/v5.11.2/css/all.css" );

	wp_enqueue_style( 'patstewart-style', get_template_directory_uri() . '/assets/dist/css/theme.min.css' );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'patstewart-slider-bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'isotope-ajax', get_template_directory_uri() . '/assets/dist/js/isotope-ajax.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'patstewart-script', get_template_directory_uri() . '/assets/dist/js/main.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'patstewart_scripts' );

function patstewart_load_stylesheet() {
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


function global_notice_meta_box() {

    $screens = array( 'albums' );

    foreach ( $screens as $screen ) {
        add_meta_box(
            'global-notice',
            __( 'Global Notice', 'sitepoint' ),
            'global_notice_meta_box_callback',
            $screen
        );
    }
}

add_action( 'add_meta_boxes', 'global_notice_meta_box' );


function albums_post_type() {
   
	// Labels
	 $labels = array(
		 'name' => _x("albums", "post type general name"),
		 'singular_name' => _x("Album", "post type singular name"),
		 'menu_name' => 'Albums',
		 'add_new' => _x("Add New", "album item"),
		 'add_new_item' => __("Add New Album"),
		 'edit_item' => __("Edit Album"),
		 'new_item' => __("New Album"),
		 'view_item' => __("View Album"),
		 'search_items' => __("Search Albums"),
		 'not_found' =>  __("No Albums Found"),
		 'not_found_in_trash' => __("No Albums Found in Trash"),
		 'parent_item_colon' => '',
		 'register_meta_box_cb' => 'global_notice_meta_box'
	 );
	 
	 // Register post type
	 register_post_type('albums' , array(
		 'labels' => $labels,
		 'public' => true,
		 'has_archive' => false,
		 'rewrite' => false,
		 'supports' => array( 
			'title', 
			'editor', 
			'excerpt', 
			'thumbnail', 
			'custom-fields', 
			'revisions' 
		 ), 
 	) );

 }
add_action( 'init', 'albums_post_type', 0 );


 
function create_topics_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Album Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Album Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Album Categories' ),
    'all_items' => __( 'All Album Categories' ),
    'parent_item' => __( 'Parent Album Category' ),
    'parent_item_colon' => __( 'Parent Album Category:' ),
    'edit_item' => __( 'Edit Album Category' ), 
    'update_item' => __( 'Update Album Category' ),
    'add_new_item' => __( 'Add New Album Category' ),
    'new_item_name' => __( 'New Album Category Name' ),
    'menu_name' => __( 'Album Categories' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('album_category',array('albums'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'album_category' ),
  ));
 
}
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );



/**
 * AJAX posts filter
 *
 */

// // Enqueue script
// function ajax_filter_posts_scripts() {
// // Enqueue script
// wp_enqueue_script('jquery');
// wp_register_script('afp_script', get_template_directory_uri() . '/assets/src/js/ajax-filter-posts.js', 'jquery', null, true);
// wp_enqueue_script('afp_script');

// wp_localize_script( 'afp_script', 'afp_vars', array(
// 		'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
// 		'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
// 	)
// );
// }
// add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);



function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );

 


