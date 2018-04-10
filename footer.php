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
					<?php echo wp_get_attachment_image(129, "full"); ?>
				</div>
				<div id="footer-mission" class="col-md-4" style="padding-top: 5rem">
					<h2 class="text-center">Our Mission</h2>
					<p>To seek out other intelligent life. Promote peace and comradery and bolstor the wonders of exploration. To boldly go where no one has gone before.</p>
				</div>
				<div id="footer-actions" class="col-md-4" style="padding-top: 4rem;">
					<div class="card button-1 bg-light mb-3 align-center" style="max-width: 18rem;">
						<div class="card-header">867-703-9099</div>
					</div>
					<div class="card button-2 bg-light mb-3" style="max-width: 18rem;">
						<div class="card-header">lydian@lydiancenter.com</div>
					</div>
					<div class="card button-3 bg-light mb-3" style="max-width: 18rem;">
						<a href="<?php echo get_home_url(); ?>/contact"><div class="card-header">Schedule an Appointment</div></a>
					</div>
				</div>				
			</div>
		</div><!-- .container -->
	</section><!-- .site-ankler -->
	<footer id="colophon" class="site-footer">
		<div class="site-info text-center">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lydian-center' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'lydian-center' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'lydian-center' ), 'lydian-center', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
