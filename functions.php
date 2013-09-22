<?php
/**
 * AgoBenda functions and definitions
 *
 * @package AgoBenda
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 960; /* pixels */

if ( ! function_exists( 'agobenda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function agobenda_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on AgoBenda, use a find and replace
	 * to change 'agobenda' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'agobenda', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'agobenda' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'agobenda_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // agobenda_setup
add_action( 'after_setup_theme', 'agobenda_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function agobenda_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'agobenda' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'agobenda_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function agobenda_scripts() {
	wp_enqueue_style( 'agobenda-style', get_stylesheet_uri() );

	wp_enqueue_script( 'agobenda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'agobenda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'agobenda-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	//Sacha Benda - Blink
	
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400|Reenie+Beanie', '', '20130911', $media = 'all' );
	wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', '', '20130911', $media = 'all' );

	//Masonry script
	//if ( is_home() ) {
		//wp_enqueue_script( 'agobenda-masonry', get_template_directory_uri() . '/js/masonry.pkgd.js', array( 'jquery' ), '20130911' );
		//wp_enqueue_script( 'agobenda-masonry-setting', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20130911' );
	//}
}
add_action( 'wp_enqueue_scripts', 'agobenda_scripts' );

/**
 * Add custom image size
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'homepage-thumb', 550, 9999 ); //(cropped)
}
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom.php';

/**
 * Load Isotope Posts functions files.
 */
require get_template_directory() . '/inc/isotope-posts/isotope-posts.php';

/**
 * Load Custom Metabox files.
 */
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'lib/metabox/init.php';

}

/**
 * Load rating button files.
 */
require get_template_directory() . '/inc/rating-button/functions.php';