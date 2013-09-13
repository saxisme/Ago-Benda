<?php
/**
 * The template used for displaying page content in Homepage for Projects - custom-home-project.php
 *
 * @package AgoBenda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		if ( has_post_thumbnail($thumbnail->ID)) {
	      echo '<a href="' . get_permalink( $thumbnail->ID ) . '" title="' . esc_attr( $thumbnail->post_title ) . '">';
	      echo get_the_post_thumbnail($thumbnail->ID, 'homepage-thumb');
	      echo '</a>';
	    } ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->