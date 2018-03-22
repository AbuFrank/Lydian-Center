<?php
/**
*	 Template Name: Test
* 
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lydiancenter
 */

	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
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

<!-- ************** Practitioners *********************** -->

				<!-- Create array of Practitioners to use in template -->
				<?php 
					$posts = $practitioners;
					$practitioners_array = array();
					$p_last_names = array();
					
					foreach( $posts as $post ): 			
					setup_postdata( $post )
				?>

				<!-- Create variables for practitioners -->
				<?php 
					$first_name		= get_field('first_name');
					$last_name      = get_field('last_name'); 								
					$practice       = get_field('practice'); 
				 	$certifications = get_field('certifications'); 
				 	$p_photo 		= get_field('practitioner_photo');

				 	// Create array of practitioner information
					$practitioners_array[] = array(
						'first_name'			=> $first_name,
						'last_name' 			=> $last_name, 
						'practice'  			=> $practice, 
						'certifications' 		=> $certifications,
						'practitioner_photo'	=> $p_photo
					);
				  	$p_last_names[] = $last_name;
			  	?>

				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
	
				<!-- Check that arrays are assembled correctly by printing them to page -->
				<h1>Practitioner Objects</h1>
				<?php print_r($p_last_names); ?>
				<h1>Practitioner Last Names</h1>
				<?php print_r($practitioners_array);?>
	
				<h1 style="color: blue">Practitioners outside foreach loop</h1>
	
					<?php foreach($practitioners_array as $p):?>
						<div>
							<ul>
								<li><?php echo $p['last_name'] ?></li>
								<li><?php echo $p['practice'] ?></li>
								<li><?php echo $p['certifications'] ?></li>
							</ul>
						</div>

					<?php endforeach; ?>

				<br><br>
				<!-- ******** Testimonials *********** -->
				
				<h1>Testimonials</h1>
				<?php 
					$posts = $testimonials;
					$testimonials_array = array();
					$t_last_names = array(); 

					foreach( $posts as $post ): 			
					setup_postdata( $post )
				?>

				<!-- Create variables for testimonials -->
				<?php 
					$t_first_name			= get_field('practitioner_first_name');
					$t_last_name      = get_field('practitioner_last_name'); 								
					$t_text       		= get_field('testimonial_text'); 
				 	$t_client_name 		= get_field('client_name'); 
				 	$t_photo 					= get_field('testimonial_image');

				 	// Create array of testimonial information
					$testimonials_array[] = array(
						'first_name'		=> $t_first_name,
						'last_name' 		=> $t_last_name, 
						't_text'  			=> $t_text, 
						't_client_name' => $t_client_name
					);
				  $t_last_names[] = $t_last_name;
			  ?>
				
					<div>
						<ul>
							<li><?php the_title() ?>
								<?php echo $t_last_name ?>								
								<?php echo $t_text ?>
								<?php echo $t_client_name ?>
							</li>
						</ul>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

				<!-- Check that arrays are assembled correctly by printing them to page -->
				<h1>Testimonials last names array</h1>
				<?php print_r($t_last_names); ?>
				<h1>Testimonials Array</h1>
				<?php print_r($testimonials_array);?>

			<!-- Make unique testimonial last names array -->
			<h1>Unique last names testimonials</h1>
			<?php
				$unique_t_names = array_unique($t_last_names);
				print_r($unique_t_names);
			?> 

<h1 style="color: blue">Practitioners and Testimonials</h1>
		
	<?php 
	foreach($unique_t_names as $name):
		// print practitioner information if there is a testimonial for them
		foreach($practitioners_array as $p):
			if($name == $p['last_name']): ?>
				<ul>
					<li style="font-size: 20px;">
						  practitioner: <?php echo $p['last_name'] ?></li>
					<li>practice: <?php echo $p['practice'] ?></li>
					<li>certifications: <?php echo $p['certifications'] ?></li>
				</ul>
		<?php endif; endforeach; // end practitioners arr for each?>				
		<?php
			// Print testimonials
			foreach($testimonials_array as $t):
				if($name == $t['last_name']): ?>
					<ul>
						<li>first name: <?php echo $t['first_name'] ?></li>
						<li>testimonial: <?php echo $t['t_text'] ?></li>
						<li>client: <?php echo $t['t_client_name'] ?></li>
					</ul>
			<?php endif; endforeach; // end testimonials arr for each?> 	
		<?php endforeach; // end unique name foreach?>




			<?php endwhile; // End of the loop.?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();

