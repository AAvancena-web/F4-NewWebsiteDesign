<?php
/**
 * Reusable call to action band.
 *
 * Args: eyebrow, title, image.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
	$args,
	array(
		'eyebrow' => 'Ready when you are',
		'title'   => 'Tell us about your site and we will come back to you with a clear plan and price.',
		'image'   => 'ready.webp',
	)
);
?>
<section class="cta-band">
	<div class="cta-band__bg" aria-hidden="true">
		<img src="<?php echo esc_url( f4_img( $args['image'] ) ); ?>" alt="" loading="lazy" data-parallax="0.1">
	</div>
	<div class="container cta-band__inner" data-reveal="zoom">
		<?php f4_eyebrow( $args['eyebrow'], 'eyebrow--gold' ); ?>
		<h2 class="h2"><?php echo esc_html( $args['title'] ); ?></h2>
		<div class="btn-row btn-row--center">
			<?php f4_button( 'Get a free quote', f4_quote_url(), 'red' ); ?>
			<?php f4_button( 'Call ' . f4_phone(), f4_phone_href(), 'white', 'phone' ); ?>
		</div>
	</div>
</section>
