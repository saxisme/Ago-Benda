<?php
/**
 * @package AgoBenda
 */
?>

<?php if ( is_archive() || is_search() || is_home() ) { // Meta data on the left for archive and search pages ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('side-meta clear'); ?>>
	<div class="entry-meta entry-meta-top">
		<?php agobenda_posted_on(); ?>
		<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'agobenda' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'agobenda' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php
			$key_1_value = get_post_meta( get_the_ID(), 'votes_count', true );
			// check if the custom field has a value
			if( ! empty( $key_1_value ) ) {
			  echo getPostLikeLink(get_the_ID());
			}
		?>
	</div><!-- .entry-meta -->

	<div class="entry-container clear">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->	

		<div class="entry-thumb">
			<?php //the_post_thumbnail('homepage-thumb'); ?>
		</div><!-- .entry-thumb -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	
	<div style="clear:both"></div>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'agobenda' ) );
				if ( $categories_list && agobenda_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'agobenda' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'agobenda' ), __( '1 Comment', 'agobenda' ), __( '% Comments', 'agobenda' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'agobenda' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	</div><!-- entry-container -->
</article><!-- #post-## -->
<? } else { ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta entry-meta-top">
			<?php agobenda_posted_on(); ?>
			<?php
				$key_1_value = get_post_meta( get_the_ID(), 'votes_count', true );
				// check if the custom field has a value
				if( ! empty( $key_1_value ) ) {
				  echo getPostLikeLink(get_the_ID());
				}
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->	

<div class="entry-container clear">
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'agobenda' ) ); ?>
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
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'agobenda' ) );
				if ( $categories_list && agobenda_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'agobenda' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'agobenda' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'agobenda' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'agobenda' ), __( '1 Comment', 'agobenda' ), __( '% Comments', 'agobenda' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'agobenda' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<?php } ?>