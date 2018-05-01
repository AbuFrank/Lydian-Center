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
			<div class="container">
				<div class="page-title-box d-flex justify-content-center">
					<div class="cb-bar">
						<div class="cb-diamond"></div>
						<div class="cb-diamond"></div>
					</div>
			<?php
					while ( have_posts() ) : the_post();
					?>
					<h1 class="page-title"><?php the_title(); ?></h1>
				</div> <!-- end page title box -->
				<div>
					<?php the_content(); ?>
				</div>
				<article id="accordion">
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
						// For Children
						// Create array of Healing Modalities to use in template
						$posts 					= $for_children;
						$children_array 		= array();
						$card_num				= 0;
						
						foreach( $posts as $post ): 			
						setup_postdata( $post )
						?>
							<?php 
							// Create variables for healing modalities
							$title 			= get_the_title();
							$overview		= get_field('overview');
							$brain_gym		= get_field('brain_gym'); 								
							$chiropractic	= get_field('chiropractic'); 
						 	$craniosacral	= get_field('craniosacral'); 
						 	$homeopathy		= get_field('homeopathy');
						 	$nutrition		= get_field('nutrition');
						 	$sound_healing	= get_field('sound_healing');
						 	
						 	// Fill in array of healing modalities information
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
							$card_class = str_replace(' ', '', $low_title);
							$card_num++;
					  		?>

					  	<!-- Age group card header and container-->
						<div class="card <?php echo $card_class ?>">
							<div class="card-header collapsed" id="heading<?php echo $card_num ?>" data-toggle="collapse" data-target="#collapse<?php echo $card_num ?>" aria-expanded="true" aria-controls="collapse<?php echo $card_num ?>">
						      	<h2><?php echo $title ?></h2>
						      	<div class="plus-minus-toggle d-flex align-items-center"></div>
							</div> <!-- end .card-header -->

							<!-- age group content -->
							<div class="container outer-<?php echo $card_class ?>-container">
								<div id="collapse<?php echo $card_num ?>" class="collapse inner-age-group-container" aria-labelledby="heading<?php echo $card_num ?>" data-parent="#accordion">
									<div class="card-body">
										<!-- tab structure for each -->
										<ul class="nav nav-tabs" id="tab<?php echo $card_num ?>" role="tablist">
											<?php if ($overview) {?>
											<li class="nav-item">
												<a class="nav-link active" id="overview<?php echo $card_num ?>-tab" data-toggle="tab" href="#overview<?php echo $card_num ?>" role="tab" aria-controls="overview<?php echo $card_num ?>" aria-selected="true">Overview</a>
											</li>
											<?php } ?>
											<?php if ($brain_gym) {?>
											<li class="nav-item">
												<a class="nav-link" id="brain-gym<?php echo $card_num ?>-tab" data-toggle="tab" href="#brain_gym<?php echo $card_num ?>" role="tab" aria-controls="brain_gym<?php echo $card_num ?>" aria-selected="true">Brain Gym</a>
											</li>
											<?php } ?>
											<?php if ($chiropractic) {?>
											<li class="nav-item">
												<a class="nav-link" id="chiropractic<?php echo $card_num ?>-tab" data-toggle="tab" href="#chiropractic<?php echo $card_num ?>" role="tab" aria-controls="chiropractic<?php echo $card_num ?>" aria-selected="true">Chiropractic</a>
											</li>
											<?php } ?>
											<?php if ($craniosacral) {?>
											<li class="nav-item">
												<a class="nav-link" id="craniosacral<?php echo $card_num ?>-tab" data-toggle="tab" href="#craniosacral<?php echo $card_num ?>" role="tab" aria-controls="craniosacral<?php echo $card_num ?>" aria-selected="true">Craniosacral</a>
											</li>
											<?php } ?>
											<?php if ($homeopathy) {?>
											<li class="nav-item">
												<a class="nav-link" id="homeopathy<?php echo $card_num ?>-tab" data-toggle="tab" href="#homeopathy<?php echo $card_num ?>" role="tab" aria-controls="homeopathy<?php echo $card_num ?>" aria-selected="true">Homeopathy</a>
											</li>
											<?php } ?>
											<?php if ($nutrition) {?>
											<li class="nav-item">
												<a class="nav-link" id="nutrition<?php echo $card_num ?>-tab" data-toggle="tab" href="#nutrition<?php echo $card_num ?>" role="tab" aria-controls="nutrition<?php echo $card_num ?>" aria-selected="true">Nutrition</a>
											</li>
											<?php } ?>
											<?php if ($sound_healing){?>
											<li class="nav-item">
												<a class="nav-link" id="sound-healing<?php echo $card_num ?>-tab" data-toggle="tab" href="#sound_healing<?php echo $card_num ?>" role="tab" aria-controls="sound_healing<?php echo $card_num ?>" aria-selected="true">Sound Healing</a>
											</li>
											<?php } ?>
										</ul> <!-- .nav-tabs -->
										<div class="tab-content container">
											<?php if ($overview){?>
											<div class="tab-pane fade show active" id="overview<?php echo $card_num ?>" role="tabpanel" aria-labelledby="overview<?php echo $card_num ?>-tab">
												<?php echo $overview ?>
											</div>
											<?php } ?>
											<?php if ($brain_gym){?>
											<div class="tab-pane fade" id="brain_gym<?php echo $card_num ?>" role="tabpanel" aria-labelledby="brain_gym<?php echo $card_num ?>-tab">
												<?php echo $brain_gym ?>
											</div>
											<?php } ?>
											<?php if ($chiropractic){?>
											<div class="tab-pane fade" id="chiropractic<?php echo $card_num ?>" role="tabpanel" aria-labelledby="chiropractic<?php echo $card_num ?>-tab">
												<?php echo $chiropractic ?>
											</div>
											<?php } ?>
											<?php if ($craniosacral){?>
											<div class="tab-pane fade" id="craniosacral<?php echo $card_num ?>" role="tabpanel" aria-labelledby="craniosacral<?php echo $card_num ?>-tab">
												<?php echo $craniosacral ?>
											</div>
											<?php } ?>
											<?php if ($homeopathy){?>
											<div class="tab-pane fade" id="homeopathy<?php echo $card_num ?>" role="tabpanel" aria-labelledby="homeopathy<?php echo $card_num ?>-tab">
												<?php echo $homeopathy ?>
											</div>
											<?php } ?>
											<?php if ($nutrition){?>
											<div class="tab-pane fade" id="nutrition<?php echo $card_num ?>" role="tabpanel" aria-labelledby="nutrition<?php echo $card_num ?>-tab">
												<?php echo $nutrition ?>
											</div>
											<?php } ?>
											<?php if ($sound_healing){?>
											<div class="tab-pane fade" id="sound_healing<?php echo $card_num ?>" role="tabpanel" aria-labelledby="sound_healing<?php echo $card_num ?>-tab">
												<?php echo $sound_healing ?>
											</div>
											<?php } ?>
										</div> <!-- .tab-content -->
									</div> <!-- .card-body -->
						    	</div> <!-- #collapse -->
						    </div> <!-- .container -->
						</div> <!-- .card -->
				  		<?php
						endforeach; // age group loop
						?>
						<?php 
						wp_reset_postdata(); 
						?>
			
					<?php
					endwhile; // End of the loop.
					?>
				</article> <!-- #accordian -->
			</div> <!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
