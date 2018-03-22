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
			$service_type = get_field('service_type');
			?>
			<!-- Retrieve practioners object from database -->
			<?php 
					$practitioners = get_posts(array(
						'post_type'				=> 'practitioners',
						'posts_per_page'	=> -1,
						'meta_key'				=> 'service_name'
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
				 	$p_service 				= get_field('service_name');
				 	$email					= get_field('email');
				 	$p_photo 				= get_field('practitioner_photo');

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

				  endforeach; wp_reset_postdata(); ?>
		

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
						<?php $i = 0; ?>
						<?php foreach($practitioners_array as $p): ?>
						<?php if($p['p_service_name'] == $service_type):?>
							<p>practitioner service: <?php echo $p['p_service_name'] ?></p>
							<p>service service: <?php echo $service_type ?></p>
							<?php echo wp_get_attachment_image($p['photo'], "thumbnail");?>
							</div>
							<div>
								<h3><?php echo($p['first_name']);?> <?php echo($p['last_name']) ?></h3>  
								<h4>Certifications: <?php echo($p['certifications']);?></h4>
								<h4>Practice: <?php echo($p['practice']);?></h4>
							</div>
							<h3>Schedule an Appointment</h3>
							<div>
								<a href="mailto:<?php echo($p['email']);?>"><?php echo($email);?></a>
							</div>
							<div>
								<a href="tel:<?php echo($p['phone']);?>"><?php echo($phone);?></a>
							</div>
							<h4>Learn more about</h4>
							<div>
								<p>link to other service page here</p>
							</div>
					<?php endif; endforeach; ?>
					</div> <!-- end sidebar-content -->
				</div>
			</div>
		
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
