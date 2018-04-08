<?php
/**
 * Template Name: Practitioner Archive
 *
 * Description: The template page for displaying practitioner index page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lydian_Center
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container-fluid">
				<div class="row">
				<?php
				$num = 0;
				while ( have_posts() ) : the_post();

					// get post objects from For Children
					$practitioners = get_posts(array(
						'post_type'			=> 'practitioners',
						'posts_per_page'	=> -1,
						'orderby'			=> 'last_name',
						'order'				=> 'DSC'
					));
					$posts = $practitioners;
					$practitioners_array = array();
					?>
					<?
					// loop each post and get info
					foreach( $posts as $post ): setup_postdata( $post );
						// Create variables for practitioners 
						$name 			= get_the_title();
						$last_name		= get_field('last_name');
						$certifications	= get_field('certifications');
						$practice		= get_field('practice');
						$photo			= get_field('practitioner_photo'); 
					
						// Create array of testimonial information
						$practitioners_array[] = array(
						'name'				=> $name,
						'certifications' 	=> $certifications, 
						'practice'  		=> $practice, 
						'photo' 			=> $photo
						);
					?>

					<div id="practitioner<?php echo $num?>" class="practitioner-tile col-lg-4 col-md-6">
						<div class="practitioner-photo-box">
							<?php echo wp_get_attachment_image($practitioners_array[$num]['photo'], 'full') ?>
						</div>
						<h3><?php echo $practitioners_array[$num]['name'] ?></h3>
						<ul class="practitioner">
							<li><?php echo $practitioners_array[$num]['certifications'] ?></li>
							<li><?php echo $practitioners_array[$num]['practice'] ?></li>
						</ul>
						<ul>
							<li class="fancy-bar"></li>
							<li class="fancy-diamond"></li>
							<li class="fancy-diamond"></li>
						</ul>
					</div>
					
					<?php
					$num++;
					endforeach; wp_reset_postdata();
					?>

						
				<?php 
				endwhile; // End of the loop.
				?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
