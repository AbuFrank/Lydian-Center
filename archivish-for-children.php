<?php
/**
 * The template for displaying all single posts
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
				<h2 class="page-title">Testimonials</h2>
			</div>
				<?php
				while ( have_posts() ) : the_post();
				?>
				<?php
				// get post objects from For Children
					$testimonials = get_posts(array(
						'post_type'			=> 'forchildren',
						'posts_per_page'	=> -1
					));
				?>
				
				<?php
				endwhile; // End of the loop.
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
