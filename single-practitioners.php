<?php
/**
* 
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lydian_Center
 */

	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 
			while ( have_posts() ) : the_post(); ?>

			<!-- Create variables for practitioners -->
			<?php 
				$first_name		= get_field('first_name');
				$last_name		= get_field('last_name'); 								
				$practice		= get_field('practice'); 
			 	$certifications	= get_field('certifications'); 
			 	$about			= get_field('about');
			 	$phone			= get_field('phone_number');
			 	$email			= get_field('email');
			 	$p_photo		= get_field('practitioner_photo');
			 	$links			= get_field('external_links');
			?>

			<!-- Retrieve testimonials object from database -->
			<?php 
					$testimonials = get_posts(array(
						'post_type'			=> 'testimonials',
						'posts_per_page'	=> -1
					));
				?>
				<!-- Create accessible array of testimonials -->
				<?php 
					$posts = $testimonials;
					$testimonials_array = array();

					foreach( $posts as $post ): 			
					setup_postdata( $post )
				?>

				<!-- Create variables for testimonials -->
				<?php 
					$t_first_name	= get_field('practitioner_first_name');
					$t_last_name    = get_field('practitioner_last_name'); 								
					$t_text			= get_field('testimonial_text'); 
				 	$t_client_name	= get_field('client_name'); 
				 	$t_photo		= get_field('testimonial_image');

				 	// Create array of testimonial information
					if($t_last_name == $last_name):
						$testimonials_array[] = array(
						'first_name'		=> $t_first_name,
						'last_name' 		=> $t_last_name, 
						't_text'  			=> $t_text, 
						't_client_name' => $t_client_name
					);
			  	endif; endforeach; wp_reset_postdata(); ?>

			<div class="container">
				<div class="page-title-box d-flex justify-content-center">
					<div class="cb-bar">
						<div class="cb-diamond"></div>
						<div class="cb-diamond"></div>
					</div>
					<?php the_title('<h1 class="service-title">', '</h1>');?>
				</div>				
				<div class="row">
					<div class="col-md-5 col-lg-4">
						<div class="sidebar-text sidebar-content">
							<div class="row">	
								<div class="col-md-12 col-sm-6">	
									<div class="practitioner-image">
										<?php echo wp_get_attachment_image($p_photo, "full");?>
									</div>
								</div>
								<div class="col-md-12 col-sm-6">
									<div>
										<h3 class="sidebar-practitioner-name"><?php echo($first_name);?> <?php echo($last_name) ?><small>,</small></h3>  
										<h5 class="sidebar-practitioner-name"> <?php echo($certifications);?></h5>
										<h4><?php echo($practice);?></h4>
									</div>
									<h4>Schedule an Appointment</h4>
									<div class="email-contact">
										<a href="mailto:<?php echo($email);?>"><?php echo($email);?></a>
									</div>
									<div class="tel-contact">
										<a href="tel:<?php echo($phone);?>"><?php echo($phone);?></a>
									</div>
								</div>
							</div>
						</div> <!-- end sidebar-text-->
						
						<!-- Creative Line Break -->
						<div class="creative-break">
        			<div class="left-diamond diamond"></div>
        			<div class="right-diamond diamond"></div>
      			</div>
						
						<div class="sidebar-text sidebar-content">
							<h4>External Links</h4>
							<div>
								<?php echo($links); ?>
							</div>
						</div>
					</div> <!-- end col-md-4 (sidebar) -->

					<div class="col-md-7 col-lg-8">
						<div>
							<?php echo($about); ?>
						</div>
						<?php if ($testimonials_array): ?>
							<div class="page-title-box text-center">
								<!-- <div class="cb-bar">
									<div class="cb-diamond"></div>
									<div class="cb-diamond"></div>
								</div> -->
								<h1>Testimonials</h1>
							</div>
						<?php if(count($testimonials_array) >= 2): ?>
						<div class="row"> 
							<div class="col-lg-6">
								<p><?php echo $testimonials_array[0]['t_text'] ?></p>
								<p><?php echo $testimonials_array[0]['t_client_name'] ?></p>
							</div>
							<div class="col-lg-6">
								<p><?php echo $testimonials_array[1]['t_text'] ?></p>
								<p><?php echo $testimonials_array[1]['t_client_name'] ?></p>
							</div>
						<?php else: ?>
						<div class="row">
							<div class="single-testimonial">
								<p><?php echo $testimonials_array[0]['t_text'] ?></p>
								<p><?php echo $testimonials_array[0]['t_client_name'] ?></p>
							</div>
							<?php endif; ?>
							<div class="testimonials-cta">
								<a href="<?php echo esc_url( home_url( '/' )); ?>/testimonials/#<?php echo(strtolower($last_name)); ?>">
									<div class="cb-slide-button">Read More Testimonials</div>
								</a>
							</div>
						</div>
					</div> <!-- end col-md-8 (body) -->
				</div> <!-- end row -->
			<?php endif; ?> <!-- end testimonials if statement -->
			</div> <!-- end container -->



			<?php endwhile; // End of the loop.?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

