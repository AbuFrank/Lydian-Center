<?php
/**
 * The template for services pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lydian_Center
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();
			// Add variables from ACF
			$image =  get_field('service_image');
		?>

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						<div class="d-flex flex-column">
							<div class="service-header-img order-md-2">
								<?php echo wp_get_attachment_image($image, 'full' ); ?>
							</div>
							<div class="service-header-title order-md-1">
								<?php the_title('<h2 class="service-title">', '</h2>');?>
							</div>
						</div>
						<?php the_content();?>
					</div> <!-- end main-content -->
					<div class="col-md-4 sidebar-content">
						<?php get_sidebar(); ?>
					</div> <!-- end sidebar-content -->
				</div>
			</div>
		
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
