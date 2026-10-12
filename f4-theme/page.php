<?php
/**
 * Default page template.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'eyebrow' => 'F4 Group Holdings Limited',
			'title'   => get_the_title(),
			'lead'    => has_excerpt() ? get_the_excerpt() : '',
		)
	);
	?>
	<section class="section">
		<div class="container content-layout">
			<article class="prose" data-reveal>
				<?php
				the_content();
				wp_link_pages( array( 'before' => '<nav class="pagination"><div class="nav-links">', 'after' => '</div></nav>' ) );
				?>
			</article>
			<aside class="sticky-card" data-reveal="right">
				<div class="side-card">
					<span class="eyebrow eyebrow--gold">Free quote</span>
					<h3 class="h3">Need a hand with your site?</h3>
					<p>One team for commercial cleaning, trade, exterior washing, and HVAC across New Zealand.</p>
					<?php f4_button( 'Get a free quote', f4_quote_url(), 'red' ); ?>
					<div class="side-card__contact">
						<a href="<?php echo esc_attr( f4_phone_href() ); ?>"><span class="call-circle"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span><span><small>Talk to us now</small><?php echo esc_html( f4_phone() ); ?></span></a>
						<a href="mailto:<?php echo esc_attr( f4_email() ); ?>"><span class="call-circle"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?></span><span><small>Email us</small><?php echo esc_html( f4_email() ); ?></span></a>
					</div>
				</div>
			</aside>
		</div>
	</section>
	<?php
endwhile;

get_footer();
