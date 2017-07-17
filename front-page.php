<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McAlester
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="front-page-main" role="main">

			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<h2 class="site-description"><span><?php bloginfo( 'description' ); ?></span></h2>

			<div class="front-page-links">
				<a href="https://www.linkedin.com/in/johnmcalester/">LinkedIn</a> /
				<a href="https://www.packtpub.com/web-development/wordpress-4-cookbook">WordPress 4 Cookbook</a> /
				<a href="https://github.com/johnmcalester">GitHub</a> /
				<a href="https://www.pigeonlab.net">PigeonLab</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
