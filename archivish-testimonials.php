<?php
/**
 * Template Name: Testimonials Index
 *
 * Description: The template for displaying testimonial index page
 *
 * @package Lydian_Center
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="page-title-box">
					<h2 class="page-title">Testimonials</h2>
				</div>
				
						<?php 
							while ( have_posts() ) : the_post();

							// get post objects for testimonials and practitioners ordered by last name
							$testimonials = get_posts(array(
								'post_type'			=> 'testimonials',
								'posts_per_page'	=> -1,
								'meta_key'			=> 'practitioner_last_name',
								'orderby'			=> 'meta_value',
								'order'				=> 'ASC'
							));
						?>

						<?php 
							$practitioners = get_posts(array(
								'post_type'			=> 'practitioners',
								'posts_per_page'	=> -1,
								'meta_key'			=> 'last_name',
								'orderby'			=> 'meta_value',
								'order'				=> 'ASC'
							));
						?>

						<?php
							// Practitioners
							// Create array of Practitioners to use in template
							$posts 					= $practitioners;
							$practitioners_array 	= array();
							$p_last_names 			= array();
							
							foreach( $posts as $post ): 			
							setup_postdata( $post )
						?>

							<?php 
								// Create variables for practitioners 
								$first_name		= get_field('first_name');
								$last_name		= get_field('last_name'); 								
								$practice		= get_field('practice'); 
							 	$certifications	= get_field('certifications'); 
							 	$p_photo		= get_field('practitioner_photo');
							 	$display_name	= get_field('display_name');

							 	// Create array of practitioner information
								$practitioners_array[] = array(
									'first_name'			=> $first_name,
									'last_name' 			=> $last_name, 
									'practice'  			=> $practice, 
									'certifications' 		=> $certifications,
									'practitioner_photo'	=> $p_photo,
									'display_name'			=> $display_name
								);
							  	$p_last_names[] = $last_name;
						  	?>

						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>

						<?php 
						// Testimonials Data
							$posts = $testimonials;
							$testimonials_array = array();
							$t_last_names = array(); 

							foreach( $posts as $post ): 			
							setup_postdata( $post )
						?>

						<?php 
							// Create variables for testimonials 
							$t_first_name		= get_field('practitioner_first_name');
							$t_last_name		= get_field('practitioner_last_name'); 								
							$t_text       		= get_field('testimonial_text'); 
						 	$t_client_name 		= get_field('client_name');

						 	// Create array of testimonial information
							$testimonials_array[] = array(
								'first_name'	=> $t_first_name,
								'last_name' 	=> $t_last_name, 
								't_text'  		=> $t_text, 
								't_client_name' => $t_client_name
							);

						  	$t_last_names[] = $t_last_name;
						?>
				
			
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>

						<?php 
						// Make unique testimonial last names array
						$unique_t_names = array_unique($t_last_names); ?> 
				<div class="row">
					<!-- left sidebar -->
					<div class="col-md-3 position-fixed d-none d-md-block">
						<h6>Search by Practitioner</h6>
						<?php 
						foreach($unique_t_names as $name):
						// loop through each practitioner in the array and print a link for their section
							$article_id = strtolower($name); ?>
							<?php
							// print practitioner information if there is a testimonial for them
							foreach($practitioners_array as $p): if($name == $p['last_name']): 
							?>
								<div class="search-by-practitioner">
									<a href="#<?php echo $article_id; ?>"><?php echo $p['display_name'] ?></a>
								</div>
							<?php 
							endif; endforeach; ?>
						<? 
						endforeach; ?>
					</div>
					<!-- main content -->
					<div class="col-md-9 offset-md-3">
						<?php 
						foreach($unique_t_names as $name):
						?>
							<?php $article_id = strtolower($name); ?>
							<div id="<?php echo $article_id ?>" class="nav-to"></div>
							<article class="testimonial-section">
								<?php
								// print practitioner information if there is a testimonial for them
								foreach($practitioners_array as $p): if($name == $p['last_name']): 
								?>
								<div class="row practitioner-info">	
									<div class="col-6">
										<?php echo wp_get_attachment_image($p['practitioner_photo'], 'full'); ?>	
									</div>
									<div class="col-6">
										<h5><?php echo $p['last_name'] ?></h5>
										<h6><?php echo $p['certifications'] ?></h6>
										<h6><?php echo $p['practice'] ?></h6>
									</div>
								</div>
								<?php 
								endif; endforeach; // end practitioners arr for each
								?>
								<!-- All the testimonials for the current practitioner -->
								<div class="row testimonial-blocks"> 
									<?php
									// Print testimonials
									foreach($testimonials_array as $t): if($name == $t['last_name']): 
										?>
										<div class="col-sm-6">
											<div class="row">	
												<div class="col-2 no-gutters quote-column">
													<i class="fa fa-quote-left fa-2x"></i>
												</div>
												<div class="col-10">
													<div class="testimonial-box">
														<p><?php echo $t['t_text'] ?></p>
														<p class="text-right">- <?php echo $t['t_client_name'] ?></p>
													</div>
												</div>
											</div>
										</div>
									<?php endif; endforeach; // end testimonials arr for each ?>
								</div> <!-- end .testimonial-blocks -->

							</article> <!-- end .testimonial-section -->
						<?php endforeach; // end unique name foreach?>


						<?php endwhile; // End of the loop. ?>
					</div> <!-- end main content -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
