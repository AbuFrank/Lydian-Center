<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lydian_Center
 */

?>

	</div><!-- #content -->
	<!-- This section contains the map api, mission statement, and action buttons -->
	<section id="sub-footer" class="site-ankler">
		<div class="container">
			<div class="row">
				<div id="footer-map" class="col-md-4">
					<?php echo wp_get_attachment_image(155, "full"); ?>
				</div>
				<div id="footer-mission" class="col-md-4 d-flex flex-column justify-content-center">
					<h2 class="text-center">Our Mission</h2>
					<p>To seek out other intelligent life. Promote peace and comradery and bolstor the wonders of exploration. To boldly go where no one has gone before.</p>
				</div>
				<div id="footer-actions" class="col-md-4 d-flex flex-column justify-content-center text-center">
					<div class="card button-1 mb-3 align-center" style="max-width: 18rem;">
						<a href="tel:867-703-9099"><div class="card-header">867-703-9099</div></a>
					</div>
					<div class="card button-2 mb-3" style="max-width: 18rem;">
						<a href="mailto:867-703-9099"><div class="card-header">lydian@lydiancenter.com</div></a>
					</div>
					<div class="card button-3 mb-3" style="max-width: 18rem;">
						<a href="<?php echo esc_url(home_url("contact")); ?>"><div class="card-header">Schedule an Appointment</div></a>
					</div>
				</div>				
			</div>
		</div><!-- .container -->
	</section><!-- .site-ankler -->
	<footer id="colophon" class="site-footer">
		<div class="site-info text-center">
			<?php
				/* translators: %s: Site name, i.e. Assistance in Action. */
				printf( esc_html__( 'Copyright &copy; ' . date('Y') . ' %s', 'lydian-center' ), 'The Lydian Center' );
			?>
			<span class="sep"> | </span>
				<?php
				/* translators: %s: Site author, i.e. Creative Blazer. */
				printf( esc_html__( 'Site by %s', 'lydian-center' ), '<a href="http://creativeblazer.com/" target="_blank">Creative Blazer</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
