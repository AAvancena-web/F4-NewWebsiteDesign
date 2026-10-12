<?php
/**
 * Post card (entire card clickable).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

$delay = isset( $args['delay'] ) ? (int) $args['delay'] : 0;
?>
<a <?php post_class( 'post-card' ); ?> href="<?php the_permalink(); ?>" data-reveal data-delay="<?php echo esc_attr( $delay ); ?>">
	<div class="post-card__media">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'f4-card', array( 'loading' => 'lazy', 'alt' => '' ) );
		} else {
			printf( '<img src="%s" alt="" loading="lazy">', esc_url( f4_img( 'one-team.webp' ) ) );
		}
		?>
	</div>
	<div class="post-card__body">
		<span class="post-card__meta"><?php echo esc_html( 'page' === get_post_type() ? 'Page' : get_the_date() ); ?></span>
		<h2 class="post-card__title"><?php the_title(); ?></h2>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		<span class="service-card__more">Read more <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
	</div>
</a>
