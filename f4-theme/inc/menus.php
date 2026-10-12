<?php
/**
 * Navigation helpers and fallbacks.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

/**
 * Default primary navigation structure (used when no menu is assigned).
 */
function f4_default_nav() {
	$services = array();
	foreach ( f4_services() as $slug => $service ) {
		$services[] = array( 'label' => $service['title'], 'url' => f4_service_url( $slug ), 'icon' => $service['icon'] );
	}
	$locations = array();
	foreach ( f4_locations() as $slug => $city ) {
		$locations[] = array( 'label' => $city['name'], 'url' => f4_location_url( $slug ), 'icon' => 'pin' );
	}
	return array(
		array( 'label' => 'Home', 'url' => home_url( '/' ) ),
		array( 'label' => 'Services', 'url' => f4_url( 'f4-group' ), 'children' => $services ),
		array( 'label' => 'Franchise Opportunity', 'url' => f4_url( 'franchise-opportunity' ), 'children' => $locations ),
		array( 'label' => 'Contact', 'url' => f4_url( 'contact' ) ),
	);
}

/**
 * Print the primary menu.
 */
function f4_primary_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'menu',
				'depth'          => 2,
			)
		);
		return;
	}
	f4_menu_fallback();
}

/**
 * Fallback primary menu markup (mirrors wp_nav_menu classes).
 */
function f4_menu_fallback() {
	$current = home_url( add_query_arg( array() ) );
	echo '<ul class="menu">';
	foreach ( f4_default_nav() as $item ) {
		$has_children = ! empty( $item['children'] );
		$is_current   = trailingslashit( $item['url'] ) === trailingslashit( $current );
		$classes      = array( 'menu-item' );
		if ( $has_children ) {
			$classes[] = 'menu-item-has-children';
		}
		if ( $is_current ) {
			$classes[] = 'current-menu-item';
		}
		printf( '<li class="%s"><a href="%s">%s</a>', esc_attr( implode( ' ', $classes ) ), esc_url( $item['url'] ), esc_html( $item['label'] ) );
		if ( $has_children ) {
			echo f4_submenu_toggle( $item['label'] ); // phpcs:ignore
			echo '<ul class="sub-menu">';
			foreach ( $item['children'] as $child ) {
				printf(
					'<li class="menu-item"><a href="%s">%s<span>%s</span></a></li>',
					esc_url( $child['url'] ),
					! empty( $child['icon'] ) ? '<span class="sub-ico">' . f4_icon( $child['icon'] ) . '</span>' : '', // phpcs:ignore
					esc_html( $child['label'] )
				);
			}
			echo '</ul>';
		}
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Submenu toggle button markup.
 *
 * @param string $label Parent label.
 */
function f4_submenu_toggle( $label ) {
	return sprintf(
		'<button class="submenu-toggle" type="button" aria-expanded="false" aria-label="%s">%s</button>',
		esc_attr( sprintf( 'Show %s submenu', $label ) ),
		f4_icon( 'chevron-down' )
	);
}

/**
 * Add submenu toggles to real WP menus.
 */
add_filter( 'walker_nav_menu_start_el', 'f4_menu_toggle_markup', 10, 4 );
function f4_menu_toggle_markup( $output, $item, $depth, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && in_array( 'menu-item-has-children', (array) $item->classes, true ) ) {
		$output .= f4_submenu_toggle( $item->title );
	}
	return $output;
}

/**
 * Footer link lists (menu if assigned, otherwise defaults).
 *
 * @param string $location footer_services|footer_company.
 */
function f4_footer_links( $location ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'menu_class'     => 'footer-links',
				'depth'          => 1,
			)
		);
		return;
	}

	$links = array();
	if ( 'footer_services' === $location ) {
		foreach ( f4_services() as $slug => $service ) {
			$links[] = array( $service['title'], f4_service_url( $slug ) );
		}
	} else {
		$links = array(
			array( 'F4 Group Holdings Limited', f4_url( 'f4-group' ) ),
			array( 'Franchise Opportunity', f4_url( 'franchise-opportunity' ) ),
			array( 'Get a free quote', f4_quote_url() ),
			array( 'Contact', f4_url( 'contact' ) ),
		);
	}

	echo '<ul class="footer-links">';
	foreach ( $links as $link ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $link[1] ), esc_html( $link[0] ) );
	}
	echo '</ul>';
}
