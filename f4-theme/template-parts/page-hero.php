<?php
/**
 * Inner page banner. Content displays immediately (no reveal animation).
 *
 * Args: title, lead, eyebrow, image, buttons (array of [label, url, variant, icon]), aside (bool).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
	$args,
	array(
		'title'   => get_the_title(),
		'lead'    => '',
		'eyebrow' => '',
		'image'   => '',
		'buttons' => array(),
		'aside'   => true,
	)
);

$image = $args['image'];
if ( ! $image && is_singular() && has_post_thumbnail() ) {
	$image = get_the_post_thumbnail_url( null, 'f4-wide' );
}
if ( ! $image ) {
	$image = f4_img( 'hero.webp' );
} elseif ( false === strpos( $image, '/' ) ) {
	$image = f4_img( $image );
}
?>
<section class="page-hero<?php echo $args['aside'] ? '' : ' page-hero--simple'; ?>">
	<div class="page-hero__media" aria-hidden="true">
		<img src="<?php echo esc_url( $image ); ?>" alt="" fetchpriority="high">
	</div>
	<div class="container">
		<?php f4_breadcrumbs(); ?>
		<div class="page-hero__inner">
			<div class="page-hero__content">
				<?php if ( $args['eyebrow'] ) : ?>
					<span class="eyebrow eyebrow--gold"><?php echo esc_html( $args['eyebrow'] ); ?></span>
				<?php endif; ?>
				<h1 class="page-hero__title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
				<?php if ( $args['lead'] ) : ?>
					<p class="page-hero__lead"><?php echo wp_kses_post( $args['lead'] ); ?></p>
				<?php endif; ?>
				<?php if ( $args['buttons'] ) : ?>
					<div class="btn-row">
						<?php
						foreach ( $args['buttons'] as $button ) {
							f4_button( $button[0], $button[1], isset( $button[2] ) ? $button[2] : 'red', isset( $button[3] ) ? $button[3] : 'arrow-right' );
						}
						?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $args['aside'] ) : ?>
				<div class="page-hero__aside">
					<span class="eyebrow eyebrow--gold">Talk to us now</span>
					<a href="<?php echo esc_attr( f4_phone_href() ); ?>"><span class="call-circle"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span><span><?php echo esc_html( f4_phone() ); ?></span></a>
					<a href="mailto:<?php echo esc_attr( f4_email() ); ?>"><span class="call-circle"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?></span><span><?php echo esc_html( f4_email() ); ?></span></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
