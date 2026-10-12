<?php
/**
 * Template Name: Franchise opportunity
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Fast. Focused. Flexible. Flawless.',
		'title'   => 'F4 Franchise Opportunity',
		'lead'    => 'Start your own F4 business with a practical service model, clear branding, and support from a growing New Zealand team.',
		'image'   => 'hero.webp',
		'buttons' => array(
			array( 'Buy a franchise', '#enquire', 'red' ),
			array( 'Ask about available locations', '#locations', 'white', 'pin' ),
		),
	)
);
?>

<section class="section">
	<div class="container">
		<div class="section-head section-head--center" data-reveal style="margin-bottom:0;">
			<?php f4_eyebrow( 'Own your future' ); ?>
			<h2 class="h2">Build a local service business under <span class="text-red">one trusted brand.</span></h2>
			<p class="lead">F4 Group Holdings Limited gives you a way to build a local service business under one trusted brand. You can focus on commercial cleaning, HVAC services, trade and painting, exterior washing, or a service mix approved by F4.</p>
			<?php
			while ( have_posts() ) :
				the_post();
				if ( get_the_content() ) :
					?>
					<div class="prose prose--narrow" style="text-align:left;margin-top:40px;"><?php the_content(); ?></div>
					<?php
				endif;
			endwhile;
			?>
		</div>
	</div>
</section>

<section class="section section--paper" id="locations">
	<div class="container">
		<div class="section-head section-head--split" data-reveal>
			<div>
				<?php f4_eyebrow( 'Locations' ); ?>
				<h2 class="h2">Choose your franchise location</h2>
			</div>
			<p class="lead">Franchise opportunities are open across five New Zealand cities. Pick a city to see what you could build there.</p>
		</div>
		<div class="location-grid">
			<?php
			$i = 0;
			foreach ( f4_locations() as $slug => $city ) :
				?>
				<a class="location-card" href="<?php echo esc_url( f4_location_url( $slug ) ); ?>" data-reveal data-delay="<?php echo esc_attr( $i++ ); ?>">
					<span class="location-card__pin"><?php echo f4_icon( 'pin' ); // phpcs:ignore ?></span>
					<span>
						<span class="location-card__name"><?php echo esc_html( $city['name'] ); ?></span>
						<span class="location-card__more">View <?php echo esc_html( $city['name'] ); ?> <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'Service sectors' ); ?>
			<h2 class="h2">Pick the sector that suits you</h2>
			<p class="lead">Run one division or, with approval, build a mix of services under the F4 brand.</p>
		</div>
		<div class="sector-grid">
			<?php
			$i = 0;
			foreach ( f4_services() as $slug => $service ) :
				?>
				<a class="sector-card" href="#enquire" data-preselect="<?php echo esc_attr( $slug ); ?>" data-reveal data-delay="<?php echo esc_attr( $i++ ); ?>">
					<span class="feature-card__icon"><?php echo f4_icon( $service['icon'] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $service['title'] ); ?> Franchise</h3>
					<p><?php echo esc_html( $service['franchise'] ); ?></p>
					<span class="service-card__more">Enquire now <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--dark why">
	<div class="why__bg-word" aria-hidden="true" data-parallax="0.15">F4</div>
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'Why choose F4', 'eyebrow--gold' ); ?>
			<h2 class="h2">The F4 standard, in your own business</h2>
		</div>
		<div class="values-grid">
			<?php foreach ( f4_values( 'franchise' ) as $index => $value ) : ?>
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

<section class="section">
	<div class="container list-panels">
		<div class="list-panel list-panel--dark" data-reveal="left">
			<?php f4_eyebrow( 'What you get', 'eyebrow--gold' ); ?>
			<h2 class="h3">Franchise benefits</h2>
			<ul class="check-list">
				<?php foreach ( f4_franchise_benefits() as $item ) : ?>
					<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="list-panel" data-reveal="right">
			<?php f4_eyebrow( 'Who we want' ); ?>
			<h2 class="h3">What we're looking for</h2>
			<ul class="check-list">
				<?php foreach ( f4_franchise_looking_for() as $item ) : ?>
					<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/franchise-enquire' );
get_template_part( 'template-parts/faq', null, array( 'items' => f4_franchise_faqs() ) );
get_footer();
