<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lydian_Center
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lydian-center' ); ?></a>

<header id="masthead" class="site-header">
	<!-- Fancy header bars -->
	<div id="header-graphic" class="d-inline-flex">
		<!-- First and second bar have border bottom and bottom right border radius -->
		<div class="cb-bar-1">
			<span class="cb-diamond"></span>
		</div>
		<div class="cb-bar-2">
			<span class="cb-diamond"></span>
		</div>
		<!-- Middle bar is a span  -->
		<div class="cb-bar cb-bar-3">
			<span class="cb-diamond"></span>
			<span class="cb-diamond"></span>
		</div>
		<!-- Third and fourth bar have border top and top right border radius -->
		<div class="cb-bar-4">
			<span class="cb-diamond"></span>
		</div>
		<div class="cb-bar-5">
			<span class="cb-diamond"></span>
		</div>
	</div>

	<nav id="site-navigation" class="navbar navbar-expand-md navbar-light px-0" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="site-branding navbar-brand">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$lydian_center_description = get_bloginfo( 'description', 'display' );
			if ( $lydian_center_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $lydian_center_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			</div><!-- .site-branding -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cb-collapsing-nav" aria-controls="cb-collapsing-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'menu-1',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse flex-row-reverse',
				'container_id'      => 'cb-collapsing-nav',
				'menu_id'           => 'primary-menu',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker()
			) );
			?>
		</div>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->

	<div id="content" class="site-content">
