<?php
/**
 * Template Name: Services Index
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
				 	$p_service 				= get_field('service_name');
				 	$p_photo 				= get_field('practitioner_photo');

				 	$practitioners_array[] = array(
						'first_name'					=> $first_name,
						'last_name' 					=> $last_name, 
						'photo' 							=> $p_photo,
						'p_service_name'			=> $p_service,
					);

				  endforeach; wp_reset_postdata(); ?>
		
		<!-- Retrieve practioners object from database -->
			<?php 
					$services = get_posts(array(
						'post_type'				=> 'services',
						'posts_per_page'	=> -1,
						'meta_key'				=> 'service_type',
						'orderby'					=> 'meta_value',	
						'order'						=> 'ASC'
					));
				?>
				<!-- Create accessible array of practitioners -->
				<?php 
					$posts = $services;
					$services_array = array();

					foreach( $posts as $post ): 			
					setup_postdata( $post )
				?>

		<!-- Create variables for services -->
		<?php 
			$excerpt = get_field('index_excerpt');
			$service_type = get_field('service_type');

			$services_array[] = array(
				'excerpt'				=> $excerpt,
				'service_type'	=> $service_type	
			);

			endforeach; wp_reset_postdata(); 
			$num_services = count($services_array); 
			$count = 1;
		?>

		<h1 class="service-title text-center">Lydian Center Services</h1>

		<?php while($count < $num_services): ?>
			<div class="container">
				<div class="row service-row">
					<div class="col-md-6">
						<div class="row">
							<!-- Loop to sort practitioners by service type -->
						<?php foreach($practitioners_array as $p): ?>
							<?php if($services_array[$count]['service_type'] == $p['p_service_name']): ?>
								<div class="col-4">
									<?php echo wp_get_attachment_image($p['photo'], "thumbnail");?>
									<h5 class="service-index-name"><?php echo $p['first_name']?> <?php echo $p['last_name']?></h5>
								</div> 
							<?php endif; endforeach;?> 
						</div> <!-- end row-->
					</div> <!-- end col-md-6 -->
					<div class="col-md-6">
						<h3 class="service-index-title"><?php echo $services_array[$count]['service_type']?></h3>
						<div>
							<?php echo $services_array[$count]['excerpt'] ?>
						</div>
							<a href="<?php echo get_home_url(); ?>/?services=<?php echo $services_array[$count]['service_type'] ?>">
								<button class="btn btn-success">Learn More about <?php echo $services_array[$count]['service_type']?></button>
							</a>
					</div>
				</div>
			</div>
			<?php $count++; ?>

		<?php endwhile; endwhile; // End of html loop AND End of page loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
