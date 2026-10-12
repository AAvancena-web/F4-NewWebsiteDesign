<?php
/**
 * Template Name: Service detail
 *
 * Shows a service division. The service is matched by the page slug
 * (commercial-cleaning, trade-painting, exterior-wash, hvac-services).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

$slug    = f4_current_slug();
$service = f4_get_service( $slug );

if ( ! $service ) {
	// Unknown slug: fall back to a standard page layout.
	get_template_part( 'template-parts/page-hero', null, array( 'eyebrow' => 'F4 Group Holdings Limited' ) );
	echo '<section class="section"><div class="container"><div class="prose prose--narrow">';
	while ( have_posts() ) {
		the_post();
		the_content();
	}
	echo '</div></div></section>';
	get_footer();
	return;
}

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Service division',
		'title'   => $service['title'],
		'lead'    => $service['lead'],
		'image'   => $service['image'],
		'buttons' => array(
			array( 'Get a free quote', add_query_arg( 'service', $slug, f4_quote_url() ), 'red' ),
			array( 'Call ' . f4_phone(), f4_phone_href(), 'white', 'phone' ),
		),
	)
);
?>

<section class="section service-intro">
	<div class="container content-layout">
		<div class="service-intro__body">
			<div data-reveal>
				<?php f4_eyebrow( 'What we do' ); ?>
				<h2 class="h2">Built around your site, your hours, and <span class="text-red">your standard.</span></h2>
				<?php foreach ( $service['body'] as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			</div>

			<?php
			while ( have_posts() ) :
				the_post();
				if ( get_the_content() ) :
					?>
					<div class="prose" data-reveal><?php the_content(); ?></div>
					<?php
				endif;
			endwhile;
			?>

			<div class="book-block" data-reveal>
				<h3 class="h3">What you can book</h3>
				<ul class="tiles">
					<?php foreach ( $service['book'] as $item ) : ?>
						<li class="tile"><?php echo f4_icon( 'check' ); // phpcs:ignore ?><span><?php echo esc_html( $item ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<aside class="sticky-card" data-reveal="right">
			<div class="side-card">
				<span class="eyebrow eyebrow--gold">Ready to book?</span>
				<h3 class="h3">Get a clear plan and price</h3>
				<p>Tell us about your site and we will come back to you with a clear plan and price.</p>
				<?php f4_button( 'Get a free quote', add_query_arg( 'service', $slug, f4_quote_url() ), 'red' ); ?>
				<div class="side-card__contact">
					<a href="<?php echo esc_attr( f4_phone_href() ); ?>"><span class="call-circle"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span><span><small>Talk to us now</small><?php echo esc_html( f4_phone() ); ?></span></a>
					<a href="mailto:<?php echo esc_attr( f4_email() ); ?>"><span class="call-circle"><?php echo f4_icon( 'mail' ); // phpcs:ignore ?></span><span><small>Email us</small><?php echo esc_html( f4_email() ); ?></span></a>
				</div>
				<p class="side-card__note">We reply fast and book a time that suits your site.</p>
			</div>
		</aside>
	</div>
</section>

<section class="section section--dark">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'Why F4 Group Holdings Limited', 'eyebrow--gold' ); ?>
			<h2 class="h2">The F4 standard on every <?php echo esc_html( strtolower( $service['title'] ) ); ?> job</h2>
		</div>
		<div class="feature-grid">
			<?php foreach ( $service['why'] as $index => $item ) : ?>
				<article class="feature-card" data-reveal data-delay="<?php echo esc_attr( $index ); ?>">
					<span class="feature-card__icon"><?php echo f4_icon( $item['icon'] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--paper">
	<div class="container">
		<div class="section-head section-head--split" data-reveal>
			<div>
				<?php f4_eyebrow( 'One team, four divisions' ); ?>
				<h2 class="h2">Explore our other divisions</h2>
			</div>
			<p class="lead">Bundle services under one team and one point of contact. Same standard, every division.</p>
		</div>
		<?php get_template_part( 'template-parts/service-cards', null, array( 'exclude' => $slug ) ); ?>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band', null, array( 'title' => 'Ready to book ' . strtolower( $service['title'] ) . '? Tell us about your site and get a clear plan and price.' ) );
get_footer();
