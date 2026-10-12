<?php
/**
 * Theme setup and assets.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'f4_setup' );
function f4_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 120, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	add_image_size( 'f4-card', 800, 560, true );
	add_image_size( 'f4-wide', 1600, 900, true );

	register_nav_menus(
		array(
			'primary'          => __( 'Primary menu', 'f4' ),
			'footer_services'  => __( 'Footer: Services', 'f4' ),
			'footer_company'   => __( 'Footer: Company', 'f4' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'f4_assets' );
function f4_assets() {
	$css_ver = F4_VERSION . '.' . filemtime( F4_DIR . '/assets/css/main.css' );
	$js_ver  = F4_VERSION . '.' . filemtime( F4_DIR . '/assets/js/main.js' );

	wp_enqueue_style( 'f4-main', F4_URI . '/assets/css/main.css', array(), $css_ver );
	wp_enqueue_script( 'f4-main', F4_URI . '/assets/js/main.js', array(), $js_ver, array( 'strategy' => 'defer', 'in_footer' => true ) );
}

/**
 * Preload the two primary fonts for faster first paint.
 */
add_action( 'wp_head', 'f4_preload_fonts', 1 );
function f4_preload_fonts() {
	// Flag JS early so scroll-reveal styles never flash.
	echo "<script>document.documentElement.classList.add('js');</script>\n";
	$fonts = array( 'archivo-black-latin-400-normal.woff2', 'inter-latin-400-normal.woff2' );
	foreach ( $fonts as $font ) {
		printf( '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n", esc_url( F4_URI . '/assets/fonts/' . $font ) );
	}
	printf( '<link rel="preload" href="%s" as="image" fetchpriority="high">' . "\n", esc_url( f4_img( 'hero.webp' ) ) );
	echo '<meta name="theme-color" content="#0b0b0d">' . "\n";
}

/**
 * Body classes.
 */
add_filter( 'body_class', 'f4_body_class' );
function f4_body_class( $classes ) {
	$classes[] = is_front_page() ? 'is-home' : 'is-inner';
	return $classes;
}

add_filter( 'excerpt_length', function () { return 24; } );
add_filter( 'excerpt_more', function () { return '...'; } );

/**
 * Remove emoji scripts for a leaner front end.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Remove the "Archive:" prefix style labels.
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

/**
 * Use a pipe in document titles (no dashes anywhere on the site).
 */
add_filter( 'document_title_separator', function () { return '|'; } );
