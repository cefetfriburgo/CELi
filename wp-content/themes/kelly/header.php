<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kelly
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner"<?php echo $style; ?>>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
	<!-- 	<div id="site-navigation-img">
		<img src="/wordpress/wp-content/themes/kelly/CELilogotipoo.png"/>
		</div> -->
			<h1 class="menu-toggle"><?php _e( 'Menu', 'kelly' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kelly' ); ?></a>

			<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container_class' => 'menu',
					'menu_class'      => 'nav-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
