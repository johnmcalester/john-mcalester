<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package McAlester
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mcalester' ); ?></a>

	<?php
	if ( is_dynamic_sidebar('aboveheader') ) {
		dynamic_sidebar('aboveheader');
	}
	?><!-- Widget location to hold social icons -->

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<?php
	if ( is_front_page() && !is_paged() && is_dynamic_sidebar('abovecontent') ) {
		dynamic_sidebar('abovecontent');
	}
	?><!-- Widget location to hold slider -->

	<div id="content" class="site-content">
