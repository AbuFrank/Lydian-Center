<?php
/**
 * The template for individual services pages
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
			<!-- Retrieve practioners object from database -->
			<?php 
					$practitioners = get_posts(array(
						'post_type'				=> 'practitioners',
						'posts_per_page'	=> -1,
						'meta_key'				=> 'service_listing'
					));
				?>
				<!-- Create accessible array of practitioners -->
				<?php 
					$posts = $practitioners;
					$practitioners_array = array();

					foreach( $posts as $post ): 			
					setup_postdata( $post )
				?>

				<!-- Create variables for practitioners -->
				<?php 
					$first_name			= get_field('first_name');
					$last_name      = get_field('last_name'); 								
					$practice       = get_field('practice'); 
				 	$certifications = get_field('certifications'); 
				 	$phone 					= get_field('phone_number');
				 	$service 				= get_field('service_listing');
				 	$email					= get_field('email');
				 	$p_photo 				= get_field('practitioner_photo');

				 	$practitioners_array[] = array(
						'first_name'					=> $first_name,
						'last_name' 					=> $last_name, 
						'practice'  					=> $practice, 
						'certifications'			=> $certifications,
						'phone_number'  			=> $phone,
						'email'								=> $email,
						'practitioner_photo' 	=> $p_photo,
						'service_listing'			=> $service
					);

				  endforeach; wp_reset_postdata(); ?>
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
