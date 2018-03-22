<?php
/**
 * The template for displaying the services archive page
 *
 * @package Lydian_Center
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="page-title-box">
				<h2 class="page-title">Services</h2>
			</div>

		<?php
		while ( have_posts() ) : the_post();
			// Add variables from ACF
			$excerpt = get_field('index_excerpt');
		?>

			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="service-index-title">Culture intelligent beings</h3>
						<div class="row">
							<!-- The following block will be placed in a loop -->
							<div class="col-4">
								<img src="/lydian/wp-content/themes/lydian-center/150.png">
								<h5 class="service-index-name">Name Here</h5>
								<h6 class="service-index-cert">Certification Here</h6>
							</div>
							<div class="col-4">
								<img src="/lydian/wp-content/themes/lydian-center/150.png">
								<h5 class="service-index-name">Name Here</h5>
								<h6 class="service-index-cert">Certification Here</h6>
							</div>
							<div class="col-4">
								<img src="/lydian/wp-content/themes/lydian-center/150.png">
								<h5 class="service-index-name">Name Here</h5>
								<h6 class="service-index-cert">Certification Here</h6>
							</div>
							<!-- end loop -->
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="service-excerpt-title">_</h3>
						<?php echo($excerpt); ?>
					</div>
				</div>
			</div>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
