<?php
/**
 * Harvesy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Harvesy
 */

if ( ! defined('MST_HARVESY_VER' ) ) {
	define( 'MST_HARVESY_VER', '1.0.1' );
}

if ( ! function_exists( 'mst_harvesy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mst_harvesy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Harvesy, use a find and replace
		 * to change 'mst_harvesy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mst_harvesy', get_template_directory() . '/languages' );

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

  	register_nav_menus( [
			'header-menu' => esc_html__( 'Header menu', 'mst_harvesy' ),
			'footer-menu' => esc_html__( 'Footer menu', 'mst_harvesy' ),
			'lang-menu' => esc_html__( 'Language menu', 'mst_harvesy' ),
		] );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', [
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		] );
	}
endif;

add_action( 'after_setup_theme', 'mst_harvesy_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mst_harvesy_widgets_init() {
	register_sidebar( [
		'name'          => esc_html__( 'Desktop header social navigation', 'mst_harvesy' ),
		'id'            => 'desktop-header-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'mst_harvesy' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => esc_html__( 'Mobile header social navigation', 'mst_harvesy' ),
		'id'            => 'mobile-header-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'mst_harvesy' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	] );

	register_sidebar( [
		'name'          => esc_html__( 'Footer social navigation', 'mst_harvesy' ),
		'id'            => 'footer-header-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'mst_harvesy' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	] );
}

add_action( 'widgets_init', 'mst_harvesy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mst_harvesy_scripts() {
	wp_enqueue_style(
		'mst_harvesy-bootstrap-css',
		get_template_directory_uri() . '/css/bootstrap-grid.min.css',
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_style(
	 'mst_harvesy-style',
		get_stylesheet_uri(),
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_script(
		'mst_harvesy-main',
		get_template_directory_uri() . '/js/main.js',
		[],
		MST_HARVESY_VER,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'mst_harvesy_scripts' );

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

/**
 * Set custom logo classes.
 *
 * @param string $html Logo markup
 * @return string $html New logo markup
 */
function change_logo_class( $html ) {
  $html = str_replace( 'custom-logo-link', 'logo', $html );
  $html = str_replace( 'custom-logo', 'logo__image', $html );
  return $html;
}

add_filter( 'get_custom_logo', 'change_logo_class' );

/**
 * Set custom nav's <li> and <a> classes.
 */
function add_menu_link_class( $atts, $item, $args ) {
  if ( property_exists( $args, 'link_class' ) ) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_menu_list_item_class( $classes, $item, $args ) {
  if ( property_exists( $args, 'list_item_class' ) ) {
      $classes[] = $args->list_item_class;
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'add_menu_list_item_class', 1, 3 );
