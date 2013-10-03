<?php
/**
 * @package AgoBenda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta entry-meta-top">
		<span class="entry-meta-hr"></span>
		<?php agobenda_posted_on(); ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'agobenda' ) );
			if ( $categories_list && agobenda_categorized_blog() ) :
		?>
		<span class="cat-links">
			<?php printf( __( '%1$s', 'agobenda' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>
		
		<?php
			$key_1_value = get_post_meta( get_the_ID(), 'votes_count', true );
			// check if the custom field has a value
			//if( ! empty( $key_1_value ) ) {
			  echo getPostLikeLink(get_the_ID());
			//}
		?>
	</div><!-- .entry-meta -->

	<div class="entry-container clear">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'agobenda' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- entry-container -->
	<div style="clear:both"></div>

	<footer class="entry-meta">
		<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'agobenda' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '%1$s', 'agobenda' ), $tags_list ); ?>
			</span>
		<?php endif; // End if $tags_list ?>
		
		<?php edit_post_link( __( 'Edit', 'agobenda' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
	
</article><!-- #post-## -->
