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

		<?php
		while ( have_posts() ) : the_post();
			// Add ACF services variables
			$image 					= get_field('service_image');
			$service_type 	= get_field('service_type');
			$service_links	= get_field('external_links');
			?>
			<!-- Retrieve practioners object from database -->
			<?php 
					$practitioners = get_posts(array(
						'post_type'				=> 'practitioners',
						'posts_per_page'	=> -1,
						'meta_key'				=> 'last_name',
						'orderby'					=> 'meta_value',
						'order'						=> 'ASC'
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
				 	$service 				= get_field('service_name');
				 	$email					= get_field('email');
				 	$p_photo 				= get_field('practitioner_photo');
				 	$links					= get_field('external_links');

				 	// Split up service name of practitioners into array
				 	$trimmed 		= trim($service);
				 	$p_service 	= explode(',', $service);

				 	// Array of practitioner objects
				 	$practitioners_array[] = array(
						'first_name'					=> $first_name,
						'last_name' 					=> $last_name, 
						'practice'  					=> $practice, 
						'certifications'			=> $certifications,
						'phone'  							=> $phone,
						'email'								=> $email,
						'photo' 							=> $p_photo,
						'p_service_name'			=> $p_service
					);

				  endforeach; wp_reset_postdata();?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="page-title-box d-flex justify-content-center">
					<div class="cb-bar">
						<div class="cb-diamond"></div>
						<div class="cb-diamond"></div>
					</div>
					<?php the_title('<h1 class="service-title">', '</h1>');?>
				</div>
				<div class="row">
					<div class="col-md-7 col-lg-8 main-content">
						<div class="d-flex flex-column">
							<!-- <div class="service-header-img order-md-2">
								<?php echo wp_get_attachment_image($image, 'full' ); ?>
							</div> -->
						</div>
						<?php the_content();?>
					</div> <!-- end main-content -->

					<div class="col-md-5 col-lg-4 sidebar-content">
						<?php foreach($practitioners_array as $p): 
									foreach($p['p_service_name'] as $p_service):
										if($service_type == $p_service):
												// problem is with $p_service 
						?>
						<div class="sidebar-text">		
								<div class="practitioner-image">
									<?php echo wp_get_attachment_image($p['photo'], "thumbnail");?>
								</div>
								<div>
									<a href="<?php echo get_home_url();?>/?practitioners=<?php echo $p['first_name']?>-<?php echo $p['last_name']?>">			
										<h3 class="sidebar-practitioner-name"><?php echo($p['first_name']);?> <?php echo($p['last_name']) ?><small>,</small></h3>  
									</a>
									<h5 class="sidebar-practitioner-name"><?php echo($p['certifications']);?></h5>
								</div>
								<h4>Schedule an Appointment</h4>
								<div>
									<a href="mailto:<?php echo($p['email']);?>"><?php echo($p['email']);?></a>
								</div>
								<div>
									<a href="tel:<?php echo($p['phone']);?>"><?php echo($p['phone']);?></a>
								</div>
								<!-- <h4>Specialization Information</h4>
								<div>
									<p>Link to Additional Service pages (SEA, LEAP, etc) if applicable</p>
								</div> -->
							</div>
							<!-- Creative Line Break -->
							<div class="creative-break">
	        			<div class="left-diamond diamond"></div>
	        			<div class="right-diamond diamond"></div>
	      			</div>
						<?php		endif; endforeach; endforeach; ?>
							<h3>External Links</h3>
							<div><?php echo $service_links  ?>
							</div>
						</div>
					</div> <!-- end sidebar-content -->
				</div>
			</div>
		
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
