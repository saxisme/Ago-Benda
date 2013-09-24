<?php
/**
 * The template used for displaying page content in Homepage for Projects - custom-home-project.php
 *
 * @package AgoBenda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>
	<div class="post-container">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php //agobenda_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
			//remove the jetpacj sharing filter
				remove_filter( 'the_content', 'sharing_display', 19 ); 
			?>
  			<?php //remove_filter( 'the_excerpt', 'sharing_display', 19 ); //to use just in case for the excerpt?>
			<?php the_content(); ?>
			
			<?php //cho custom_taxonomies_terms_links(); ?>

			<?php
			//Retrieve the taxonomy list
			$tax_list = get_the_term_list( $post->ID, 'project_category', '', ',', '' );
			?> 

			<?php
			//project details / custom fields
			$key1="_cmb_project_titleclient";
			$key2="_cmb_project_photography";
			$key3="_cmb_project_styling";
			$key4="_cmb_project_makeup";
			$key5="_cmb_project_year";
			//'<span class="project-details detail-">'
			?>
			<?php echo '<ul class="project-details">'; ?>
			<?php if ( $key1 != '') { echo '<li><span class="detail-title">Title / Client: </span><span class="project-detail">' . get_post_meta($post->ID, $key1, true) . '</span></li>';}?>
			<?php if ( $key2 != '') { echo '<li><span class="detail-title">Photography: </span><span class="project-detail">' . get_post_meta($post->ID, $key2, true) . '</span></li>';}?>
			<?php if ( $key3 != '') { echo '<li><span class="detail-title">Styling: </span><span class="project-detail">' . get_post_meta($post->ID, $key3, true) . '</span></li>';}?>
			<?php if ( $key4 != '') { echo '<li><span class="detail-title">Makeup: </span><span class="project-detail">' . get_post_meta($post->ID, $key4, true) . '</span></li>';}?>
			<?php if ( $key5 != '') { echo '<li><span class="detail-title">Year: </span><span class="project-detail">' . get_post_meta($post->ID, $key5, true) . '</span></li>';}?>
			<?php echo '</ul>'; ?>
		
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'agobenda' ),
					'after'  => '</div>',
				) );
			?>

			<?php 
			//insert the jetpack sharing in this position
				echo sharing_display(); 
			?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'agobenda' ) );

				//Retrieve the taxonomy list
				$cat_list = get_the_term_list( $post->ID, 'project_category', '', ',', '' );
				$tax_list = get_the_term_list( $post->ID, 'project_tag', '', ',', '' );
			
				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'agobenda' ) );

				// if ( ! agobenda_categorized_blog() ) {
				// 	// This blog only has 1 category so we just need to worry about tags in the meta text
				// 	if ( '' != $tag_list ) {
				// 		$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'agobenda' );
				// 	} else {
				// 		$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'agobenda' );
				// 	}

				// } else {
				// 	// But this blog has loads of categories so we should probably display them here
				// 	if ( '' != $tag_list ) {
				// 		$meta_text = __( 'Posted in '. $cat_list. ' and tagged '. $tax_list. '.', 'agobenda' );
				// 	} else {
				// 		$meta_text = __( 'Posted in '. $cat_list. '.', 'agobenda' );
				// 	}

				// } // end check for categories on this blog

				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink(),
					the_title_attribute( 'echo=0' )
				);
			?>

			<?php edit_post_link( __( 'Edit', 'agobenda' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div> <!-- post-container -->
	<div class="post-images">
		<?php //http://www.wpbeginner.com/wp-themes/how-to-get-all-post-attachments-in-wordpress-except-for-featured-image/
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID
					//'exclude'     => get_post_thumbnail_id()
				) );

				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
						$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
						echo '<li class="' . $class . ' project-thumbnail alignright">' . $thumbimg . '</li>';
					}
					
				}
		?>
	</div>
</article><!-- #post-## -->