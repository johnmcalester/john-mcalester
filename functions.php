<?php
/**
 * My Theme functions and definitions
 *
 * @package My Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}
add_action( 'after_setup_theme', 'jmc_theme_setup' );
if ( ! function_exists( 'jmc_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function jmc_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on My Theme, use a find and replace
	 * to change 'my-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mcalester', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mcalester' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jmc_theme_custom_background_args', array(
		'default-color' => 'ebe8e5',
		'default-image' => '',
	) ) );
}
endif; // jmc_theme_setup

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
add_action( 'widgets_init', 'jmc_theme_widgets_init' );
function jmc_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mcalester' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'jmc_enqueue_styles_scripts');
function jmc_enqueue_styles_scripts() {
	wp_enqueue_style('gfonts', '//fonts.googleapis.com/css?family=Raleway:300,400,700,900');
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main-min.css' );

	// Note jquery listed as dependancy which prompts WP to load it
	wp_enqueue_script( 'testtheme-navigation', get_template_directory_uri() . '/src/js/navigation-custom.js', array('jquery') );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/src/js/modernizr.js' );
	wp_enqueue_script( 'REM-unit-polyfill', get_template_directory_uri() . '/src/js/rem.js', false, false, true );
	// Remember to comment out enqueueing of navigation.js in functions.php
	// wp_enqueue_script( 'my-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'my-theme-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Activate support for featured images
add_theme_support( 'post-thumbnails' );

// Set the post thumbnail default size to suit the theme layout
set_post_thumbnail_size( 811, 456, true );

// Add a div wrapper around the "Continue Reading" button
// From https://tommcfarlin.com/more-tag-wrapper/
add_action( 'the_content_more_link', 'add_continue_wrapper', 10, 2 );
function add_continue_wrapper( $link, $text ) {
	$html = '<div class="continue_btn">' . $link . '</div>';
	return $html;
}

// Register custom widget locations
register_sidebar(
	array(
		'name' => __("Above Header", "mcalester"),
		'id' => 'aboveheader',
		'description' => 'Above header and menu, right aligned, use for social icons',
		'before_widget' => "<div class='aboveheader'>",
		'after_widget' => "</div>"
	)
);

register_sidebar(
	array(
		'name' => __("Above Content Area", "mcalester"),
		'id' => 'abovecontent',
		'description' => 'Front page only, use for sliders',
		'before_widget' => "<div class='abovecontent'>",
		'after_widget' => "</div>"
	)
);
