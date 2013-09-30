<?php
/**
 * Register Project Custom Post Type.
 */
if ( ! function_exists('sax_project_custom_post_type') ) {

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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats', 'author'),
		'taxonomies'          => array( 'project_category', 'project_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => get_stylesheet_directory_uri().'/images/project_ico.png',
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
		'name'                       => _x( 'Project Category', 'Taxonomy General Name', 'agobenda' ),
		'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'agobenda' ),
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
		'rewrite' 					 => array('slug' => 'projects'),
		//http://codex.wordpress.org/Function_Reference/register_taxonomy#Example
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
		'name'                       => _x( 'Project Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Tag', 'Taxonomy Singular Name', 'text_domain' ),
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
 * Include and setup custom metaboxes and fields.
 *
 * @category agobenda
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

// add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

// function cmb_sample_metaboxes( array $meta_boxes ) {

//     $meta_boxes[] = array(
//         'title' => 'CMB Test - all fields',
//         'pages' => 'page',
//         'show_on' => array( 'id' => array( 1 ) ),
//         'context'    => 'normal',
//         'priority'   => 'high',
//         'fields' => $fields // an array of fields - see individual field documentation.
//     );

//     return $meta_boxes; 

// }

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'project_details',
		'title'      => 'Project Details',
		'pages'      => array( 'project' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __('', 'agobenda' ),
				'desc' => __('Fill up the project detail fields.<br />TESTI COLLEGAMENTI FREQUENTI:<br /><br />RAFIT NOY<br />&lt;a  title="Rafit Noy" href="http://cargocollective.com/rafitnoy" target="_blank"&gt;Rafit Noy&lt;/a&gt;<br /><br />M&middot;A&middot;C<br />&lt;a title="M•A•C" href="http://www.maccosmetics.com/index.tmpl"target="_blank"&gt;M•A•C&lt;/a&gt;<br /><br />UNO models<br />&lt;a title="UNO models"href="http://www.unobcn.com/" target="_blank"&gt;UNO models&lt;/a&gt;<br /><br />Unicorn Studio<br />&lt;a title="Unicorn Studio" href="http://unicornstudiobarcelona.com/" target="_blank"&gt;Unicorn Studio&lt;/a&gt;<br /><br />Moroccanoil<br />&lt;a title="Moroccanoil" href="http://www.moroccanoil.com/" target="_blank"&gt;Moroccanoil&lt;/a&gt;<br /><br /><br />TESTI PER COLLEGAMENTI GENERICI:<br /><br />&lt;a href="http://www.example.com" title="Write the title of the link" target="_blank"&gt;Text to link&lt;/a&gt;', 'agobenda' ),
				'id'   => $prefix . 'project_help',
				'type' => 'title',
			),
			array(
				'name' => __('Title - Client', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_titleclient',
				'type' => 'text',
			),
			array(
				'name' => __('Photography', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_photography',
				'type' => 'text',
			),
			array(
				'name' => __('Styling', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_styling',
				'type' => 'text',
			),
			array(
				'name' => __('Makeup', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_makeup',
				'type' => 'text',
			),
			array(
				'name' => __('Hair', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_hair',
				'type' => 'text',
			),
			array(
				'name' => __('Nail art', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_nailart',
				'type' => 'text',
			),
			array(
				'name' => __('Model', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_model',
				'type' => 'text',
			),
			array(
				'name' => __('Special thanks', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_thanks',
				'type' => 'textarea',
			),
			array(
				'name' => __('Year', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_year',
				'type' => 'text_small',
			),
			array(
				'name' => __('Videos', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_video',
				'type' => 'text',
				'repeatable'     => true,
			),
			
		)
	);
	// Add other metaboxes as needed

	return $meta_boxes;
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

        $classes[] = '';

        return $classes;
    }
}

/**
 * Modify the footer credits for JetPack Inifite Scroll
 **/
add_filter('infinite_scroll_credit','lc_infinite_scroll_credit');
function lc_infinite_scroll_credit(){
 $content = '<a href="/privacy-statement/" title="Privacy Statement">Privacy Statement</a>';
 return $content;
}
/** End JetPack **/

/**
 * Add shortcode for displaying Projects
 * http://wp.tutsplus.com/tutorials/plugins/create-a-shortcode-to-list-posts-with-multiple-parameters/
 **/
// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'rmcc_post_listing_parameters_shortcode' );
function rmcc_post_listing_parameters_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'ASC',
        'orderby' => 'rand',
        'posts' => -1,
        'color' => '',
        'fabric' => '',
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'color' => $color,
        'fabric' => $fabric,
        'category_name' => $category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
        <ul class="posts-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	<div class="iso-thumb">
                	<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'widget-thumb' ); ?></a>
            	</div>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

/**
 * Add shortcode for displaying Call Me call to action
 * http://codex.wordpress.org/Function_Reference/add_shortcode
 * http://diythemes.com/thesis/wordpress-shortcodes/
 **/
// function sax_callme( $atts, $content = null ) {
// 	//extract(shortcode_atts(array($atts));
//      return '<div class="callme-container"><img src="' . get_stylesheet_directory_uri() .'/images/phone.png" width="300" height="300"/></div>';
// }
// add_shortcode( 'callme', 'sax_callme' );

// Include the Google Analytics Tracking Code (ga.js)
// @ http://code.google.com/apis/analytics/docs/tracking/asyncUsageGuide.html
function google_analytics_tracking_code(){

	$propertyID = 'UA-44340447-1'; // GA Property ID
	if ( !is_user_logged_in() ) {
		//if ($options['ga_enable']) { ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php echo $propertyID ?>', 'agobenda.com');
		  ga('send', 'pageview');

		</script>
	<?php
	}
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');


/**
 * Add rel=”lightbox” to all images embedded in a post
 * http://wpsnipp.com/index.php/functions-php/add-a-custom-class-to-wp_get_attachment_link/
 **/
function add_class_attachment_link($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="gallery" rel="fancybox-gallery"',$html);
    return $html;
}
add_filter('wp_get_attachment_link','add_class_attachment_link',10,1);

function custom_fix_blog_tab_on_cpt($classes,$item,$args) {
    if(!is_singular('post') && !is_category() && !is_tag()) {
        $blog_page_id = intval(get_option('page_for_posts'));
        if($blog_page_id != 0) {
            if($item->object_id == $blog_page_id) {
				unset($classes[array_search('current_page_parent',$classes)]);
			}
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class','custom_fix_blog_tab_on_cpt',10,3);

/**
 * Fix current parent page for Single CPT page
 * http://wpsnipp.com/index.php/functions-php/add-a-custom-class-to-wp_get_attachment_link/
 * http://www.tammyhartdesigns.com/wordpress/highlight-menu-item-for-custom-post-types/
 **/
add_filter( 'nav_menu_css_class', 'namespace_menu_classes', 10, 2 );
function namespace_menu_classes( $classes , $item ){
	if ( get_post_type() == 'project' || is_archive( 'project' ) ) {
		// remove that unwanted classes if it's found
		$classes = str_replace( 'current_page_parent', '', $classes );
		// find the url you want and add the class you want
		$url = site_url().'/';
		if ( $item->url == $url ) {
			$classes = str_replace( 'menu-item', 'menu-item current_page_item', $classes );
			remove_filter( 'nav_menu_css_class', 'namespace_menu_classes', 10, 2 );
		}
	}
	return $classes;
}


/**
 * Include custom post types in “Right Now” admin dashboard widget
 * http://wpsnipp.com/index.php/functions-php/include-custom-post-types-in-right-now-admin-dashboard-widget/
 **/
function sax_right_now_content_table_end() {
 $args = array(
  'public' => true ,
  '_builtin' => false
 );
 $output = 'object';
 $operator = 'and';
 $post_types = get_post_types( $args , $output , $operator );
 foreach( $post_types as $post_type ) {
  $num_posts = wp_count_posts( $post_type->name );
  $num = number_format_i18n( $num_posts->publish );
  $text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
  if ( current_user_can( 'edit_posts' ) ) {
   $num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
   $text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
  }
  echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td>';
  echo '<td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
 }
 $taxonomies = get_taxonomies( $args , $output , $operator );
 foreach( $taxonomies as $taxonomy ) {
  $num_terms  = wp_count_terms( $taxonomy->name );
  $num = number_format_i18n( $num_terms );
  $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name , intval( $num_terms ));
  if ( current_user_can( 'manage_categories' ) ) {
   $num = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num</a>";
   $text = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$text</a>";
  }
  echo '<tr><td class="first b b-' . $taxonomy->name . '">' . $num . '</td>';
  echo '<td class="t ' . $taxonomy->name . '">' . $text . '</td></tr>';
 }
}
add_action( 'right_now_content_table_end' , 'sax_right_now_content_table_end' );