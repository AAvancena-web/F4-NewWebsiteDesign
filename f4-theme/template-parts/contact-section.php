<?php
/**
 * Global pre-footer contact section: contact info, Google Map and form.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$is_main = ! empty( $args['main'] ); // Used on the Contact page as the primary section.
?>
<section class="section contact-section<?php echo $is_main ? ' contact-section--main' : ''; ?>" id="contact-us">
	<div class="container">
		<?php if ( ! $is_main ) : ?>
		<div class="section-head section-head--split" data-reveal>
			<div>
				<?php f4_eyebrow( 'Get in touch' ); ?>
				<h2 class="h2">Tell us about your site. <span class="text-red">We will take it from there.</span></h2>
			</div>
			<p class="lead">Call, email, or send a message. You will talk to one team, get one clear plan, and one clear price.</p>
		</div>
		<?php endif; ?>

		<div class="contact-grid">
			<div class="contact-info" data-reveal="left">
				<div class="info-cards">
					<a class="info-card" href="<?php echo esc_attr( f4_phone_href() ); ?>">
						<span class="info-card__icon"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
						<span class="info-card__label">Call us free</span>
						<strong class="info-card__value"><?php echo esc_html( f4_phone() ); ?></strong>
					</a>
					<a class="info-card" href="mailto:<?php echo esc_attr( f4_email() ); ?>">
						<span class="info-card__icon"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?></span>
						<span class="info-card__label">Email</span>
						<strong class="info-card__value"><?php echo esc_html( f4_email() ); ?></strong>
					</a>
					<div class="info-card">
						<span class="info-card__icon"><?php echo f4_icon( 'pin' ); // phpcs:ignore ?></span>
						<span class="info-card__label">Service area</span>
						<strong class="info-card__value"><?php echo esc_html( f4_opt( 'f4_location' ) ); ?> wide</strong>
					</div>
					<?php if ( f4_opt( 'f4_hours' ) ) : ?>
					<div class="info-card">
						<span class="info-card__icon"><?php echo f4_icon( 'clock' ); // phpcs:ignore ?></span>
						<span class="info-card__label">Office hours</span>
						<strong class="info-card__value"><?php echo esc_html( f4_opt( 'f4_hours' ) ); ?></strong>
					</div>
					<?php else : ?>
					<a class="info-card" href="<?php echo esc_url( f4_quote_url() ); ?>">
						<span class="info-card__icon"><?php echo f4_icon( 'check-circle' ); // phpcs:ignore ?></span>
						<span class="info-card__label">Free quotes</span>
						<strong class="info-card__value">No obligation, clear pricing</strong>
					</a>
					<?php endif; ?>
				</div>
				<div class="map-wrap">
					<iframe title="F4 Group Holdings Limited service area map" src="<?php echo esc_url( f4_map_embed_url() ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
					<div class="map-badge"><?php echo f4_icon( 'map' ); // phpcs:ignore ?><span>Auckland <i>|</i> Wellington <i>|</i> Christchurch <i>|</i> Nelson <i>|</i> Dunedin</span></div>
				</div>
			</div>

			<div class="form-card" data-reveal="right">
				<div class="form-card__head">
					<h3 class="h3">Send us a message</h3>
					<p>We reply fast and book a time that suits your site.</p>
				</div>
				<?php f4_form( 'contact' ); ?>
			</div>
		</div>
	</div>
</section>
