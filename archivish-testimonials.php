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
			 	$display_name	= get_the_title();

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

		<!-- Begin page HTML  -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="container">
					<div class="page-title-box d-flex justify-content-center">
						<div class="cb-bar">
						</div>
						<h1 class="page-title">Testimonials</h1>
					</div>
					<div class="row">
						<!-- left sidebar -->
						<div class="col-md-3 d-none d-md-block testimonial-menu-container">
							<div class="testimonial-menu-tile">
								<!-- <div class="fixed-content">	 -->
									<h4 class="text-center">Search by Practitioner</h4>
									<?php 
									foreach($unique_t_names as $name):
									// loop through each practitioner in the array and print a link for their section
										$article_id = strtolower($name); ?>
										<?php
										// print practitioner information if there is a testimonial for them
										foreach($practitioners_array as $p): if($name == $p['last_name']): 
										?>
											<div class="search-by-practitioner align-items-center">
												<a href="#<?php echo $article_id; ?>"><?php echo $p['display_name'] ?></a>
												<!-- add bar and diamond behind each name -->
												<div class="cb-bar">
												</div>
											</div>
										<?php 
										endif; endforeach; ?>
									<? 
									endforeach; ?>
								<!-- </div> -->
							</div>
						</div><!-- .testimonial-menu -->
						<!-- main content -->
						<div class="col-md-9">
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
											<div class="col">
											<?php echo wp_get_attachment_image($p['practitioner_photo'], 'full'); ?>
											</div>
										</div>
									<div class="col-6">
										<h4>
											<?php echo $p['first_name'] ?> <?php echo $p['last_name'] ?><small>, <?php echo $p['certifications'] ?></small>
										</h4>
										<h5><?php echo $p['practice'] ?></h5>
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
											<div class="row no-gutters quote-box">	
												<div class="col-1 quote-column text-center">
													<i class="fa fa-quote-left"></i>
												</div>
												<div class="col-11">
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
