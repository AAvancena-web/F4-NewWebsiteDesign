<?php
/**
 * Service card grid (entire card clickable).
 *
 * Args: exclude (slug), columns.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$args    = wp_parse_args( $args, array( 'exclude' => '' ) );
$counter = 0;
?>
<div class="service-grid<?php echo $args['exclude'] ? ' service-grid--3' : ''; ?>">
	<?php
	foreach ( f4_services() as $slug => $service ) :
		$counter++;
		if ( $slug === $args['exclude'] ) {
			continue;
		}
		?>
		<a class="service-card" href="<?php echo esc_url( f4_service_url( $slug ) ); ?>" data-reveal data-delay="<?php echo esc_attr( $counter - 1 ); ?>">
			<div class="service-card__media">
				<img src="<?php echo esc_url( f4_img( $service['image'] ) ); ?>" alt="F4 Group Holdings Limited <?php echo esc_attr( $service['title'] ); ?>" loading="lazy" width="800" height="450">
				<span class="service-card__num">0<?php echo esc_html( $counter ); ?></span>
			</div>
			<div class="service-card__body">
				<span class="service-card__icon"><?php echo f4_icon( $service['icon'] ); // phpcs:ignore ?></span>
				<h3 class="service-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
				<p><?php echo esc_html( $service['excerpt'] ); ?></p>
				<span class="service-card__more">Learn more <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</div>
		</a>
	<?php endforeach; ?>
</div>
