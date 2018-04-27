<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lydian_Center
 */

?>

<section id="front-page-testimonials" class="front-page-section">
	<div class="container">
		<h2 class="text-center">Testimonials</h2>
		<div class="row pt-3">
			<?php if( is_active_sidebar( 'front-testimonials' ) ) : ?>
					<?php dynamic_sidebar( 'front-testimonials' ); ?>
			<?php endif; ?>
		</div>
		<!-- <div class="row">
			<div class="col-md-4">
				<div class="row no-gutters">	
					<div class="col-2 quote-column text-center">
						<i class="fa fa-quote-left"></i>
					</div>
					<div class="col-10">
						<div class="testimonial-box">
							<p>test 1</p>
							<p class="text-right">- person1</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row no-gutters">	
					<div class="col-2 quote-column text-center">
						<i class="fa fa-quote-left"></i>
					</div>
					<div class="col-10">
						<div class="testimonial-box">
							<p>test 2</p>
							<p class="text-right">- person 2</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row no-gutters">	
					<div class="col-2 quote-column text-center">
						<i class="fa fa-quote-left"></i>
					</div>
					<div class="col-10">
						<div class="testimonial-box">
							<p>test 3</p>
							<p class="text-right">- person 3</p>
						</div>
					</div>
				</div>
			</div>
		</div>  --><!-- end .row -->
		<div class="text-center button-box">
			<a href="<?php echo esc_url(home_url("testimonials")); ?>">
				<div class="cb-slide-button">See what others have to say</div>
			</a>
		</div>
	</div>
</section>