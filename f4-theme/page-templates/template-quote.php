<?php
/**
 * Template Name: Free quote
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Free, no obligation',
		'title'   => 'Get a free quote',
		'lead'    => 'Tell us about your site. We will come back to you with a clear plan and one clear price.',
		'image'   => 'ready.webp',
	)
);
?>

<section class="section section--paper">
	<div class="container quote-layout">
		<div data-reveal="left">
			<?php f4_eyebrow( 'What happens next' ); ?>
			<h2 class="h2">One team. One plan. <span class="text-red">One clear price.</span></h2>
			<?php
			while ( have_posts() ) :
				the_post();
				if ( get_the_content() ) {
					echo '<div class="prose">';
					the_content();
					echo '</div>';
				} else {
					echo '<p class="lead">Commercial cleaning, trade and painting, exterior wash, or HVAC. Book one service or bundle them, and talk to one team.</p>';
				}
			endwhile;
			?>
			<ul class="quote-points">
				<?php foreach ( array_slice( f4_process(), 0, 3 ) as $index => $step ) : ?>
					<li>
						<span class="feature-card__icon"><?php echo f4_icon( array( 'send', 'calendar', 'check-circle' )[ $index ] ); // phpcs:ignore ?></span>
						<div><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['text'] ); ?></p></div>
					</li>
				<?php endforeach; ?>
			</ul>
			<a class="phone-link" href="<?php echo esc_attr( f4_phone_href() ); ?>" style="margin-top:36px;">
				<span class="call-circle"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
				<span><small>Prefer to talk?</small><strong><?php echo esc_html( f4_phone() ); ?></strong></span>
			</a>
		</div>
		<div class="form-card form-card--hero" id="quote" data-reveal="right">
			<div class="form-card__head">
				<span class="form-card__badge">Free quote</span>
				<h3 class="h3">Tell us about your site</h3>
				<p>We reply fast and book a time that suits your site.</p>
			</div>
			<?php f4_form( 'quote' ); ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'Our services' ); ?>
			<h2 class="h2">One team, four divisions</h2>
		</div>
		<?php get_template_part( 'template-parts/service-cards' ); ?>
	</div>
</section>

<?php
get_footer();
