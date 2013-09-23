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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats'),
		'taxonomies'          => array( 'project_category', 'project_tag' ),
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
 * Include and setup custom metaboxes and fields.
 *
 * @category agobenda
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

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
				'desc' => __('Fill up the project detail fields.', 'agobenda' ),
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
				'type' => 'text_small',
			),
			array(
				'name' => __('Makeup', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_makeup',
				'type' => 'text_small',
			),
			array(
				'name' => __('Year', 'agobenda' ),
				'desc' => __('', 'agobenda' ),
				'id'   => $prefix . 'project_year',
				'type' => 'text_small',
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

        $classes[] = 'clearfix';

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