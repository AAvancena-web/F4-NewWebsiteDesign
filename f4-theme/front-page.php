<?php
/**
 * Homepage.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();
$services = f4_services();
?>

<!-- HERO: content shows immediately, no reveal animation. -->
<section class="hero" aria-labelledby="hero-title">
	<div class="hero__media" aria-hidden="true">
		<img src="<?php echo esc_url( f4_img( 'hero.webp' ) ); ?>" alt="" width="2000" height="1126" fetchpriority="high">
	</div>
	<div class="hero__grid-lines" aria-hidden="true"></div>
	<div class="container hero__inner">
		<div class="hero__content">
			<span class="eyebrow eyebrow--gold">Commercial Services <i>|</i> HVAC <i>|</i> Trade <i>|</i> Exterior Solutions</span>
			<h1 id="hero-title" class="hero__title">Commercial services across New Zealand, <span class="text-red">done to one standard.</span></h1>
			<p class="hero__tagline">Fast. Focused. Flexible. Flawless.</p>
			<p class="hero__text">You need a site that stays clean, safe, maintained, and ready for work. F4 Group Holdings Limited gives you one team for commercial cleaning, trade work, exterior washing, and HVAC services across New Zealand.</p>
			<div class="btn-row">
				<?php f4_button( 'Get a free quote', f4_quote_url(), 'red' ); ?>
				<?php f4_button( 'Buy a franchise', f4_url( 'franchise-opportunity' ), 'white' ); ?>
			</div>
			<ul class="hero__trust">
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>Free, no obligation quotes</li>
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>One team, four divisions</li>
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>Nationwide 0800 line</li>
			</ul>
		</div>

		<div class="hero__form">
			<div class="form-card form-card--hero" id="quote">
				<div class="form-card__head">
					<span class="form-card__badge">Free quote</span>
					<h2 class="h3">Get your free quote</h2>
					<p>Tell us about your site and we will get back to you with the next steps.</p>
				</div>
				<?php f4_form( 'quote', array( 'compact' => true ) ); ?>
			</div>
		</div>
	</div>
</section>

<!-- STATS -->
<section class="stats" aria-label="F4 at a glance">
	<div class="container stats__grid">
		<div class="stat" data-reveal data-delay="0">
			<strong class="stat__num"><span data-count="4">4</span></strong>
			<span class="stat__label">Service divisions under one brand</span>
		</div>
		<div class="stat" data-reveal data-delay="1">
			<strong class="stat__num"><span data-count="5">5</span></strong>
			<span class="stat__label">Franchise cities across New Zealand</span>
		</div>
		<div class="stat" data-reveal data-delay="2">
			<strong class="stat__num"><span data-count="1">1</span></strong>
			<span class="stat__label">Team, one point of contact, one standard</span>
		</div>
		<div class="stat" data-reveal data-delay="3">
			<strong class="stat__num">0800</strong>
			<span class="stat__label">Free call from anywhere in New Zealand</span>
		</div>
	</div>
</section>

<!-- PARTNERS -->
<section class="partners" aria-labelledby="partners-title">
	<div class="container">
		<p id="partners-title" class="partners__title">Trusted by local businesses, suppliers, and service partners across New Zealand</p>
	</div>
	<div class="marquee" data-reveal="fade">
		<div class="marquee__track">
			<?php for ( $loop = 0; $loop < 2; $loop++ ) : ?>
				<?php foreach ( f4_partners() as $partner ) : ?>
					<div class="marquee__item" <?php echo $loop ? 'aria-hidden="true"' : ''; ?>>
						<img src="<?php echo esc_url( f4_img( 'partners/' . $partner['file'] ) ); ?>" alt="<?php echo $loop ? '' : esc_attr( $partner['name'] ); ?>" loading="lazy" height="56">
					</div>
				<?php endforeach; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- SERVICES -->
<section class="section section--paper services" id="services" aria-labelledby="services-title">
	<div class="container">
		<div class="section-head section-head--split">
			<div data-reveal>
				<?php f4_eyebrow( 'Service divisions' ); ?>
				<h2 id="services-title" class="h2">One team, four divisions, <span class="text-red">one standard</span> across your site.</h2>
			</div>
			<div data-reveal data-delay="1">
				<p class="lead">Book one service or bundle them. Every division works to the same standard, wears the same uniform, and reports to the same team.</p>
				<a class="link-arrow" href="<?php echo esc_url( f4_url( 'f4-group' ) ); ?>">Compare all services <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></a>
			</div>
		</div>

		<?php get_template_part( 'template-parts/service-cards' ); ?>
	</div>
</section>

<!-- WHY F4 -->
<section class="section section--dark why" aria-labelledby="why-title">
	<div class="why__bg-word" aria-hidden="true" data-parallax="0.15">F4</div>
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'The F4 difference', 'eyebrow--gold' ); ?>
			<h2 id="why-title" class="h2">Why work with F4 Group Holdings Limited?</h2>
			<p class="lead">Four promises behind every job, on every site, from every division.</p>
		</div>
		<div class="values-grid">
			<?php
			foreach ( f4_values() as $index => $value ) :
				?>
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

<!-- ONE TEAM -->
<section class="section one-team" aria-labelledby="oneteam-title">
	<div class="container split">
		<div class="split__media" data-reveal="left">
			<div class="framed-img">
				<img src="<?php echo esc_url( f4_img( 'one-team.webp' ) ); ?>" alt="F4 Group Holdings Limited team members inside an F4 office" loading="lazy" width="1600" height="774">
			</div>
			<div class="floating-badge" data-parallax="-0.06">
				<span class="floating-badge__icon"><?php echo f4_icon( 'users' ); // phpcs:ignore ?></span>
				<span><strong>Service-specific teams</strong><small>Branded, uniformed, accountable</small></span>
			</div>
		</div>
		<div class="split__content" data-reveal="right">
			<?php f4_eyebrow( 'Our standard' ); ?>
			<h2 id="oneteam-title" class="h2">One team. <span class="text-red">One standard.</span></h2>
			<p class="lead">Your site should look professional from the front door to the back room.</p>
			<p>F4 Group Holdings Limited uses clear branding, consistent uniforms, and service-specific teams so customers know who is on site and what work they handle.</p>
			<ul class="check-list check-list--2">
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>Clear branding on every job</li>
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>Consistent, uniformed crews</li>
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>Service-specific teams</li>
				<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?>One contact, one clear price</li>
			</ul>
			<div class="btn-row">
				<?php f4_button( 'Explore our work', f4_url( 'f4-group' ), 'red' ); ?>
				<a class="phone-link" href="<?php echo esc_attr( f4_phone_href() ); ?>">
					<span class="call-circle call-circle--light"><?php echo f4_icon( 'phone' ); // phpcs:ignore ?></span>
					<span><small>Prefer to talk?</small><strong><?php echo esc_html( f4_phone() ); ?></strong></span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- PROCESS -->
<section class="section section--paper process" aria-labelledby="process-title">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'How it works' ); ?>
			<h2 id="process-title" class="h2">From first call to a site that stays ready</h2>
			<p class="lead">A simple, clear process so you always know what happens next.</p>
		</div>
		<ol class="process-steps" data-process>
			<?php foreach ( f4_process() as $index => $step ) : ?>
				<li class="process-step" data-reveal data-delay="<?php echo esc_attr( $index ); ?>">
					<span class="process-step__num"><?php echo esc_html( $index + 1 ); ?></span>
					<h3 class="process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
		<div class="btn-row btn-row--center" data-reveal>
			<?php f4_button( 'Start with a free quote', f4_quote_url(), 'red' ); ?>
			<?php f4_button( 'Call ' . f4_phone(), f4_phone_href(), 'dark', 'phone' ); ?>
		</div>
	</div>
</section>

<!-- FRANCHISE -->
<section class="section franchise-band" aria-labelledby="franchise-title">
	<div class="franchise-band__bg" aria-hidden="true">
		<img src="<?php echo esc_url( f4_img( 'hero.webp' ) ); ?>" alt="" loading="lazy" data-parallax="0.12">
	</div>
	<div class="container franchise-band__inner">
		<div class="franchise-band__content" data-reveal="left">
			<?php f4_eyebrow( 'Franchise opportunity', 'eyebrow--gold' ); ?>
			<h2 id="franchise-title" class="h2">Build your own F4 business.</h2>
			<p class="lead">Build your own F4 business with a practical service model, clear branding, and support from a growing New Zealand team.</p>
			<ul class="check-list check-list--light check-list--2">
				<?php foreach ( array_slice( f4_franchise_benefits(), 0, 4 ) as $benefit ) : ?>
					<li><?php echo f4_icon( 'check' ); // phpcs:ignore ?><?php echo esc_html( $benefit ); ?></li>
				<?php endforeach; ?>
			</ul>
			<div class="btn-row">
				<?php f4_button( 'Enquire about a franchise', f4_url( 'franchise-opportunity' ) . '#enquire', 'red' ); ?>
				<?php f4_button( 'Learn more', f4_url( 'franchise-opportunity' ), 'white' ); ?>
			</div>
		</div>
		<div class="franchise-band__cities" data-reveal="right">
			<p class="cities-title">Choose your location</p>
			<ul class="city-list">
				<?php
				$n = 0;
				foreach ( f4_locations() as $slug => $city ) :
					$n++;
					?>
					<li>
						<a class="city-link" href="<?php echo esc_url( f4_location_url( $slug ) ); ?>">
							<span class="city-link__num">0<?php echo esc_html( $n ); ?></span>
							<span class="city-link__name"><?php echo esc_html( $city['name'] ); ?></span>
							<span class="city-link__arrow"><?php echo f4_icon( 'arrow-up-right' ); // phpcs:ignore ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<!-- READY CTA -->
<section class="cta-band" aria-labelledby="ready-title">
	<div class="cta-band__bg" aria-hidden="true">
		<img src="<?php echo esc_url( f4_img( 'ready.webp' ) ); ?>" alt="" loading="lazy" data-parallax="0.1">
	</div>
	<div class="container cta-band__inner" data-reveal="zoom">
		<?php f4_eyebrow( 'Ready when you are', 'eyebrow--gold' ); ?>
		<h2 id="ready-title" class="h2">Tell us about your site and we will get back to you with the next steps.</h2>
		<div class="btn-row btn-row--center">
			<?php f4_button( 'Get a free quote', f4_quote_url(), 'red' ); ?>
			<?php f4_button( 'Contact us', '#contact-us', 'white' ); ?>
		</div>
	</div>
</section>

<?php
get_footer();
