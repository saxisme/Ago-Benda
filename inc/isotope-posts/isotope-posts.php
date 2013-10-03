<?php
/*
Plugin Name: Isotope Posts
Plugin URI: http://mandiwise.com/wordpress/isotope-posts/
Description: This plugin allows you to use Metafizzy's Isotope jQuery plugin to display a feed of WordPress posts with a simple shortcode. Works with custom post types and custom taxonomies too.
Version: 1.1
Author: Mandi Wise
Author URI: http://mandiwise.com/
License: GPLv2 or later + MIT
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

class IsotopePosts {

	// * Constructor *
		// - initializes the plugin by setting localization, filters, and administration functions -
		
	function __construct() {

		// - load plugin text domain -
		add_action( 'init', array( $this, 'plugin_textdomain' ) );

		// - register admin scripts -
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );

		// - register site styles and scripts -
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );

		// - add the settings sub-menu -
		require_once( sprintf( '%s/views/admin.php', dirname(__FILE__) ) );
		$Isotope_Settings = new Isotope_Settings();
		
		// - register the shortcode -
		add_action( 'init', array( $this, 'register_shortcode') );

	} // - end constructor -

	// * Loads the plugin text domain for translation * 
	public function plugin_textdomain() {
		$domain = 'isotope-posts-locale';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
        load_textdomain( $domain, WP_LANG_DIR.'/'.$domain.'/'.$domain.'-'.$locale.'.mo' );
        load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	// * Registers and enqueues admin-specific javascript *
	public function register_admin_scripts() {
		wp_enqueue_script( 'isotope-posts-admin-script', get_template_directory_uri(). ( '/inc/isotope-posts/js/admin.js' ), array('jquery') );
	}

	//* Registers and enqueues plugin-specific styles 
	//* Appended to main css style.css through Coda/Less
	// public function register_plugin_styles() {
	// 	wp_enqueue_style( 'isotope-posts-plugin-styles', get_template_directory_uri().( '/inc/isotope-posts/css/display.css' ) );
	// }

	// * Registers and enqueues plugin-specific scripts *
	public function register_plugin_scripts() {
		//wp_enqueue_script( 'jquery' );
		wp_register_script( 'jquery-isotope-script', get_template_directory_uri().'/inc/isotope-posts/js/jquery.isotope.min.js', array('jquery'),false );
		wp_register_script( 'isotope-posts-plugin-script', get_template_directory_uri().( '/inc/isotope-posts/js/display-ck.js' ), array('jquery') );
	}

	// * Core Functions *
	
	// - create the isotope shortcode, enqueues the scripts, and queries the db for posts -
	public function isotope_loop() {
		
		// - grab the plugin's saved settings -
		$posttype = isotope_option( 'post_type' );
		$cptslug = isotope_option( 'cpt_slug' );
		
		$limit = isotope_option( 'limit_posts' );
		$limitby = isotope_option( 'limit_by');
		$limittax = isotope_option( 'limit_tax' );
		$limitterm = isotope_option( 'limit_term' );
		
		$menu = isotope_option( 'filter_menu' );
		$filterby = isotope_option( 'filter_by');
		$filtertax = isotope_option( 'filter_tax' );
		
		$layout = isotope_option( 'layout' );
		$sortby = isotope_option( 'sort_by' );
		
		// - enqueue and localize the Isotope scripts -
		wp_enqueue_script( 'jquery-isotope-script' );
		wp_enqueue_script( 'isotope-posts-plugin-script' );
		wp_localize_script( 'isotope-posts-plugin-script', 'iso_vars', array(
				'iso_layout' => $layout,
				'iso_sortby' => $sortby
			) 
		);
		
		// - set the post type to display with Isotope -
		if ( $posttype == 'post' )
			$type = 'post';
		else
			$type = $cptslug;
		
		// - set the taxonomy for the filter menu -
		if ( $filterby == 'category' )
			$menutax = 'category';
		elseif ( $filterby == 'post_tag' )
			$menutax = 'post_tag';
		else
			$menutax = $filtertax; 
		
		// - set the query args -
		$args = array(
			'post_type' => $type,
			'posts_per_page' => '-1'
		);
		
		if ( $limit == 'yes' && taxonomy_exists( $limittax ) ) {
			$limitedterms = explode( ',', $limitterm );
			$args['tax_query'] = array(
				array (
					'taxonomy' => $limittax,
					'field' => 'slug',
					'terms' => $limitedterms,
					'include_children' => FALSE
				)
			);
		}
		
		$isoposts = new WP_Query( $args );

		ob_start();

		// - create the filter menu option is selected -
		if ( $menu == 'yes' && taxonomy_exists( $menutax ) ) {			
			$terms = get_terms( $menutax );
			$count = count( $terms );
				if ( $count > 0 ){
					echo '<section id="options" class="clear">';
					echo '<ul id="filters" class="option-set clear">';
					echo '<li><a href="#" class="selected" data-filter="*">' . __('All', 'isotope-posts-locale') . '</a></li>';
					foreach ( $terms as $term ) {
					echo '<li><a href="#" data-filter=".'. $term->slug .'">' . $term->name . '</a></li>';
				}
				echo '</ul>';
				echo '</section>';
				echo '<div style="clear:both;"></div>';
			}
		}
		
		if ( post_type_exists( $type ) ) {
		?>
			<ul id="iso-loop">
			<?php while ($isoposts->have_posts()) : $isoposts->the_post(); ?>
				<li class="<?php foreach( get_the_terms( $isoposts->post->ID, $menutax ) as $term ) echo $term->slug.' '; ?>iso-post">
					<!-- <h2 class="iso-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> -->
					<?php
						if ( '' != get_the_post_thumbnail() ) { ?>
							<div class="iso-thumb">	
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('homepage-thumb'); ?></a>
							</div>
							<div class="iso-thumb-hover"></div>
						<?php }
					?>
					<!-- <?php the_excerpt(); ?> -->
				</li>
			<?php endwhile; ?>
			</ul>
		<?php
		}
		
		wp_reset_postdata();
		
		$content = ob_get_contents();
		ob_end_clean();
		return $content;

	}
	
	// - register the shortcode "[isotope-posts]" -
	public function register_shortcode() {
		add_shortcode( 'isotope-posts', array( $this, 'isotope_loop' ) );
	}

} // - end class -

$plugin_name = new IsotopePosts();