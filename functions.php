<?php
/**
 * Harvesy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Harvesy
 */

if ( ! defined('MST_HARVESY_VER' ) ) {
	define( 'MST_HARVESY_VER', '1.0.3' );
}

/**
 * Creates custom ACF theme settings page.
 */
function mst_harvesy_register_settings() {
  if ( !function_exists('acf_add_options_page') ) return;

  $parent = acf_add_options_page( [
    'page_title' => __( 'Theme settings', 'mst_harvesy' ),
    'menu_slug' => 'theme-settings',
    'autoload' => true,
  ] );

  acf_add_options_sub_page( [
    'page_title' => __( 'General Settings', 'mst_harvesy' ),
    'menu_title' => 'General',
    'parent_slug'   => $parent['menu_slug'],
    'menu_slug'     => 'general-settings'
  ] );

  acf_add_options_sub_page( [
    'page_title' => __( 'Social Settings', 'mst_harvesy' ),
    'menu_title' => 'Social',
    'parent_slug'   => $parent['menu_slug'],
    'menu_slug'     => 'social-settings'
  ] );
}

add_action('acf/init', 'mst_harvesy_register_settings');

/**
 * Set default and current settings language as English,
 * to make settings untranslatable.
 */
function mst_bajk_settings_default_language() {
  return 'en';
}

add_filter('acf/settings/default_language', 'mst_bajk_settings_default_language');
add_filter('acf/settings/current_language', 'mst_bajk_settings_default_language');

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

	register_sidebar( [
		'name'          => esc_html__( 'Instagram widget area', 'mst_harvesy' ),
		'id'            => 'instagram-sidebar',
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
  $photo_gallery_adaptive = get_field( 'photo_gallery_adaptive', 'option' ) ?: [];
  $video_gallery_adaptive = get_field( 'video_gallery_adaptive', 'option' ) ?: [];
  $loader_delay_sec = get_field( 'loader_delay', 'option' ) ?: 6;

	wp_enqueue_style(
		'mst_harvesy-bootstrap-css',
		get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css',
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_style(
		'mst_harvesy-onepage-css',
		get_template_directory_uri() . '/assets/css/onepage-scroll.min.css',
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_style(
		'mst_harvesy-slick-css',
		get_template_directory_uri() . '/assets/css/slick.css',
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_style(
	 'mst_harvesy-style',
		get_stylesheet_uri(),
		[],
		MST_HARVESY_VER
	);

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script(
		'mst_harvesy-onepage-js',
		get_template_directory_uri() . '/assets/js/onepage-scroll.min.js',
		[],
		MST_HARVESY_VER,
		true
	);

	wp_enqueue_script(
		'mst_harvesy-slick-js',
		get_template_directory_uri() . '/assets/js/slick.min.js',
		[],
		MST_HARVESY_VER,
		true
	);

	wp_enqueue_script(
		'mst_harvesy-bigpicture-js',
		get_template_directory_uri() . '/assets/js/bigpicture.min.js',
		[],
		MST_HARVESY_VER,
		true
	);

	wp_enqueue_script(
		'mst_harvesy-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		MST_HARVESY_VER,
		true
	);

	wp_localize_script(
    'mst_harvesy-main',
    'mainState',
    [
      'photoGallerySettings' => $photo_gallery_adaptive,
      'videoGallerySettings' => $video_gallery_adaptive,
      'loaderDelayMs' => $loader_delay_sec * 1000,
    ]
  );
}

add_action( 'wp_enqueue_scripts', 'mst_harvesy_scripts' );

/**
 * Set custom logo classes.
 *
 * @param string $html Logo markup
 * @return string $html New logo markup
 */
function mst_harvesy_change_logo_class( $html ) {
  $html = str_replace( 'custom-logo-link', 'logo', $html );
  $html = str_replace( 'custom-logo', 'logo__image', $html );
  return $html;
}

add_filter( 'get_custom_logo', 'mst_harvesy_change_logo_class' );

/**
 * Set custom nav's <li> and <a> classes.
 */
function mst_harvesy_add_menu_link_class( $atts, $item, $args ) {
  if ( property_exists( $args, 'link_class' ) ) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}

add_filter( 'nav_menu_link_attributes', 'mst_harvesy_add_menu_link_class', 1, 3 );

function mst_harvesy_add_menu_list_item_class( $classes, $item, $args ) {
  if ( property_exists( $args, 'list_item_class' ) ) {
      $classes[] = $args->list_item_class;
  }
  return $classes;
}

add_filter( 'nav_menu_css_class', 'mst_harvesy_add_menu_list_item_class', 1, 3 );

/**
 * Register AJAX handler for callback forms
 */
function mst_harvesy_handle_callback() {
  try {
    $name = sanitize_text_field( $_POST['data']['name'] ) ?: '-';
    $email = sanitize_email( $_POST['data']['email'] ) ?: '-';
    $phone = sanitize_text_field( $_POST['data']['phone'] ) ?: '-';
    $description = sanitize_textarea_field( $_POST['data']['description'] ) ?: '-';

    wp_mail(
      get_option( 'admin_email' ),
      'На сайте заполнена новая форма',
      "Имя: $name \n Email: $email \n Телефон: $phone \n Описание задачи: $description"
    );

    wp_send_json_success( [ 'status' => 'OK' ] );

  } catch ( Exception $e ) {
    wp_send_json_error( [ 'error' => $e ] );
  }

  wp_die();
}

add_action( 'wp_ajax_mst_harvesy_cb', 'mst_harvesy_handle_callback' );
add_action( 'wp_ajax_nopriv_mst_harvesy_cb', 'mst_harvesy_handle_callback' );

/**
 * Returns <img> element with custom site logo.
 */
function mst_harvesy_the_loader_logo() {
  /* @var string $loader_logo_src */
  $loader_logo_src = esc_url( get_field('loader_logo', 'option' ) );

  if ( ! empty( $loader_logo_src ) ) {
  ?>

    <img src="<?php echo $loader_logo_src; ?>"
         alt=""
         class="main-header__logo-img logo__image loader-logo">

  <?php
  }
}