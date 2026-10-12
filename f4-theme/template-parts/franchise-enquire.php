<?php
/**
 * Franchise enquiry section with form.
 *
 * Args: city (slug), title, text.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
	$args,
	array(
		'city'  => '',
		'title' => 'Buy an F4 Franchise',
		'text'  => 'Tell us where you want to operate and which service sector interests you. F4 will contact you with the next steps.',
	)
);
?>
<section class="section section--paper" id="enquire">
	<div class="container enquire-grid">
		<div data-reveal="left">
			<?php f4_eyebrow( 'Franchise enquiry' ); ?>
			<h2 class="h2"><?php echo esc_html( $args['title'] ); ?></h2>
			<p class="lead"><?php echo esc_html( $args['text'] ); ?></p>
			<ul class="quote-points">
				<li>
					<span class="feature-card__icon"><?php echo f4_icon( 'send' ); // phpcs:ignore ?></span>
					<div><h3>Send your enquiry</h3><p>Choose your city and service sector, and tell us about your background.</p></div>
				</li>
				<li>
					<span class="feature-card__icon"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
					<div><h3>Talk with the F4 team</h3><p>We contact you to talk through territory, training, and support.</p></div>
				</li>
				<li>
					<span class="feature-card__icon"><?php echo f4_icon( 'briefcase' ); // phpcs:ignore ?></span>
					<div><h3>Start your F4 business</h3><p>Launch under one trusted brand with proven systems behind you.</p></div>
				</li>
			</ul>
		</div>
		<div class="form-card" data-reveal="right">
			<div class="form-card__head">
				<span class="form-card__badge">Confidential</span>
				<h3 class="h3">Enquire about a franchise</h3>
				<p>Takes less than two minutes.</p>
			</div>
			<?php f4_form( 'franchise', array( 'city' => $args['city'] ) ); ?>
		</div>
	</div>
</section>
