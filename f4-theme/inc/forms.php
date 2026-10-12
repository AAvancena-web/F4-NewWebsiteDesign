<?php
/**
 * Built-in lead forms (quote, contact, franchise) with email delivery.
 *
 * Each form can be swapped for a plugin shortcode in Customizer > F4 Theme Settings > Forms.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render a form.
 *
 * @param string $type  quote|contact|franchise.
 * @param array  $args  Options: submit (label), compact (bool), city (preselect), service (preselect).
 */
function f4_form( $type = 'quote', $args = array() ) {
	static $instance = 0;
	$instance++;

	$args = wp_parse_args(
		$args,
		array(
			'submit'  => 'quote' === $type ? 'Get my free quote' : ( 'franchise' === $type ? 'Enquire about a franchise' : 'Send message' ),
			'compact' => false,
			'city'    => '',
			'service' => '',
			'dark'    => false,
		)
	);

	$shortcode = f4_opt( 'f4_' . $type . '_shortcode' );
	if ( $shortcode ) {
		echo '<div class="f4-form-plugin">' . do_shortcode( $shortcode ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput
		return;
	}

	$form_id  = 'f4-form-' . $type . '-' . $instance;
	$status   = isset( $_GET['f4_form'] ) ? sanitize_key( wp_unslash( $_GET['f4_form'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
	$which    = isset( $_GET['f4_id'] ) ? sanitize_key( wp_unslash( $_GET['f4_id'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
	$services = f4_services();
	$cities   = f4_locations();
	?>
	<form id="<?php echo esc_attr( $form_id ); ?>" class="f4-form f4-form--<?php echo esc_attr( $type ); ?><?php echo $args['compact'] ? ' is-compact' : ''; ?>" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
		<?php if ( $which === $form_id && 'sent' === $status ) : ?>
			<div class="form-notice form-notice--success" role="status"><?php echo f4_icon( 'check-circle' ); // phpcs:ignore ?> <span>Thanks, your message is on its way. Our team will be in touch shortly.</span></div>
		<?php elseif ( $which === $form_id && 'error' === $status ) : ?>
			<div class="form-notice form-notice--error" role="alert"><span>Sorry, something went wrong. Please check the required fields or call us on <a href="<?php echo esc_attr( f4_phone_href() ); ?>"><?php echo esc_html( f4_phone() ); ?></a>.</span></div>
		<?php endif; ?>

		<input type="hidden" name="action" value="f4_form">
		<input type="hidden" name="f4_type" value="<?php echo esc_attr( $type ); ?>">
		<input type="hidden" name="f4_id" value="<?php echo esc_attr( $form_id ); ?>">
		<input type="hidden" name="f4_ref" value="<?php echo esc_url( home_url( add_query_arg( array() ) ) ); ?>">
		<?php wp_nonce_field( 'f4_form_submit', 'f4_nonce' ); ?>
		<div class="hp-field" aria-hidden="true"><label>Leave this empty <input type="text" name="f4_website" tabindex="-1" autocomplete="off"></label></div>

		<div class="form-grid">
			<div class="field">
				<label for="<?php echo esc_attr( $form_id ); ?>-name">Full name <span class="req">*</span></label>
				<input id="<?php echo esc_attr( $form_id ); ?>-name" type="text" name="f4_name" autocomplete="name" required placeholder="Your name">
			</div>
			<div class="field">
				<label for="<?php echo esc_attr( $form_id ); ?>-phone">Phone <span class="req">*</span></label>
				<input id="<?php echo esc_attr( $form_id ); ?>-phone" type="tel" name="f4_phone" autocomplete="tel" required placeholder="021 000 0000">
			</div>
			<div class="field <?php echo 'quote' === $type && $args['compact'] ? '' : 'field--full'; ?>">
				<label for="<?php echo esc_attr( $form_id ); ?>-email">Email <span class="req">*</span></label>
				<input id="<?php echo esc_attr( $form_id ); ?>-email" type="email" name="f4_email" autocomplete="email" required placeholder="you@company.co.nz">
			</div>

			<?php if ( 'franchise' === $type ) : ?>
				<div class="field">
					<label for="<?php echo esc_attr( $form_id ); ?>-city">City of interest <span class="req">*</span></label>
					<div class="select-wrap">
						<select id="<?php echo esc_attr( $form_id ); ?>-city" name="f4_city" required>
							<option value="">Select a city</option>
							<?php foreach ( $cities as $slug => $city ) : ?>
								<option value="<?php echo esc_attr( $city['name'] ); ?>" <?php selected( $args['city'], $slug ); ?>><?php echo esc_html( $city['name'] ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="field">
					<label for="<?php echo esc_attr( $form_id ); ?>-service">Service interest <span class="req">*</span></label>
					<div class="select-wrap">
						<select id="<?php echo esc_attr( $form_id ); ?>-service" name="f4_service" required data-service-select>
							<option value="">Select a service</option>
							<?php foreach ( $services as $slug => $service ) : ?>
								<option value="<?php echo esc_attr( $service['title'] ); ?>" data-slug="<?php echo esc_attr( $slug ); ?>" <?php selected( $args['service'], $slug ); ?>><?php echo esc_html( $service['title'] ); ?></option>
							<?php endforeach; ?>
							<option value="Multiple Services" data-slug="multiple">Multiple Services</option>
						</select>
					</div>
				</div>
				<div class="field field--full">
					<label for="<?php echo esc_attr( $form_id ); ?>-background">Current work or business background</label>
					<input id="<?php echo esc_attr( $form_id ); ?>-background" type="text" name="f4_background" placeholder="Tell us a little about your experience">
				</div>
			<?php else : ?>
				<div class="field <?php echo 'quote' === $type && $args['compact'] ? '' : 'field--full'; ?>">
					<label for="<?php echo esc_attr( $form_id ); ?>-service">Service needed</label>
					<div class="select-wrap">
						<select id="<?php echo esc_attr( $form_id ); ?>-service" name="f4_service" data-service-select>
							<option value="">Select a service</option>
							<?php foreach ( $services as $slug => $service ) : ?>
								<option value="<?php echo esc_attr( $service['title'] ); ?>" data-slug="<?php echo esc_attr( $slug ); ?>" <?php selected( $args['service'], $slug ); ?>><?php echo esc_html( $service['title'] ); ?></option>
							<?php endforeach; ?>
							<option value="Multiple Services" data-slug="multiple">Multiple services</option>
							<option value="Franchise enquiry" data-slug="franchise">Franchise enquiry</option>
						</select>
					</div>
				</div>
			<?php endif; ?>

			<div class="field field--full">
				<label for="<?php echo esc_attr( $form_id ); ?>-message"><?php echo 'quote' === $type ? 'Tell us about your site' : 'Message'; ?></label>
				<textarea id="<?php echo esc_attr( $form_id ); ?>-message" name="f4_message" rows="<?php echo $args['compact'] ? 3 : 4; ?>" placeholder="<?php echo esc_attr( 'quote' === $type ? 'Site type, location, and how often you need us' : 'How can we help?' ); ?>"></textarea>
			</div>

			<?php if ( 'franchise' === $type ) : ?>
				<div class="field field--full field--check">
					<label class="check">
						<input type="checkbox" name="f4_consent" value="yes" required>
						<span>I agree to be contacted by F4 Group Holdings Limited about franchise opportunities.</span>
					</label>
				</div>
			<?php endif; ?>
		</div>

		<button type="submit" class="btn btn--red btn--block btn--lg">
			<span><?php echo esc_html( $args['submit'] ); ?></span><?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?>
		</button>
		<p class="form-foot"><?php echo f4_icon( 'shield' ); // phpcs:ignore ?> <span><?php
				if ( 'franchise' === $type ) {
					echo 'Confidential enquiry. No obligation.';
				} elseif ( 'quote' === $type ) {
					echo 'Free, no obligation quote. Your details stay private.';
				} else {
					echo 'We reply fast. Your details stay private.';
				}
				?></span></p>
	</form>
	<?php
}

/**
 * Handle submissions.
 */
add_action( 'admin_post_nopriv_f4_form', 'f4_handle_form' );
add_action( 'admin_post_f4_form', 'f4_handle_form' );
function f4_handle_form() {
	$ref     = isset( $_POST['f4_ref'] ) ? esc_url_raw( wp_unslash( $_POST['f4_ref'] ) ) : home_url( '/' );
	$form_id = isset( $_POST['f4_id'] ) ? sanitize_key( wp_unslash( $_POST['f4_id'] ) ) : '';
	$ref     = remove_query_arg( array( 'f4_form', 'f4_id' ), $ref );
	$ref     = wp_validate_redirect( $ref, home_url( '/' ) );

	$fail = function () use ( $ref, $form_id ) {
		wp_safe_redirect( add_query_arg( array( 'f4_form' => 'error', 'f4_id' => $form_id ), $ref ) . '#' . $form_id );
		exit;
	};

	if ( ! isset( $_POST['f4_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['f4_nonce'] ) ), 'f4_form_submit' ) ) {
		$fail();
	}

	// Honeypot: silently accept bots without sending.
	if ( ! empty( $_POST['f4_website'] ) ) {
		wp_safe_redirect( add_query_arg( array( 'f4_form' => 'sent', 'f4_id' => $form_id ), $ref ) . '#' . $form_id );
		exit;
	}

	$type   = isset( $_POST['f4_type'] ) ? sanitize_key( wp_unslash( $_POST['f4_type'] ) ) : 'contact';
	$fields = array(
		'Name'       => 'f4_name',
		'Phone'      => 'f4_phone',
		'Email'      => 'f4_email',
		'Service'    => 'f4_service',
		'City'       => 'f4_city',
		'Background' => 'f4_background',
		'Message'    => 'f4_message',
		'Consent'    => 'f4_consent',
	);

	$data = array();
	foreach ( $fields as $label => $key ) {
		if ( isset( $_POST[ $key ] ) && '' !== $_POST[ $key ] ) {
			$data[ $label ] = 'f4_message' === $key ? sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) ) : sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
		}
	}

	if ( empty( $data['Name'] ) || empty( $data['Phone'] ) || empty( $data['Email'] ) || ! is_email( $data['Email'] ) ) {
		$fail();
	}

	$labels  = array( 'quote' => 'Free quote request', 'contact' => 'Contact enquiry', 'franchise' => 'Franchise enquiry' );
	$subject = sprintf( '[%s] %s from %s', get_bloginfo( 'name' ), isset( $labels[ $type ] ) ? $labels[ $type ] : 'Website enquiry', $data['Name'] );

	$body = '';
	foreach ( $data as $label => $value ) {
		$body .= $label . ': ' . $value . "\n";
	}
	$body .= "\nSubmitted from: " . $ref . "\n";

	$to      = f4_opt( 'f4_form_recipient' ) ? f4_opt( 'f4_form_recipient' ) : get_option( 'admin_email' );
	$headers = array( 'Reply-To: ' . $data['Name'] . ' <' . $data['Email'] . '>' );

	/**
	 * Fires before an F4 form email is sent. Use to push leads to a CRM.
	 */
	do_action( 'f4_form_submitted', $type, $data );

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( array( 'f4_form' => 'sent', 'f4_id' => $form_id ), $ref ) . '#' . $form_id );
	exit;
}
