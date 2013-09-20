<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AgoBenda
 */
?>
		</div> <!-- content-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-container">
			<div class="site-info">
				<?php do_action( 'agobenda_credits' ); ?>
				<p>Agostina Benda - Make-up Artist <span class="sep"> | </span>All rights reserved &copy; <?php echo date('Y'); ?>
				<span class="sep"> | </span>
				<?php printf( __( 'Credits: %2$s.', 'agobenda' ), 'AgoBenda', '<a href="http://theblink.it" rel="designer">B&middot;link</a>' ); ?>
			</p>
			</div><!-- .site-info -->
		</div> <!-- site-footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>