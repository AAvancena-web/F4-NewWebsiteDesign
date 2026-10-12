<?php
/**
 * Customizer: contact details, map, forms and social links.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', 'f4_customize_register' );
function f4_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'f4_panel', array( 'title' => __( 'F4 Theme Settings', 'f4' ), 'priority' => 30 ) );

	$sections = array(
		'f4_contact' => array(
			'title'  => __( 'Contact details', 'f4' ),
			'fields' => array(
				'f4_phone'    => array( 'label' => 'Phone number', 'type' => 'text' ),
				'f4_email'    => array( 'label' => 'Email address', 'type' => 'email' ),
				'f4_location' => array( 'label' => 'Location / address', 'type' => 'text' ),
				'f4_hours'    => array( 'label' => 'Business hours', 'type' => 'text' ),
			),
		),
		'f4_map'     => array(
			'title'  => __( 'Google Map', 'f4' ),
			'fields' => array(
				'f4_map_query' => array( 'label' => 'Map search query or address', 'type' => 'text' ),
				'f4_map_zoom'  => array( 'label' => 'Map zoom (1 to 20)', 'type' => 'number' ),
			),
		),
		'f4_forms'   => array(
			'title'       => __( 'Forms', 'f4' ),
			'description' => __( 'Built-in forms email submissions to the recipient below. To use a form plugin (Contact Form 7, Gravity Forms, WPForms), paste its shortcode and it replaces the built-in form.', 'f4' ),
			'fields'      => array(
				'f4_form_recipient'      => array( 'label' => 'Form recipient email (defaults to site admin email)', 'type' => 'email' ),
				'f4_quote_shortcode'     => array( 'label' => 'Quote form shortcode (optional)', 'type' => 'text' ),
				'f4_contact_shortcode'   => array( 'label' => 'Contact form shortcode (optional)', 'type' => 'text' ),
				'f4_franchise_shortcode' => array( 'label' => 'Franchise form shortcode (optional)', 'type' => 'text' ),
			),
		),
		'f4_social'  => array(
			'title'  => __( 'Social links', 'f4' ),
			'fields' => array(
				'f4_facebook'  => array( 'label' => 'Facebook URL', 'type' => 'url' ),
				'f4_instagram' => array( 'label' => 'Instagram URL', 'type' => 'url' ),
				'f4_linkedin'  => array( 'label' => 'LinkedIn URL', 'type' => 'url' ),
			),
		),
	);

	$defaults = f4_option_defaults();

	foreach ( $sections as $section_id => $section ) {
		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => $section['title'],
				'panel'       => 'f4_panel',
				'description' => isset( $section['description'] ) ? $section['description'] : '',
			)
		);
		foreach ( $section['fields'] as $id => $field ) {
			$sanitize = 'sanitize_text_field';
			if ( 'email' === $field['type'] ) {
				$sanitize = 'sanitize_email';
			} elseif ( 'url' === $field['type'] ) {
				$sanitize = 'esc_url_raw';
			} elseif ( 'number' === $field['type'] ) {
				$sanitize = 'absint';
			}
			$wp_customize->add_setting(
				$id,
				array(
					'default'           => isset( $defaults[ $id ] ) ? $defaults[ $id ] : '',
					'sanitize_callback' => $sanitize,
				)
			);
			$wp_customize->add_control(
				$id,
				array(
					'label'   => $field['label'],
					'section' => $section_id,
					'type'    => $field['type'],
				)
			);
		}
	}
}
