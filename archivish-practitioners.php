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
			<div class="container">
				<div class="page-title-box d-flex justify-content-center">
					<div class="cb-bar">
						<div class="cb-diamond"></div>
						<div class="cb-diamond"></div>
					</div>
					<h1 class="page-title">Practitioners</h1>
				</div><!-- .page-title-box -->
			</div><!-- .container -->
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
						$first_name = get_field('first_name');
						$last_name		= get_field('last_name');
						$certifications	= get_field('certifications');
						$practice		= get_field('practice');
						$photo			= get_field('practitioner_photo'); 
					
						// Create array of testimonial information
						$practitioners_array[] = array(
						'name'				    => $name,
						'first_name'			=> $first_name,
						'last_name'				=> $last_name,
						'certifications' 	=> $certifications, 
						'practice'  	   	=> $practice, 
						'photo' 			    => $photo
						);
					?>

					<div id="practitioner<?php echo $num?>" class="practitioner-tile col-lg-4 col-md-6">
						<a href="<?php echo get_home_url();?>/?practitioners=<?php echo $practitioners_array[$num]['first_name']?>-<?php echo $practitioners_array[$num]['last_name']?>">	
							<div class="practitioner-photo-box">
								<?php echo wp_get_attachment_image($practitioners_array[$num]['photo'], 'full') ?>
							</div>
							<div class="practitioner-info-box">
								<h3 style="margin-bottom: 0;"><?php echo $practitioners_array[$num]['name'] ?></h3>
								<ul class="practitioner">
									<li><?php echo $practitioners_array[$num]['certifications'] ?></li>
									<li><?php echo $practitioners_array[$num]['practice'] ?></li>
								</ul>
								<div class="cb-bar p-bar-1">
									<div class="cb-diamond"></div>
								</div>
								<div class="cb-bar p-bar-2">
									<div class="cb-diamond"></div>
								</div>
								<div class="cb-bar p-bar-3">
									<div class="cb-diamond"></div>
								</div>
							</div><!-- .practitioner-info-box -->
						</a>
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
