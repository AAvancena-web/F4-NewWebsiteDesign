<?php
/**
 * Template Name: Contact
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => 'Contact us',
		'title'   => 'Talk to the F4 team',
		'lead'    => 'Tell us about your site and we will get back to you with the next steps.',
		'image'   => 'one-team.webp',
		'aside'   => false,
		'buttons' => array(
			array( 'Call ' . f4_phone(), f4_phone_href(), 'red', 'phone' ),
			array( 'Email us', 'mailto:' . f4_email(), 'white', 'mail' ),
		),
	)
);

while ( have_posts() ) :
	the_post();
	if ( get_the_content() ) :
		?>
		<section class="section" style="padding-bottom:0;"><div class="container"><div class="prose prose--narrow"><?php the_content(); ?></div></div></section>
		<?php
	endif;
endwhile;

get_template_part( 'template-parts/contact-section', null, array( 'main' => true ) );
get_template_part( 'template-parts/cta-band', null, array( 'eyebrow' => 'Need a price?', 'title' => 'Get a free, no obligation quote for cleaning, trade, exterior wash, or HVAC.' ) );

get_footer();
