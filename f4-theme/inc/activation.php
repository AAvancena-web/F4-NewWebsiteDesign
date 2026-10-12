<?php
/**
 * One-time site setup on theme activation: pages, templates, front page and menu.
 * Existing pages with the same path are kept and only receive a template if they have none.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_switch_theme', 'f4_activation_setup' );
function f4_activation_setup() {
	if ( get_option( 'f4_setup_done' ) ) {
		return;
	}

	$ids = array();

	$ids['home'] = f4_ensure_page( 'home', 'Home', '', 0 );
	$ids['f4-group'] = f4_ensure_page( 'f4-group', 'F4 Group Holdings Limited', 'page-templates/template-services.php', 0 );
	$ids['services'] = f4_ensure_page( 'services', 'Services', 'page-templates/template-services.php', 0 );

	foreach ( f4_services() as $slug => $service ) {
		$ids[ 'service-' . $slug ] = f4_ensure_page( $slug, $service['title'], 'page-templates/template-service.php', $ids['services'] );
	}

	$ids['franchise'] = f4_ensure_page( 'franchise-opportunity', 'Franchise Opportunity', 'page-templates/template-franchise.php', 0 );
	foreach ( f4_locations() as $slug => $city ) {
		$ids[ 'city-' . $slug ] = f4_ensure_page( $slug, $city['name'], 'page-templates/template-location.php', $ids['franchise'] );
	}

	$ids['contact'] = f4_ensure_page( 'contact', 'Contact', 'page-templates/template-contact.php', 0 );
	$ids['quote']   = f4_ensure_page( 'quote', 'Get a Free Quote', 'page-templates/template-quote.php', 0 );

	if ( 'page' !== get_option( 'show_on_front' ) && $ids['home'] ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
	}

	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}

	f4_create_primary_menu( $ids );
	flush_rewrite_rules();
	update_option( 'f4_setup_done', 1 );
}

/**
 * Create a page if it does not exist.
 *
 * @param string $slug     Slug.
 * @param string $title    Title.
 * @param string $template Template path.
 * @param int    $parent   Parent ID.
 * @return int Page ID.
 */
function f4_ensure_page( $slug, $title, $template, $parent ) {
	$path = $parent ? get_page_uri( $parent ) . '/' . $slug : $slug;
	$page = get_page_by_path( $path );

	if ( $page ) {
		$id = $page->ID;
	} else {
		$id = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_title'  => $title,
				'post_name'   => $slug,
				'post_parent' => $parent,
				'post_content' => '',
			)
		);
	}

	if ( $id && ! is_wp_error( $id ) && $template ) {
		$current = get_post_meta( $id, '_wp_page_template', true );
		if ( ! $current || 'default' === $current ) {
			update_post_meta( $id, '_wp_page_template', $template );
		}
	}

	return is_wp_error( $id ) ? 0 : (int) $id;
}

/**
 * Build the primary menu.
 *
 * @param array $ids Page IDs.
 */
function f4_create_primary_menu( $ids ) {
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( ! empty( $locations['primary'] ) ) {
		return;
	}

	$menu_name = 'F4 Primary';
	$menu      = wp_get_nav_menu_object( $menu_name );
	$menu_id   = $menu ? $menu->term_id : wp_create_nav_menu( $menu_name );
	if ( is_wp_error( $menu_id ) ) {
		return;
	}

	if ( ! $menu ) {
		$add = function ( $page_id, $title, $parent = 0 ) use ( $menu_id ) {
			return wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => $title,
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_id,
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-parent-id' => $parent,
				)
			);
		};

		$add( $ids['home'], 'Home' );
		$services = $add( $ids['f4-group'], 'Services' );
		foreach ( f4_services() as $slug => $service ) {
			$add( $ids[ 'service-' . $slug ], $service['title'], $services );
		}
		$franchise = $add( $ids['franchise'], 'Franchise Opportunity' );
		foreach ( f4_locations() as $slug => $city ) {
			$add( $ids[ 'city-' . $slug ], $city['name'], $franchise );
		}
		$add( $ids['contact'], 'Contact' );
	}

	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Template fallback: pick the right template by page path even if none is assigned.
 */
add_filter( 'template_include', 'f4_template_fallback', 20 );
function f4_template_fallback( $template ) {
	if ( ! is_page() ) {
		return $template;
	}
	$assigned = get_page_template_slug();
	if ( $assigned ) {
		return $template;
	}
	$post   = get_queried_object();
	$parent = $post->post_parent ? get_post( $post->post_parent ) : null;
	$map    = '';

	if ( $parent && 'services' === $parent->post_name && f4_get_service( $post->post_name ) ) {
		$map = 'template-service.php';
	} elseif ( $parent && 'franchise-opportunity' === $parent->post_name && isset( f4_locations()[ $post->post_name ] ) ) {
		$map = 'template-location.php';
	} elseif ( in_array( $post->post_name, array( 'services', 'f4-group' ), true ) ) {
		$map = 'template-services.php';
	} elseif ( 'franchise-opportunity' === $post->post_name ) {
		$map = 'template-franchise.php';
	} elseif ( 'contact' === $post->post_name ) {
		$map = 'template-contact.php';
	} elseif ( 'quote' === $post->post_name ) {
		$map = 'template-quote.php';
	}

	if ( $map ) {
		$found = locate_template( 'page-templates/' . $map );
		if ( $found ) {
			return $found;
		}
	}
	return $template;
}
