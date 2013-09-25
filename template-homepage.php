<?php
/*
 * Template Name: Project Homepage
 *
 *
 * @package AgoBenda
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* We are calling the plugin shortcode to fill the page.
					 * No content is 
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					echo do_shortcode( '[isotope-posts]' );
				?>

			<?php endwhile; ?>

			<?php agobenda_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>