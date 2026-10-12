<?php
/**
 * Global footer. Includes the pre-footer contact section (info, Google Map, form).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

if ( f4_show_prefooter_contact() ) {
	get_template_part( 'template-parts/contact-section' );
}
?>
</main>

<footer class="site-footer">
	<div class="container footer-main">
		<div class="footer-brand">
			<a class="brand brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img class="brand__logo" src="<?php echo esc_url( f4_img( 'logo.png' ) ); ?>" alt="F4 Group Holdings Limited" width="120" height="116" loading="lazy">
				<span class="brand__text"><strong>F4 Group</strong><small>Holdings Limited</small></span>
			</a>
			<p>Fast. Focused. Flexible. Flawless. One team for commercial cleaning, trade, exterior washing, and HVAC services across New Zealand.</p>
			<?php
			$socials = array_filter(
				array(
					'facebook'  => f4_opt( 'f4_facebook' ),
					'instagram' => f4_opt( 'f4_instagram' ),
					'linkedin'  => f4_opt( 'f4_linkedin' ),
				)
			);
			if ( $socials ) :
				?>
				<ul class="socials">
					<?php foreach ( $socials as $network => $url ) : ?>
						<li><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>"><?php echo f4_icon( $network ); // phpcs:ignore ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="footer-col">
			<h2 class="footer-title">Services</h2>
			<?php f4_footer_links( 'footer_services' ); ?>
		</div>

		<div class="footer-col">
			<h2 class="footer-title">Company</h2>
			<?php f4_footer_links( 'footer_company' ); ?>
		</div>

		<div class="footer-col">
			<h2 class="footer-title">Franchise locations</h2>
			<ul class="footer-links">
				<?php foreach ( f4_locations() as $slug => $city ) : ?>
					<li><a href="<?php echo esc_url( f4_location_url( $slug ) ); ?>"><?php echo esc_html( $city['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="footer-col footer-col--contact">
			<h2 class="footer-title">Contact</h2>
			<ul class="footer-contact">
				<li><a href="<?php echo esc_attr( f4_phone_href() ); ?>"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?><span><?php echo esc_html( f4_phone() ); ?></span></a></li>
				<li><a href="mailto:<?php echo esc_attr( f4_email() ); ?>"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?><span><?php echo esc_html( f4_email() ); ?></span></a></li>
				<li><span class="footer-contact__static"><?php echo f4_icon( 'pin' ); // phpcs:ignore ?><span><?php echo esc_html( f4_opt( 'f4_location' ) ); ?></span></span></li>
			</ul>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container footer-bottom__inner">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> F4 Group Holdings Limited. All rights reserved.</p>
			<p class="footer-bottom__tag">Commercial Services <i>|</i> HVAC <i>|</i> Trade <i>|</i> Exterior Solutions</p>
		</div>
	</div>
</footer>

<a class="mobile-call" href="<?php echo esc_attr( f4_phone_href() ); ?>" data-mobile-call>
	<span class="mobile-call__icon"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
	<span>Call now</span>
</a>

<button class="to-top" type="button" aria-label="Scroll to top" data-to-top>
	<svg class="to-top__ring" viewBox="0 0 48 48" aria-hidden="true"><circle cx="24" cy="24" r="22"></circle></svg>
	<?php echo f4_icon( 'arrow-up' ); // phpcs:ignore ?>
</button>

<?php wp_footer(); ?>
</body>
</html>
