<?php
/**
 * Template Name: Franchise location
 *
 * City is matched by page slug (auckland, christchurch, wellington, nelson, dunedin).
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

$slug      = f4_current_slug();
$locations = f4_locations();
$city      = isset( $locations[ $slug ] ) ? $locations[ $slug ] : array( 'name' => get_the_title(), 'why' => '' );
$name      = $city['name'];

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Franchise opportunity',
		'title'   => 'F4 Franchise Opportunity in ' . $name,
		'lead'    => 'Start an F4 franchise in ' . $name . ' and build a local service business with clear branding, practical systems, and support from the F4 Group Holdings Limited team.',
		'image'   => 'hero.webp',
		'buttons' => array(
			array( 'Buy an F4 franchise in ' . $name, '#enquire', 'red' ),
		),
	)
);
?>

<section class="section">
	<div class="container split">
		<div data-reveal="left">
			<?php f4_eyebrow( $name . ' opportunity' ); ?>
			<h2 class="h2">Build a trusted service business in <span class="text-red"><?php echo esc_html( $name ); ?>.</span></h2>
			<p class="lead"><?php echo esc_html( $name ); ?> has strong demand for reliable commercial service providers.</p>
			<p>Businesses need cleaning, HVAC support, trade work, painting, exterior washing, and practical property services. F4 Group Holdings Limited gives you a way to build a local franchise that serves offices, retail spaces, commercial buildings, and business facilities across <?php echo esc_html( $name ); ?>.</p>
			<?php
			while ( have_posts() ) :
				the_post();
				if ( get_the_content() ) :
					?>
					<div class="prose"><?php the_content(); ?></div>
					<?php
				endif;
			endwhile;
			?>
		</div>
		<div class="split__media" data-reveal="right">
			<div class="framed-img"><img src="<?php echo esc_url( f4_img( 'one-team.webp' ) ); ?>" alt="F4 Group Holdings Limited team" loading="lazy" width="1600" height="774"></div>
			<div class="floating-badge" data-parallax="-0.06">
				<span class="floating-badge__icon"><?php echo f4_icon( 'pin' ); // phpcs:ignore ?></span>
				<span><strong><?php echo esc_html( $name ); ?></strong><small>Now taking franchise enquiries</small></span>
			</div>
		</div>
	</div>
</section>

<section class="section section--paper">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'Service opportunities' ); ?>
			<h2 class="h2">Service opportunities in <?php echo esc_html( $name ); ?></h2>
		</div>
		<div class="sector-grid">
			<?php
			$copy = array(
				'commercial-cleaning' => 'Run a commercial cleaning service for offices, workplaces, shared facilities, retail spaces, and business sites. Help ' . $name . ' businesses keep their premises clean, safe, and ready for staff, customers, and visitors.',
				'hvac-services'       => 'Support ' . $name . ' businesses with HVAC servicing, maintenance, and site support. This opportunity suits people who want to work in a practical service sector with ongoing commercial demand.',
				'trade-painting'      => 'Offer trade support, painting, repairs, touch-ups, and property maintenance for commercial sites. ' . $name . ' businesses need fast and reliable property support to keep their spaces presentable.',
				'exterior-wash'       => 'Provide exterior washing, pressure washing, soft washing, entrance cleaning, path cleaning, signage cleaning, and building wash services for commercial properties.',
			);
			$i = 0;
			foreach ( f4_services() as $service_slug => $service ) :
				?>
				<a class="sector-card" href="#enquire" data-preselect="<?php echo esc_attr( $service_slug ); ?>" data-reveal data-delay="<?php echo esc_attr( $i++ ); ?>">
					<span class="feature-card__icon"><?php echo f4_icon( $service['icon'] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $service['title'] . ' Franchise ' . $name ); ?></h3>
					<p><?php echo esc_html( $copy[ $service_slug ] ); ?></p>
					<span class="service-card__more">Enquire now <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php if ( $city['why'] ) : ?>
<section class="section section--dark why">
	<div class="why__bg-word" aria-hidden="true" data-parallax="0.15">F4</div>
	<div class="container">
		<div class="section-head section-head--center" data-reveal style="margin-bottom:0;">
			<?php f4_eyebrow( 'Why ' . $name, 'eyebrow--gold' ); ?>
			<h2 class="h2">Why <?php echo esc_html( $name ); ?></h2>
			<p class="lead"><?php echo esc_html( $city['why'] ); ?></p>
			<div class="btn-row btn-row--center">
				<?php f4_button( 'Start your F4 business', '#enquire', 'red' ); ?>
				<?php f4_button( 'All franchise details', f4_url( 'franchise-opportunity' ), 'white' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
get_template_part(
	'template-parts/franchise-enquire',
	null,
	array(
		'city'  => $slug,
		'title' => 'Start your F4 business in ' . $name,
		'text'  => 'Tell us which service area you want to focus on and F4 will contact you about ' . $name . ' franchise opportunities.',
	)
);
get_template_part( 'template-parts/faq', null, array( 'title' => $name . ' franchise FAQ', 'items' => f4_franchise_faqs( $name ) ) );
?>

<section class="section section--paper">
	<div class="container">
		<div class="section-head section-head--center" data-reveal>
			<?php f4_eyebrow( 'More locations' ); ?>
			<h2 class="h2">Other franchise locations</h2>
		</div>
		<div class="location-grid location-grid--4">
			<?php
			$i = 0;
			foreach ( $locations as $other_slug => $other ) :
				if ( $other_slug === $slug ) {
					continue;
				}
				?>
				<a class="location-card" href="<?php echo esc_url( f4_location_url( $other_slug ) ); ?>" data-reveal data-delay="<?php echo esc_attr( $i++ ); ?>">
					<span class="location-card__pin"><?php echo f4_icon( 'pin' ); // phpcs:ignore ?></span>
					<span>
						<span class="location-card__name"><?php echo esc_html( $other['name'] ); ?></span>
						<span class="location-card__more">View <?php echo esc_html( $other['name'] ); ?> <?php echo f4_icon( 'arrow-right' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
