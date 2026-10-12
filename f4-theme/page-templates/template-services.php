<?php
/**
 * Template Name: Services overview
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'One team, four trades',
		'title'   => get_the_title(),
		'lead'    => 'One team, one standard. Choose the service your site needs and book it with a team that takes pride in the result.',
		'image'   => 'one-team.webp',
		'buttons' => array(
			array( 'Get a free quote', f4_quote_url(), 'red' ),
			array( 'Call ' . f4_phone(), f4_phone_href(), 'white', 'phone' ),
		),
	)
);
?>

<section class="section">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			if ( get_the_content() ) :
				?>
				<div class="prose prose--narrow" data-reveal style="margin-bottom: clamp(56px, 6vw, 96px);"><?php the_content(); ?></div>
				<?php
			endif;
		endwhile;

		$n = 0;
		foreach ( f4_services() as $slug => $service ) :
			$n++;
			?>
			<article class="overview-row" id="<?php echo esc_attr( $slug ); ?>">
				<a class="overview-row__media" href="<?php echo esc_url( f4_service_url( $slug ) ); ?>" data-reveal="<?php echo 0 === $n % 2 ? 'right' : 'left'; ?>" aria-label="<?php echo esc_attr( $service['title'] ); ?> full details">
					<img src="<?php echo esc_url( f4_img( $service['image'] ) ); ?>" alt="F4 Group Holdings Limited <?php echo esc_attr( $service['title'] ); ?>" loading="lazy" width="1200" height="675">
					<span class="overview-row__num">0<?php echo esc_html( $n ); ?></span>
				</a>
				<div class="overview-row__content" data-reveal="<?php echo 0 === $n % 2 ? 'left' : 'right'; ?>">
					<?php f4_eyebrow( 'Division 0' . $n ); ?>
					<h2 class="h2"><?php echo esc_html( $service['title'] ); ?></h2>
					<?php foreach ( $service['overview'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
					<span class="overview-row__label">What you can book</span>
					<ul class="check-list check-list--2" style="margin-top:0;">
						<?php foreach ( $service['book'] as $item ) : ?>
							<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
					<div class="btn-row">
						<?php f4_button( 'Get a free quote', add_query_arg( 'service', $slug, f4_quote_url() ), 'red' ); ?>
						<?php f4_button( 'Full details', f4_service_url( $slug ), 'dark' ); ?>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<section class="section section--dark why">
	<div class="why__bg-word" aria-hidden="true" data-parallax="0.15">F4</div>
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'The F4 difference', 'eyebrow--gold' ); ?>
			<h2 class="h2">Fast. Focused. Flexible. Flawless.</h2>
		</div>
		<div class="values-grid">
			<?php foreach ( f4_values() as $index => $value ) : ?>
				<article class="value-card" data-reveal data-delay="<?php echo esc_attr( $index ); ?>">
					<span class="value-card__letter" aria-hidden="true">F</span>
					<span class="value-card__icon"><?php echo f4_icon( $value['icon'] ); // phpcs:ignore ?></span>
					<h3 class="value-card__title"><?php echo esc_html( $value['word'] ); ?></h3>
					<p><?php echo esc_html( $value['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band' );
get_footer();
