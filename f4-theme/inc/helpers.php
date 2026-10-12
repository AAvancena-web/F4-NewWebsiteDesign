<?php
/**
 * Template helpers.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme option defaults.
 */
function f4_option_defaults() {
	return array(
		'f4_phone'           => '0800 437 651',
		'f4_email'           => 'inquiries@f4.co.nz',
		'f4_location'        => 'New Zealand',
		'f4_hours'           => '',
		'f4_map_query'       => 'New Zealand',
		'f4_map_zoom'        => '5',
		'f4_form_recipient'  => '',
		'f4_quote_shortcode' => '',
		'f4_contact_shortcode' => '',
		'f4_franchise_shortcode' => '',
		'f4_facebook'        => '',
		'f4_instagram'       => '',
		'f4_linkedin'        => '',
	);
}

/**
 * Get a theme option.
 *
 * @param string $key Option key.
 * @return string
 */
function f4_opt( $key ) {
	$defaults = f4_option_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( $key, $default );
}

function f4_phone() {
	return f4_opt( 'f4_phone' );
}

function f4_phone_href() {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', f4_phone() );
}

function f4_email() {
	return f4_opt( 'f4_email' );
}

/**
 * Theme image URL.
 *
 * @param string $file File name inside assets/img.
 */
function f4_img( $file ) {
	return F4_URI . '/assets/img/' . ltrim( $file, '/' );
}

/**
 * URL for a page by path, with a sensible fallback.
 *
 * @param string $path Page path, e.g. "services/hvac-services".
 */
function f4_url( $path ) {
	$path = trim( $path, '/' );
	if ( '' === $path ) {
		return home_url( '/' );
	}
	$page = get_page_by_path( $path );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' . $path . '/' );
}

function f4_quote_url() {
	return f4_url( 'quote' );
}

function f4_service_url( $slug ) {
	return f4_url( 'services/' . $slug );
}

function f4_location_url( $slug ) {
	return f4_url( 'franchise-opportunity/' . $slug );
}

/**
 * Print an eyebrow label. No dashes, a small brand square leads the text.
 *
 * @param string $text  Label.
 * @param string $class Extra classes.
 */
function f4_eyebrow( $text, $class = '' ) {
	printf( '<span class="eyebrow %s">%s</span>', esc_attr( $class ), esc_html( $text ) );
}

/**
 * Button markup. All variants have solid backgrounds.
 *
 * @param string $label   Label.
 * @param string $url     URL.
 * @param string $variant red|white|dark|gold.
 * @param string $icon    Icon name or empty.
 * @param string $extra   Extra attributes.
 */
function f4_button( $label, $url, $variant = 'red', $icon = 'arrow-right', $extra = '' ) {
	$icon_html = $icon ? f4_icon( $icon ) : '';
	printf(
		'<a class="btn btn--%1$s" href="%2$s" %5$s><span>%3$s</span>%4$s</a>',
		esc_attr( $variant ),
		esc_url( $url ),
		esc_html( $label ),
		$icon_html, // phpcs:ignore WordPress.Security.EscapeOutput
		$extra // phpcs:ignore WordPress.Security.EscapeOutput
	);
}

/**
 * Breadcrumbs for inner pages.
 */
function f4_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}
	$items   = array();
	$items[] = array( 'label' => 'Home', 'url' => home_url( '/' ) );

	if ( is_page() ) {
		$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
		foreach ( $ancestors as $ancestor ) {
			$items[] = array( 'label' => get_the_title( $ancestor ), 'url' => get_permalink( $ancestor ) );
		}
		$items[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_singular( 'post' ) ) {
		$blog = get_option( 'page_for_posts' );
		if ( $blog ) {
			$items[] = array( 'label' => get_the_title( $blog ), 'url' => get_permalink( $blog ) );
		}
		$items[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_search() ) {
		$items[] = array( 'label' => 'Search results', 'url' => '' );
	} elseif ( is_404() ) {
		$items[] = array( 'label' => 'Page not found', 'url' => '' );
	} elseif ( is_archive() ) {
		$items[] = array( 'label' => wp_strip_all_tags( get_the_archive_title() ), 'url' => '' );
	} elseif ( is_home() ) {
		$items[] = array( 'label' => 'News', 'url' => '' );
	}

	echo '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol>';
	foreach ( $items as $item ) {
		if ( $item['url'] ) {
			printf( '<li><a href="%s">%s</a></li>', esc_url( $item['url'] ), esc_html( $item['label'] ) );
		} else {
			printf( '<li aria-current="page">%s</li>', esc_html( $item['label'] ) );
		}
	}
	echo '</ol></nav>';
}

/**
 * Whether the global pre-footer contact section should show.
 */
function f4_show_prefooter_contact() {
	$hide = is_page_template( array( 'page-templates/template-contact.php', 'page-templates/template-quote.php' ) )
		|| ( is_page() && in_array( f4_current_slug(), array( 'contact', 'quote' ), true ) );
	return (bool) apply_filters( 'f4_show_prefooter_contact', ! $hide );
}

/**
 * Google Maps embed URL (no API key required).
 */
function f4_map_embed_url() {
	return add_query_arg(
		array(
			'q'      => rawurlencode( f4_opt( 'f4_map_query' ) ),
			'z'      => absint( f4_opt( 'f4_map_zoom' ) ),
			'output' => 'embed',
		),
		'https://maps.google.com/maps'
	);
}

/**
 * Current page slug.
 */
function f4_current_slug() {
	$post = get_queried_object();
	return ( $post instanceof WP_Post ) ? $post->post_name : '';
}
