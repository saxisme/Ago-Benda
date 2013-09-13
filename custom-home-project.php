<?php
/*
 * Template Name: Project Homepage Tmp
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header>

				<!-- Filter by Categories -->
				<?php if ( function_exists( 'mintthemes_isotopes' ) ): 
					mintthemes_isotopes(); 
				endif; ?>

				<?php
				//list terms in a given taxonomy (useful as a widget for twentyten)
				$taxonomy = 'project_category';
				$tax_terms = get_terms($taxonomy);
				?>

				<ul data-option-key="filter" class="isotopenav">
					<li class="project-filter"><a href="#filter" valuemint="*">All</a></li>
					<?php
					foreach ($tax_terms as $tax_term) {
					echo '<li class="project-filter">' . '<a href="#filter" valuemint=".' . $tax_term->slug . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
					} ?>
				</ul>
				<div style="clear:both"></div>

			</header>

		<?php
		// The Query
		 $args = array(
		 	'post_type' => 'project',
			'posts_per_page' => '-1',
			'orderby' => 'title', 
			'order' => 'DESC'
		);
		$the_query = new WP_Query( $args );?>

		<div class="projects-container clear">

			<?php // The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'project' );
					?>

			<?php }
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>

		</div> <!-- project-container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
