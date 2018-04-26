<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lydian_Center
 */

?>
<section id="front-page-about" class="front-page-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 d-flex flex-column justify-content-center">
				<h2 class="about-title text-center">Welcome Text</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="col-md-4 display-none display-md-inline-block">
				<?php echo wp_get_attachment_image(127, "full")?>
			</div>
		</div>
	</div>
</section>