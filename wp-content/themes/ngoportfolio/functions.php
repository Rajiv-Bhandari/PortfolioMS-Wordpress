<?php
/**
 * ngoPortfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ngoPortfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ngoportfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ngoPortfolio, use a find and replace
		* to change 'ngoportfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ngoportfolio', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ngoportfolio' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ngoportfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ngoportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ngoportfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ngoportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'ngoportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ngoportfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ngoportfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ngoportfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ngoportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ngoportfolio_scripts() {
	wp_enqueue_style( 'ngoportfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ngoportfolio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ngoportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ngoportfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function enqueue_header_styles() {
    wp_enqueue_style( 'header-styles', get_stylesheet_directory_uri() . '/css/header.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_header_styles' );

function enqueue_about_us_styles() {
    wp_enqueue_style( 'about-us-style', get_template_directory_uri() . '/css/about-us.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_about_us_styles' );



function enqueue_custom_health_styles() {
    wp_enqueue_style('health-styles', get_template_directory_uri() . '/css/health.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_health_styles');

function enqueue_contact_form_styles() {
    wp_enqueue_style('contact-form-styles', get_template_directory_uri() . '/css/contact-form.css');
}
add_action('wp_enqueue_scripts', 'enqueue_contact_form_styles');

function enqueue_single_styles() {
    wp_enqueue_style('single-style', get_template_directory_uri() . '/css/single.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_single_styles');

function enqueue_our_works_styles() {
    global $post;

    // Check if the current post uses the 'our-works.php' template part
    if (strpos(get_page_template_slug($post->ID), 'template-parts/our-works.php') !== false) {
        wp_enqueue_style('our-works-style', get_template_directory_uri() . '/css/our-works.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_our_works_styles');

function enqueue_home_css() {
    global $post;

    // Check if the current post uses the 'home.php' template
    if (strpos(get_page_template_slug($post->ID), 'template-parts/home.php') !== false) {	
        wp_enqueue_style('home-styles', get_template_directory_uri() . '/css/home.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_home_css');

function enqueue_our_partner_styles() {
    // Check if the current page uses the 'our-partners.php' template
    if (is_page_template('template-parts/our-partners.php')) {	
        // Enqueue the CSS file for 'our-partners.php' template
        wp_enqueue_style('our-partners-style', get_template_directory_uri() . '/css/our-partners.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_our_partner_styles');

function enqueue_our_team_styles() {
    if (is_page_template('template-parts/our-team.php')) {	
        wp_enqueue_style('our-partners-style', get_template_directory_uri() . '/css/our-team.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_our_team_styles');

function enqueue_single_our_team_styles() {
    if (is_singular('our-team')) {	
        wp_enqueue_style('our-team-style', get_template_directory_uri() . '/css/single-our-team.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_single_our_team_styles');

function enqueue_gallery_styles() {
    // Check if the current page uses the 'our-partners.php' template
    if (is_page_template('template-parts/gallery.php')) {	
        // Enqueue the CSS file for 'our-partners.php' template
        wp_enqueue_style('our-partners-style', get_template_directory_uri() . '/css/gallery.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_styles');

function enqueue_single_gallery_styles() {
    // Enqueue single-gallery.css for the single-gallery.php template
    if (is_singular('gallery')) {
        wp_enqueue_style('single-gallery-style', get_template_directory_uri() . '/css/single-gallery.css', array(), '1.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_single_gallery_styles');

