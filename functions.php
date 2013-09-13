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

	//Masonry script
	//if ( is_home() ) {
		//wp_enqueue_script( 'agobenda-masonry', get_template_directory_uri() . '/js/masonry.pkgd.js', array( 'jquery' ), '20130911' );
		wp_enqueue_script( 'agobenda-masonry-setting', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20130911' );
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

if ( ! function_exists('sax_project_custom_post_type') ) {

/**
 * Register Project Custom Post Type.
 */
function sax_project_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'agobenda' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'agobenda' ),
		'menu_name'           => __( 'Project', 'agobenda' ),
		'parent_item_colon'   => __( 'Parent Project:', 'agobenda' ),
		'all_items'           => __( 'All Projects', 'agobenda' ),
		'view_item'           => __( 'View Project', 'agobenda' ),
		'add_new_item'        => __( 'Add New Project', 'agobenda' ),
		'add_new'             => __( 'New Project', 'agobenda' ),
		'edit_item'           => __( 'Edit Project', 'agobenda' ),
		'update_item'         => __( 'Update Project', 'agobenda' ),
		'search_items'        => __( 'Search projects', 'agobenda' ),
		'not_found'           => __( 'No projects found', 'agobenda' ),
		'not_found_in_trash'  => __( 'No projects found in Trash', 'agobenda' ),
	);
	$args = array(
		'label'               => __( 'Project', 'agobenda' ),
		'description'         => __( 'Project information pages', 'agobenda' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats', ),
		'taxonomies'          => array( 'project_taxonomy', 'project_taxonomy_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'sax_project_custom_post_type', 0 );

}

if ( ! function_exists('project_taxonomy') ) {


/**
 * Register Project Custom Taxonomy.
 */
function project_taxonomy()  {

	$labels = array(
		'name'                       => _x( 'Projects', 'Taxonomy General Name', 'agobenda' ),
		'singular_name'              => _x( 'Project', 'Taxonomy Singular Name', 'agobenda' ),
		'menu_name'                  => __( 'Project Category', 'agobenda' ),
		'all_items'                  => __( 'All Projects Categories', 'agobenda' ),
		'parent_item'                => __( 'Parent Project Category', 'agobenda' ),
		'parent_item_colon'          => __( 'Parent Project Category:', 'agobenda' ),
		'new_item_name'              => __( 'New Project Category Name', 'agobenda' ),
		'add_new_item'               => __( 'Add New Project Category', 'agobenda' ),
		'edit_item'                  => __( 'Edit Project Category', 'agobenda' ),
		'update_item'                => __( 'Update Project Category', 'agobenda' ),
		'separate_items_with_commas' => __( 'Separate project categories with commas', 'agobenda' ),
		'search_items'               => __( 'Search project categories', 'agobenda' ),
		'add_or_remove_items'        => __( 'Add or remove project categories', 'agobenda' ),
		'choose_from_most_used'      => __( 'Choose from the most used project categories', 'agobenda' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_category', 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'project_taxonomy', 0 );

}

if ( ! function_exists('project_taxonomy_tag') ) {

/**
 * Register Project Custom Taxonomy Tag.
 */
function project_taxonomy_tag()  {

	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Project Tags', 'text_domain' ),
		'all_items'                  => __( 'All Tags', 'text_domain' ),
		'parent_item'                => __( 'Parent Tag', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
		'new_item_name'              => __( 'New Tag Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
		'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
		'update_item'                => __( 'Update Tag', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate tag with commas', 'text_domain' ),
		'search_items'               => __( 'Search tags', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_tag', 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'project_taxonomy_tag', 0 );

}

/**
* Add Custom Taxonomy Terms To The Post Class
* http://wordpress.stackexchange.com/questions/2266/add-post-classes-for-custom-taxonomies-to-custom-post-type
*/

add_filter( 'post_class', 'wpse_2266_custom_taxonomy_post_class', 10, 3 );

if ( ! function_exists('wpse_2266_custom_taxonomy_post_class') ) {
    function wpse_2266_custom_taxonomy_post_class($classes, $class, $ID) {

        $taxonomies_args = array(
            'public' => true,
            '_builtin' => false,
        );

        $taxonomies = get_taxonomies( $taxonomies_args, 'names', 'and' );

        $terms = get_the_terms( (int) $ID, (array) $taxonomies );

        if ( ! empty( $terms ) ) {
            foreach ( (array) $terms as $order => $term ) {
                if ( ! in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }

        $classes[] = 'clearfix';

        return $classes;
    }
}