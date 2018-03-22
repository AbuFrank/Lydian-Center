<?php
/**
 * Template Name: For Children
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lydian_Center
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="page-title-box">
				<h2 class="page-title">For Children</h2>
			</div>
			<div class="container">
				<?php
				while ( have_posts() ) : the_post();
				?>
				<?php
				// get post objects from For Children
					$for_children = get_posts(array(
						'post_type'			=> 'forchildren',
						'posts_per_page'	=> -1,
						'orderby'			=> 'display_order',
						'order'				=> 'DSC'
					));
				?>

				<?php
					// Practitioners
					// Create array of Practitioners to use in template
					$posts 					= $for_children;
					$children_array 		= array();
					$card_num				= 0;
					
					foreach( $posts as $post ): 			
					setup_postdata( $post )
					?>
						<?php 
						// Create variables for practitioners 
						$title 			= get_the_title();
						$overview		= get_field('overview');
						$brain_gym		= get_field('brain_gym'); 								
						$chiropractic	= get_field('chiropractic'); 
					 	$craniosacral	= get_field('craniosacral'); 
					 	$homeopathy		= get_field('homeopathy');
					 	$nutrition		= get_field('nutrition');
					 	$sound_healing	= get_field('sound_healing');
					 	
					 	// Create array of practitioner information
						$children_array[] = array(
							'overview'			=> $overview,
							'brain_gym' 		=> $brain_gym, 
							'chiropractic'  	=> $chiropractic, 
							'craniosacral' 		=> $craniosacral,
							'practitioner_photo'=> $homeopathy,
							'nutrition'			=> $nutrition,
							'sound_healing'		=> $sound_healing						
						);
						$low_title = strtolower($title);
						$article_class = str_replace(' ', '', $low_title);
						$card_num++;
				  		?>
				  		<article id="accordion" class="<?php echo $article_class ?>">
						  <div class="card">
						    <div class="card-header" id="heading<?php echo $card_num?>">
						      <h5 class="mb-0">
						        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $card_num?>" aria-expanded="true" aria-controls="collapse<?php echo $card_num?>">
						          <?php echo $title ?>
						        </button>
						      </h5>
						    </div>

						    <div id="collapse<?php echo $card_num?>" class="collapse" aria-labelledby="heading<?php echo $card_num?>" data-parent="#accordion">
						      <div class="card-body">
								<?php echo $overview ?>
						      </div>
						    </div>
						  </div>
				  		</article>
				  		<?php
						endforeach; // Posts
						?>
					<?php 
					wp_reset_postdata(); 
					?>
		
				<?php
				endwhile; // End of the loop.
				?>
			</div> <!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
